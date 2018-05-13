<?php

namespace App\Controllers;

use App\Error404;
use App\Models\Article;
use App\MultiException;

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
     * Добавление новой новости в базу
     * @throws \App\DbException
     */
    public function newArticle() {
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
     * Метод сохранения либо отредактированной (если не пустой $_POST['id']), либо новой новости
     * @throws Error404
     * @throws \App\DbException
     * @throws \App\MultiException
     */
    public function save() {
        if (!empty($_POST['id'])) {
            $article = \App\Models\Article::findById($_POST['id']);
            if (empty($article)) {
                throw new Error404('Запись не найдена');
            }
        } else {
            $article = new Article;
        }
        unset ($_POST['submit']);
        $article->fill($_POST);
        $article->save();
        header('Location: /Admin/');
        exit;
    }
}