<?php

namespace Core\Application;

use Exception;

class Pagination
{
    protected int $countPages;
    protected int $currentPage;
    protected string $uri;

    /**
     * @throws Exception
     */
    public function __construct(int $countPages, int $currentPage)
    {
        $this->countPages = $countPages;
        $this->currentPage = $currentPage;
        $this->uri = $this->getUri();
    }

    /**
     * The function generates data for pagination
     * @return array
     */
    public function getPaginationData(): array
    {
        $links = [];
        $links['currentPage'] = $this->currentPage;
        $links['back']=($this->currentPage > 1)?$this->getLink($this->currentPage - 1):'';
        $links['forward'] =($this->currentPage < $this->countPages)?$this->getLink($this->currentPage + 1):'';
        $links['startPage'] =($this->currentPage > 3)?$this->getLink(1):'';
        $links['endPage']=($this->currentPage < ($this->countPages - 2))?$this->getLink($this->countPages):'';
        $links['page2left']=(($this->currentPage - 2) > 0)?$this->getLink($this->currentPage - 2):'';
        $links['page1left']=(($this->currentPage - 1) > 0)?$this->getLink($this->currentPage - 1):'';
        $links['page1right']=(($this->currentPage + 1) <= $this->countPages)?$this->getLink($this->currentPage + 1):'';
        $links['page2right']=(($this->currentPage + 2) <= $this->countPages)?$this->getLink($this->currentPage + 2):'';

        return $links;
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