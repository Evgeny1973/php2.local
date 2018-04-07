<?php
include __DIR__ . '/autoload.php';

if (isset($_GET['id'])) {
    $view = new App\View\View;
    $view->article = \App\Models\Article::findById($_GET['id']);
    if (!null == $view->article) {
        $view->display(__DIR__ . '/templates/article.php');
        exit;
    } else {
        header('HTTP/1.1 404 Not Found');
        exit;
    }
} else {
    exit;
}