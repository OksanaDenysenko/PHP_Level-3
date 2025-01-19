<?php

namespace Core\Data;

use App\Repository\BookRepository;

abstract class Seeder
{
    protected Repository $repository; //object of the corresponding repository
    protected const NAME_REPOSITORY='';

    public function __construct()
    {
        $nameRepository='App\Repository\\' . static::NAME_REPOSITORY;
        $this->repository = new $nameRepository;
    }

    /**
     * The function starts the process of filling the table with data
     * @return void
     */
   abstract public function run(): void;

    /**
     * The function processes the data array and executes an SQL query to insert data into the table
     * @param array $items - the data array
     * @return void
     */
    protected function seed(array $items): void
    {
        foreach ($items as $item) {
            $this->repository->insert($item);
        }
    }

}