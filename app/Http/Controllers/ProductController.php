<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequests\CreateProductRequest;
use App\Http\Requests\ProductRequests\UpdateProductRequest;
use App\Interfaces\ProductServiceInterface;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ProductController extends Controller
{
    protected $productService;

    public function __construct(ProductServiceInterface $productService)
    {
        $this->productService = $productService;
    }

    public function index()
    {
        try {
            $products = $this->productService->index();
            return response()->json(['data' => $products], 200);
        } catch (\Throwable $th) {
            return response()->json($th, Response::HTTP_BAD_REQUEST);
        }
    }

    public function store(CreateProductRequest $request)
    {
        try{
            $product = $this->productService->store($request->only('name'));
            return response()->json($product, 201);
        } catch (\Throwable $th) {
            return response()->json($th, Response::HTTP_BAD_REQUEST);
        }   
    }

    public function show(int $id)
    {
        try{
            return $this->productService->show($id);
        } catch (\Throwable $th) {
            return response()->json($th, Response::HTTP_BAD_REQUEST);
        }
    }

    public function update(UpdateProductRequest $request, int $id)
    {
        try{
            $product = $this->productService->update($request->only('name'),$id);
            return response()->json($product, 200);
        } catch (\Throwable $th) {
            return response()->json($th, Response::HTTP_BAD_REQUEST);
        }
    }

    public function destroy(int $id)
    {
        try{
            $this->productService->destroy($id);
            return response()->json(['message' => 'Product deleted'], 200);
        } catch (\Throwable $th) {
            return response()->json($th, Response::HTTP_BAD_REQUEST);
        }  
    }
}
