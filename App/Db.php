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
        try {
            $config = Config::instance();
            $this->dbh = new \PDO('mysql:host=' . $config->data['db']['host'] . ';dbname=' . $config->data['db']['dbname'],
                $config->data['db']['dbuser'],
                $config->data['db']['password']);
        } catch (\PDOException $error) {
            throw new  DbException ('Нет соединения с базой.');
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
        $result = $sth->execute($data);
        if (!$result) {
            throw new DbException('Запрос query к базе не выполнен.');
        }
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
            throw new DbException('Запрос execute к базе не выполнен.');
        }
        return $result;
    }
}