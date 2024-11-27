-- Створення таблиці авторів
CREATE TABLE IF NOT EXISTS authors (
                       id INT AUTO_INCREMENT PRIMARY KEY,
                       full_name VARCHAR(100) NOT NULL UNIQUE
);