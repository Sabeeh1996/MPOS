<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReceiveproductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('receiveproduct', function (Blueprint $table) {
            $table->bigIncrements('receive_product_id')->unsigned();
            $table->unsignedBigInteger('product_id');
            $table->float('quantity');
            $table->float('unit_price');
            $table->float('sub_total');
            $table->unsignedBigInteger('supplier_id');
            $table->DateTime('received_date');
            $table->unsignedBigInteger('user_id');


            $table->index('product_id');
            $table->index('supplier_id');
            $table->index('user_id');

            $table->foreign('product_id')->references('product_id')->on('products')->onDelete('cascade');
            $table->foreign('supplier_id')->references('supplier_id')->on('suppliers')->onDelete('cascade');
            $table->foreign('user_id')->references('user_id')->on('users')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('receiveproduct');
    }
}
