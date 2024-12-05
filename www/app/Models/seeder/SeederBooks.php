<?php

namespace App\Models\seeder;

use Core\Data\Database;
use Core\Data\Seeder;

class SeederBooks extends Database implements Seeder
{

    /**
     * Заповнення таблиці
     * @param int $count -
     * @return void
     */
    public function run(int $count): void
    {
        for ($i = 1; $i < $count+1; $i++) {
            $this->query("INSERT INTO books (title, content, year, number_of_pages) VALUES (?, ?, ?, ?)", [
                $this->getTitle($i),
                $this->getContent(),
                $this->getYear(),
                $this->getNumberOfPages()
            ]);
        }
        /**
         * Питання: Чи потрібно додавати перевірку 0<$count<24 ?
         * 24 - це кількість доданих варіантів книг.
         * Думаю, що не обовязково, бо користувач seeder не буде користуватись,
         * це мені для заповнення тестових данних,
         * Тому на >0 - точно не потрібно, а на <24 - можна додати, на випадок якщо я забуду
         */

    }

    /**
     * Отримаємо зображення книги
     * @param $numberBook
     * @return string
     */
    private function getTitle($numberBook): string
    {
        return IMAGES_DIR.'/'.$numberBook.'.jpg';
    }

    private function getContent()
    {
    }

    private function getYear()
    {
    }

    private function getNumberOfPages()
    {
    }
}