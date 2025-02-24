<?php

namespace Core\Application;

use Exception;

class Pagination
{
    protected int $countPages; //загальна кількість сторінок

    protected int $currentPage; // поточна сторінка
    protected string $uri; // посилання на сторінки
    protected int $perPage = 1; // кількість записів на сторінці
    protected int $totalRecords; // загальна кількість записів

    /**
     * @throws Exception
     */
    public function __construct(int $numberPage, int $perPage, int $totalRecords)
    {
        $this->perPage = $perPage;
        $this->totalRecords = $totalRecords;
        $this->countPages = $this->getCountPages();
        $this->currentPage = $this->getCurrentPage($numberPage);
        $this->uri = $this->getUri();

    }

    protected function getCountPages(): int
    {
        return ($this->totalRecords == 0) ? 1 : ceil($this->totalRecords / $this->perPage);
    }

    /**
     * @throws Exception
     */
    protected function getCurrentPage(int $numberPage): int
    {
        if ($numberPage < 1 || $numberPage > $this->countPages) {
            throw new Exception(StatusCode::Page_Not_Found->name, StatusCode::Page_Not_Found->value);
        }

        return $numberPage;
    }

    /**
     * отримання позиції offset для sql-запиту
     * @return int
     */
    protected function getOffset(): int
    {
        return ($this->currentPage - 1) * $this->perPage;
    }

    private function getUri()
    {
        $uri=htmlspecialchars(strip_tags(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH)));
        show($uri);

        if(!empty($uri)){

        }
    }
}