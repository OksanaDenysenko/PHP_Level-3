<?php

namespace Core\Data;

interface Seeder
{
    /**
     * Функція для заповнення таблиці
     * @param int $count - кількість рядківдля заповнення
     * @return void
     */
    public function run(int $count): void;
}