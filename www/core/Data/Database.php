<?php

namespace Core\Data;

use PDO;

class Database
{
    protected static ?PDO $connection = null; // database connection

    /**
     * The function creates a connection to a database
     */
    private static function connect(): void
    {
        $dsn = 'mysql:host=' . $_ENV['database']['DB_HOST'] . ';dbname=' . $_ENV['database']['DB_NAME'] . ';charset=utf8';
        self::$connection = new PDO($dsn, $_ENV['database']['DB_USER'], $_ENV['database']['DB_PASS']);
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
}