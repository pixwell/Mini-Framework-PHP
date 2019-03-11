<?php

namespace App\Controllers;

class PostController
{
    public function index()
    {
        echo 'Post Controller, Action index';
    }
    
    public function show($id, $request)
    {
        echo 'Post ' . $id;
        echo '<pre>';
        print_r($request);
        echo '</pre>';
    }
}