<?php

//.env file(config DB, ...)
const CONFIG_ENV_FILE= __DIR__ . '/../../.env';

//log file
const ERROR_LOGS = __DIR__ . '/../../tmp/error.log';

//migrations
const MIGRATION_DIR_UP = __DIR__ . '/../../database/migration/migration_up';
const MIGRATION_DIR_DOWN = __DIR__ . '/../../database/migration/migration_down';
const MIGRATIONS_TABLE = MIGRATION_DIR_UP.'/20241125_1330_create_table_migrations.sql';

//images
const IMAGES_DIR = __DIR__.'/../../public/assets/images';

//view
const VIEWS_DIR=__DIR__.'/../../app/Views';
const DEFAULT_TEMPLATE= VIEWS_DIR.'/default.php';
const DEFAULT_TEMPLATE_ADMIN= VIEWS_DIR.'/admin/default_admin.php';