$(document).ready(function () {

    // Прив'язуємо обробник подій до відправки форми
    $('#addBookForm').on('submit', function (event) {
        event.preventDefault(); // Запобігаємо стандартній відправці форми

        const form = $(this); // Елемент форми, що був відправлений
        const url = form.attr('action'); // URL, куди відправляти запит
        const formData = new FormData(form[0]); // Дані форми у вигляді рядка "key=value&key2=value2"

        // Можна відключити кнопку, поки запит виконується
        const submitButton = form.find('button[type="submit"]');
        submitButton.prop('disabled', true).text('Зберігаємо...');

        $('#alertContainer').empty(); // Очищаємо сповіщення перед новим запитом

        $.ajax({
            type: "POST",
            url: '/admin/add/book',
            data: formData, // Дані, що відправляються на сервер
            processData: false, // Вказує jQuery не обробляти дані
            contentType: false, // Вказує jQuery не встановлювати Content-Type заголовок
            dataType: "json",
            success: function (response) {
                if (response.status === 'success') {
                    alert('Книгу успішно додано!');
                    form[0].reset(); // Очищаємо форму після успішного додавання
                } else {
                    alert('Помилка додавання: ' + response.message);
                }
            },
            error: function (xhr, status, error) {
                let errorMessage = 'Сталася помилка при додаванні книги. Спробуйте пізніше.';
                let detailedErrors = null; // Зберігатимемо детальні помилки тут

                try {
                    const response = JSON.parse(xhr.responseText);

                    if (response.message) {
                        errorMessage = response.message;
                    }

                    if (xhr.status === 400) {
                        errorMessage = 'Не правельний запит. Перевірте вхідні дані.';
                    } else if (xhr.status === 409) {
                        errorMessage = 'Книга з такою назвою вже існує.';
                    } else if (xhr.status === 500) {
                        errorMessage = 'Помилка сервера. Будь ласка, спробуйте пізніше.';
                    }

                    if (response.errors && Object.keys(response.errors).length > 0) {
                        detailedErrors = response.errors;
                        errorMessage += "\nБудь ласка, виправте наступні поля:\n";
                        for (const field in detailedErrors) {
                            if (detailedErrors.hasOwnProperty(field)) {
                                errorMessage += `- ${detailedErrors[field]}\n`;
                            }
                        }
                    }

                } catch (e) {
                    console.error('Помилка парсингу JSON:', e);
                    // Якщо JSON не розпарсився, залишаємо загальне повідомлення
                }

                console.error('Помилка AJAX:', status, error, xhr.responseText);
                alert(errorMessage);
            },
            complete: function () {
                // Ця функція завжди виконується після завершення запиту (успіх або помилка)
                submitButton.prop('disabled', false).text('Зберегти книгу'); // Знову активуємо кнопку
            }
        });
    });
});