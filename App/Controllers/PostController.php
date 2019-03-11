<?php

namespace App\Controllers;

class PostController
{
    public function index()
    {
        echo 'Post Controller, Action index';
    }
    
    public function show($id)
    {
        echo 'Post ' . $id;
    }
}