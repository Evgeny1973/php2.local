<?php

namespace App;


abstract class Model {

    public const TABLE = '';

    public $id;

    public static function findAll() {
        $dbh = new Db;
        $sql = 'SELECT * FROM ' . static::TABLE;
        return $dbh->query($sql, [], static::class);
    }

    public static function findById($id) {
        $dbh = new Db;
        $sql = 'SELECT * FROM ' . static::TABLE . ' WHERE id=:id';
        $result = $dbh->query($sql, [':id' => $id], static::class);
        if ($id == $result[0]->id) {
            return $result[0];
        } else {
            return false;
        }
    }
}