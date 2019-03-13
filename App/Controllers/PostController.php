<?php

namespace App\Controllers;

use App\Models\Post;
use Core\Database;

class PostController
{
    private $postModel;
    
    public function __construct() {
        $this->postModel = new Post();
    }

    public function index()
    {
        $posts = $this->postModel->all();
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