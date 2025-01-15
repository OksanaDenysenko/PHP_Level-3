<?php

use Database\Seeder\{BooksSeeder,AuthorsSeeder,BookAuthorSeeder};
use App\Repository\{BookRepository,AuthorRepository,BookAuthorRepository};

(new BooksSeeder(new BookRepository()))->run();
(new AuthorsSeeder(new AuthorRepository()))->run();
(new BookAuthorSeeder(new BookAuthorRepository()))->run();
