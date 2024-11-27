<?php

namespace Core;

class Error extends \Exception
{
    public static function error(int $codeError, $logError=null): void // не дороблений
    {
        $messageError = match ($codeError) {
            200 => 'OK',
            404 => 'Page not found',
            500 => 'Database error',

            default => 'Something wrong'
        };

        http_response_code($codeError);
        echo json_encode([$codeError => $messageError]);

        if(isset($logError)) {
            error_log('['.date('Y-m-d H:i:s').'] Error: '.$logError.PHP_EOL, 3, ERROR_LOGS);
        }
    }
}