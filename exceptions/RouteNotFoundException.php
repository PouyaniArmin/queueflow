<?php
namespace Exceptions;

use Exception;

class RouteNotFoundException extends Exception{
    public function __construct($message="Route Not Found",$code=404)
    {
        parent::__construct($message,$code);
    }
}