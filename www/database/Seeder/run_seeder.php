<?php

use Database\Seeder\{SeederBooks};
use Database\Seeder\SeederAuthors;
use Database\Seeder\SeederBookAuthor;

(new SeederBooks())->run();
(new SeederAuthors())->run();
(new SeederBookAuthor())->run();
