<?php

namespace App\Repositories;

use App\Interfaces\ProductRepositoryInterface;
use App\Interfaces\ShoppingListHandlerRepositoryInterface;
use Illuminate\Database\Eloquent\Model;

class ShoppingListHandlerRepository implements ShoppingListHandlerRepositoryInterface
{
    protected $model;
    protected $productRepository;

    public function __construct(Model $model, ProductRepositoryInterface $productRepository)
    {
        $this->model = $model;
        $this->productRepository = $productRepository;
    }

    public function getModelObject(int $id)
    {
        return $this->model->findOrFail($id)->load('products');
    }

    public function getModel()
    {
        return $this->model;
    }

    public function getProduct()
    {
        return $this->productRepository;
    }

    public function updateProduct(int $product_id, array $quantity, int $id)
    {
        return $this->model->findOrFail($id)->products()
            ->updateExistingPivot($product_id, $quantity);
    }

    public function createProduct(int $product_id, array $quantity, int $id)
    {
        return $this->model->findOrFail($id)->products()
            ->attach($product_id, $quantity);       
    }

    public function deleteProduct(array $data, int $id)
    {
        return $this->model->findOrFail($id)->products()
            ->detach($data['id']); 
    }
    
}