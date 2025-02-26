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
        Schema::table('pages', function (Blueprint $table) {
            $table->renameColumn('paragraph1', 'content');
        });

        Schema::table('pages', function (Blueprint $table) {
            $table->longText('content')->nullable()->change();
        });
        Schema::table('pages', function (Blueprint $table) {
            $table->dropColumn(['paragraph2', 'paragraph3']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('pages', function (Blueprint $table) {
            // Đổi lại tên cột content về paragraph1 nếu rollback
            $table->renameColumn('content', 'paragraph1');

            // Thêm lại các cột paragraph2 và paragraph3 nếu rollback
            $table->string('paragraph2')->nullable();
            $table->string('paragraph3')->nullable();
        });
    }
};
