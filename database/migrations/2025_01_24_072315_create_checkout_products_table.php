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
        Schema::create('checkout_products', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('checkout_id')->nullable();
            $table->unsignedBigInteger('product_id')->nullable();
            $table->float('width')->default(0);
            $table->float('height')->default(0);
            $table->float('price')->default(0);
            $table->float('total_price')->default(0);
            $table->bigInteger('amount')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('checkout_products');
    }
};
