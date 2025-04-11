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
    private int $countPages;
    private array $data = [];

    /**
     * @throws Exception
     */
    public function __construct(QueryBuilder $queryBuilder, int $limit = 20)
    {
        $this->pdo = Database::getConnection();
        $this->queryBuilder = $queryBuilder;
        $this->limit = $limit;
        $this->countPages = $this->getCountPages(clone $queryBuilder);
        $this->currentPage = $this->getCurrentPage();
        $this->data = $this->getItems();
    }

    /**
     * The function gets the number of the current page
     * @throws Exception
     */
    protected function getCurrentPage(): int
    {
        $numberPage = isset($_GET["page"]) ? htmlspecialchars(strip_tags($_GET["page"])) : 1;

        if ($numberPage < 1 || $numberPage>$this->countPages) {

            throw new Exception(StatusCode::Bad_Request->name, StatusCode::Bad_Request->value);
        }

        return $numberPage;
    }

    /**
     *The function gets the data that executes the current query,
     * taking into account the limit and offset.
     * @return array
     */
    protected function getItems(): array
    {
        $sql=$this->queryBuilder->getQuery();
        $sql .= " LIMIT :limit OFFSET :offset";
        $stm = $this->pdo->prepare($sql);
        $stm->bindParam(':limit', $this->limit, PDO::PARAM_INT);
        $offset = $this->getOffset();
        $stm->bindParam(':offset', $offset, PDO::PARAM_INT);
        $stm->execute();

//тут ми обговорювали щоб додати повернення пустого масиву, замість false.
// Я прочитала, що починаючи з версії 8.0 - fetchAll завжди повертає масив або ексепшн
//тому не додавала повернення пустого масиву
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
     * The function returns the data needed to display pagination in the view
     */
    public function getPaginationData(): array
    {
        return [
            'items'=>$this->data,
            'limit'=>$this->limit,
            'currentPage'=>$this->currentPage,
            'countPages'=>$this->countPages
        ];
    }

    /**
     * The function calculates the total number of pages for pagination
     * @param QueryBuilder $queryBuilder
     * @return int
     */
    protected function getCountPages(QueryBuilder $queryBuilder): int
    {
        $tableWithAlias=explode(' ',$queryBuilder->getFrom());
        $queryBuilder->select(['COUNT(DISTINCT '.end($tableWithAlias).'.id)'])-> group();
        $totalRecords = $this->pdo->query($queryBuilder->getQuery())->fetchColumn();

        return ($totalRecords == 0) ? 1 : ceil($totalRecords / $this->limit);
    }
}