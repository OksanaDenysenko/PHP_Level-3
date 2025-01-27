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
        $env = new EvnIterator(CONFIG_DB_FILE);
        $data=[];

        foreach ($env as $key => $value) {
            $data[$key] = $value;
        }

        $dsn = 'mysql:host=' . $data['DB_HOST'] . ';dbname=' . $data['DB_NAME'] . ';charset=utf8';
        self::$connection = new PDO($dsn, $data['DB_USER'], $data['DB_PASS']);
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