<?php
include __DIR__ . '/App/autoload.php';

$uri = $_SERVER['REQUEST_URI'];

$parts = explode('/', trim($uri, '/'));

$ctrl = $parts[0] ? ucfirst($parts[0]) : 'Index';
$action = $parts[1] ?? 'allNews';

$class = '\App\Controllers\\' . $ctrl;

$ctrl = new $class;
$ctrl->action($action);