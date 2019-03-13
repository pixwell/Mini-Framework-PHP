<?php

namespace Core;

class Container
{
    public static function newController($controller)
    {
        $objController = 'App\\Controllers\\' . $controller;
        return new $objController;
    }
    
    public static function pageNotFound(){
        if (file_exists(__DIR__ . '/../App/Views/404.phtml')) {
            require __DIR__ . '/../App/Views/404.phtml';
        } else {
            echo 'Erro: arquivo de View 404 não existe.';
        }
    }
}
