<section id="main" class="main-wrapper">
    <div class="container">
        <div id="content" class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <?php
            foreach ($data as $value) {
               // show($value);
                $id = $value['id'];
                $title = $value['title'];
                $authors = $value['authors'];
                require 'books_one.php';
            }
            ?>

        </div>
    </div>

    <center>оопс... в этом хтмл не реализованы кнопки "вперед" и "назад", а книг на странице должно быть не больше 20
    </center>
