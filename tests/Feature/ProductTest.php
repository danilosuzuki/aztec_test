<?php

use App\Models\Product;

it('should create a product', function () {
    $data = ['name' => 'product test 1']; //JSON to be sent
    $response = $this->postJson('/product',$data); //POST to URL
    $response->assertStatus(201)
        ->assertJson(['name' => 'product test 1']); //Verify if status is 201 and product info
});

it('should retrieve a product', function () {
    $product = Product::factory()->create(); //Create a Product to test
    $response = $this->get('/product/'.$product->id); //GET to URL
    $response->assertStatus(200)
        ->assertJson(['id' => $product->id]); //Verify if status is 200 and product info
});

it('should update a product', function () {
    $product = Product::factory()->create(); //Create a Product to test
    $data = ['name' => 'product test updated 1']; //JSON to be sent
    $response = $this->putJson('/product/'.$product->id, $data); //PUT to URL with data
    $response->assertStatus(200); //Verify if status is 200
    $response = $this->get('/product/'.$product->id); //GET to URL
    $response->assertStatus(200)
        ->assertJson(['name' => 'product test updated 1']); //Verify if status is 200 and if product info is updated
});

it('should delete a product', function () {
    $product = Product::factory()->create(); //Create a Product to test
    $response = $this->deleteJson('/product/' . $product->id); //DELETE to URL with data
    $response->assertStatus(200)
        ->assertJson(['message' => 'Product deleted']); //Verify if status is 200 and if message says that was deleted
    $this->assertDatabaseMissing('products', ['id' => $product->id]); //Double checking if the product is missing from database
});

it('should list all products', function () {
    Product::factory(5)->create(); //Create 5 products to test
    $response = $this->get('/product'); //GET to URL
    $response->assertStatus(200)
        ->assertJsonCount(5, 'data'); //Verify if status is 200 and if we have 5 products in json array
});
