<?php

namespace App\Repository;

use Core\Data\Database;
use Core\Data\QueryBuilder\InsertQuery;
use Core\Data\QueryBuilder\SelectQuery;
use Core\Data\Repository;

class BookRepository extends Repository
{
    protected const TABLE_NAME = 'books';

    /**
     * The function creates and returns a Paginator object for pagination
     * of the results of a SQL query that retrieves information about books and their authors
     * @return SelectQuery
     * @throws \Exception
     */
    public function getActiveBooksWithAuthors(): SelectQuery
    {
        $queryBuilder = $this->getActiveQueryBuilder();

        return $queryBuilder->select(['b.id', 'b.title',
            'GROUP_CONCAT(a.full_name SEPARATOR \', \') AS authors']);
    }

    /**
     * The function is used to build an SQL query that selects information
     * about books, their authors, and the number of clicks
     * @return SelectQuery
     * @throws \Exception
     */
        public function getActiveBooksWithAuthorsAndClicks(): SelectQuery
    {
        $queryBuilder = $this->getActiveQueryBuilder();

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
        $queryBuilder = $this->getQueryBuilder();
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
     * @return SelectQuery
     * @throws \Exception
     */
    private function getQueryBuilder(): SelectQuery
    {
        return (new SelectQuery())
            ->table(self::TABLE_NAME.' b')
            ->join('book_author ba', 'b.id = ba.book_id')
            ->join('authors a', 'ba.author_id = a.id')
            ->group(['b.id']);
    }

    /**
     * The function creates a basic QueryBuilder with common query parts
     * for books that are not marked as deleted
     * @return SelectQuery
     * @throws \Exception
     */
    private function getActiveQueryBuilder(): SelectQuery
    {
        return $this->getQueryBuilder()
            ->join('deleted_books db', 'b.id = db.book_id', 'LEFT')
            ->where(['db.book_id IS NULL']);
    }
}