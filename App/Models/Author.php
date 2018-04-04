<?php
/**
 * Created by PhpStorm.
 * User: Evgeny
 * Date: 04.04.2018
 * Time: 16:21
 */

namespace App\Models;


use App\Model;

class Author extends Model {

    public const TABLE = 'authors';
    public $name;
}