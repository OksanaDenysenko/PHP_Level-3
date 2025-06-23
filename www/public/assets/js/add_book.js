$(document).ready(function() {

    // Прив'язуємо обробник подій до відправки форми
    $('#addBookForm').on('submit', function(event) {
        event.preventDefault(); // Запобігаємо стандартній відправці форми

        const form = $(this); // Елемент форми, що був відправлений
        const url = form.attr('action'); // URL, куди відправляти запит
        const formData = form.serialize(); // Дані форми у вигляді рядка "key=value&key2=value2"

        // Можна відключити кнопку, поки запит виконується
        const submitButton = form.find('button[type="submit"]');
        submitButton.prop('disabled', true).text('Зберігаємо...');

        $.ajax({
            type: "POST",
            url: '/admin/add/book',
            data: formData, // Дані, що відправляються на сервер
            dataType: "json",
            success: function(response) {
                if (response.status === 'success') {
                    alert('Книгу успішно додано!');
                    form[0].reset(); // Очищаємо форму після успішного додавання
                } else {
                    alert('Помилка додавання: Можливо книга вже існує. Якщо ні - перевірте правельність заповнення всіх полів.');
                }
            },
            error: function(xhr, status, error) {
                console.error('Помилка AJAX:', error);
                alert('Сталася помилка при додаванні книги. Спробуйте пізніше.');
            },
            complete: function() {
                // Ця функція завжди виконується після завершення запиту (успіх або помилка)
                submitButton.prop('disabled', false).text('Зберегти книгу'); // Знову активуємо кнопку
            }
        });
    });
});