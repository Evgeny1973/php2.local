<?php

namespace App\Controllers;


use App\Error404;

class Article extends Controller {


    public $title;
    public $content;

    /**
     * @throws \App\Error404
     * @throws \App\DbException
     */
    public function oneArticle() {
        $article = \App\Models\Article::findById($_GET['id']);
        if (null == $article) {
            throw new Error404('Запрашиваемой записи в базе нет.');
        }
        $this->view->article = $article;
        $this->view->display(__DIR__ . '/../../templates/article.php');
    }

/*    public function validateTitle($value) {
        if (mb_strlen($value) > 50) {
            return false;
        }
        return true;
    }

    public function validateContent($value) {
        if (mb_strlen($value) > 2000) {
            return false;
        }
        return true;
    }*/

}