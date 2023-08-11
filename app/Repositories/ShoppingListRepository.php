<?php

namespace App\Repositories;

use App\Interfaces\ProductRepositoryInterface;
use App\Interfaces\ShoppingListRepositoryInterface;
use App\Models\Product;
use Illuminate\Database\Eloquent\Model;

class ShoppingListRepository implements ShoppingListRepositoryInterface
{
    protected $model;
    protected $productRepository;

    public function __construct(Model $model, ProductRepositoryInterface $productRepository)
    {
        $this->model = $model;
        $this->productRepository = $productRepository;
    }

    public function getModel()
    {
        return $this->model;
    }

    public function getProduct()
    {
        return $this->productRepository;
    }

    public function index()
    {
        return $this->model->get()->load('products');
    }

    public function store(array $data)
    {
        return $this->model->create($data);
    }

    public function show(int $id)
    {
        return $this->model->findOrFail($id)->load('products');
    }

    public function update(array $data, int $id)
    {
        return $this->model->findOrFail($id)->update($data);
    }

    public function destroy(int $id)
    {
        return $this->model->findOrFail($id)->delete();
    }

    public function clone(int $id)
    {
        return $this->model->create(['title' => $this->model->findOrFail($id)->title]);
    }

    public function cloneProduct(int $product_id, array $quantity, int $id)
    {
        return $this->model->findOrFail($id)->products()
        ->attach($product_id, $quantity);    
    }

    
}