<?php

namespace Core\Data;

abstract class Seeder
{
    /**
     * The function starts the process of filling the table with data
     * @return void
     */
   abstract public function run(): void;

    /**
     * The function processes the data array and executes an SQL query to insert data into the table
     * @param Repository $repository - object of the corresponding repository
     * @param array $items - the data array
     * @return void
     */
    protected function seed(Repository $repository, array $items): void
    {
        foreach ($items as $item) {
            $repository->insert($item);
        }
    }

}