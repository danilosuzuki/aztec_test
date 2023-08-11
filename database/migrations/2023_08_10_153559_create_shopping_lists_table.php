<?php

use App\Models\Product;
use App\Models\ShoppingList;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('shopping_lists', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->timestamps();
        });

        Schema::create('product_shopping_list', function (Blueprint $table) {
            $table->foreignIdFor(ShoppingList::class)->onDelete('cascade');
            $table->foreignIdFor(Product::class)->onDelete('cascade');
            $table->integer('quantity');
            $table->unique(['shopping_list_id', 'product_id']);//constraint to pair of foreignKey
        });

        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('shopping_lists');
        Schema::dropIfExists('shopping_list_product');
    }
};
