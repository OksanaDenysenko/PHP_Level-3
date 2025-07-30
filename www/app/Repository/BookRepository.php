<?php

namespace App\Repository;

use Core\Data\Database;
use Core\Data\QueryBuilder\DeleteQueryBuilder;
use Core\Data\QueryBuilder\InsertQueryBuilder;
use Core\Data\QueryBuilder\SelectQueryBuilder;
use Core\Data\QueryBuilder\UpdateQueryBuilder;
use Core\Data\Repository;

class BookRepository extends Repository
{
    protected const TABLE_NAME = 'books';

    /**
     * The function creates and returns a Paginator object for pagination
     * of the results of a SQL query that retrieves information about books and their authors
     * @return SelectQueryBuilder
     * @throws \Exception
     */
    public function getBooksWithAuthors(): SelectQueryBuilder
    {
        $queryBuilder = $this->getQueryBuilder();

        return $queryBuilder->select(['b.id', 'b.title',
            'GROUP_CONCAT(a.full_name SEPARATOR \', \') AS authors']);
    }

    /**
     * The function is used to build an SQL query that selects information
     * about books, their authors, and the number of clicks
     * @return SelectQueryBuilder
     * @throws \Exception
     */
    public function getBooksWithAuthorsAndClicks(): SelectQueryBuilder
    {
        $queryBuilder = $this->getQueryBuilder();

        return $queryBuilder->select(['b.id', 'b.title', 'b.year', 'c.view_count', 'c.click_count',
            'GROUP_CONCAT(a.full_name SEPARATOR \', \') AS authors'])
            ->join('clicks c', 'b.id = c.book_id', 'LEFT');
    }

    /**
     * The function retrieves detailed information about a specific book along with its authors by its ID
     * @param int $id - id the book
     * @return mixed
     * @throws \Exception
     */
    public function getBookWithAuthors(int $id): mixed
    {
        $queryBuilder = $this->getQueryBuilderWithDeleted();
        $queryBuilder->select(['b.id', 'b.title', 'b.content', 'b.year', 'b.number_of_pages',
            'GROUP_CONCAT(a.full_name SEPARATOR \', \') AS authors'])
            ->where(['b.id = :id'])
            ->setParams(['id' => $id]);
        $stm = Database::getConnection()->prepare($queryBuilder->getQuery());
        $stm->execute($queryBuilder->getParams());

        return $stm->fetch();
    }

    /**
     * The function creates a basic QueryBuilder with common query parts
     * @return SelectQueryBuilder
     * @throws \Exception
     */
    private function getQueryBuilderWithDeleted(): SelectQueryBuilder
    {
        return (new SelectQueryBuilder())
            ->table(self::TABLE_NAME . ' b')
            ->join('book_author ba', 'b.id = ba.book_id')
            ->join('authors a', 'ba.author_id = a.id')
            ->group(['b.id']);
    }

    /**
     * The function creates a basic QueryBuilder with common query parts
     * for books that are not marked as deleted
     * @return SelectQueryBuilder
     * @throws \Exception
     */
    private function getQueryBuilder(): SelectQueryBuilder
    {
        return $this->getQueryBuilderWithDeleted()
            ->where(['b.deleted_at IS NULL']);
    }

    /**
     * The function performs a "soft" deletion of a book from the database.
     * @param $id - book id
     * @return bool
     */
    public function softDeleteBook($id): bool
    {
        $QueryBuilder = (new UpdateQueryBuilder())
            ->table(self::TABLE_NAME)
            ->update(['deleted_at = CURRENT_TIMESTAMP'])
            ->where(['id =:id'])
            ->setParams(['id' => $id]);
        $stm = Database::getConnection()->prepare($QueryBuilder->getQuery());

        return $stm->execute($QueryBuilder->getParams());
    }

    /**
     * The function adds the data of new book to the database
     * @param string $title
     * @param string $content
     * @param int $year
     * @param int $pages
     * @return false|string book id
     */
    public function addBook(string $title, string $content, int $year, int $pages): false|string
    {
        $QueryBuilder = (new InsertQueryBuilder())
            ->table(self::TABLE_NAME)
            ->insert(['title', 'content', 'year', 'number_of_pages'])
            ->setParams(['title' => $title,
                'content' => $content,
                'year' => $year,
                'number_of_pages' => $pages]);
        $stm = Database::getConnection()->prepare($QueryBuilder->getQuery());
        $stm->execute($QueryBuilder->getParams());

        return Database::getConnection()->lastInsertId();
    }

    /**
     * The function checks for the existence of a book
     * @param string $title - book title
     */
    public function doesBookExistByTitle(string $title)
    {
        $queryBuilder = (new SelectQueryBuilder())
            ->table(self::TABLE_NAME)
            ->select(['COUNT(*)'])
            ->where(['title = :title'])
            ->setParams(['title' => $title]);
        $stm = Database::getConnection()->prepare($queryBuilder->getQuery());
        $stm->execute($queryBuilder->getParams());

        return $stm->fetchColumn();
    }
}