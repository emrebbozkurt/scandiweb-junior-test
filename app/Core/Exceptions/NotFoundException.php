<?php

namespace App\Core\Exceptions;

use Exception;

class NotFoundException extends Exception
{
    function render()
    {
        http_response_code(404);
        require APP_ROOT . '/views/errors/404.view.php';
        die();
    }
}