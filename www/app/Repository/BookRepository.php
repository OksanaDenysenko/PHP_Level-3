<?php

namespace App\Repository;

use Core\Application\Paginator;
use Core\Application\StatusCode;
use Core\Data\Database;
use Core\Data\Repository;
use Exception;

class BookRepository extends Repository
{
    protected const TABLE_NAME = 'books';

    /**
     * The function creates and returns a Paginator object for pagination
     * of the results of a SQL query that retrieves information about titles of books and their authors
     * @param int $limit - is the number of records to retrieve
     * @return Paginator
     * @throws \Exception
     */
    public function getTitlesOfBooksWithAuthors(int $limit): Paginator
    {
        if ($limit <= 0) {

            throw new Exception(StatusCode::Server_Error->name, StatusCode::Server_Error->value);
        }

        $sql = "SELECT b.id, b.title, 
              GROUP_CONCAT(a.full_name SEPARATOR ', ') AS authors
              FROM books b
              INNER JOIN book_author ba ON b.id = ba.book_id
              INNER JOIN authors a ON ba.author_id = a.id
              GROUP BY b.id";

        $totalRecords=$this->getTotalBooksWithAuthors();

        return new Paginator(Database::getConnection(), $sql, $limit, $totalRecords);
    }

    /**
     * The function creates and returns a Paginator object for pagination
     * of the results of a SQL query that retrieves information about titles and years of books and their authors
     * @param int $limit - is the number of records to retrieve
     * @return Paginator
     * @throws \Exception
     */
    public function getTitlesAndYearsOfBooksWithAuthors(int $limit): Paginator
    {

        $sql = "SELECT b.id, b.title, b.year, 
              GROUP_CONCAT(a.full_name SEPARATOR ', ') AS authors
              FROM books b
              INNER JOIN book_author ba ON b.id = ba.book_id
              INNER JOIN authors a ON ba.author_id = a.id
              GROUP BY b.id";

        $totalRecords=$this->getTotalBooksWithAuthors();

        return new Paginator(Database::getConnection(), $sql, $limit, $totalRecords);
    }

    /**
     * The function counts the total number of unique books that have authors
     * @return int
     */
    public function getTotalBooksWithAuthors(): int
    {
        $sql = "SELECT COUNT(DISTINCT b.id)
                FROM books b
                INNER JOIN book_author ba ON b.id = ba.book_id
                INNER JOIN authors a ON ba.author_id = a.id";

        return Database::getConnection()->query($sql)->fetchColumn();
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