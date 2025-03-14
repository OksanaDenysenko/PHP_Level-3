<?php

namespace Core\Application;

use Exception;
use PDO;

class Paginator
{
    private string $sql;
    private PDO $pdo;
    protected int $currentPage;
    protected int $perPage;
    protected int $totalRecords;
    protected int $countPages;

    /**
     * @throws Exception
     */
    public function __construct(PDO $pdo, string $sql, int $limit, int $totalRecords)
    {
        $this->pdo = $pdo;
        $this->sql = $sql;
        $this->perPage = $limit;
        //$this->totalRecords = $this->getTotalRecords();
        $this->totalRecords = $totalRecords;
        $this->countPages = $this->getCountPages();
        $this->currentPage = $this->getCurrentPage();
    }

//    /**
//     * The function gets the total number of records that match the SQL query
//     * @return int
//     */
//    public function getTotalRecords(): int
//    {
//
//        return $this->pdo->query(
//            "SELECT COUNT(*)FROM ($this->sql) AS count")->fetchColumn();
//    }

    /**
     * The function gets the number of the current page
     * @throws Exception
     */
    protected function getCurrentPage(): int
    {
        $numberPage = isset($_GET["page"]) ? htmlspecialchars(strip_tags($_GET["page"])) : 1;

        if ($numberPage < 1 || $numberPage > $this->countPages) {

            throw new Exception(StatusCode::Page_Not_Found->name, StatusCode::Page_Not_Found->value);
        }

        return $numberPage;
    }

    /**
     * The function calculates the total number of pages for pagination
     * @return int
     */
    protected function getCountPages(): int
    {
        return ($this->totalRecords == 0) ? 1 : ceil($this->totalRecords / $this->perPage);
    }

    /**
     * The function gets the offset position for the future sql query
     * @return int
     */
    public function getOffset(): int
    {
        return ($this->currentPage - 1) * $this->perPage;
    }

    /**
     *The function gets the data that executes the current query,
     * taking into account the limit and offset.
     * @return array
     */
    public function getItems(): array
    {
        $sql = $this->sql . " LIMIT :limit OFFSET :offset";
        $stm = $this->pdo->prepare($sql);
        $stm->bindParam(':limit', $this->perPage, PDO::PARAM_INT);
        $offset = $this->getOffset();
        $stm->bindParam(':offset', $offset, PDO::PARAM_INT);
        $stm->execute();

        return $stm->fetchAll();
    }

    /**
     * The function receives data from the Pagination class
     * @throws \Exception
     */
    public function getPaginationData(): array
    {
        $pagination = new Pagination($this->countPages, $this->currentPage);
        return $pagination->getPaginationData();
    }
}