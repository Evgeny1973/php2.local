<?php

namespace App\Controllers;


use App\NotFoundException;

class Article extends Controller {


    /**
     * @throws NotFoundException
     * @throws \App\DbException
     */
    public function oneArticle() {
        $this->view->article = \App\Models\Article::findById($_GET['id']);
        if (!null == $this->view->article) {
            $this->view->display(__DIR__ . '/../../templates/article.php');
        }
    }

    public function error() {
        $this->view->error = new NotFoundException();
        $this->view->display(__DIR__ . '/../../templates/exceptions.php');
    }
}