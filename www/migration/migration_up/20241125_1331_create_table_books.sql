-- Створення таблиці книги
CREATE TABLE IF NOT EXISTS books (
                       id INT AUTO_INCREMENT PRIMARY KEY,
                       title VARCHAR(255) NOT NULL UNIQUE,
                       content TEXT,
                       year YEAR
);