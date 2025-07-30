$(document).ready(function () {
    $('.delete-book').click(function (event) {
        event.preventDefault();

        const bookIdToDelete = $(this).data('bookId');

        if (confirm('Ви впевнені, що хочете видалити цю книгу?')) {
            $.ajax({
                url: '/admin/book/delete/' + bookIdToDelete,
                method: 'DELETE',
                headers: {
                    'X-Requested-With': 'XMLHttpRequest',
                    'Content-Type': 'application/json'
                },
                success: function (response) {
                    if (response.status === 'success') {
                        alert('Книгу видалено.');
                        $(event.target).closest('tr').remove(); //видалення рядка з таблиці
                    } else {
                        alert('Помилка видалення: '+response.message);
                    }
                },
                error: function (error) {
                    console.error('Помилка AJAX:', error);
                    alert('Сталася помилка при видаленні книги.');
                }
            });
        }
    });
});