<?php

namespace Core\Application;

use Exception;

class ImageUploader
{
     /**
     * The function loads an image file and returns the file path.
     * @param array $fileData - Element from the $_FILES array
     * @return string|null - The name of the saved file or null if the file is not loaded/invalid.
     * @throws Exception
     */
    public function upload(array $fileData): ?string
    {
        $extension = pathinfo($fileData['name'], PATHINFO_EXTENSION);
        $newFileName = hash('sha256', $fileData['tmp_name'] . $fileData['name'] . microtime()) . '.' . $extension;
        $newFilePath=IMAGES_DIR .'/'.$newFileName;

        if (!move_uploaded_file($fileData['tmp_name'], $newFilePath)) {
            throw new Exception("The uploaded file could not be moved.");
        }

        return $newFileName;
    }
}