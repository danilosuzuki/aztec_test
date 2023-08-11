<?php

namespace App\Events;

use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class ProductToBeCloned
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $id, $quantity, $product_id;

    public function __construct($product_id, $quantity, $id)
    {
        $this->id = $id;
        $this->quantity = $quantity;
        $this->product_id = $product_id;
    }
}
