<?php

namespace Core\Application\Validator;

use Core\Application\Validator\Validator;

class ImageValidator implements Validator
{
    private array $fileData;
    public private(set) array $errors=[];
    private array $allowedMimeTypes = ['image/jpeg', 'image/png', 'image/gif', 'image/webp'];
    private int $maxFileSize = 5 * 1024 * 1024; // 5 MB

    public function __construct(array $fileData)
    {
        $this->fileData = $fileData;
    }

    /**
     * The function checks the image
     * @return bool - the result of the check
     */
    public function validate(): bool
    {
        if ($this->fileData['error'] !== UPLOAD_ERR_OK) {
            $this->errors['image'] = 'Помилка завантаження файлу: ' . $this->fileData['error'];
        }

        $mimeType = new \finfo(FILEINFO_MIME_TYPE)->file($this->fileData['tmp_name']);

        if (!in_array($mimeType, $this->allowedMimeTypes)) {
            $this->errors['image'] = "Тип файлу повинен бути: '{$mimeType}'";
        }

        if ($this->fileData['size'] > $this->maxFileSize) {
            $this->errors['image'] = "Розмір файлу не повинен перевищувати " . round($this->maxFileSize / (1024 * 1024)) . " MB).";
        }

        return empty($this->errors);
    }
}