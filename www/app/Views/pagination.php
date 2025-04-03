<nav aria-label="Page navigation example">
    <ul class="pagination">
        <?php
        $current = $data["pagination"]["currentPage"];
        $total = $data["pagination"]["totalPages"];
        $start = $data["pagination"]["startPage"];
        $previous = $data["pagination"]["previousPage"];
        $next = $data["pagination"]["nextPage"];
        $last = $data["pagination"]["lastPage"];

        if (!empty($start)) {
            $link = $start;
            $ariaLabel = "Start page";
            $label = "1";
            require 'pagination_item.php';
        }

        if (!empty($previous)) {
            (($current - 2) > 1) ? print ('<li class="page-item disabled"><a class="page-link">...</a></li>'):'';

            $link = $previous;
            $ariaLabel = "Previous page";
            $label = $current - 1;
            require 'pagination_item.php';
        }

        ?>

        <li class="page-item active"><a class="page-link"><?= $current ?></a></li>

        <?php

        if (!empty($next)) {
            $link = $next;
            $ariaLabel = "Next page";
            $label = $current + 1;
            require 'pagination_item.php';

            (($current + 2) < $total)? print '<li class="page-item disabled"><a class="page-link">...</a></li>':'';
        }

        if (!empty($last)) {
            $link = $last;
            $ariaLabel = "Last page";
            $label = $total;
            require 'pagination_item.php';
        }
        ?>
    </ul>
</nav>
