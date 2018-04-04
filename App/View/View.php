<?php

namespace App\View;

use App\GetSet;

/**
 * Class View
 * @property array $articles
 */
class View {

    use GetSet;

    public function render($template) {
        ob_start();
        include $template;
        $page = ob_get_contents();
        ob_end_clean();
        return $page;
    }

    public function display($template) {
        echo $this->render($template);
    }
}