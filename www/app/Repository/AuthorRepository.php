<?php

namespace App\Repository;

use Core\Data\Database;
use Core\Data\QueryBuilder\InsertQueryBuilder;
use Core\Data\QueryBuilder\SelectQueryBuilder;
use Core\Data\Repository;

class AuthorRepository extends Repository
{
    protected const TABLE_NAME = 'authors';

    /**
     * The function searches for the author by full name
     * @param string $fullName
     * @return mixed authors id
     */
    public function findAuthorIdByName(string $fullName): mixed
    {
        $QueryBuilder = (new SelectQueryBuilder())
            ->table(self::TABLE_NAME)
            ->select(['id'])
            ->where(['full_name=:full_name'])
            ->setParams(['full_name' => $fullName]);
        $stm = Database::getConnection()->prepare($QueryBuilder->getQuery());
        $stm->execute($QueryBuilder->getParams());

        return $stm->fetchColumn();
    }

    /**
     * The function adds a new author
     * @param $author - author's full name
     * @return false|string author id
     */
    public function addAuthor(string $author): false|string
    {
        $QueryBuilder = (new InsertQueryBuilder())
            ->table(self::TABLE_NAME)
            ->insert(['full_name'])
            ->setParams(['full_name' => $author]);
        $stm = Database::getConnection()->prepare($QueryBuilder->getQuery());
        $stm->execute($QueryBuilder->getParams());

        return Database::getConnection()->lastInsertId();
    }
}