<?php
include __DIR__ . '/autoload.php';

$articles = \App\Models\Article::findAll();

if (isset($articles)) {
    include __DIR__ . '/templates/admin.php';
    exit;
} else {
    header('HTTP/1.1 404 Not Found');
    exit;
}