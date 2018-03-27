<?php
require __DIR__ . '/../autoload.php';

$dbh = new \App\Db;

$sql = 'UPDATE news SET title=:title, content=:content WHERE id=:id';
$res = $dbh->execute($sql, [
    'title' => 'Новый заголовок статьи',
    'content' => 'Новвое содержимое статьи',
    'id' => 5,
]);

var_dump($res);