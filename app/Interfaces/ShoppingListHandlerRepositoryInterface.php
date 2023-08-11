<?php

namespace App\Interfaces;

interface ShoppingListHandlerRepositoryInterface
{
    //Handling with protected objects
    public function getmodel();
    public function getProduct();
    public function getModelObject(int $id);

    public function updateProduct(int $product_id, array $quantity, int $id);
    public function createProduct(int $product_id, array $quantity, int $id);
    public function deleteProduct(array $data, int $id);
}