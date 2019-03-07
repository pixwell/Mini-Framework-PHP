<?php

namespace Core;

class Router
{
    private $routes;
    
    public function __construct(array $routeParam)
    {
        $this->routes = $routeParam;
    }
    
    public function getUrl()
    {
        $url = filter_input(INPUT_SERVER, REQUEST_URI);
        return parse_url($url, PHP_URL_PATH);
    }
}