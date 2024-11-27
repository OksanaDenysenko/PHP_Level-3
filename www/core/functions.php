<?php

function show($stuff) // для зручного виведення данних
{
    echo "<pre>";
    var_dump($stuff);
    echo "</pre>";
}

//function error(int $codeError): void // для виведення помилок - може потім буде клас
//{
//    $messageError = match ($codeError) {
//        200 => 'OK',
//        404 => 'Page not found',
//        500 => 'Database error',
//
//    default => 'Something wrong'
//    };
//
//    http_response_code($codeError);
//    echo json_encode([$codeError => $messageError]);
//}