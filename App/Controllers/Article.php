<?php

namespace App\Controllers;


class Article extends Controller {


     public function oneArticle() {
        $this->view->article = \App\Models\Article::findById($_GET['id']);
        if (!null == $this->view->article) {
            $this->view->display(__DIR__ . '/../../templates/article.php');
        }
    }
}