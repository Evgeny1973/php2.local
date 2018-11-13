<?php

namespace App\Controllers;

class Logger {

    public static function dbExceptionLog(\Throwable $e) {
        $error = date('d-m-Y H:i:s') .
            ' Ошибка БД: ' . $e->getMessage() .
            '. В файле: ' . $e->getFile() .
            ' на строке: ' . $e->getLine() .
            PHP_EOL;
        file_put_contents(__DIR__ . '/../errors.log', $error, FILE_APPEND);
    }

    public static function notfoundExceptionLog(\Throwable $e) {
        $error = date('d-m-Y H:i:s') .
            ' Не найдено: ' . $e->getMessage() .
            '. В файле: ' . $e->getFile() .
            ' на строке: ' . $e->getLine() .
            PHP_EOL;
        file_put_contents(__DIR__ . '/../errors.log', $error, FILE_APPEND);
    }
}