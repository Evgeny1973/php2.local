<?php

namespace App;


use App\View\View;

class Controller {

    protected $view;

    public function __construct() {
    $this->view = new View;

    }
}