<?php

namespace Core\Data;

use PDO;
use PDOStatement;


class Database
{
    protected static ?PDO $connection = null; // database connection

    /**
     * The function creates a connection to a database
     */
    private static function connect(): void
    {
        $dsn = 'mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=utf8';
        try {
            self::$connection = new PDO($dsn, DB_USER, DB_PASS);
        } catch (\PDOException $e) {
            \Core\Application\Response::response(500);

            error_log('[' . date('Y-m-d H:i:s') . '] 
                       Response: ' . $e->getMessage() . PHP_EOL, 3, ERROR_LOGS);
        }
    }

    /**
     * The function creates a single connection to the database
     * @return PDO|null
     */
    public static function getConnection(): ?PDO
    {
        if (self::$connection === null) {
            self::connect();
        }

        return self::$connection;
    }

    /**
     * The function does a query to a database
     * @param string $query - a string containing the SQL query
     * @return PDOStatement|false
     */
    public function query(string $query): bool|PDOStatement
    {
        return self::$connection->prepare($query);
    }

//    /**
//     * The function retrieves all records from a prepared SQL query
//     * @return bool|array
//     */
//    public function getAll(): bool|array
//    {
//        return $this->fetchAll();
//    }
//
//    /**
//     * The function retrieves all records from the first column from a prepared SQL query
//     * @return bool|array
//     */
//    public function getColumn(): bool|array
//    {
//        return $this->stm->fetchAll(PDO::FETCH_COLUMN);
//    }
//
//    /**
//     * The function retrieves one records from the first column from a prepared SQL query
//     * @return mixed
//     */
//    public function getOne(): mixed
//    {
//        return $this->stm->fetch();
//    }
}