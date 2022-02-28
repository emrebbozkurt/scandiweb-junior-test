<?php

use App\Controllers\ProductController;
use App\Core\Request\Request;
use App\Core\Router\Router;

require_once dirname(__DIR__) . '/vendor/autoload.php';
require_once dirname(__DIR__) . '/config/app.php';

define('APP_ROOT', dirname(__DIR__));

$router = new Router(new Request());

$router->get('/', [ProductController::class, 'show']);
$router->post('/', [ProductController::class, 'delete']);

$router->get('/add-product', [ProductController::class, 'add']);
$router->post('/add-product', [ProductController::class, 'create']);

$router->go();
