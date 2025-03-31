<?php

namespace Core\Application;

use Exception;

class Pagination
{
    protected int $countPages;
    protected int $currentPage;
    protected array $url;

    /**
     * @throws Exception
     */
    public function __construct(int $countPages, int $currentPage)
    {
        $this->countPages = $countPages;
        $this->currentPage = $currentPage;
        $this->url = $this->getUrl();
    }

    /**
     * The function generates data for pagination
     * @return array
     */
    public function getPaginationData(): array
    {
        return [
            'currentPage' => $this->currentPage,
            'totalPages' => $this->countPages,
            'previousPage' => ($this->currentPage > 1) ? $this->getLink($this->currentPage - 1) : '',
            'nextPage' => ($this->currentPage < $this->countPages) ? $this->getLink($this->currentPage + 1) : '',
            'startPage' => ($this->currentPage > 2) ? $this->getLink(1) : '',
            'lastPage' => ($this->currentPage < ($this->countPages - 1)) ? $this->getLink($this->countPages) : '',
        ];
    }

    /**
     * The function generates a URL for a specific page
     * @param int $page - page number
     * @return string
     */
    protected function getLink(int $page): string
    {
        if (!empty($this->url["query"])) {
            parse_str($this->url["query"], $params);

            return buildUrl($this->url["path"], [...$params, 'page' => $page]);
        }

        return buildUrl($this->url["path"], ['page' => $page]);
    }

    /**
     * The function returns the request URL as an associative array
     * @return array
     */
    function getUrl(): array
    {
        return parse_url(strip_tags($_SERVER['REQUEST_URI']));
    }
}