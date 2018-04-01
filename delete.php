<?php

include __DIR__ . '/autoload.php';

$delete = \App\Models\Article::findById($_GET['id']);

if (isset($delete)) {
    $delete->delete();
    header('Location: /admin.php');
    exit;
} else {
    header('HTTP/1.1 404 Not Found');
    exit;
}