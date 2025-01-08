-- Створення таблиці зв'язку між авторами та книгами
CREATE TABLE book_author (
                             id INT AUTO_INCREMENT PRIMARY KEY,
                             book_id INT NOT NULL,
                             author_id INT NOT NULL,
                             FOREIGN KEY (book_id) REFERENCES books(id),
                             FOREIGN KEY (author_id) REFERENCES authors(id)

);