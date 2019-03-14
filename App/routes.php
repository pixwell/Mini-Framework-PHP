<?php
/*
|--------------------------------------------------------------------------
| Tabela de rotas (Routing table)
|--------------------------------------------------------------------------|
| Aqui serao definidas as rotas de sistema.
|
*/

return [
    //[Rota, controller@ation]
    ['/', 'HomeController@index'],
    ['/posts', 'PostController@index'],
    ['/post/{id}/show', 'PostController@show'],
    ['/post/create', 'PostController@create'],
    ['/post/store', 'PostController@store']
];

