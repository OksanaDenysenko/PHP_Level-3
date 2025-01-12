<?php

// log file
const ERROR_LOGS = __DIR__ . '/../../tmp/error.log';

//migrations
const MIGRATION_DIR_UP = __DIR__ . '/../../migration/migration_up';
const MIGRATION_DIR_DOWN = __DIR__ . '/../../migration/migration_down';
const MIGRATIONS_TABLE = MIGRATION_DIR_UP.'/20241125_1330_create_table_migrations.sql';

//images
const IMAGES_DIR = __DIR__.'/../../public/assets/images';

//view
const VIEWS_DIR=__DIR__.'/../../app/Views';
const DEFAULT_TEMPLATE= VIEWS_DIR.'/default.php';