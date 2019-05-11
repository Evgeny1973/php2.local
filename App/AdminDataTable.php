<?php

namespace App;

use App\View\View;

class AdminDataTable
{

    /**
     * @var array
     */
    protected $models;
    /**
     * @var array
     */
    protected $functions;

    protected $view;

    /**
     * AdminDataTable constructor.
     * @param array $models
     * @param array $functions
     */
    public function __construct(array $models = [], array $functions = [])
    {
        $this->models = $models;
        $this->functions = $functions;
        $this->view = new View;
    }

    public function render(): void
    {
        $cell = [];
        foreach ($this->models as $index => $line) {
            foreach ($this->functions as $key => $column) {
                $cell[$index][$key] = $column($line);
            }
        }

        $this->view->articles = $cell;
        $this->view->display(__DIR__ . '/../templates/admin/admindatatable.php');
    }
}
