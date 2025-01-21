<?php
namespace Migration;
use Core\Data\Database;
use \Core\Data\MigrationService;

/**
 * The script to start the migration
 */

$object = new MigrationService;

//if it does not exist, it will create a table for recording migrations
Database::getConnection()->query(file_get_contents(MIGRATIONS_TABLE));

$object->migration("run",2);