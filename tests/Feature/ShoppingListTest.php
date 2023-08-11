<?php

use App\Models\Product;
use App\Models\ShoppingList;
use Illuminate\Foundation\Testing\DatabaseTransactions;

it('should create a shopping list', function () {
    $data = ['title' => 'shopping list test 1']; // JSON to be sent
    $response = $this->postJson('/shopping_list',$data); // POST to URL
    $response->assertStatus(201)
        ->assertJson(['title' => 'shopping list test 1']); // Verify if status is 201 and list info
});

it('should retrieve a shopping lists', function () {
    $shoppingList = ShoppingList::factory()->create(); // Create a ShoppingList to test
    $response = $this->get('/shopping_list/'.$shoppingList->id); // GET to URL
    $response->assertStatus(200)
        ->assertJson(['id' => $shoppingList->id]); // Verify if status is 200 and list info
});

it('should update a shopping lists', function () {
    $shoppingList = ShoppingList::factory()->create(); // Create a ShoppingList to test
    $data = ['title' => 'shopping list test updated 1']; // JSON to be sent
    $response = $this->putJson('/shopping_list/'.$shoppingList->id, $data); // PUT to URL with data
    $response->assertStatus(200); // Verify if status is 200
    $response = $this->get('/shopping_list/'.$shoppingList->id); //GET to URL
    $response->assertStatus(200)
        ->assertJson(['title' => 'shopping list test updated 1']); // Verify if status is 200 and if list info is updated
});

it('should delete a shopping lists', function () {
    $shoppingList = ShoppingList::factory()->create(); // Create a ShoppingList to test
    $response = $this->deleteJson('/shopping_list/' . $shoppingList->id); // DELETE to URL with data
    $response->assertStatus(200)
        ->assertJson(['message' => 'List deleted']); // Verify if status is 200 and if message says that was deleted
    $this->assertDatabaseMissing('shopping_lists', ['id' => $shoppingList->id]); // Double checking if the list is missing from database
});

it('should list all shopping lists', function () {
    ShoppingList::factory(5)->create(); // Create 5 lists to test
    $response = $this->get('/shopping_list'); // GET to URL
    $response->assertStatus(200)
        ->assertJsonCount(5, 'data'); // Verify if status is 200 and if we have 5 lists in json array
});

it('should clone a shopping list with its products', function(){
    $shoppingList = ShoppingList::factory()->create(); // Create a ShoppingList to test
    $product = Product::factory()->create(); // Create a Product to test
    $data = ["id" => $product->id, "quantity" => 3]; // Product to be added + quantity
    $response = $this->postJson('/list_handle/'.$shoppingList->id.'/add_product',$data); // GET to URL
    $response->assertStatus(201);
    expect($shoppingList->products->contains($product))->toBeTrue();
    $count = ShoppingList::count();
    $response = $this->postJson('/shopping_list/clone_list/'.$shoppingList->id); // GET to URL
    expect(ShoppingList::count())->toBe($count+1);


});