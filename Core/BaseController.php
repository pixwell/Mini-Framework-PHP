<?php

namespace Core;

abstract class BaseController
{
    protected $view;
    private $viewPath;

    public function __construct()
    {
        $this->view = new \stdClass();
    }
    
    /**
     * Define o caminho da view
     * @param string $path
     */
    protected function renderView($path)
    {
        $this->viewPath = $path;
    }
}
