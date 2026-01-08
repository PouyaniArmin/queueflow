<?php

namespace App;

class Controller
{
    protected string $layout='main';
    protected function view(string $view,array $data=[]):array{
        return ['view'=>$view,'data'=>$data,'layout'=>$this->layout];
    }
    protected function withLayout(string $layout):void{
        $this->layout=$layout;
    }
}