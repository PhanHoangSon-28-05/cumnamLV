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
        Schema::table('checkout_product_items', function (Blueprint $table) {
            $table->string('fabric')->nullable();
            $table->float('price')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('checkout_product_items', function (Blueprint $table) {
            $table->dropColumn('fabric');
            $table->dropColumn('price');
        });
    }
};
