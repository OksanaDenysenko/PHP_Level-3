<?php

namespace App\Repository;

use Core\Data\Database;
use Core\Data\QueryBuilder\InsertQueryBuilder;
use Core\Data\Repository;

class BookAuthorRepository extends Repository
{
    protected const TABLE_NAME = 'book_author';

    /**
     * The function adds a new book link to the author
     * @param int $bookId
     * @param int $authorId
     * @return void
     */
    public function addBookAuthorLink(int $bookId, int $authorId): void
    {
        $QueryBuilder = (new InsertQueryBuilder())
            ->table(self::TABLE_NAME)
            ->insert(['book_id','author_id'])
            ->setParams(['book_id' => $bookId, 'author_id'=>$authorId]);
        $stm = Database::getConnection()->prepare($QueryBuilder->getQuery());
        $stm->execute($QueryBuilder->getParams());
    }
}