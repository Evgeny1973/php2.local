<?php

namespace App;


class Db {

    /**
     * @var \PDO
     */
    public $dbh;

    /**
     * Db constructor.
     * @throws DbException
     */
    public function __construct() {
        $config = Config::instance();
        $this->dbh = new \PDO('mysql:host=' . $config->data['db']['host'] . ';dbname=' . $config->data['db']['dbname'],
            $config->data['db']['dbuser'],
            $config->data['db']['password']);
        if (!$this->dbh) {
            throw new DbException('Соединение с базой не удолось.');
        }
    }

    /**
     * @param string $sql
     * @param array $data
     * @param string $class
     * @return array
     * @throws DbException
     */
    public function query(string $sql, array $data = [], string $class) {
        $sth = $this->dbh->prepare($sql);
        $sth->execute($data);
        return $sth->fetchAll(\PDO::FETCH_CLASS, $class);
    }

    /**
     * @param string $query
     * @param array $params
     * @return bool
     * @throws DbException
     */
    public function execute(string $query, array $params = []) {
        $sth = $this->dbh->prepare($query);
        $result = $sth->execute($params);
        if (!$result) {
            throw new DbException('Запрос execute к базе не удался.');
        }
        return $result;
    }
}