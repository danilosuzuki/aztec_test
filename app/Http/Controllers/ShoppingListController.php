<?php

namespace App\Http\Controllers;

use App\Http\Requests\ShoppingListRequests\CreateShoppingListRequest;
use App\Http\Requests\ShoppingListRequests\UpdateShoppingListRequest;
use App\Interfaces\ShoppingListServiceInterface;
use Illuminate\Http\Response;

class ShoppingListController extends Controller
{

    protected $shoppingListService;

    public function __construct(ShoppingListServiceInterface $shoppingListService)
    {
        $this->shoppingListService = $shoppingListService;
    }

    public function index()
    {
        try {
            $shopping_list = $this->shoppingListService->index();
            return response()->json(['data' => $shopping_list], Response::HTTP_OK);
        } catch (\Throwable $th) {
            return response()->json($th, Response::HTTP_BAD_REQUEST);
        }
    }

    public function store(CreateShoppingListRequest $request)
    {
        try {
            $shopping_list = $this->shoppingListService->store($request->only('title'));
            return response()->json($shopping_list, Response::HTTP_CREATED);
        } catch (\Throwable $th) {
            return response()->json($th, Response::HTTP_BAD_REQUEST);
        }
    }

    public function show(int $id)
    {
        try {
            return $this->shoppingListService->show($id);
        } catch (\Throwable $th) {
            return response()->json($th, Response::HTTP_BAD_REQUEST);
        }
    }

    public function update(UpdateShoppingListRequest $request, int $id)
    {
        try {
            $shopping_list = $this->shoppingListService->update($request->only('title'),$id);
            return response()->json($shopping_list, Response::HTTP_OK);
        } catch (\Throwable $th) {
            return response()->json($th, Response::HTTP_BAD_REQUEST);
        }   
    }

    public function destroy(int $id)
    {
        try {
            $this->shoppingListService->destroy($id);
            return response()->json(['message' => 'List deleted'], Response::HTTP_OK);
        } catch (\Throwable $th) {
            return response()->json($th, Response::HTTP_BAD_REQUEST);
        }
    }

    public function cloneShoppingList(int $id)
    {
        try {
            $shopping_list = $this->shoppingListService->cloneShoppingList($id);
            return response()->json($shopping_list, Response::HTTP_OK);
        } catch (\Throwable $th) {
            return response()->json($th, Response::HTTP_BAD_REQUEST);
        }
        
    }
}
