-- Створення таблиці міграції (якщо не існує)
CREATE TABLE IF NOT EXISTS migrations (
                            id INT AUTO_INCREMENT PRIMARY KEY,
                            migration VARCHAR(255) NOT NULL,
                            batch INT
);