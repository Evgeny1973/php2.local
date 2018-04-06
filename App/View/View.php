<?php

namespace App\View;

use App\SetGet;

/**
 * Class View
 * @property array $articles
 */
class View {

    use SetGet;

    /**
     * @param $template
     * @return string
     */
    public function render($template) {
        ob_start();
        include $template;
        $page = ob_get_contents();
        ob_end_clean();
        return $page;
    }

    /**
     * @param $template
     */
    public function display($template) {
        echo $this->render($template);
    }
}