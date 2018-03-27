<?php
require __DIR__ . '/autoload.php';

//Получаем 3 последние новости
$articles = \App\Models\Article::getLastThree();

include __DIR__ . '/templates/index.php';