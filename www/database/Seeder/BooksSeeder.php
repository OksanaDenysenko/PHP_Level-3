<?php

namespace Database\Seeder;

use App\Repository\BookRepository;
use Core\Data\Seeder;

class BooksSeeder extends Seeder
{
    /**
     * The function contains an array of data and runs seed() to insert the data
     * @return void
     */
    public function run(): void
    {
        $data = [
            ['title' => 'СИ++ И КОМПЬЮТЕРНАЯ ГРАФИКА', 'content' => 'Лекции и практикум по программированию на Си++', 'year' => 2023, 'number_of_pages' => 200, 'image' => IMAGES_DIR . '/1.jpg'],
            ['title' => 'Программирование на языке Go!', 'content' => '', 'year' => 2022, 'number_of_pages' => 150, 'image' => IMAGES_DIR . '/2.jpg'],
            ['title' => 'Толковый словарь сетевых терминов и аббревиатур', 'content' => '', 'year' => 2023, 'number_of_pages' => 150, 'image' => IMAGES_DIR . '/3.jpg'],
            ['title' => 'Python for Data Analysis', 'content' => '', 'year' => 2020, 'number_of_pages' => 150, 'image' => IMAGES_DIR . '/4.jpg'],
            ['title' => 'Thinking in Java (4th Edition)', 'content' => '', 'year' => 2022, 'number_of_pages' => 150, 'image' => IMAGES_DIR . '/5.jpg'],
            ['title' => 'Introduction to Algorithms', 'content' => '', 'year' => 2020, 'number_of_pages' => 150, 'image' => IMAGES_DIR . '/6.jpg'],
            ['title' => 'JavaScript Pocket Reference', 'content' => '', 'year' => 2000, 'number_of_pages' => 150, 'image' => IMAGES_DIR . '/7.jpg'],
            ['title' => 'Adaptive Code via C#: Class and Interface Design, Design Patterns, and SOLID Principles', 'content' => '', 'year' => 2022, 'number_of_pages' => 150, 'image' => IMAGES_DIR . '/8.jpg'],
            ['title' => 'SQL: The Complete Referenc', 'content' => 'Програмування', 'year' => 2000, 'number_of_pages' => 150, 'image' => IMAGES_DIR . '/9.jpg'],
            ['title' => 'PHP and MySQL Web Development', 'content' => 'Програмування', 'year' => 2022, 'number_of_pages' => 150, 'image' => IMAGES_DIR . '/10.jpg'],
            ['title' => 'Статистический анализ и визуализация данных с помощью R', 'content' => '', 'year' => 2022, 'number_of_pages' => 150, 'image' => IMAGES_DIR . '/11.jpg'],
            ['title' => 'Computer Coding for Kid', 'content' => '', 'year' => 2022, 'number_of_pages' => 150, 'image' => IMAGES_DIR . '/12.jpg'],
            ['title' => 'Exploring Arduino: Tools and Techniques for Engineering Wizardry', 'content' => '', 'year' => 2022, 'number_of_pages' => 150, 'image' => IMAGES_DIR . '/13.jpg'],
            ['title' => 'Программирование микроконтроллеров для начинающих и не только', 'content' => '', 'year' => 2022, 'number_of_pages' => 150, 'image' => IMAGES_DIR . '/14.jpg'],
            ['title' => 'The Internet of Things', 'content' => '', 'year' => 2022, 'number_of_pages' => 150, 'image' => IMAGES_DIR . '/15.jpg'],
            ['title' => 'Sketching User Experiences: The Workbook', 'content' => 'Програмування', 'year' => 2022, 'number_of_pages' => 150, 'image' => IMAGES_DIR . '/16.jpg'],
            ['title' => 'InDesign CS6', 'content' => 'Програмування', 'year' => 2001, 'number_of_pages' => 100, 'image' => IMAGES_DIR . '/17.jpg'],
            ['title' => 'Адаптивный дизайн. Делаем сайты для любых устройств', 'content' => 'Програмування', 'year' => 2022, 'number_of_pages' => 150, 'image' => IMAGES_DIR . '/18.jpg'],
            ['title' => 'Android для разработчиков', 'content' => 'Програмування', 'year' => 2002, 'number_of_pages' => 150, 'image' => IMAGES_DIR . '/19.jpg'],
            ['title' => 'Clean Code: A Handbook of Agile Software Craftsmanship', 'content' => '', 'year' => 2006, 'number_of_pages' => 150, 'image' => IMAGES_DIR . '/20.jpg'],
            ['title' => 'Swift Pocket Reference: Programming for iOS and OS X', 'content' => 'Програмування', 'year' => 2022, 'number_of_pages' => 150, 'image' => IMAGES_DIR . '/21.jpg'],
            ['title' => 'NoSQL Distilled: A Brief Guide to the Emerging World of Polyglot Persistence', 'content' => '', 'year' => 2022, 'number_of_pages' => 150, 'image' => IMAGES_DIR . '/22.jpg'],
            ['title' => 'Head First Ruby', 'content' => 'Програмування', 'year' => 2022, 'number_of_pages' => 150, 'image' => IMAGES_DIR . '/23.jpg'],
            ['title' => 'Practical Vim', 'content' => 'Програмування', 'year' => 2022, 'number_of_pages' => 150, 'image' => IMAGES_DIR . '/24.jpg'],
        ];

        $this->seed(new BookRepository(),$data);
    }
}