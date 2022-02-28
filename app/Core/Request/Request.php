<?php

namespace App\Core\Request;

class Request
{
    public function __construct()
    {
        $this->getParams();
    }

    public function getPath(): string
    {
        $path = $_SERVER['REQUEST_URI'] ?? '/';
        $position = strpos($path, '?');

        if ($position === false) {
            return $path;
        }

        return substr($path, 0, $position);
    }

    public function getMethod(): string
    {
        $method = strtolower($_SERVER['REQUEST_METHOD']);

        if (isset($this->method)) {
            $method = $this->method;
        }
        return $method;
    }

    public function getParams(): array
    {
        $data = $_REQUEST;

        foreach ($data as $key => $value) {
            if (is_string($value)) {
                $this->$key = htmlspecialchars(stripslashes($value));
            } else {
                $this->$key = $value;
            }
        }

        return $data;
    }
}