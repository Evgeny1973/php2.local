<?php

namespace App;


class Db {

    private $dbh;

    public function __construct() {
        $config = Config::instance();
        $this->dbh = new \PDO('mysql:host=' . $config->data['db']['host'] . ';dbname=' . $config->data['db']['dbname'],
            $config->data['db']['dbuser'],
            $config->data['db']['password']);
    }

    public function query(string $sql, array $data = [], string $class) {
        $sth = $this->dbh->prepare($sql);
        $sth->execute($data);
        return $sth->fetchAll(\PDO::FETCH_CLASS, $class);
    }

    public function execute(string $query, array $params = []) {
        $sth = $this->dbh->prepare($query);
        $result = $sth->execute($params);
        return $result;
    }
}