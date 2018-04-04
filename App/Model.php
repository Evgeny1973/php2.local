<?php

namespace App;

abstract class Model {

    public const TABLE = '';

    public $id;

    public static function findAll() {
        $db = new Db();

        $sql = 'SELECT * FROM ' . static::TABLE;
        return $db->query(
            $sql,
            [],
            static::class
        );
    }

    public function insert() {
        $fields = get_object_vars($this);
        $cols = [];
        $values = [];

        foreach ($fields as $name => $value) {
            if ('id' == $name) {
                continue;
            }
            $cols[] = $name;
            $values[':' . $name] = $value;
        }

        $sql = 'INSERT INTO ' . static::TABLE . '
        (' . implode(', ', $cols) . ')
         VALUES (' . implode(', ', array_keys($values)) . ')';

        $db = new Db;
        return $db->execute($sql, $values);
    }


    public function update() {

        $fields = get_object_vars($this);
        $values = [];
        $data = [];

        foreach ($fields as $name => $value) {
            $data[':' . $name] = $value;
            if ('id' == $name) {
                continue;
            }
            $values[] = $name . '=:' . $name;
        }
        $sql = 'UPDATE ' . static::TABLE .
            ' SET ' . implode(', ', $values) . ' WHERE id=:id';
        $db = new Db;
        return $db->execute($sql, $data);
    }

    public function delete() {
        $sql = 'DELETE FROM ' . static::TABLE . ' WHERE id=:id';

        $db = new Db();
        return $db->execute($sql, ['id' => $this->id]);
    }

    public function save() {
        if (null !== $this->id) {
            $this->update();
        } else {
            $this->insert();
        }
    }

    public static function findById($id) {
        $dbh = new Db;
        $sql = 'SELECT * FROM ' . static::TABLE . ' WHERE id=:id';
        $result = $dbh->query($sql, [':id' => $id], static::class);
        if ($result) {
            return $result[0];
        } else {
            return null;
        }
    }
}