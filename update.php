<?php
include __DIR__ . '/autoload.php';

if (isset($_GET['id'])) {
    $update = \App\Models\Article::findById($_GET['id']);

    if (isset($_POST['submit'])) {
        $update->title = ($_POST['title']);
        $update->content = ($_POST['content']);
        $update->save();
        header('Location: /admin.php');
        exit;
    }
}
require_once __DIR__ . '/templates/update.php';