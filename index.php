<?php

use App\Controllers\Errors;
use App\Controllers\Logger;
use App\DbException;
use App\Error404;

include __DIR__ . '/App/autoload.php';

$uri = $_SERVER['REQUEST_URI'];
$parts = explode('/', trim($uri, '/'));
$ctrl = $parts[0] ? ucfirst($parts[0]) : 'Index';
$action = $parts[1] ?? 'allNews';

try {
    $class = 'App\Controllers\\' . $ctrl;
    $controller = new $class;
    $controller->action($action);

} catch (DbException $e) {
    Logger::dbExceptionLog($e);
    $error = new Errors;
    $error->dbError($e->getMessage());

} catch (Error404 $e) {
    Logger::notfoundExceptionLog($e);
    $error = new Errors;
    $error->error404($e->getMessage());
}
