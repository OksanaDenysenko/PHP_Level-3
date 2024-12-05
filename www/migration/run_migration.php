<?php

/**
 * The script to start the migration
 */

$object = new \Core\Data\Migration;

//if it does not exist, it will create a table for recording migrations
$object->query(file_get_contents(MIGRATIONS_TABLE));

$object->migration("run",1);