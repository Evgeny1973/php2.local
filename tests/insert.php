<?php
require __DIR__ . '/../autoload.php';

$dbh = new \App\Db;
$sql = 'INSERT INTO news (title, content) VALUES (:title, :content)';

$res = $dbh->execute($sql, [
    'title' => 'Название статьи',
    'content' => 'Содержимое статьи',
]);

var_dump($res);