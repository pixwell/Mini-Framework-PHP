<?php

namespace App\Controllers;

use Core\BaseController;

class HomeController extends BaseController
{
    public function index()
    {
        $this->view->nome = 'Fulano';
        $this->renderView('home/index', 'layout');
    }
}