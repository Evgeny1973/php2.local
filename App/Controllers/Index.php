<?php

namespace App\Controllers;


use App\Models\Article;

class Index extends Controller {

    /**
     * @throws \App\DbException
     */
    public function allNews() {
        $this->view->articles = Article::findAll();
        $this->view->display(__DIR__ . '/../../templates/index.php');
    }
}