<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('title', 100);
            $table->string('description', 500);
            $table->string('slug', 100)->unique();
            $table->char('sku', 10)->unique();
            $table->decimal('price', 10, 2);
    
            // subcategory_id ?????????????? multi-level varying depth
            // inventory_id
            // discount_id
            // merchant_id

            // $table->bigInteger('brand_id')->unsigned()->nullable();
            // $table->foreign('brand_id')->references('id')->on('brands');

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('products');
    }
}
