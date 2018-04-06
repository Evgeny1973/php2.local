<?php
include __DIR__ . '/autoload.php';

$view = new \App\View\View;
$view->articles = \App\Models\Article::findAll();
$view->display(__DIR__ . '/templates/admin.php');