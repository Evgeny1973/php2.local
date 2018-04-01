<?php

namespace App\View;

/**
 * Class View
 * @property array $articles
 */

class View {

    protected $data = [];

    public function __set($name, $value) {
        $this->data[$name] = $value;
    }

    public function __get($name) {
        return $this->data[$name] ?? null;
    }

    public function __isset($name) {
        return $this->data[$name];
    }

    public function display($template) {
        include $template;
    }
}