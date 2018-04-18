<?php
include __DIR__ . '/App/autoload.php';

$view = new \App\View\View;

$view->articles = \App\Models\Article::findAll();

$view->display(__DIR__ . '/templates/index.php');