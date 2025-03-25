CREATE TABLE clicks (
                        id INT AUTO_INCREMENT PRIMARY KEY,
                        book_id INT NOT NULL,
                        page_view_counter INT DEFAULT 0,
                        clicks_count INT DEFAULT 0,
                        FOREIGN KEY (book_id) REFERENCES books(id)
);