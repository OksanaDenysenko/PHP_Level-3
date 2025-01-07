<?php

namespace App\Models\Repository;

use Core\Data\Repository;

class AuthorRepository extends Repository
{
    public function __construct() {
        parent::__construct();
        $this->initializeNameTable();
    }
    /*
     * Якась не дуже правельний конструктор, але не знаю як зробити по іншому щоб було зручно.
     * Передавати параметром назву таблиці мені не хочеться,
     * хочеться щоб якось автоматично підставлялась назва таблиці
     * без передачі параметра
     * І взагалі думаю залишити один загальний клас Repository
     */
    public function initializeNameTable(): void
    {
        $this->nameTable = 'authors';
    }

}