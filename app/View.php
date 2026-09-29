<?php

namespace App;

class View
{
    // Renders the view inside the selected layout and replaces the content placeholder.
    public function make(array $config)
    {
        $view = $config['view'];
        $data = $config['data'];
        $layout = $config['layout'];

        $lv = $this->renderLayout($layout);
        $cv = $this->renderOnlyView($view, $data);

        return str_replace("{{content}}", $cv, $lv);
    }

    // Renders a layout file and captures its output.
    public function renderLayout(string $layout)
    {
        ob_start();
        require_once __DIR__ . "/../views/layouts/$layout.php";
        return ob_get_clean();
    }

    // Extracts view data, renders the view file, and captures its output.
    public function renderOnlyView(string $view, $data = [])
    {
        extract($data);
        ob_start();
        require_once __DIR__ . "/../views/$view.php";
        return ob_get_clean();
    }
}
