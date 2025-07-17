<?php

namespace Core\Application;

use Exception;

class ImageUploader
{
    private string $uploadDir;
    private array $allowedMimeTypes = ['image/jpeg', 'image/png', 'image/gif', 'image/webp'];
    private int $maxFileSize = 5 * 1024 * 1024; // 5 MB

    /**
     * @throws Exception
     */
    public function __construct(string $uploadDir = IMAGES_DIR)
    {
        $this->uploadDir = $uploadDir;

        if (!is_dir($this->uploadDir) && !mkdir($this->uploadDir, 0775, true)) {
            throw new Exception("Failed to create download directory: " . $this->uploadDir);
        }
        if (!is_writable($this->uploadDir)) {
            throw new Exception("The download directory is not writable: " . $this->uploadDir);
        }
    }

    /**
     * The function loads an image file and returns the file path.
     * @param array $fileData - Element from the $_FILES array
     * @return string|null - The path of the saved file or null if the file is not loaded/invalid.
     * @throws Exception
     */
    public function upload(array $fileData): ?string
    {
        if ($fileData['error'] !== UPLOAD_ERR_OK) {
            throw new Exception('File upload error: '.$fileData['error']);
        }

        $mimeType = (new \finfo(FILEINFO_MIME_TYPE))->file($fileData['tmp_name']);

        if (!in_array($mimeType, $this->allowedMimeTypes)) {
            throw new Exception("Invalid file type: '{$mimeType}'", StatusCode::Bad_Request->value);
        }

        if ($fileData['size'] > $this->maxFileSize) {
            throw new Exception("The file size exceeds the allowed limit. (" . $this->maxFileSize. " MB).", StatusCode::Bad_Request->value);
        }
        
        $extension = pathinfo($fileData['name'], PATHINFO_EXTENSION);
        $newFileName = hash('sha256', $fileData['tmp_name'] . $fileData['name'] . microtime()) . '.' . $extension;
        $newFilePath=$this->uploadDir .'/'.$newFileName;

        if (!move_uploaded_file($fileData['tmp_name'], $newFilePath)) {
            throw new Exception("The uploaded file could not be moved.");
        }

        return $newFileName;
    }
}