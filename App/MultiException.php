<?php

namespace App;


class MultiException extends \Exception {

    protected $errors = [];

    /**
     * @param \Exception $e
     */
    public function add(\Exception $e): void {
        $this->errors[] = $e;
    }

    /**
     * @return array
     */
    public function getAllErrors(): array {
        return $this->errors;
    }

    /**
     * @return bool
     */
    public function isEmpty(): bool {
        return empty($this->errors);
    }
}