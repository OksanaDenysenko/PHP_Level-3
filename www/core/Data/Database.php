<?php

namespace Core\Data;

use Core\Application\EnvConfig;
use PDO;

class Database
{
    protected static ?PDO $connection = null; // database connection

    /**
     * The function creates a connection to a database
     */
    private static function connect(): void
    {
        $dsn = 'mysql:host=' . EnvConfig::get('DB_HOST') . ';port=' . EnvConfig::get('DB_PORT') .';dbname=' . EnvConfig::get('DB_NAME') . ';charset=utf8';
        self::$connection = new PDO($dsn, EnvConfig::get('DB_USER'), EnvConfig::get('DB_PASS'));
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