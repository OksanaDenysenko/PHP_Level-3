<?php

namespace Core\Data;

use PDO;


class Database
{
    protected PDO $connection; // database connection
    protected \PDOStatement $stm;

    /**
     * The function creates a connection to a database
     */
    public function __construct()
    {
        $dsn = 'mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=utf8';
        try {
            $this->connection = new PDO($dsn, DB_USER, DB_PASS);
        } catch (\Exception $e) {
            \Core\Application\Error::error(500, $e->getMessage());
        }
        return $this;
    }

    /**
     * The function does a query to a database
     * @param string $query - a string containing the SQL query
     * @param array $data - query parameters
     * @return Database
     */
    public function query(string $query, array $data = []): static
    {
        $this->stm = $this->connection->prepare($query);
        $this->stm->execute($data);

//        if ($this->stm->execute($data)) {
//            return $this->stm->fetchAll();
//        }

        return $this;
    }

    public function getAll(): bool|array
    {
        return $this->stm->fetchAll();
    }

    public function getColumn(): bool|array
    {
        return $this->stm->fetchAll(PDO::FETCH_COLUMN);
    }

    public function getOne()
    {
        return $this->stm->fetch();
    }
}