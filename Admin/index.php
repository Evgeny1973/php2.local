<?php
include __DIR__ . '/../App/autoload.php';

$uri = $_SERVER['REQUEST_URI'];

$parts = explode('/', trim($uri, '/'));

$action = $parts[1] ?? 'allNews';

$ctrl = new \App\Controllers\Admin;

try {
    $ctrl->action($action);
} catch (\App\MultiException $errors) {
    foreach ($errors->getAllErrors() as $error) {
        echo $error->getMessage();
    }
}