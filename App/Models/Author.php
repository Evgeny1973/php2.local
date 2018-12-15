<?php

namespace App\Models;


use App\Model;

class Author extends Model
{

    /**
     * Таблица с авторами
     */
    public const TABLE = 'authors';

    /**
     * Имя автора
     * @var $name
     */
    public $name;
}
