<?php
require __DIR__ . '/autoload.php';

$articles = \App\Models\Article::getLastThree();

include __DIR__ . '/templates/index.php';