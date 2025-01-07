<?php

namespace App\Models\Repository;

use Core\Data\Repository;

class BookAuthorRepository extends Repository
{
    public function __construct() {
        parent::__construct();
        $this->initializeNameTable();
    }
    public function initializeNameTable(): void
    {
        $this->nameTable = 'book_author';
    }

}