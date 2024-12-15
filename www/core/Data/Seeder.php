<?php

namespace Core\Data;

interface Seeder
{
    /**
     * The function starts the process of filling the table with data
     * @return void
     */
    public function run(): void;

}