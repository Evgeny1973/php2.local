<?php

namespace App;


class MultiException extends \Exception {

    protected $errors = [];

    public function add(\Exception $e) {
        $this->errors[] = $e;
    }

    public function getAllErrors() {
        return $this->errors;
    }

    public function isEmpty(){

        return empty($this->errors);
    }
}