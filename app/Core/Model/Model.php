<?php

namespace App\Core\Model;

use App\Core\Database\Database;
use App\Core\Exceptions\ServerErrorException;

abstract class Model extends Database
{
    protected string $tableName;

    public function all(): array
    {
        $products = $this->pdo->prepare("SELECT * FROM $this->tableName");
        $products->execute();
        return $products->fetchAll();
    }

    public function create(array $request)
    {
        $products = $this->pdo->prepare("INSERT INTO $this->tableName (sku, name, price, type, attribute) VALUES (:sku, :name, :price, :type, :attribute)");
        $products->bindParam('sku', $request['sku']);
        $products->bindParam('name', $request['name']);
        $products->bindParam('price', $request['price']);
        $products->bindParam('type', $request['productType']);
        $products->bindParam('attribute', $request['attribute']);
        $new = $products->execute();
        if (!$new) {
            $e = new ServerErrorException();
            $e->render();
        }
    }

    public function delete(array $request)
    {
        foreach ($request as $product) {
            $products = $this->pdo->prepare("DELETE FROM $this->tableName WHERE id = :id");
            $products->bindParam('id', $product);
            $products->execute();
        }
    }
}