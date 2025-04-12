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
        $queryBuilder = $this->getQueryBuilder();

        return $queryBuilder->select(['b.id', 'b.title',
            'GROUP_CONCAT(a.full_name SEPARATOR \', \') AS authors']);
    }

    /**
     * The function is used to build an SQL query that selects information
     * about books, their authors, and the number of clicks
     * @return QueryBuilder
     * @throws \Exception
     */
        public function getBooksWithAuthorsAndNumberOfClicks(): QueryBuilder
    {
        $queryBuilder = $this->getQueryBuilder();

        return $queryBuilder->select(['b.id', 'b.title', 'b.year',
            'GROUP_CONCAT(a.full_name SEPARATOR \', \') AS authors']);
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
     * @return QueryBuilder
     * @throws \Exception
     */
    private function getQueryBuilder(): QueryBuilder
    {
        return (new QueryBuilder())
            ->from('books b')
            ->join('book_author ba', 'b.id = ba.book_id')
            ->join('authors a', 'ba.author_id = a.id')
            ->group(['b.id']);
    }

    public function increaseClicks(int $id)
    {
        $stmt = Database::getConnection()->prepare("UPDATE clicks SET click_count = click_count + 1 WHERE book_id = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        return $stmt->execute();
    }

    public function increaseViews(int $id)
    {
        $stmt = Database::getConnection()->prepare("UPDATE clicks SET view_count = view_count + 1 WHERE book_id = :id");
        $stmt->bindParam(':book_id', $id, PDO::PARAM_INT);
        return $stmt->execute();
    }
}