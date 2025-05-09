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
        Schema::table('checkout_products', function (Blueprint $table) {
            $table->float('option_price')->default(0);
            $table->longText('detail')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('checkout_products', function (Blueprint $table) {
            $table->dropColumn('option_price');
            $table->dropColumn('detail');
        });
    }
};
