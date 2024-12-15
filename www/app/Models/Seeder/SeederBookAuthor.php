<?php

namespace App\Models\seeder;

use Core\Application\Response;
use Core\Data\Database;
use Core\Data\Seeder;

class SeederBookAuthor extends Database implements Seeder
{
    /**
     * The function contains an array of data and runs seed() to insert the data
     * @return void
     */
    public function run(): void
    {
        $data = [
            ['book_id' => 1, 'author_id' => 1],
            ['book_id' => 2, 'author_id' => 2],
            ['book_id' => 3, 'author_id' => 3],
            ['book_id' => 4, 'author_id' => 4],
            ['book_id' => 5, 'author_id' => 5],
            ['book_id' => 6, 'author_id' => 6],
            ['book_id' => 6, 'author_id' => 7],
            ['book_id' => 6, 'author_id' => 8],
            ['book_id' => 6, 'author_id' => 9],
            ['book_id' => 7, 'author_id' => 10],
            ['book_id' => 8, 'author_id' => 11],
            ['book_id' => 9, 'author_id' => 12],
            ['book_id' => 10, 'author_id' => 13],
            ['book_id' => 11, 'author_id' => 14],
            ['book_id' => 12, 'author_id' => 15],
            ['book_id' => 13, 'author_id' => 16],
            ['book_id' => 14, 'author_id' => 17],
            ['book_id' => 15, 'author_id' => 18],
            ['book_id' => 16, 'author_id' => 19],
            ['book_id' => 17, 'author_id' => 20],
            ['book_id' => 18, 'author_id' => 21],
            ['book_id' => 19, 'author_id' => 22],
            ['book_id' => 19, 'author_id' => 23],
            ['book_id' => 20, 'author_id' => 24],
            ['book_id' => 21, 'author_id' => 25],
            ['book_id' => 22, 'author_id' => 26],
            ['book_id' => 22, 'author_id' => 27],
            ['book_id' => 23, 'author_id' => 28],
            ['book_id' => 24, 'author_id' => 29],
        ];

        $this->seed($data);
    }

    /**
     * The function processes the data array and executes an SQL query to insert data into the table
     * @param array $data - the data array
     * @return void
     */
    protected function seed(array $data): void
    {
        $db = Database::getInstance();

        foreach ($data as $bookAuthorData) {
            $db->query("INSERT INTO book_author (book_id, author_id) VALUES (:book_id, :author_id)", $bookAuthorData);
        }

        Response::response(200);
    }
}