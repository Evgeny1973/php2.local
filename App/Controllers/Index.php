<?php

namespace App\Controllers;


use App\DbException;
use App\Models\Article;

class Index extends Controller {

    /**
     * @throws DbException
     */
    public function allNews() {
        $this->view->articles = Article::findAll();
        $this->view->display(__DIR__ . '/../../templates/index.php');
    }

    public function error() {
        $this->view->error = new DbException;
        $this->view->display(__DIR__ . '/../../templates/exceptions.php');
    }
}