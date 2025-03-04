<?php

namespace App\Repository;

use Core\Data\Database;
use Core\Data\Repository;
use PDO;

class BookRepository extends Repository
{
    protected const TABLE_NAME = 'books';

    /**
     * The function retrieves data about all books along with their authors in one query
     * @param int $limit - is the number of records to retrieve
     * @param int $offset - is the number of records to skip
     * @return bool|array
     */
    public function getBooksWithAuthors(int $limit = 10, int $offset = 10): bool|array
    {
        $sql = "SELECT b.id, b.title, 
              GROUP_CONCAT(a.full_name SEPARATOR ', ') AS authors
              FROM books b
              INNER JOIN book_author ba ON b.id = ba.book_id
              INNER JOIN authors a ON ba.author_id = a.id
              GROUP BY b.id";

        if ($limit > 0) {
            $sql = $sql . " LIMIT :limit OFFSET :offset";
            $stm = Database::getConnection()->prepare($sql);
            $stm->bindParam(':limit', $limit, PDO::PARAM_INT);
            $stm->bindParam(':offset', $offset, PDO::PARAM_INT);
            $stm->execute();

            return $stm->fetchAll();
        }

        return Database::getConnection()->query($sql)->fetchAll();
    }

    /**
     * The function retrieves detailed information about a specific book along with its authors by its ID
     * @param int $id - id the book
     * @return mixed
     */
    public function getBookWithAuthors(int $id): mixed
    {
        $stm = Database::getConnection()->prepare("SELECT b.id, b.title, b.content, b.year, b.number_of_pages,
               GROUP_CONCAT(a.full_name SEPARATOR ', ') AS authors
               FROM books b
               INNER JOIN book_author ba ON b.id = ba.book_id
               INNER JOIN authors a ON ba.author_id = a.id
               WHERE b.id= :id GROUP BY b.id");
        $stm->execute(['id' => $id]);

        return $stm->fetch();
    }
}