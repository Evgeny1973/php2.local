<?php

namespace App\Models;

use App\Model;

class Article extends Model {

    public const TABLE = 'news';

    public $title;
    public $content;
    public $author_id;

    public function __get($name) {
        if ('author' === $name) {
            if (null !== $this->author_id) {
                return Author::findById($this->author_id);
            } else {
                return null;
            }
        }
    }

    public function __isset($name) {
        if ('author' === $name) {
            return true;
        }
        return false;
    }

}