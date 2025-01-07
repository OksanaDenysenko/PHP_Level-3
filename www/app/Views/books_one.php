<div data-book-id="<?=$id?>" class="book_item col-xs-6 col-sm-3 col-md-2 col-lg-2">
    <div class="book">
        <a href="http://localhost/book/<?= $id ?>"><img src="/assets/images/<?= $id ?>.jpg"
                                             alt="<?= $title ?>">
            <div data-title="<?= $title ?>" class="blockI" style="height: 46px;">
                <div data-book-title="<?= $title ?>" class="title size_text"><?= $title ?>
                </div>
                <div data-book-author="<?= $authors ?>" class="author"><?= $authors ?></div>
            </div>
        </a>
        <a href="http://localhost/book/<?= $id ?>">
            <button type="button" class="details btn btn-success">Читать</button>
        </a>
    </div>
</div>
