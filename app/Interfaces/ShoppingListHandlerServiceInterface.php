<?php

namespace App\Interfaces;

interface ShoppingListHandlerServiceInterface
{
    // Handling with 1 product
    public function addProduct(array $data, int $id);
    public function updateProduct(array $data, int $id); // Change with quantity
    public function deleteProduct(array $data, int $id); // Completly remove a product from a list
}