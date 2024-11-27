<?php
//запуск міграції
$object = new \Core\Migration;
$object->query(file_get_contents(MIGRATIONS_TABLE)); //якщо не існує - створить таблицю для запису міграцій
$object->runMigrations(2); //запуск міграції

//$object->rollbackMigrations(2);