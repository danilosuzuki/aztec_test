<?php

namespace App\Services;

use App\Events\ProductToBeCloned;
use App\Interfaces\ShoppingListRepositoryInterface;
use App\Interfaces\ShoppingListServiceInterface;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Log;

class ShoppingListService implements ShoppingListServiceInterface 
{
    protected $shoppingListRepository;

    public function __construct(ShoppingListRepositoryInterface $shoppingListRepository)
    {
        $this->shoppingListRepository = $shoppingListRepository;
    }

    public function index()
    {
        try {
            return $this->shoppingListRepository->index();
        } catch (\Throwable $th) {
            return response()->json($th, Response::HTTP_BAD_REQUEST);
        }   
    }

    public function store(array $data)
    {
        try {
            return $this->shoppingListRepository->store($data);
        } catch (\Throwable $th) {
            return response()->json($th, Response::HTTP_BAD_REQUEST);
        }
    }

    public function show(int $id)
    {
        try {
            return $this->shoppingListRepository->show($id);
        } catch (\Throwable $th) {
            return response()->json($th, Response::HTTP_BAD_REQUEST);
        }
    }

    public function update(array $data, int $id)
    {
        try {
            return $this->shoppingListRepository->update($data,$id);
        } catch (\Throwable $th) {
            return response()->json($th, Response::HTTP_BAD_REQUEST);
        }   
    }

    public function destroy(int $id)
    {
        try {
            return $this->shoppingListRepository->destroy($id);
        } catch (\Throwable $th) {
            return response()->json($th, Response::HTTP_BAD_REQUEST);
        }
    }

    public function cloneShoppingList(int $id)
    {
        try {
            $replicated = $this->shoppingListRepository->clone($id);
            
            $products = $this->shoppingListRepository->show($id)->products()->get();
            foreach ($products as $key => $value) {
                $quantity = ['quantity' => $value->pivot->quantity];
                $this->shoppingListRepository->cloneProduct($value->id, $quantity, $replicated->id);
            }
            
            return $replicated->load('products');
        } catch (\Throwable $th) {
            return response()->json($th, Response::HTTP_BAD_REQUEST);
        }

    }
}