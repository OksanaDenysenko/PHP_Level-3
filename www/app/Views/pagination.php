<nav aria-label="Page navigation example">
    <ul class="pagination">
        <?php
        $current = $data["currentPage"];
        $total = $data["countPages"];

        ($current > 2) ? renderPaginationItem(getLink(1), "Start page", 1) : '';

        if ($current > 1) {
            ($current - 2) > 1 ? print ('<li class="page-item disabled"><a class="page-link">...</a></li>') : '';
            renderPaginationItem(getLink($current - 1), "Previous page", $current - 1);
        }
        ?>

        <li class="page-item active"><a class="page-link"><?= $current ?></a></li>

        <?php
        if ($current < $total) {
            renderPaginationItem(getLink($current + 1), "Next page", $current + 1);
            (($current + 2) < $total) ? print '<li class="page-item disabled"><a class="page-link">...</a></li>' : '';
        }

        ($current < ($total - 1))?renderPaginationItem(getLink($total), "Last page", $total):'';

        function renderPaginationItem(string $link, string $ariaLabel, string $label): void
        {
            ?>
            <li class="page-item">
                <a class="page-link" href="<?= $link ?>" aria-label="<?= $ariaLabel ?>">
                    <?= $label ?>
                </a>
            </li>
            <?php
        }

        function getLink(int $page): string
        {
            $url = parse_url(strip_tags($_SERVER['REQUEST_URI']));
            $params = [];

            if (!empty($url["query"])) {
                parse_str($url["query"], $params);
            }

            return buildUrl($url["path"], [...$params, 'page' => $page]);
        }
        ?>
    </ul>
</nav>
