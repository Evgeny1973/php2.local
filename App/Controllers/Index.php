<?php

namespace App\Controllers;


use App\DbException;
use App\Models\Article;

class Index extends Controller
{

    /**
     * @throws DbException
     */
    public function allNews(): void
    {
        $this->view->articles = Article::findAll();
        $this->view->display(__DIR__ . '/../../templates/index.php');
    }
}
