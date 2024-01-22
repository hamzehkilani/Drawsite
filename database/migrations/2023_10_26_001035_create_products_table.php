<?php

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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Add a column for the product name
            $table->text('description'); // Add a column for the product description
            $table->decimal('price', 8, 2); // Add a column for the product price
            $table->string('image'); // Add a column for the product image
            $table->integer('stock_quantity'); // Add a column for the stock quantity
            $table->timestamps();
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
