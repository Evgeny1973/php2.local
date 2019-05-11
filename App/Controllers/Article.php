<?php

namespace App\Controllers;

use App\DbException;
use App\Error404;

class Article extends Controller
{

    public $title;
    public $content;

    /**
     * @throws Error404
     * @throws DbException
     */
    public function oneArticle(): void
    {
        $article = \App\Models\Article::findById($_GET['id']);
        if (null == $article) {
            throw new Error404('Запрашиваемой записи в базе нет.');
        }
        $this->view->article = $article;
        $this->view->display(__DIR__ . '/../../templates/article/article.php');
    }
}
