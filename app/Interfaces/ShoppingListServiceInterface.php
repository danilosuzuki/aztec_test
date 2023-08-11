<?php

namespace App\Interfaces;

interface ShoppingListServiceInterface extends CrudInterface
{
    // Handling with dup
    public function cloneShoppingList(int $id);

}