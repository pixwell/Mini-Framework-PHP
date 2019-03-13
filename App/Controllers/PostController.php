<?php

namespace App\Controllers;

use App\Models\Post;
use Core\BaseController;

class PostController extends BaseController
{
    private $postModel;
    
    public function __construct() {
        $this->postModel = new Post();
        $this->view = new \stdClass;
    }

    public function index()
    {
        $this->setPageTitle('Posts');
        $this->view->posts = $this->postModel->all();
        $this->renderView('posts/index', 'layout');
    }
    
    public function show($id, $request)
    {
        echo 'Post ' . $id;
        echo '<pre>';
        print_r($request);
        echo '</pre>';
    }
}