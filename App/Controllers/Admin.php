<?php

namespace App\Controllers;

use App\Models\Article;

/**
 * Class Admin
 * @package App\Controllers
 */
class Admin extends Controller {

    /**
     * Отображает в админке все новости
     * @throws \App\DbException
     */
    public function allNews() {
        $this->view->articles = Article::findAll();
        $this->view->display(__DIR__ . '/../../Admin/templates/index.php');
    }

    /**
     * @throws \App\MultiException
     * @throws \App\DbException
     */
    public function newArticle() {
        if (isset($_POST['submit'])) {
            $article = new Article;
            $article->title = $_POST['title'];
            $article->content = $_POST['content'];
            $article->save();
            header('Location: /Admin/');
            exit;
        }
        $this->view->display(__DIR__ . '/../../Admin/templates/newarticle.php');
    }

    /**
     * Редактирование новости
     * @throws \App\DbException
     */
    public function edit() {
        $this->view->article = \App\Models\Article::findById($_GET['id']);
        $this->view->display(__DIR__ . '/../../Admin/templates/edit.php');
    }

    /**
     *Сохранение изменений в новости
     * @throws \App\DbException
     * @throws \App\Error404
     */
    public function save() {
        if (isset($_POST['submit'])) {
            $article = \App\Models\Article::findById($_POST['id']);
            $article->title = ($_POST['title']);
            $article->content = ($_POST['content']);
            $article->id = ($_POST['id']);
            $article->author_id = ($_POST['author_id']);
            $article->save();
            header('Location: /Admin/');
            exit;
        }
    }
}