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
    Schema::create('products', function (Blueprint $table) {
        $table->bigIncrements('id');
        $table->unsignedBigInteger('category_id');
        $table->unsignedBigInteger('subcategory_id');
        $table->string('name');
        $table->string('slug')->unique(); 
        $table->longText('description')->nullable();
        $table->text('short_description')->nullable();
        $table->string('sku', 100)->unique();
        $table->decimal('price', 10, 2); // السعر الرسمي للبيع بدون اضافة اجور توصيل او شحن او الجمرك
        $table->decimal('sale_price', 10, 2)->nullable(); // بحال كان في خصمومات فقديش بصير السعر بعد الخصم
        $table->decimal('cost_price', 10, 2)->nullable(); // كم طالع المنتج على المشتري 
        $table->integer('stock_quantity')->default(0); // قديش  انا عندي كمية من نفس المنتج
        $table->integer('min_quantity')->default(1);  //قديش اقل كمية بيقدر الزبون يشتريها 
        $table->decimal('weight', 8, 2)->nullable();
        $table->string('dimensions')->nullable(); // ابعاد المنتج بحال كان عبارة عن كرتونة مثلا فقديش طولها وعرض وارتفاع عشان الشحن 
        $table->boolean('is_active')->default(true);
        $table->boolean('is_featured')->default(false);
        $table->boolean('manage_stock')->default(true); // خاص بتتبع الكمية تلقائيا
        $table->enum('stock_status', ['in_stock', 'out_of_stock', 'on_backorder'])->default('in_stock');
        $table->string('image')->nullable();
        $table->json('gallery')->nullable(); // نوعه JSON وهو مصفوفة صور اذا في للمنتج اكثر من صورة
        $table->string('meta_title')->nullable(); // عنوان المنتج لمحركات البحث (SEO)يُفضّل يكون قصير + يشمل كلمات مفتاحية
       $table->text('meta_description')->nullable(); //  وصف قصير مخصص لمحركات البحث لازم يكون مغري + واضح + كلمات مفتاحية
        $table->decimal('rating_average', 2, 1)->default(0.0); // نسبة تقييم الزباين له من 100
        $table->integer('rating_count')->default(0); // كم عدد الاشخاص اللي قيموه للمنتج
        $table->timestamps();

        // العلاقات
        $table->foreign('category_id')->references('id')->on('categories');
        $table->foreign('subcategory_id')->references('id')->on('subcategories');
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
