<?php

namespace App\Classes;

class Uri
{
    private $uri;

    public function __construct()
    {
        $this->uri = $_SERVER['REQUEST_URI'];
    }

    /**
     * @return bool
     */
    public function emptyUri()
    {
        return $this->uri == '/';
    }

    /**
     * @return string $uri
     */
    public function getUri()
    {
        return $this->uri;
    }

}