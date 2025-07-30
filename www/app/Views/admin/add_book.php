<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="addBookModal">Додати нову книгу</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form id="addBookForm" action="http://localhost/admin/add/book" method="POST">
                <div class="mb-3">
                    <label for="title"></label><input type="text" class="form-control" id="title" name="title"
                                                      required placeholder="Назва книги">
                </div>
                <div class="mb-3">
                    <label for="author1"></label><input type="text" class="form-control" id="author1" name="author1"
                                                        required placeholder="Автор 1">
                </div>
                <div class="mb-3">
                    <label for="author2"></label><input type="text" class="form-control" id="author2" name="author2"
                                                        placeholder="Автор 2">
                </div>
                <div class="mb-3">
                    <label for="author3"></label><input type="text" class="form-control" id="author3" name="author3"
                                                        placeholder="Автор 3">
                </div>
                <div class="mb-3">
                    <label for="year"></label><input type="number" class="form-control" id="year" name="year"
                                                     required placeholder="Рік видання">
                </div>
                <div class="mb-3">
                    <label for="pages"></label><input type="number" class="form-control" id="pages" name="pages"
                                                      placeholder="Кількість сторінок">
                </div>
                <div class="mb-3">
                    <label for="description"></label><textarea class="form-control" id="description"
                                                               name="description" rows="3"
                                                               placeholder="Опис"></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Зберегти книгу</button>
            </form>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Закрити</button>
        </div>
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="/assets/js/add_book.js" defer=""></script>
