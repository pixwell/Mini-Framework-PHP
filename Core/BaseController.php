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
        $this->contentView();
    }
    
    /**
     * Traz o conteudo da view
     */
    protected function contentView() {
        if( file_exists(__DIR__ . '/../App/Views/' . $this->viewPath . '.phtml') ){
            require __DIR__ . '/../App/Views/' . $this->viewPath . '.phtml';
        } else {
            echo 'Erro: arquivo de View não existe.';
        }
    }
}
