<?php

namespace App\Controllers;

use App\Core\Controller\Controller;
use App\Models\Product;

class ProductController extends Controller
{
    public function show()
    {
        $products = new Product();
        $this->view('product-list', $products->all());
    }

    public function add()
    {
        $this->view('product-add');
    }

    public function create()
    {
        $request = $_REQUEST;
        $product = $this->model(ucfirst($request['productType']));
        $product->add($request);
        $this->redirect('/');
    }

    public function delete()
    {
        $request = $_REQUEST;
        $product = new Product();
        $product->delete($request);
        $this->redirect('/');
    }
}