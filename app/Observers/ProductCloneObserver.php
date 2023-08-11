<?php

namespace App\Observers;

use App\Events\ProductToBeCloned;
use App\Interfaces\ShoppingListHandlerRepositoryInterface;
use App\Repositories\ShoppingListHandlerRepository;

class ProductCloneObserver
{
    protected $shoppingListHandlerRepository;

    public function __construct(ShoppingListHandlerRepository  $shoppingListHandlerRepository)
    {
        $this->shoppingListHandlerRepository = $shoppingListHandlerRepository;
    }

    public function handle(ProductToBeCloned $event)
    {
        $this->shoppingListHandlerRepository->createProduct(
            $event->product_id,
            $event->quantity,
            $event->id
        );

    }
}
