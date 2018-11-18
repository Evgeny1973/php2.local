<?php

namespace App;


class Config {

    public $data;

    use Singleton;

    protected function __construct() {
        $this->data = include __DIR__ . '/Config/___config.php';
    }
}
