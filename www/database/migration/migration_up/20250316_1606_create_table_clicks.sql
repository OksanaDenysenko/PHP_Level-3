CREATE TABLE clicks (
                        id INT AUTO_INCREMENT PRIMARY KEY,
                        book_id INT NOT NULL UNIQUE,
                        view_count INT DEFAULT 0,
                        click_count INT DEFAULT 0,
                        FOREIGN KEY (book_id) REFERENCES books(id)
);