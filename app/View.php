<?php

namespace App;

class View
{
    public function make(array $config)
    {
        $view=$config['view'];
        $data=$config['data'];
        $layout=$config['layout'];
        $lv = $this->renderLayout($layout);
        $cv = $this->renderOnlyView($view,$data);

        return str_replace("{{content}}", $cv, $lv);
    }
    public function renderLayout(string $layout)
    {
        ob_start();
        require_once __DIR__ . "/../views/layouts/$layout.php";
        return ob_get_clean();
    }
    public function renderOnlyView(string $view, $data = [])
    {
        extract($data);
        ob_start();
        require_once __DIR__ . "/../views/$view.php";
        return ob_get_clean();
    }
}
