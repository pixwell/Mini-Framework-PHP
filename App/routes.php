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
    ['/posts/{id}/show', 'PostController@index'],
];

