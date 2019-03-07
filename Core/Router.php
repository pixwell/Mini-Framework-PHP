<?php

namespace Core;

class Router
{
    public function getUrl()
    {
        $url = filter_input(INPUT_SERVER, REQUEST_URI);
        return parse_url($url, PHP_URL_PATH);
    }
}