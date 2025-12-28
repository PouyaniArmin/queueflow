<?php 
namespace App;
class Request{
    
    public function url(){
        $path=$_SERVER['REQUEST_URI'];
        $possition=strpos($path,"?");
        if (!$possition) {
           return $path;
        }
        return substr($path,0,$possition);
    }
    public function method():string{
        return strtolower($_SERVER['REQUEST_METHOD']);
    }
}