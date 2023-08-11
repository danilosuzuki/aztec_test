<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductShoppingListRequests\AddProductListRequest;
use App\Http\Requests\ProductShoppingListRequests\DeleteProductListRequest;
use App\Http\Requests\ProductShoppingListRequests\UpdateProductListRequest;
use App\Interfaces\ShoppingListHandlerServiceInterface;
use Illuminate\Http\Response;

class ShoppingListHandlerController extends Controller
{
    protected $shoppingListHandlerService;

    public function __construct(ShoppingListHandlerServiceInterface $shoppingListHandlerService)
    {
        $this->shoppingListHandlerService = $shoppingListHandlerService;
    }

    public function addProduct(AddProductListRequest $request, int $id){
        try {
            $shopping_list = $this->shoppingListHandlerService->addProduct($request->all(),$id);
            return response()->json($shopping_list, Response::HTTP_CREATED);
        } catch (\Throwable $th) {
            return response()->json($th, Response::HTTP_BAD_REQUEST);
        }
    }

    public function updateProduct(UpdateProductListRequest $request, int $id){
        try {
            $shopping_list = $this->shoppingListHandlerService->updateProduct($request->all(),$id);
            return response()->json($shopping_list, Response::HTTP_OK);
        } catch (\Throwable $th) {
            return response()->json($shopping_list, Response::HTTP_BAD_REQUEST);
        }
    }

    public function deleteProduct(DeleteProductListRequest $request, int $id)
    {
        try {
            $shopping_list = $this->shoppingListHandlerService->deleteProduct($request->only('id'),$id);
            return response()->json($shopping_list, Response::HTTP_OK);
        } catch (\Throwable $th) {
            return response()->json($shopping_list, Response::HTTP_BAD_REQUEST);
        }
    }
}
