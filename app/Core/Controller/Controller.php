<?php

namespace App\Core\Controller;

use App\Core\Exceptions\ServerErrorException;

abstract class Controller
{
    public function view(string $view, array $data = null)
    {
        if (file_exists(APP_ROOT . '/views/' . $view . '.view.php')) {
            require APP_ROOT . '/views/' . $view . '.view.php';
        } else {
            $e = new ServerErrorException();
            $e->render();
        }
    }

    public function redirect(string $url)
    {
        if (headers_sent() === false) {
            header('Location: ' . $url, true);
        }
        exit();
    }

    public function model(string $modelName)
    {
        $model = 'App\\Models\\' . $modelName;
        return new $model();
    }
}