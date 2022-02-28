<?php

namespace App\Models;

class Furniture extends Product
{
    public function add($request)
    {
        $request['attribute'] = 'Dimension: ' . $request['height'] . 'x' . $request['width'] . 'x' . $request['length'];
        $this->create($request);
    }
}