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
        Schema::create('product_items', function (Blueprint $table) {
            $table->id();
            $table->integer('id_product')->nullable();
            $table->integer('id_color')->nullable();
            $table->integer('id_item')->nullable();
            $table->string('image')->nullable();
            $table->string('name')->nullable();
            $table->integer('priceNew')->nullable();
            $table->integer('priceOld')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_items');
    }
};
