<div data-book-id="<?=$book['id']?>" class="book_item col-xs-6 col-sm-3 col-md-2 col-lg-2">
    <div class="book">
        <a href="http://localhost/book/<?= $book['id'] ?>"><img src="/assets/images/<?= $book['id'] ?>.jpg"
                                             alt="<?= $book['title'] ?>">
            <div data-title="<?= $book['title'] ?>" class="blockI" style="height: 46px;">
                <div data-book-title="<?= $book['title'] ?>" class="title size_text"><?= $book['title'] ?>
                </div>
                <div data-book-author="<?= $book['authors'] ?>" class="author"><?= $book['authors'] ?></div>
            </div>
        </a>
        <a href="http://localhost/book/<?= $book['id'] ?>">
            <button type="button" class="details btn btn-success">Читать</button>
        </a>
    </div>
</div>
