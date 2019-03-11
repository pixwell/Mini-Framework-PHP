<?php

namespace Core;

class Router
{
    private $routes;
    
    public function __construct(array $routeParam)
    {
        $this->mapRoute($routeParam);
        $this->run();
    }
    
    private function getUrl()
    {
        $url = filter_input(INPUT_SERVER, 'REQUEST_URI');
        return parse_url($url, PHP_URL_PATH);
    }
    
    private function mapRoute($routes){
        //Recebendo o table routing
        foreach ( $routes as $route ){
            //Explodindo o Controller@action
            $controllerAction = explode('@', $route[1]);
            //Criando array com rota, Controller e Action
            $mapItem = [ $route[0], $controllerAction[0], $controllerAction[1] ];
            //Incluindo cada item em um array
            $mappedRoutes[] = $mapItem;
        }
        $this->routes = $mappedRoutes;
    }

    private function run(){
        //URL do browser
        $urlArray = $this->pathFiltered( $this->getUrl() );

        foreach ($this->routes as $route) {
            $routeArray = $this->pathFiltered( $route[0] );

            for($i = 0; $i < count($routeArray); $i++){
                if ((strpos($routeArray[$i], "{") !== false) && (count($urlArray) == count($routeArray))) {
                    $routeArray[$i] = $urlArray[$i];
                    $param[] = $urlArray[$i];
                }
                $route[0] = implode($routeArray, '/');
            }
        }
        if (implode($urlArray, '/') == $route[0]) {
            echo '<b>Rota:</b> ' . $route[0] . ' <br><b>Controller:</b> ' . $route[1] . ' <br><b>Action:</b> ' . $route[2] . ' <br><b>Param:</b> ' . $param[0];
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