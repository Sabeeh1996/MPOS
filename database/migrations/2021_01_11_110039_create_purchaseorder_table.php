<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePurchaseorderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('purchaseorder', function (Blueprint $table) {
            $table->bigIncrements('purchase_order_id')->unsigned();
            $table->string('supplier_code',25);
            $table->float('quantity');
            $table->float('unit_price');
            $table->float('sub_total');
            $table->unsignedBigInteger('supplier_id');
            $table->DateTime('date');
            $table->unsignedBigInteger('user_id');

            $table->index('supplier_id');
            $table->index('user_id');

            $table->foreign('supplier_id')->references('supplier_id')->on('suppliers')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('purchaseorder');
    }
}
