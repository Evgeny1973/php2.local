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
     * Проверяем запрос на автора
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
        if ('author' === $name && null != $name) {
            return true;
        }
        return false;
    }

    /**
     * Валидация заголовка новости
     * @param $value
     * @throws \Exception
     */
    public function validateTitle($value) {
        if (mb_strlen($value) > 100) {
            throw new \Exception('Заголовок новости не должен ревышать 100 знаков');
        }
    }

    /**
     * Валидация текста новости
     * @param $value
     * @throws \Exception
     */
    public function validateContent($value) {
        if (mb_strlen($value) > 2000) {
            throw new \Exception('Текст новости не должен превышать 2000 знаков');
        }
    }

    /**
     * Валидация id автора новости
     * @param $value
     * @throws \Exception
     */
    public function validateAuthor_id($value) {
        if (intval($value) < 0) {
            throw new \Exception('Некорректный id автора.');
        }
    }
}
