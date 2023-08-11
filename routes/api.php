<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\ShoppingListController;
use App\Http\Controllers\ShoppingListHandlerController;
use Illuminate\Support\Facades\Route;

//CRUD REST
Route::apiResources([
    'product' => ProductController::class,
    'shopping_list'=> ShoppingListController::class
]);

//Shopping List clone
Route::post('shopping_list/clone_list/{id}',[ShoppingListController::class,'cloneShoppingList']);

//Shopping List handler
Route::post('list_handle/{id}/add_product',[ShoppingListHandlerController::class,'addProduct']);
Route::put('list_handle/{id}/update_product',[ShoppingListHandlerController::class,'updateProduct']);
Route::delete('list_handle/{id}/delete_product',[ShoppingListHandlerController::class,'deleteProduct']);