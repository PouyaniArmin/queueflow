<?php

namespace App;

class Request
{

    public function url(): string
    {
        $path = $_SERVER['REQUEST_URI'];
        if (($pos = strpos($path, '?')) !== false) {
            $path = substr($path, 0, $pos);
        }
        return $path === '/' ? $path : rtrim($path, '/');
    }
    public function method(): string
    {
        return strtolower($_SERVER['REQUEST_METHOD']);
    }

    public function getHttpVersion(): string
    {
        return $_SERVER['SERVER_PROTOCOL'];
    }   
    public function getQueryString()
    {
        return $_SERVER['QUERY_STRING'];
    }
}
