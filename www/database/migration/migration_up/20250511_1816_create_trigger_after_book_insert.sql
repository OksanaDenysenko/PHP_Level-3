-- Створення тригера для автоматичного додавання запису в clicks після додавання книги
/*DELIMITER //
CREATE TRIGGER after_book_insert
    AFTER INSERT ON books
    FOR EACH ROW
BEGIN
    INSERT INTO clicks (book_id, view_count, click_count)
    VALUES (NEW.id, 0, 0);
END;
//
DELIMITER ;*/