<?php

namespace App\Controllers;


use App\Controller;

class Index extends Controller {

    public function __construct() {
    parent::__construct();
    }

    public function index(){
        $this->view->render('/templates/index.php');
    }
}