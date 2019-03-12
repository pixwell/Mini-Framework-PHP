<?php

namespace App\Controllers;

class HomeController
{
    private $view;
    
    public function __construct() {
        $this->view = new \stdClass();
    }
    
    public function index()
    {
        $this->view->nome = 'Fulano';
        require __DIR__ . '/../views/home/index.phtml';
    }
}