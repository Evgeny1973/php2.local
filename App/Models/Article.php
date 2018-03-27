<?php

namespace App\Models;


use App\Db;
use App\Model;

class Article extends Model {

    public const TABLE = 'news';

    public $title;
    public $content;

    public static function getLastThree() {
        $dbh = new Db;
        $sql = 'SELECT * FROM ' . static::TABLE . ' ORDER BY id DESC LIMIT 3';
        return $dbh->query($sql, [], static::class);
    }
}