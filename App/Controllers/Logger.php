<?php

namespace App\Controllers;

use App\DbException;
use App\Error404;

class Logger
{

    /**
     * @param DbException $e
     */
    public static function dbExceptionLog(DbException $e)
    {
        $error = date('d-m-Y H:i:s') .
            ' Ошибка БД: ' . $e->getMessage() .
            '. В файле: ' . $e->getFile() .
            ' на строке: ' . $e->getLine() .
            PHP_EOL;
        file_put_contents(__DIR__ . '/../errors.log', $error, FILE_APPEND);
    }

    /**
     * @param Error404 $e
     */
    public static function notfoundExceptionLog(Error404 $e)
    {
        $error = date('d-m-Y H:i:s') .
            ' Не найдено: ' . $e->getMessage() .
            '. В файле: ' . $e->getFile() .
            ' на строке: ' . $e->getLine() .
            PHP_EOL;
        file_put_contents(__DIR__ . '/../errors.log', $error, FILE_APPEND);
    }
}
