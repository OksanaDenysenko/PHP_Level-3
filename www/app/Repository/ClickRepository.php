<?php

namespace App\Repository;

use Core\Data\Database;
use Core\Data\QueryBuilder\InsertQueryBuilder;
use Core\Data\QueryBuilder\UpdateQueryBuilder;
use Core\Data\Repository;

class ClickRepository extends Repository
{
    protected const TABLE_NAME = 'clicks';

    /**
     * The function increases click counter
     * @param int $id - book id
     * @return bool
     */
    public function increaseClicks(int $id): bool
    {
        return $this->increaseCounter($id, 'click_count');
    }

    /**
     * The function increases view counter
     * @param int $id - book id
     * @return bool
     */
    public function increaseViews(int $id): bool
    {
        return $this->increaseCounter($id, 'view_count');
    }

    /**
     * The function increases the specified counter for a book
     * @param int $id - book id
     * @param string $column - column name
     * @return bool
     */
    private function increaseCounter(int $id, string $column): bool
    {
        $QueryBuilder = (new UpdateQueryBuilder())
            ->table(self::TABLE_NAME)
            ->where(['book_id = :book_id'])
            ->setParams(['book_id' => $id])
            ->update([$column . ' = ' . $column . ' + 1']);

        $stm = Database::getConnection()->prepare($QueryBuilder->getQuery());
        return $stm->execute($QueryBuilder->getParams());
    }

    /**
     * The function adds a string for a new book
     * @param int $bookId
     * @return void
     */
    public function addBook(int $bookId): void
    {
        $QueryBuilder = (new InsertQueryBuilder())
            ->table(self::TABLE_NAME)
            ->insert(['book_id'])
            ->setParams(['book_id' => $bookId]);
        $stm = Database::getConnection()->prepare($QueryBuilder->getQuery());
        $stm->execute($QueryBuilder->getParams());
    }
}