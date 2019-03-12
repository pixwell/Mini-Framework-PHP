<?php

namespace App\Controllers;

use Core\BaseController;

class HomeController extends BaseController
{
    public function index()
    {
        $this->setPageTitle('Home');
        $this->view->nome = 'Fulano';
        $this->renderView('home/index', 'layout');
    }
}