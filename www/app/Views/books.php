<section id="main" class="main-wrapper">
    <div class="container">
        <div id="content" class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <?php
            foreach ($data["items"] as $book) {
                require 'books_one.php';
            }
            ?>

        </div>
    </div>

    <div class="text-center">
        <?php
        require 'pagination.php';
        ?>
    </div>
