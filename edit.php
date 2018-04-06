<?php
include __DIR__ . '/autoload.php';

$view = new \App\View\View;
$view->article = \App\Models\Article::findById($_GET['id']);
$view->display(__DIR__ . '/templates/edit.php');