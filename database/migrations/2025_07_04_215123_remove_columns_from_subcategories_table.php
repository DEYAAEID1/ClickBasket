<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::table('subcategories', function (Blueprint $table) {
        // حذف الأعمدة
        $table->dropColumn(['slug', 'is_active', 'meta_title', 'meta_description']);
    });
}

public function down()
{
    Schema::table('subcategories', function (Blueprint $table) {
        // إعادة إضافة الأعمدة في حالة التراجع
        $table->string('slug')->unique();
        $table->boolean('is_active')->default(true);
        $table->string('meta_title')->nullable();
        $table->text('meta_description')->nullable();
    });
}
};
