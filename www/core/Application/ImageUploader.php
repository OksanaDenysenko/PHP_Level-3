<?php

namespace Core\Application;

use Exception;

class ImageUploader
{
    private string $uploadDir;
    private array $allowedMimeTypes = ['image/jpeg', 'image/png', 'image/gif', 'image/webp'];
    private int $maxFileSize = 5 * 1024 * 1024; // 5 MB

    public function __construct(string $uploadDir = IMAGES_DIR)
    {
        $this->uploadDir = $uploadDir;

        // Перевіряємо, чи існує директорія та чи доступна для запису
        if (!is_dir($this->uploadDir) && !mkdir($this->uploadDir, 0775, true)) {
            throw new Exception("Не вдалося створити директорію для завантажень: " . $this->uploadDir);
        }
        if (!is_writable($this->uploadDir)) {
            throw new Exception("Директорія для завантажень недоступна для запису: " . $this->uploadDir);
        }
    }

    /**
     * Завантажує файл зображення та повертає назву файлу.
     * @param array $fileData - Елемент з масиву $_FILES (наприклад, $_FILES['bookImage'])
     * @return string|null - Назва збереженого файлу або null, якщо файл не завантажено/недійсний.
     * @throws Exception
     */
    public function upload(array $fileData): ?string
    {
        if ($fileData['error'] !== UPLOAD_ERR_OK) {
            throw new Exception('File upload error: '.$fileData['error']);
        }

        $mimeType = (new \finfo(FILEINFO_MIME_TYPE))->file($fileData['tmp_name']);

        if (!in_array($mimeType, $this->allowedMimeTypes)) {
            throw new Exception("Invalid file type: '{$mimeType}'");
        }

        if ($fileData['size'] > $this->maxFileSize) {
            throw new Exception("The file size exceeds the allowed limit. (" . $this->maxFileSize. " MB).");
        }
        
        $extension = pathinfo($fileData['name'], PATHINFO_EXTENSION);
        $newFileName = hash('sha256', $fileData['tmp_name'] . $fileData['name'] . microtime()) . '.' . $extension;
        $destinationPath = $this->uploadDir . $newFileName;

        // Переміщення завантаженого файлу
        if (!move_uploaded_file($fileData['tmp_name'], $destinationPath)) {
            throw new Exception("Не вдалося перемістити завантажений файл.");
        }

        // Повертаємо шлях відносно кореня public директорії
        // Припускаємо, що public/uploads/book_covers/ знаходиться у public/
        return '/uploads/book_covers/' . $newFileName;
    }
}