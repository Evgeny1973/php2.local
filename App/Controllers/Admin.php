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
        $this->view->display(__DIR__ . '/../../templates/admin/index.php');
    }

    /**
     * Добавление новой новости в базу
     * @throws \App\DbException
     */
    public function newArticle() {
        $this->view->display(__DIR__ . '/../../templates/admin/newarticle.php');
    }

    /**
     * Редактирование новости
     * @throws \App\DbException
     */
    public function edit() {
        if (!$this->view->article = \App\Models\Article::findById($_GET['id'])) {
            throw new Error404('Запись в БД не найдена.');
        }
        $this->view->display(__DIR__ . '/../../templates/admin/edit.php');
    }

    /**
     * Метод сохранения либо отредактированной (если не пустой $_POST['id']), либо новой новости
     * @throws Error404
     * @throws \App\DbException
     */
    public function save() {
        if (!empty($_POST['id'])) {
            $article = \App\Models\Article::findById($_POST['id']);
            if (empty($article)) {
                throw new Error404('Запись в БД не найдена.');
            }
        } else {
            $article = new Article;
        }
        try {

            $article->fill($_POST);
        } catch (MultiException $e) {
            foreach ($e->getAllErrors() as $error) {
                echo $error->getMessage() . '<br>';
            }
        }
        $article->save();
        header('Location: /Admin/');
        exit;
    }
}