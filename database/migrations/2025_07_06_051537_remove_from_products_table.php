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
    //Schema::table('products', function (Blueprint $table) {
      //  $table->dropColumn(['slug','short_description','sku','sale_price','min_quantity','weight','dimensions','is_featured','meta_title','meta_description','rating_average','rating_count']); 
   // });
}

public function down()
{
   // Schema::table('products', function (Blueprint $table) {
       // $table->unsignedBigInteger(['slug','short_description','sku','sale_price','min_quantity','weight','dimensions','is_featured','meta_title','meta_description','rating_average','rating_count']); 
   // });
}
};
