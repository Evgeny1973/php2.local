<?php

namespace App\Controllers;

use App\Models\Article;

class Admin extends Controller {





    /**
     * Отображает в админке все новости
     */
    public function allNews() {
        $this->view->articles = Article::findAll();
        $this->view->display(__DIR__ . '/../../Admin/templates/index.php');
    }

    /**
     * Создание новой новости
     */
    public function newArticle() {
        if (isset($_POST['submit'])) {
            $article = new \App\Models\Article;
            $article->title = $_POST['title'];
            $article->content = $_POST['content'];
            $article->save();
            header('Location: /Admin/');
            exit;
        }
        $this->view->display(__DIR__ . '/../../Admin/templates/new.php');
    }

    /**
     * Редактирование новости
     */
    public function edit() {
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
        $this->view->article = \App\Models\Article::findById($_GET['id']);
        $this->view->display(__DIR__ . '/../../Admin/templates/edit.php');
    }

    public function delete() {
        if (isset($_GET['id'])) {
            $article = \App\Models\Article::findById($_GET['id']);
            $article->delete();
            header('Location: /Admin/');
            exit;
        } else {
            header('HTTP/1.1 404 Not Found');
            exit;
        }
    }
}