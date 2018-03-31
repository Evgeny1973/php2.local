<?php

include __DIR__ . '/autoload.php';

$delete = \App\Models\Article::findById($_GET['id']);
$delete->delete();

header('Location: /admin.php');