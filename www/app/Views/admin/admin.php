<?php

show('This is admin view');


//(new \Core\Migration)->runMigrations(1);

(new \Core\Migration)->rollbackMigrations(2);

//$result = (new \Core\Database())->query('SELECT migration FROM migrations')->getAll(); // отримати виконані міграції
//show($result);
//
//$result = (new \Core\Database())->query('SELECT migration FROM migrations')->getOne(); // отримати виконані міграції
//show($result);