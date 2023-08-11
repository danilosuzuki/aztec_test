<?php

namespace App\Providers;

use App\Events\ProductToBeCloned;
use App\Interfaces\ProductRepositoryInterface;
use App\Interfaces\ProductServiceInterface;
use App\Interfaces\ShoppingListHandlerRepositoryInterface;
use App\Interfaces\ShoppingListHandlerServiceInterface;
use App\Interfaces\ShoppingListRepositoryInterface;
use App\Interfaces\ShoppingListServiceInterface;
use App\Models\Product;
use App\Models\ShoppingList;
use App\Repositories\ProductRepository;
use App\Repositories\ShoppingListHandlerRepository;
use App\Repositories\ShoppingListRepository;
use App\Services\ProductService;
use App\Services\ShoppingListHandlerService;
use App\Services\ShoppingListService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $interfaceImplementation = [
            ProductServiceInterface::class => ProductService::class,
            ProductRepositoryInterface::class => ProductRepository::class,

            ShoppingListServiceInterface::class => ShoppingListService::class,
            ShoppingListRepositoryInterface::class => ShoppingListRepository::class,

            ShoppingListHandlerServiceInterface::class => ShoppingListHandlerService::class,
            ShoppingListHandlerRepositoryInterface::class => ShoppingListHandlerRepository::class,
        ];

        $models = [
            ProductRepository::class => Product::class,
            ShoppingListRepository::class => [ShoppingList::class, ProductRepository::class],
            ShoppingListHandlerRepository::class => [ShoppingList::class, ProductRepository::class],
        ];

        foreach ($interfaceImplementation as $interface => $implementation) {
            $this->app->bind($interface, $implementation);
        }

        foreach ($models as $class => $model) {
            $this->app->bind($class, function ($app) use ($class, $model) {
                if (is_array($model)) {
                    return new $class(new $model[0],app(...array_slice($model,1)));
                } else {
                    return new $class(new $model());
                }
            });
        }

    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
