<?php

namespace App\Repository;

use Core\Data\Database;
use Core\Data\QueryBuilder\InsertQuery;
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
        $QueryBuilder = $this->getQueryBuilder()
            ->duplicateUpdate(['click_count = click_count + 1'])
            ->setParams(['book_id' => $id, 'view_count'=>0, 'click_count'=>1]);
        $stm=Database::getConnection()->prepare($QueryBuilder->getQuery());

        return $stm->execute($QueryBuilder->getParams());
    }

    /**
     * The function increases view counter
     * @param int $id - book id
     * @return bool
     */
    public function increaseViews(int $id): bool
    {
        $QueryBuilder = $this->getQueryBuilder()
            ->duplicateUpdate(['view_count = view_count + 1'])
            ->setParams(['book_id' => $id, 'view_count'=>1, 'click_count'=>0]);
        $stm=Database::getConnection()->prepare($QueryBuilder->getQuery());

        return $stm->execute($QueryBuilder->getParams());
    }

    /**
     * The function creates a basic QueryBuilder with common query parts
     * @return InsertQuery
     */
    private function getQueryBuilder(): InsertQuery
    {
      return (new InsertQuery())
            ->table(self::TABLE_NAME)
            ->insert(['book_id', 'view_count', 'click_count'])
            ->values(['book_id', 'view_count', 'click_count']);
    }
}