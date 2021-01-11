<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSuppliersTable extends Migration
{
    public function up()
    {
        Schema::create('suppliers', function (Blueprint $table) {

            $table->bigIncrements('product_id')->unsigned();
            $table->string('brand',25);
            $table->text('Product_Description');

            $table->unsignedBigInteger('unit_id');
            $table->unsignedBigInteger('category_id');


            $table->integer('Unit_in_Stock');
            $table->double('Unit_Price');
            $table->text('Discount_Percentage');
            // $table->integer('Reorder_Level');

            $table->unsignedBigInteger('user_id');

            $table->index('unit_id');
            $table->index('category_id');
            $table->index('user_id');


            $table->foreign('unit_id')->references('unit_id')->on('productunit');
            //->onDelete('cascade');
            $table->foreign('category_id')->references('category_id')->on('categories');
            //->onDelete('cascade');

            //$table->foreign('order_id')->references('id')->on('orders');
            $table->foreign('user_id')->references('user_id')->on('users');
            //->onDelete('cascade');



        });
    }



    public function down()
    {

        Schema::dropIfExists('suppliers');
    }
}