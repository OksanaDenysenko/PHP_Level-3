ALTER TABLE books
    ADD deleted_at TIMESTAMP NULL DEFAULT NULL AFTER image;