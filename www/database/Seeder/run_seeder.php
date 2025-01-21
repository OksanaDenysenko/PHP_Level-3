<?php

use Database\Seeder\{BooksSeeder,AuthorsSeeder,BookAuthorSeeder};

(new BooksSeeder)->run();
(new AuthorsSeeder)->run();
(new BookAuthorSeeder)->run();
