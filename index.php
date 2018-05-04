<?php
include __DIR__ . '/App/autoload.php';

$uri = $_SERVER['REQUEST_URI'];

$parts = explode('/', $uri);

try {
    $ctrl = $parts[1] ? ucfirst($parts[1]) : 'Index';
    $action = $parts[2] ?? 'allNews';

    $class = '\App\Controllers\\' . $ctrl;
    $ctrl = new $class;
    $ctrl->action($action);

} catch (\App\DbException $e) {
    $error = new \App\Controllers\Errors;
    $error->dbError($e->getMessage());

} catch (\App\Error404 $e) {
    $error = new \App\Controllers\Errors;
    $error->error404($e->getMessage());
}