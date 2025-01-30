<?php

namespace Core\Application;

use Exception;

class Pagination
{
    protected int $countPages;

    protected int $currentPage;
    protected string $uri; // посилання на сторінки
    protected int $perPage = 1;
    protected int $totalRecords;

    public function __construct($page, $perPage, $totalRecords)
    {
        $this->perPage = $perPage;
        $this->totalRecords = $totalRecords;
        $this->countPages = $this->getCountPages();
        $this->currentPage = $this->getCurrentPage($page);
        $this->uri = getUri();

    }

    protected function getCountPages(): int
    {
        return ($this->totalRecords == 0) ? 1 : ceil($this->totalRecords / $this->perPage);
    }

    /**
     * @throws Exception
     */
    protected function getCurrentPage($page): int
    {
        if ($page < 1 || $page > $this->countPages) {
            throw new Exception(StatusCode::Page_Not_Found->name, StatusCode::Page_Not_Found->value);
        }

        return $page;
    }

    protected function getOffset(): int
    {
        return ($this->currentPage - 1) * $this->perPage;
    }
}