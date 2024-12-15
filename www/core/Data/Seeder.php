<?php

namespace Core\Data;

interface Seeder
{
    /**
     * Функція для заповнення таблиці
     * @return void
     */
    public function run(): void;
}