<?php

// Створення екземплярів класів і виклик методу run()
$books = new \App\Models\seeder\SeederBooks();
$books->run();

$authors = new \App\Models\seeder\SeederAuthors();
$authors->run();

$book_author = new \App\Models\seeder\SeederBookAuthor();
$book_author->run();