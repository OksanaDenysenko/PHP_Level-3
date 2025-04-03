<?php

namespace Core\Application;

use Core\Data\Database;
use Core\Data\QueryBuilder;
use Exception;
use PDO;

class Paginator
{
    private QueryBuilder $queryBuilder;
    private PDO $pdo;
    private int $limit;
    private int $currentPage;

    public array $data = [];

    public array $pagination = [];

    /**
     * @throws Exception
     */
    public function __construct(QueryBuilder $queryBuilder, int $limit = 20)
    {
        $this->pdo = Database::getConnection();
        $this->queryBuilder = $queryBuilder;
        $this->limit = $limit;
        $this->currentPage = $this->getCurrentPage();
        $this->data = $this->getItems();
        $this->pagination = $this->getPaginationData(clone $queryBuilder);
    }

    /**
     * The function gets the number of the current page
     * @throws Exception
     */
    protected function getCurrentPage(): int
    {
        $numberPage = isset($_GET["page"]) ? htmlspecialchars(strip_tags($_GET["page"])) : 1;

        if ($numberPage < 1) {

            throw new Exception(StatusCode::Bad_Request->name, StatusCode::Bad_Request->value);
        }

        return $numberPage;
    }

    /**
     *The function gets the data that executes the current query,
     * taking into account the limit and offset.
     * @return array|false
     */
    protected function getItems(): array
    {

       // $sql = str_replace('SELECT', 'SELECT SQL_CALC_FOUND_ROWS', $this->queryBuilder->getQuery()); // for totalRecords
        $sql=$this->queryBuilder->getQuery();
        $sql .= " LIMIT :limit OFFSET :offset";
        $stm = $this->pdo->prepare($sql);
        $stm->bindParam(':limit', $this->limit, PDO::PARAM_INT);
        $offset = $this->getOffset();
        $stm->bindParam(':offset', $offset, PDO::PARAM_INT);
        $stm->execute();
//повернути пустий масив
        return $stm->fetchAll();
    }

    /**
     * The function gets the offset position for the future sql query
     * @return int
     */
    protected function getOffset(): int
    {
        return ($this->currentPage - 1) * $this->limit;
    }

    /**
     * The function receives data from the Pagination class
     * @throws \Exception
     */
    protected function getPaginationData(QueryBuilder $queryBuilder): array
    {
        $countPages = $this->getCountPages($queryBuilder);

        if ($this->currentPage > $countPages) {

            throw new Exception(StatusCode::Bad_Request->name, StatusCode::Bad_Request->value);
        }

        return (new Pagination($countPages, $this->currentPage))->getPaginationData();
    }

    /**
     * The function calculates the total number of pages for pagination
     * @return int
     */
    protected function getCountPages(QueryBuilder $queryBuilder): int
    {
        $tableWithAlias=explode(' ',$queryBuilder->getFrom());
        $queryBuilder->select('COUNT(DISTINCT '.end($tableWithAlias).'.id)');
        $totalRecords = $this->pdo->query($queryBuilder->getQuery())->fetchColumn();

        return ($totalRecords == 0) ? 1 : ceil($totalRecords / $this->limit);
    }
}