<?php
require __DIR__ . '/../autoload.php';

$dbh = new \App\Db;

$sql = 'DELETE FROM news WHERE id=:id';
$res = $dbh->execute($sql, [':id' => 6]);

var_dump($res);
