<?php
//Variavel com o arquivo de rotas
$routeFile = require_once __DIR__ . '/../App/routes.php';
//Instanciando a classe Router e passando a tabela de rotas (Table Routing)
$route = new Core\Router($routeFile);
