<?php

namespace App\Services;

use App\Interfaces\ProductRepositoryInterface;
use App\Interfaces\ProductServiceInterface;

class ProductService implements ProductServiceInterface 
{
    protected $productRepository;

    public function __construct(ProductRepositoryInterface $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    public function index()
    {
        return $this->productRepository->index();
    }

    public function store(array $data)
    {
        return $this->productRepository->store($data);
    }

    public function show(int $id)
    {
        return $this->productRepository->show($id);
    }

    public function update(array $data, int $id)
    {
        return $this->productRepository->update($data,$id);
    }

    public function destroy(int $id)
    {
        return $this->productRepository->destroy($id);
    }

}