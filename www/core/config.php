<?php

// database config
const DB_NAME='library';
const DB_HOST='mysql1';
const DB_USER = 'root';
const DB_PASS='root';

// log file
const ERROR_LOGS = __DIR__.'/../tmp/error.log';

//migrations
const MIGRATION_DIR_UP = __DIR__ . '/../migration/migration_up';
const MIGRATION_DIR_DOWN = __DIR__ . '/../migration/migration_down';
const MIGRATIONS_TABLE = MIGRATION_DIR_UP.'/20241125_1330_create_table_migrations.sql';