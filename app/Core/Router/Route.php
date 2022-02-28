<?php

namespace App\Core\Router;

class Route
{
    public string $method;
    public string $path;
    public array $callable;

    function __construct($method, $path, $callable)
    {
        $this->method = $method;
        $this->path = $path;
        $this->callable = $callable;
    }
}