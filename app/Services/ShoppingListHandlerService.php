<?php

namespace App\Services;

use App\Interfaces\ShoppingListHandlerServiceInterface;
use App\Interfaces\ShoppingListHandlerRepositoryInterface;
use Illuminate\Http\Response;

class ShoppingListHandlerService implements ShoppingListHandlerServiceInterface 
{
    protected $shoppingListHandlerRepository;

    public function __construct(ShoppingListHandlerRepositoryInterface $shoppingListHandlerRepository)
    {
        $this->shoppingListHandlerRepository = $shoppingListHandlerRepository;
    }

    public function addProduct(array $data, int $id)
    {
        try {
            $shoppingList = $this->shoppingListHandlerRepository->getModelObject($id);
            $product = $this->shoppingListHandlerRepository->getProduct()->show($data['id']);
            $quantity = ['quantity' => $data['quantity']];
            $this->shoppingListHandlerRepository->createProduct($product->id, $quantity, $id);
            return $shoppingList->load('products');
        } catch (\Throwable $th) {
            return response()->json($th, Response::HTTP_BAD_REQUEST);
        }
        
    }

    public function updateProduct(array $data, int $id)
    {
        $shoppingList = $this->shoppingListHandlerRepository->getModelObject($id);
        $product = $this->shoppingListHandlerRepository->getProduct()->show($data['id']);
        $quantity = ['quantity' => $data['quantity']];
        $this->shoppingListHandlerRepository->updateProduct($product->id, $quantity, $id);

        return $shoppingList->load('products');
    }

    public function deleteProduct(array $data, int $id)
    {
        $shoppingList = $this->shoppingListHandlerRepository->getModelObject($id);
        $product = $this->shoppingListHandlerRepository->getProduct()->show($data['id']);
        $this->shoppingListHandlerRepository->deleteProduct(['id' => $product->id], $id);
        return $shoppingList->load('products');
    }
}