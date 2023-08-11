<?php

namespace App\Interfaces;

interface ShoppingListRepositoryInterface extends CrudInterface
{
    //Handling with protected objects
    public function getModel();
    public function getProduct();
    //Handling dup
    public function clone(int $id);
    public function cloneProduct(int $product_id, array $quantity, int $id);
}