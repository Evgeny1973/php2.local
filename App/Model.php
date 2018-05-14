<?php

namespace App;

use App\Models\Article;
use App\Models\Author;
use App\MultiException;

abstract class Model {

    public const TABLE = '';

    /**
     * @var int
     */
    public $id;

    /**
     * @return array
     * @throws DbException
     */
    public static function findAll() {
        $db = new Db;
        $sql = 'SELECT * FROM ' . static::TABLE;
        return $db->query($sql, [], static::class);
    }

    /**
     * Метод занесения записи в базу
     * @return bool
     * @throws DbException
     */
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

    /**
     * Метод внесения изменений в одну запись
     * @return bool
     * @throws DbException
     */
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

    /**
     * Метод удаления записи из базы
     * @return bool
     * @throws DbException
     */
    public
    function delete() {
        $sql = 'DELETE FROM ' . static::TABLE . ' WHERE id=:id';
        $db = new Db;
        return $db->execute($sql, ['id' => $this->id]);
    }

    /**
     * Метод выбора - обновить запись (если есть id) или внести новую
     * @throws DbException
     */
    public
    function save() {
        if (null !== $this->id) {
            $this->update();
        } else {
            $this->insert();
        }
    }

    /**
     * Метод выборки из базы по id
     * @param $id
     * @return Article|Author
     * @throws DbException
     */
    public
    static function findById($id) {
        $dbh = new Db;
        $sql = 'SELECT * FROM ' . static::TABLE . ' WHERE id=:id';
        $result = $dbh->query($sql, [':id' => $id], static::class);
        return $result[0] ?? null;
    }


    public function validateTitle($value) {
        if (mb_strlen($value) > 50) {
            return false;
        }
        return true;
    }

    public function validateContent($value) {
        if (mb_strlen($value) > 2000) {
            return false;
        }
        return true;
    }

    /**
     * @param array $data
     * @return string
     * @throws \App\MultiException
     */
    public function fill(array $data) {
        $errors = new MultiException;

        foreach ($data as $key => $value) {

            $method_name = 'validate' . ucfirst($key);
            if (method_exists($this, $method_name)) {
                try {
                    $this->$method_name($value);
                } catch (\Exception $e) {
                    $errors->add(new \Exception('Некорректный ' . $key));
                    continue;
                }
                $this->$key = $value;
            }
        }
        if (!$errors->isEmpty()) {
            throw $errors;
        }
    }
}