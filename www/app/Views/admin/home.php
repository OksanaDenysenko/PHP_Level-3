<div class="container">
    <table class="table table-bordered table-hover table-condensed">
        <thead>
        <tr class="border-success">
            <th>Назва книги</th>
            <th>Автори</th>
            <th>Рік</th>
            <th>Дія</th>
            <th>Перегляди сторінки</th>
            <th>Хочуть читати</th>
        </tr>
        </thead>
        <tbody>
        <?php
        foreach ($data["items"] as $book) :?>
            <tr>
                <td>
                    <?php if (isset($book['id'])) : ?>
                        <img src="/assets/images/<?= $book['id'] ?>.jpg" alt="Зображення книги"
                             style="max-width: 50px; max-height: 50px;">
                    <?php endif; ?>
                    <?= $book['title'] ?>
                </td>
                <td><?= $book['authors'] ?></td>
                <td><?= $book['year'] ?></td>
                <td>
                    <a href="#" class="delete-book" data-book-id="<?= $book['id'] ?>">Видалити</a>
                </td>
                <td><?= $book['view_count'] ?></td>
                <td><?= $book['click_count'] ?></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
    <div class="d-flex justify-content-center">
        <?php
        require VIEWS_DIR . '/pagination.php';
        ?>
    </div>
</div>

<script src="/assets/js/admin.js" defer=""></script>