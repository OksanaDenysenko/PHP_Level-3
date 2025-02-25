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
        $dsn = 'mysql:host=' . $_ENV['DB_HOST'] . ';port=' . $_ENV['DB_PORT'] .';dbname=' . $_ENV['DB_NAME'] . ';charset=utf8';
        self::$connection = new PDO($dsn, $_ENV['DB_USER'], $_ENV['DB_PASS']);
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