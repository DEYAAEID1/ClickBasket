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
        Schema::table('categories', function (Blueprint $table) {
        $table->dropColumn(['slug', 'is_active', 'meta_title', 'meta_description']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('categories', function (Blueprint $table) {
  $table->string('slug')->unique();
        $table->boolean('is_active')->default(true);
        $table->string('meta_title')->nullable();
        $table->text('meta_description')->nullable();        });
    }
};
