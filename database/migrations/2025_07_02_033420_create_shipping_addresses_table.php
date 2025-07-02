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
    Schema::create('shipping_addresses', function (Blueprint $table) {
        $table->bigIncrements('id');
        $table->unsignedBigInteger('order_id');
        $table->string('first_name', 100);
        $table->string('last_name', 100);
        $table->string('company', 100)->nullable();
        $table->string('address_line_1', 255);
        $table->string('address_line_2', 255)->nullable();
        $table->string('city', 100);
        $table->string('state', 100)->nullable();
        $table->string('postal_code', 20);
        $table->string('country', 100);
        $table->string('phone', 20)->nullable();
        $table->timestamps();

        // العلاقة مع جدول orders
        $table->foreign('order_id')->references('id')->on('orders')->onDelete('cascade');
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('shipping_addresses');
    }
};
