<?php

namespace App\Controllers;

use App\Models\Post;
use Core\Database;

class PostController
{
    public function index()
    {
        $model = new Post(Database::connDB());
        $posts = $model->all();
        var_dump($posts);
    }
    
    public function show($id, $request)
    {
        echo 'Post ' . $id;
        echo '<pre>';
        print_r($request);
        echo '</pre>';
    }
}