<?php

namespace Core\Application\Validator;

class BookValidator implements Validator
{
    private array $data=[];
   // public private(set) array $errors=[];
    private array $errors=[];

    public function __construct($data)
    {
        $this->data=$data;
    }

    /**
     * The function starts the data validation process
     * @return bool - the result of the check
     */
    public function validate(): bool
    {
        $this->validateTitle();
        $this->validateContent();
        $this->validatePages();
        $this->validateYear();
        $this->validateAuthors();

        return empty($this->errors);
    }

    /**
     * The function provides access to the error array
     * @return array
     */
    public function getError(): array
    {
        return $this->errors;
    }

    /**
     * The function checks the title field
     * @return void
     */
    private function validateTitle(): void {
        $title = trim($this->data['title'] ?? '');

        if (empty($title)) {
            $this->errors['title']= 'Заголовок є обов\'язковим полем.';
        } elseif (strlen($title) < 3) {
            $this->errors['title']= 'Заголовок повинен містити щонайменше 3 символи.';
        } elseif (strlen($title) > 255) {
            $this->errors['title']= 'Заголовок не повинен перевищувати 255 символів.';
        }
    }

    /**
     * The function checks the description field
     * @return void
     */
    private function validateContent(): void {
        $content = trim($this->data['description'] ?? '');
        $minLength = 10;
        $maxLength = 2000;

        if (!empty($content)) {

            if (mb_strlen($content) < $minLength) {
                $this->errors['description']= "Опис повинен містити щонайменше $minLength символів.";
            }

            if (mb_strlen($content) > $maxLength) {
                $this->errors['description']= "Опис не повинен перевищувати $maxLength символів.";
            }
        }
    }

    /**
     *  The function checks the year field
     * @return void
     */
    private function validateYear(): void {
        $year = $this->data['year'] ?? null;
        $minYear = 1400;

        if ($year !== null && (!is_numeric($year) || $year < $minYear || $year > date('Y'))) {
            $this->errors['year']= "Рік повинен бути дійсним числом (між $minYear і поточним роком).";
        }
    }

    /**
     *  The function checks the pages field
     * @return void
     */
    private function validatePages(): void {
        $pages = $this->data['pages'] ?? null;

        if ($pages !== null && (!is_numeric($pages) || $pages <= 0)) {
            $this->errors['pages']= 'Кількість сторінок повинна бути додатнім числом.';
        }
    }

    /**
     *  The function checks the authors fields
     * @return void
     */
    private function validateAuthors(): void {
        $author1 = trim($this->data['author1'] ?? '');
        $author2 = trim($this->data['author2'] ?? '');
        $author3 = trim($this->data['author3'] ?? '');
        $authors = array_filter([$author1, $author2, $author3]);

        if (empty($authors)) {
            $this->errors['authors']= 'Потрібно вказати хоча б одного автора.';
        } else {
            foreach ($authors as $key => $author) {
                if (strlen($author) < 3 || strlen($author) > 50) {
                    $this->errors['authors']= "Ім'я автора №" . ($key + 1) . " повинно містити від 3 до 50 символів.";
                }
            }
        }
    }
}