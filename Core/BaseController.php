<?php

namespace Core;

abstract class BaseController
{
    protected $view;
    private $viewPath;
    private $baseLayout;
    private $pageTitle = null;

    public function __construct()
    {
        $this->view = new \stdClass();
    }
    
    /**
     * Define o caminho da view
     * @param string $path
     */
    protected function renderView($path, $baseLayoutPath = null)
    {
        $this->viewPath = $path;
        $this->baseLayout = $baseLayoutPath;
        
        if($baseLayoutPath){
            $this->contentLayoutBase();
        } else {            
            $this->contentView();
        }
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
    /**
     * Traz o conteudo do layout base
     */
    protected function contentLayoutBase() {
        if( file_exists(__DIR__ . '/../App/Views/' . $this->baseLayout . '.phtml') ){
            require __DIR__ . '/../App/Views/' . $this->baseLayout . '.phtml';
        } else {
            echo 'Erro: arquivo de layout base não existe.';
        }
    }
    
    protected function setPageTitle($strPageTitle)
    {
        $this->pageTitle = $strPageTitle;
    }
    
    protected function getPageTitle($separator)
    {
        if($separator){
            echo $this->pageTitle . ' ' . $separator . ' ';
        } else {
            echo $this->pageTitle;
        }
    }
}
