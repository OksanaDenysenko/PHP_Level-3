<nav aria-label="Page navigation example">
    <ul class="pagination">
        <?php
        if (!empty($pagination["startPage"])) {
            echo '<li class="page-item">
                    <a class="page-link" href="' . $pagination["startPage"] . '" aria-label="Start page">
                        <span aria-hidden="true">&laquo;</span>
                    </a>
                  </li>';
        }

        if (!empty($pagination["back"])) {
            echo '<li class="page-item">
                    <a class="page-link" href="' . $pagination["back"] . '" aria-label="Previous page">
                        <span aria-hidden="true">&lt;</span>
                    </a>
                  </li>';
        }

        if (!empty($pagination["page2left"])) {
            echo '<li class="page-item">
                        <a class="page-link" href="' . $pagination["page2left"] . '">'.($pagination["currentPage"]-2).'</a>
                  </li>';
        }

        if (!empty($pagination["page1left"])) {
            echo '<li class="page-item">
                        <a class="page-link" href="' . $pagination["page1left"] . '">'.($pagination["currentPage"]-1).'</a>
                  </li>';
        }
        ?>

        <li class="page-item active"><a class="page-link" ><?= $pagination['currentPage'] ?></a></li>

        <?php
        if (!empty($pagination["page1right"])) {
            echo '<li class="page-item">
                        <a class="page-link" href="' . $pagination["page1right"] . '">'.($pagination["currentPage"]+1).'</a>
                  </li>';
        }

        if (!empty($pagination["page2right"])) {
            echo '<li class="page-item">
                        <a class="page-link" href="' . $pagination["page2right"] . '">'.($pagination["currentPage"]+2).'</a>
                  </li>';
        }

        if (!empty($pagination["forward"])) {
            echo '<li class="page-item">
                    <a class="page-link" href="' . $pagination["forward"] . '" aria-label="Next page">
                        <span aria-hidden="true">&gt;</span>
                    </a>
                  </li>';
        }

        if (!empty($pagination["endPage"])) {
            echo ' <li class="page-item">
                        <a class="page-link" href="' . $pagination["endPage"] . '" aria-label="End page">
                            <span aria-hidden="true">&raquo;</span>
                        </a>
                   </li>';
        }
        ?>
    </ul>
</nav>
