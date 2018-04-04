<?php
include __DIR__ . '/autoload.php';

if (isset($_GET['id'])) {
    $article = \App\Models\Article::findById($_GET['id']);
    if (isset($article)) {
        include __DIR__ . '/templates/article.php';
        exit;
    } else {
        header('HTTP/1.1 404 Not Found');
        exit;
    }
} else {
    exit;
}