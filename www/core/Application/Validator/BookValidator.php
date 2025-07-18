<?php

namespace Core\Application\Validator;

use Core\Application\Validator\Validator;

class BookValidator implements Validator
{
    private array $data=[];
    public private(set) array $errors=[];
    private array $errors=[];

    public function __construct($data)
    {
        $this->data=$data;
    }

    public function validate(array $data)
    {
        // TODO: Implement validate() method.
    }
    private function validateTitle(): void {
        $title = trim($this->data['title'] ?? '');
        if (empty($title)) {
            $this->addError('title', 'Заголовок є обов\'язковим полем.');
        } elseif (strlen($title) < 3) {
            $this->addError('title', 'Заголовок повинен містити щонайменше 3 символи.');
        } elseif (strlen($title) > 255) {
            $this->addError('title', 'Заголовок не повинен перевищувати 255 символів.');
        }
    }

    private function validateContent(): void {
        $content = trim($this->data['description'] ?? '');
        // Додаткові правила валідації для опису, якщо потрібно
    }

    private function validateYear(): void {
        $year = $this->data['year'] ?? null;
        if ($year !== null && (!is_numeric($year) || $year < 1000 || $year > date('Y') + 5)) {
            $this->addError('year', 'Рік повинен бути дійсним числом (наприклад, між 1000 і поточним роком + 5).');
        }
    }

    private function validatePages(): void {
        $pages = $this->data['pages'] ?? null;
        if ($pages !== null && (!is_numeric($pages) || $pages <= 0)) {
            $this->addError('pages', 'Кількість сторінок повинна бути позитивним числом.');
        }
    }

    private function validateAuthors(): void {
        $author1 = trim($this->data['author1'] ?? '');
        $author2 = trim($this->data['author2'] ?? '');
        $author3 = trim($this->data['author3'] ?? '');

        $authors = array_filter([$author1, $author2, $author3]);

        if (empty($authors)) {
            $this->addError('authors', 'Потрібно вказати хоча б одного автора.');
        } else {
            foreach ($authors as $key => $author) {
                if (strlen($author) < 2 || strlen($author) > 100) {
                    $this->addError("author" . ($key + 1), "Ім'я автора №" . ($key + 1) . " повинно містити від 2 до 100 символів.");
                }
            }
        }
    }
}