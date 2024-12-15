<?php

namespace Core\Application;

class Response
{
        public static function response(int $statusCode, $logError = null): void
    {
        $message = match ($statusCode) {
            200 => 'OK',
            404 => 'Page not found',
            500 => 'Database error',

            default => 'Something wrong'
        };

        http_response_code($statusCode);
        echo json_encode([$statusCode => $message]);

        if (isset($logError)) {
            error_log('[' . date('Y-m-d H:i:s') . '] Response: ' . $logError . PHP_EOL, 3, ERROR_LOGS);
        }
    }
}