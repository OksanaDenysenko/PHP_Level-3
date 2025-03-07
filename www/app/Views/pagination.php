<nav aria-label="Page navigation example">
    <ul class="pagination">
        <?php

        if (!empty($data["pagination"]["startPage"])) {
            $link = $data["pagination"]["startPage"];
            $ariaLabel = "Start page";
            $label = "<<";
            require 'pagination_item.php';
        }

        if (!empty($data["pagination"]["back"])) {
            $link=$data["pagination"]["back"];
            $ariaLabel = "Previous page";
            $label = "<";
            require 'pagination_item.php';
        }

        if (!empty($data["pagination"]["page2left"])) {
            $link = $data["pagination"]["page2left"];
            $ariaLabel = "";
            $label = $data["pagination"]["currentPage"] - 2;
            require 'pagination_item.php';
        }

        if (!empty($data["pagination"]["page1left"])) {
            $link = $data["pagination"]["page1left"];
            $ariaLabel = "";
            $label = $data["pagination"]["currentPage"] - 1;
            require 'pagination_item.php';
        }
        ?>

        <li class="page-item active"><a class="page-link"><?= $data["pagination"]['currentPage'] ?></a></li>

        <?php
        if (!empty($data["pagination"]["page1right"])) {
            $link = $data["pagination"]["page1right"];
            $ariaLabel = "";
            $label = $data["pagination"]["currentPage"] + 1;
            require 'pagination_item.php';
        }

        if (!empty($data["pagination"]["page2right"])) {
            $link = $data["pagination"]["page2right"];
            $ariaLabel = "";
            $label = $data["pagination"]["currentPage"] + 2;
            require 'pagination_item.php';
        }

        if (!empty($data["pagination"]["forward"])) {
            $link = $data["pagination"]["forward"];
            $ariaLabel = "Next page";
            $label = ">";
            require 'pagination_item.php';
        }

        if (!empty($data["pagination"]["endPage"])) {
            $link = $data["pagination"]["endPage"];
            $ariaLabel = "End page";
            $label = ">>";
            require 'pagination_item.php';
        }
        ?>
    </ul>
</nav>
