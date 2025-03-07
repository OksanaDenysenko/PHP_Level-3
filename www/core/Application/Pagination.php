<?php

namespace Core\Application;

use Exception;

class Pagination
{
    protected int $countPages;
    protected int $currentPage;
    protected string $uri;
    protected int $perPage;
    protected int $totalRecords;

    /**
     * @throws Exception
     */
    public function __construct(int $totalRecords, int $perPage)
    {
        $this->perPage = $perPage;
        $this->totalRecords = $totalRecords;
        $this->countPages = $this->getCountPages();
        $this->currentPage = $this->getCurrentPage();
        $this->uri = $this->getUri();
    }

    /**
     * The function generates data for pagination
     * @return array
     */
    public function getPaginationData(): array
    {
        //$currentPage = $this->currentPage;
        $back = '';
        $forward = null;
        $startPage = null;
        $endPage = null;
        $page2left = null; // link to second page on left
        $page1left = null; // link to first page on left
        $page2right = null; // link to second page on right
        $page1right = null; // link to first page on right

        if ($this->currentPage> 1) {
            $back = $this->getLink($this->currentPage - 1);
        }

        if ($this->currentPage < $this->countPages) {
            $forward = $this->getLink($this->currentPage + 1);
        }

        if ($this->currentPage > 3) {
            $startPage = $this->getLink(1);
        }

        if ($this->currentPage < ($this->countPages - 2)) {
            $endPage = $this->getLink($this->countPages);
        }

        if (($this->currentPage - 2) > 0) {
            $page2left = $this->getLink($this->currentPage - 2);
        }

        if (($this->currentPage - 1) > 0) {
            $page1left = $this->getLink($this->currentPage - 1);
        }

        if (($this->currentPage + 1) <= $this->countPages) {
            $page1right = $this->getLink($this->currentPage + 1);
        }

        if (($this->currentPage + 2) <= $this->countPages) {
            $page2right = $this->getLink($this->currentPage + 2);
        }

//        return compact("currentPage", "back", "forward", "startPage", "endPage",
//            "page2left", "page1left", "page2right", "page1right");
        return [
            'currentPage' => $this->currentPage,
            'back' => $back,
            'forward' => $forward,
            'startPage' => $startPage,
            'endPage' => $endPage,
            'page2left' => $page2left,
            'page1left' => $page1left,
            'page2right' => $page2right,
            'page1right' => $page1right,
        ];
    }

    /**
     * The function generates a URL for a specific page
     * @param int $page - page number
     * @return string
     */
    protected function getLink(int $page): string
    {
        if ($page == 1) return $this->uri;

        return $this->uri . (str_contains($this->uri, '?') ? "&page=$page" : "?page=$page");
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
     * The function gets the offset position for the future sql query
     * @return int
     */
    public function getOffset(): int
    {
        return ($this->currentPage - 1) * $this->perPage;
    }

    /**
     * The function retrieves the URI without the page pagination parameter
     * @return string
     */
    protected function getUri(): string
    {
        $url = parse_url(strip_tags($_SERVER['REQUEST_URI']));
        $uri = $url["path"];

        if (!empty($url["query"])) {
            parse_str($url["query"], $params);

            if (isset($params["page"])) {
                unset($params["page"]);
            }

            if (!empty($params)) {
                $uri = $url["path"] . '?' . http_build_query($params);
            }
        }

        return $uri;
    }
}