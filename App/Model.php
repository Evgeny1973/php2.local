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
    public function delete() {
        $sql = 'DELETE FROM ' . static::TABLE . ' WHERE id=:id';
        $db = new Db;
        return $db->execute($sql, ['id' => $this->id]);
    }

    /**
     * Метод выбора - обновить запись (если есть id) или внести новую
     * @throws DbException
     */
    public function save() {
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
    public static function findById($id) {
        $dbh = new Db;
        $sql = 'SELECT * FROM ' . static::TABLE . ' WHERE id=:id';
        $result = $dbh->query($sql, [':id' => $id], static::class);
        return $result[0] ?? null;
    }

    /**
     * @param array $data
     * @return array
     * @throws \App\MultiException
     */
    public function fill(array $data) {
        var_dump($data);

        $errors = new MultiException;
        
        foreach ($data as $key => $value) {
            try {
                if ('author_id' != $key && 'id' != $key) {
                    if (empty($value)) {
                        throw new \Exception('Данные пустые.');
                    }
                }
            } catch (\Exception $e) {
                $errors->add($e);
            }
        }

        if (!empty($errors->getAllErrors())) {
            throw  $errors;
        } else {
            return $data;
        }
    }
}


/**
 * @param iterable $data
 * @throws Errors
 */
/*
public function fill(iterable $data)
{
    $errors = new Errors();

    foreach ($data as $name => $value) {

        if (!$this->existsField($name)) {
            $errors->addError(new \Exception('В моделе нет данного свойства.'));
            continue;
        }

        $validator = 'validate' . $name . 'Field';
        if (method_exists($this, $validator)) {
            try {
                $this->$validator($value);
            } catch (\Exception $e) {
                $errors->addError($e);
                continue;
            }
        }

        $this->$name = $value;
    }

    if (!$errors->isErrorsArrayEmpty()) {
        throw $errors;
    }
}

public function existsField($name) {
    $fields = get_object_vars($this);
    return array_key_exists($name, $fields);
}
*/
