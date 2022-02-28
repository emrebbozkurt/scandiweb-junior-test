<?php

namespace App\Models;

class Book extends Product
{
    public function add($request)
    {
        $request['attribute'] = 'Weight: ' . $request['weight'] . 'KG';
        $this->create($request);
    }
}