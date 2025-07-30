<?php

namespace Core\Data;


use Core\Data\QueryBuilder\DeleteQueryBuilder;
use Core\Data\QueryBuilder\InsertQueryBuilder;
use Core\Data\QueryBuilder\SelectQueryBuilder;
use Core\Data\QueryBuilder\UpdateQueryBuilder;

abstract class Repository
{
    protected const TABLE_NAME = '';

    /**
     * The function finds one record by ID in a given database table.
     * @param int $id - id the record
     * @return mixed
     */
    public function find(int $id): mixed
    {
        $sql = (new SelectQueryBuilder())
            ->table(static::TABLE_NAME)
            ->where(['id = :id'])
            ->setParams(['id' => $id]);
        $stm = Database::getConnection()->prepare($sql->getQuery());
        $stm->execute($sql->getParams());

        return $stm->fetch();
    }

    /**
     * The function finds all record in a given database table.
     * @param string $nameColumns - the list of fields to be output. All fields will be selected by default.
     * @return bool|array
     */
    public function getAll(string $nameColumns = '*'): bool|array
    {
        $sql = (new SelectQueryBuilder())
            ->select([$nameColumns])
            ->table(static::TABLE_NAME);

        return Database::getConnection()->query($sql->getQuery())->fetchAll();
    }

    /**
     * The function inserts a new record into a given database table.
     * @param array $data - data to insert
     * @return void
     */
    public function insert(array $data): void
    {
        $keys = array_keys($data);
        $sql = (new InsertQueryBuilder())
            ->table(static::TABLE_NAME)
            ->insert($keys)
            ->values($keys)
            ->setParams($data);
        Database::getConnection()->prepare($sql->getQuery())->execute($sql->getParams());
    }

    /**
     * The function updates an existing record in a given database table.
     * @param int $id - id the record
     * @param array $data - data to update
     * @return void
     */
    public function update(int $id, array $data): void
    {
        $keys = array_keys($data);
        $sql = (new UpdateQueryBuilder())
            ->table(static::TABLE_NAME)
            ->update($keys)
            ->where(['id=:id'])
            ->setParams($data)
            ->addParams(['id' => $id]);
        Database::getConnection()->prepare($sql->getQuery())->execute($sql->getParams());
    }

    /**
     * The function deletes a record in a given database table.
     * @param int $id - id the record
     * @return void
     */
    public function delete(int $id): void
    {
        $sql=(new DeleteQueryBuilder())
            ->table(static::TABLE_NAME)
            ->where(['id=:id'])
            ->setParams(['id' => $id]);
        Database::getConnection()->prepare($sql->getQuery())->execute($sql->getParams());
    }
}