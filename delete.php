<?php

include __DIR__ . '/autoload.php';

if (isset($_GET['id'])) {
    $data = \App\Models\Article::findById($_GET['id']);
    $data->delete();
    header('Location: /admin.php');
    exit;
} else {
    header('HTTP/1.1 404 Not Found');
    exit;
}

