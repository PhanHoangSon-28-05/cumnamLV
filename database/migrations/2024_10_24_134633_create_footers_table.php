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
        Schema::create('footers', function (Blueprint $table) {
            $table->id();
            $table->string('title1');
            $table->string('content11');
            $table->string('content12');
            $table->string('content13');
            $table->string('content14');
            $table->string('title2');
            $table->string('content21');
            $table->string('content22');
            $table->string('content23');
            $table->string('title3');
            $table->string('content31');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('footers');
    }
};
