<?php

use App\Models\seeder\{SeederBooks,SeederAuthors,SeederBookAuthor};

(new SeederBooks())->run();
(new SeederAuthors())->run();
(new SeederBookAuthor())->run();
