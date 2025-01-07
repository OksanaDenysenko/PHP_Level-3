<?php

use App\Seeder\{SeederBooks,SeederAuthors,SeederBookAuthor};

(new SeederBooks())->run();
(new SeederAuthors())->run();
(new SeederBookAuthor())->run();
