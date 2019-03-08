<?php

namespace Core;

class Router
{
    private $routes;
    
    public function __construct(array $routeParam)
    {
        $this->routes = $routeParam;
        $this->run();
    }
    
    private function getUrl()
    {
        $url = filter_input(INPUT_SERVER, 'REQUEST_URI');
        return parse_url($url, PHP_URL_PATH);
    }
    
    private function run(){
        //URL do browser
        $urlArray = $this->pathFiltered( $this->getUrl() );
        print_r($urlArray);
        echo '<br>';
        
        foreach ($this->routes as $route) {
            $routeArray = $this->pathFiltered( $route[0] );
            echo '<br>';
            print_r($routeArray);
            
            for($i = 0; $i < count($routeArray); $i++){
                if ((strpos($routeArray[$i], "{") !== false) && (count($urlArray) == count($routeArray))) {
                    $routeArray[$i] = $urlArray[$i];
                    $param[] = $urlArray[$i];
                }
                $route[0] = implode($routeArray, '/');
            }
        }
        if (implode($urlArray, '/') == $route[0]) {
            echo '<br> Válido';
            echo '<br> <b>URL:</b> ' . implode($urlArray, '/') . ' <b>Rota:</b> ' . $route[0];
        } else {
            echo '<br> INválido';
            echo '<br> <b>URL:</b> ' . implode($urlArray, '/') . ' <b>Rota:</b> ' . $route[0];
        }
    }
    
    /**
     * Filtra a URL retirando os itens vazio/nulos e reseta as chaves do array
     * @param string $path
     * @return array
     */
    private function pathFiltered($path)
    {
        if( !empty($path) ){
            //Explodindo nas barras e retirando os itens vazios ou nulos
            $filtering = array_filter( explode('/', $path) );
            //Reordenando/resetando as chaves do array
            return array_values($filtering);            
        }
    }
}