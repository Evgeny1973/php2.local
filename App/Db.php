<?php

namespace App;


class Db {

    public $dbh;

    public function __construct() {
        $config = (include __DIR__ . '/../config.php')['db'];
        $this->dbh = new \PDO('mysql:host=' . $config['host'] . ';dbname=' . $config['dbname'],
            $config['dbuser'],
            $config['password']);
    }

    public function query(string $sql, array $data = [], string $class) {
        $sth = $this->dbh->prepare($sql);
        $sth->execute($data);
        return $sth->fetchAll(\PDO::FETCH_CLASS, $class);
    }

    public function execute(string $query, array $params = []) {
        $sth = $this->dbh->prepare($query);
        $result = $sth->execute($params);
        if (true == $result) {
            return true;
        } else {
            return false;
        }
    }
}