<?php

namespace Core\Data;

use PDO;


class Database
{
    private static ?self $instance = null;
    protected static PDO $connection; // database connection
    protected \PDOStatement $stm;


    /**
     * The function creates a connection to a database
     */
    private function connect(): void
    {
        $dsn = 'mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=utf8';
        try {
            self::$connection = new PDO($dsn, DB_USER, DB_PASS);
        } catch (\PDOException $e) {
            \Core\Application\Response::response(500, $e->getMessage());
        }
    }

    /**
     * The function checks that a class has only one instance
     * @return Database|null - class object
     */
    public static function getInstance(): ?Database
    {
        if (self::$instance === null) {
            self::$instance = new self();
            self::$instance->connect();
        }
        return self::$instance;
    }

    /**
     * The function does a query to a database
     * @param string $query - a string containing the SQL query
     * @param array $data - query parameters
     * @return Database
     */
    public function query(string $query, array $data = []): static
    {
        $this->stm = self::$connection->prepare($query);
        $this->stm->execute($data);

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