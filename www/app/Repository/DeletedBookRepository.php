<?php

namespace App\Repository;

use Core\Data\Database;
use Core\Data\QueryBuilder\InsertQuery;
use Core\Data\Repository;

class DeletedBookRepository extends Repository
{
    protected const TABLE_NAME = 'deleted_books';

    /**
     * The function performs a "soft" deletion of a book from the database.
     * @param $id - book id
     * @return bool
     */
    public function softDeleteBook($id): bool
    {
        $QueryBuilder=(new InsertQuery())
            ->table(self::TABLE_NAME)
            ->insert(['book_id'])
            ->values(['book_id'])
            ->setParams(['book_id'=>$id]);
        $stm=Database::getConnection()->prepare($QueryBuilder->getQuery());

        return $stm->execute($QueryBuilder->getParams());
    }
}