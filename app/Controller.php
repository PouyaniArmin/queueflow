<?php

namespace App;

class Controller
{
    protected string $layout = 'main';

    // Prepares view data and layout information for the router.
    protected function view(string $view, array $data = []): array
    {
        return ['view' => $view, 'data' => $data, 'layout' => $this->layout];
    }

    protected function withLayout(string $layout): void
    {
        $this->layout = $layout;
    }

    // Redirects the current request to the specified path.
    protected function redirectTo(string $view)
    {
        header("Location:/" . $view);
        exit();
    }
}
