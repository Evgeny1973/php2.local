<?php
include __DIR__ . '/autoload.php';


$view->article = \App\Models\Article::findById($_GET['id']);
$view = new \App\View\View;
$view->display(__DIR__ . '/templates/edit.php');