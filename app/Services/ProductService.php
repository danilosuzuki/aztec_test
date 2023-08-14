<?php

namespace App\Services;

use App\Interfaces\ProductRepositoryInterface;
use App\Interfaces\ProductServiceInterface;
use Illuminate\Http\Response;

class ProductService implements ProductServiceInterface 
{
    protected $productRepository;

    public function __construct(ProductRepositoryInterface $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    public function index()
    {
        try {
            return $this->productRepository->index();
        } catch (\Throwable $th) {
            return response()->json($th, Response::HTTP_BAD_REQUEST);
        }   
    }

    public function store(array $data)
    {
        try {
            return $this->productRepository->store($data);
        } catch (\Throwable $th) {
            return response()->json($th, Response::HTTP_BAD_REQUEST);
        }
    }

    public function show(int $id)
    {
        try {
            return $this->productRepository->show($id);
        } catch (\Throwable $th) {
            return response()->json($th, Response::HTTP_BAD_REQUEST);
        }
    }

    public function update(array $data, int $id)
    {
        try {
            return $this->productRepository->update($data,$id);
        } catch (\Throwable $th) {
            return response()->json($th, Response::HTTP_BAD_REQUEST);
        }
    }

    public function destroy(int $id)
    {
        try {
            return $this->productRepository->destroy($id);
        } catch (\Throwable $th) {
            return response()->json($th, Response::HTTP_BAD_REQUEST);
        }
    }

}