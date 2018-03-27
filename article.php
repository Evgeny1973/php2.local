<?php
require __DIR__ . '/autoload.php';

$id = $_GET['id'];
$article = \App\Models\Article::findById($id);

include __DIR__ . '/templates/article.php';