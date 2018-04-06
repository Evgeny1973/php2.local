<?php
include __DIR__ . '/autoload.php';

if (isset($_POST['submit'])) {
    $article = \App\Models\Article::findById($_POST['id']);
    $article->title = ($_POST['title']);
    $article->content = ($_POST['content']);
    $article->id = ($_POST['id']);
    $article->author_id = ($_POST['author_id']);
    header('Location: /admin.php');
}