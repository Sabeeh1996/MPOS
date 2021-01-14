<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {

            $table->bigIncrements('product_id')->unsigned();
            $table->unsignedBigInteger('brand_id');
            $table->text('Product_Description');
            $table->unsignedBigInteger('unit_id');
            $table->unsignedBigInteger('category_id');
            $table->integer('Unit_in_Stock');
            $table->double('Unit_Price');
            $table->text('Discount_Percentage');
            $table->unsignedBigInteger('user_id');

            $table->index('unit_id');
            $table->index('brand_id');
            $table->index('category_id');
            $table->index('user_id');

            $table->foreign('brand_id')->references('brand_id')->on('brands')->onDelete('cascade');
            $table->foreign('unit_id')->references('unit_id')->on('productunit')->onDelete('cascade');
            $table->foreign('category_id')->references('category_id')->on('categories')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');




        });
    }



    public function down()
    {

        Schema::dropIfExists('products');
    }
}