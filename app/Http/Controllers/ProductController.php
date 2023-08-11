<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequests\CreateProductRequest;
use App\Http\Requests\ProductRequests\UpdateProductRequest;
use App\Interfaces\ProductServiceInterface;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    protected $productService;

    public function __construct(ProductServiceInterface $productService)
    {
        $this->productService = $productService;
    }

    public function index()
    {
        $products = $this->productService->index();
        return response()->json(['data' => $products], 200);
    }

    public function store(CreateProductRequest $request)
    {
        $product = $this->productService->store($request->only('name'));
        return response()->json($product, 201);
    }

    public function show(int $id)
    {
        return $this->productService->show($id);
    }

    public function update(UpdateProductRequest $request, int $id)
    {
        $product = $this->productService->update($request->only('name'),$id);
        return response()->json($product, 200);
    }

    public function destroy(int $id)
    {
        $this->productService->destroy($id);
        return response()->json(['message' => 'Product deleted'], 200);
    }
}
