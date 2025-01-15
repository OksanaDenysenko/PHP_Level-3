<?php

namespace Core\Data;


abstract class Repository
{
    protected const TABLE_NAME = '';

    public function __construct()
    {
       Database::getConnection();
    }

    /**
     * The function finds one record by ID in a given database table.
     * @param int $id - id the record
     * @return mixed
     */
    public function find(int $id): mixed
    {
        return Database::$instance->query('SELECT * FROM ' . static::TABLE_NAME . ' WHERE id=?', [$id])->getOne();
    }

    /**
     * The function finds all record in a given database table.
     * @param string $nameColumns - the list of fields to be output. All fields will be selected by default.
     * @return bool|array
     */
    public function findAll(string $nameColumns = '*'): bool|array
    {
        return Database::$instance->query("SELECT $nameColumns FROM " . static::TABLE_NAME)->getAll();
    }

    /**
     * The function inserts a new record into a given database table.
     * @param array $data - data to insert
     * @return void
     */
    public function insert(array $data): void
    {
        $keys = array_keys($data);

        Database::$instance->query('INSERT INTO ' . static::TABLE_NAME . ' (' . implode(',', $keys) . ') 
                         VALUES (:' . implode(':,', $keys) . ')', $data);
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

        $query = 'UPDATE '.static::TABLE_NAME.' SET ';

        foreach ($keys as $key) {
            $query = $query . "$key=:$key, ";
        }

        $query = rtrim($query, ", ") . " WHERE id=:id";

        $data['id'] = $id;

        Database::$instance->query($query, $data);
    }

    /**
     * The function deletes a record in a given database table.
     * @param int $id - id the record
     * @return void
     */
    public function delete(int $id): void
    {
        Database::$instance->query('DELETE FROM '.static::TABLE_NAME.' WHERE id = ?', [$id]);
    }
}