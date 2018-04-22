<?php
include __DIR__ . '/../App/autoload.php';

$uri = $_SERVER['REQUEST_URI'];

$parts = explode('/', trim($uri, '/'));

$action = $parts[1] ?? 'allNews';

$ctrl = new \App\Controllers\Admin;
$ctrl->action($action);