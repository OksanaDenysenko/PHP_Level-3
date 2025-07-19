<?php

namespace Core\Application;

use Exception;
use JetBrains\PhpStorm\NoReturn;

class Controller
{
    public string $content = '';

    /**
     *
     * @param string $view - the name of the view to load
     * @param array $data
     * @return void
     * @throws Exception
     */
    public function view(string $view, array $data = []): void
    {

        $filename = VIEWS_DIR . "/$view.php";

        if (file_exists($filename)) {
            ob_start();
            require_once $filename;
            $this->content = ob_get_clean();

            return;
        }

        throw new Exception(StatusCode::Page_Not_Found->name, StatusCode::Page_Not_Found->value);
    }

    /**
     * The function checks whether the current HTTP request was sent using AJAX technology (XMLHttpRequest)
     * @return void
     */
    protected function ensureAjax(): void
    {
        if ($_SERVER['HTTP_X_REQUESTED_WITH'] != 'XMLHttpRequest') {
            $this->jsonResponse(false, StatusCode::Bad_Request->value, StatusCode::Bad_Request->name);
        }
    }

    /**
     * The function sends an HTTP response in JSON format
     * @param int $statusCode
     * @param string $message
     * @param array $errors
     * @return void
     */

    #[NoReturn] protected function jsonResponse(int $statusCode, string $message = '', array $errors = []): void
    {
        header('Content-Type: application/json');
        header("HTTP/1.1 " . $statusCode . " " . StatusCode::from($statusCode)->name);
        echo json_encode(['status' => $statusCode==StatusCode::OK->value ? 'success' : 'error',
            'message' => $message ?: StatusCode::from($statusCode)->name,
            'errors' => $errors ?: null]);

        exit;
    }
}