<?php

namespace App\View;

use App\SetGet;

/**
 * Class View
 * @property array $articles
 */
class View implements \Iterator, \Countable {

    use SetGet;

    /**
     * @param $template
     * @return string
     */
    public function render($template) {
        ob_start();
        include $template;
        $page = ob_get_contents();
        ob_end_clean();
        return $page;
    }

    /**
     * @param $template
     */
    public function display($template) {
        echo $this->render($template);
    }

//Методы Итератора

    public function rewind() {
        return reset($this->data);
    }

    public function current() {
        return current($this->data);
    }

    public function next() {
        return next($this->data);
    }

    public function key() {
        return key($this->data);
    }

    public function valid() {
        return (false !== $this->current()) ?? false;
    }

    //Count
    /**
     * Возвращает количество элементов в массиве
     * @return int
     */
    public function count() {
        return count($this->data);
    }
}