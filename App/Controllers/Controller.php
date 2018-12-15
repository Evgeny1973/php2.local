<?php

namespace App\Controllers;


use App\View\View;

abstract class Controller
{

    protected $view;

    public function __construct()
    {
        $this->view = new View;
    }

    /**
     * @return bool
     */
    protected function access()
    {
        return true;
    }

    public function action($action)
    {
        if ($this->access()) {
            $this->$action();
        } else {
            die('Доступ закрыт.');
        }
    }
}
