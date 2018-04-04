<?php

namespace App\Models;

use App\Model;

class Article extends Model {

    public const TABLE = 'news';

    /**
     * @var string
     */
    public $title;
    /**
     * @var string
     */
    public $content;
    /**
     * @var int
     */
    public $author_id;


    /**
     * @param string
     * @return Author|null
     */
    public function __get($name) {
        if ('author' === $name) {
            if (null !== $this->author_id) {
                return Author::findById($this->author_id);
            } else {
                return null;
            }
        }
    }

    /**
     * @param string
     * @return bool
     */
    public function __isset($name) {
        if ('author' === $name) {
            return true;
        }
        return false;
    }

}