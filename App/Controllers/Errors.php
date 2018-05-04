<?php

namespace App\Controllers;


use App\DbException;
use App\Error404;

class Errors extends Controller {

    public function dbError($e) {
        $this->view->dberror = new DbException($e);
        $this->view->display(__DIR__ . '/../../templates/dbexceptions.php');
    }

    public function error404($e) {
        $this->view->error404 = new Error404($e);
        $this->view->display(__DIR__ . '/../../templates/error404.php');
    }

}