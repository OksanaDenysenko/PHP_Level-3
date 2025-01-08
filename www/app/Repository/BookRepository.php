<?php

namespace App\Repository;

use Core\Data\Database;
use Core\Data\Repository;

class BookRepository extends Repository
{
    protected const TABLE_NAME = 'books';

    /**
     * The function retrieves data about all books along with their authors in one query
     * @return bool|array
     */
    public function getBooksWithAuthors(): bool|array
    {
        return $this->db->query("SELECT b.id, b.title, 
              GROUP_CONCAT(a.full_name SEPARATOR ', ') AS authors
              FROM books b
              INNER JOIN book_author ba ON b.id = ba.book_id
              INNER JOIN authors a ON ba.author_id = a.id
              GROUP BY b.id;")->getAll();
    }

    /**
     * The function retrieves detailed information about a specific book along with its authors by its ID
     * @param int $id - id the book
     * @return mixed
     */
    public function getOneBookWithAuthor(int $id): mixed
    {
        return $this->db->query("SELECT b.id, b.title, b.content, b.year, b.number_of_pages, 
               GROUP_CONCAT(a.full_name SEPARATOR ', ') AS authors 
               FROM books b 
               INNER JOIN book_author ba ON b.id = ba.book_id
               INNER JOIN authors a ON ba.author_id = a.id
               WHERE b.id=$id GROUP BY b.id")->getOne();
    }
}