<?php

namespace Core;

abstract class BaseController
{
    protected $view;

    public function __construct() {
        $this->view = new \stdClass();
    }

}
