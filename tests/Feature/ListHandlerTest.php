<?php

use App\Models\Product;
use App\Models\ShoppingList;

it('should add a product to a shopping list', function () {
    $shoppingList = ShoppingList::factory()->create(); // Create a ShoppingList to test
    $product = Product::factory()->create(); // Create a Product to test
    $data = ["id" => $product->id, "quantity" => 3]; // Product to be added + quantity
    $response = $this->postJson('/list_handle/'.$shoppingList->id.'/add_product',$data); // GET to URL
    $response->assertStatus(201);
    expect($shoppingList->products->contains($product))->toBeTrue();
});

it('should update a product from a shopping list', function () {
    $shoppingList = ShoppingList::factory()->create(); // Create a ShoppingList to test
    $product = Product::factory()->create(); // Create a Product to test
    $data = ["id" => $product->id, "quantity" => 3]; // Product to be added + quantity
    $response = $this->postJson('/list_handle/'.$shoppingList->id.'/add_product',$data); // GET to URL
    $response->assertStatus(201);
    expect($shoppingList->products->contains($product))->toBeTrue();
    $dataUpdate = ["id" => $product->id, "quantity" => 5]; // Product to be updated + quantity
    $response = $this->putJson('/list_handle/'.$shoppingList->id.'/update_product',$dataUpdate); // GET to URL
    $response->assertStatus(200);
    $shoppingList->refresh();
    $updatedProduct = $shoppingList->products->find($product->id);
    expect($updatedProduct->pivot->quantity)->toBe(5); // Verify the updated quantity
});

it('should remove a product from a shopping list', function () {
    $shoppingList = ShoppingList::factory()->create(); // Create a ShoppingList to test
    $product = Product::factory()->create(); // Create a Product to test
    $data = ["id" => $product->id, "quantity" => 3]; // Product to be added + quantity
    $response = $this->postJson('/list_handle/'.$shoppingList->id.'/add_product',$data); // GET to URL
    $response->assertStatus(201);
    expect($shoppingList->products->contains($product))->toBeTrue();
    $dataDelete = ["id" => $product->id]; // Product to be removed
    $response = $this->deleteJson('/list_handle/'.$shoppingList->id.'/delete_product',$dataDelete); // GET to URL
    $response->assertStatus(200);
    $shoppingList->refresh();
    expect($shoppingList->products->contains($product))->toBeFalse();
});