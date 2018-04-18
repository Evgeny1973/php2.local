<?php
include __DIR__ . '/autoload.php';

if (isset($_POST['title']) && (isset($_POST['content']))) {
    $newArticle = new \App\Models\Article;
    $newArticle->title = $_POST['title'];
    $newArticle->content = $_POST['content'];
    $newArticle->save();
    header('Location: /admin.php');
}