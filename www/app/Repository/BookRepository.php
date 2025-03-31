<?php

namespace App\Repository;

use Core\Data\Database;
use Core\Data\QueryBuilder;
use Core\Data\Repository;

class BookRepository extends Repository
{
    protected const TABLE_NAME = 'books';

    /**
     * The function creates and returns a Paginator object for pagination
     * of the results of a SQL query that retrieves information about books and their authors
     * @return QueryBuilder
     * @throws \Exception
     */
    public function getBooksWithAuthors(): QueryBuilder
    {
        return $queryBuilder = (new QueryBuilder())
            ->select('b.id', 'b.title', 'GROUP_CONCAT(a.full_name SEPARATOR \', \') AS authors')
            ->from('books b')
            ->join('book_author ba', 'b.id = ba.book_id')
            ->join('authors a', 'ba.author_id = a.id')
            ->group('b.id');

//        if ($limit <= 0) {
//
//            throw new Exception(StatusCode::Bad_Request->name, StatusCode::Bad_Request->value);
//        }

//        $sql = "SELECT b.id, b.title,
//              GROUP_CONCAT(a.full_name SEPARATOR ', ') AS authors
//              FROM books b
//              INNER JOIN book_author ba ON b.id = ba.book_id
//              INNER JOIN authors a ON ba.author_id = a.id
//              GROUP BY b.id";
//        $totalRecords=$this->getTotalBooksWithAuthors();
//
//        return new Paginator(Database::getConnection(), $queryBuilder, $limit, $totalRecords);
    }

//    /**
//     * The function counts the total number of unique books that have authors
//     * @return int
//     */
//    public function getTotalBooksWithAuthors(): int
//    {
//        $sql = "SELECT COUNT(DISTINCT b.id)
//                FROM books b
//                INNER JOIN book_author ba ON b.id = ba.book_id
//                INNER JOIN authors a ON ba.author_id = a.id";
//
//        return Database::getConnection()->query($sql)->fetchColumn();
//    }

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