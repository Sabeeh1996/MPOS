<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvoiceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoice', function (Blueprint $table) {
            $table->bigIncrements('invoice_id')->unsigned();
            $table->unsignedBigInteger('customer_id');
            $table->unsignedBigInteger('payment_type');
            $table->float('total_amount');
            $table->float('amount_tendered');
            $table->dateTime('date_recorded');
            $table->unsignedBigInteger('user_id');

            $table->index('customer_id');
            $table->index('user_id');

            $table->foreign('customer_id')->references('customer_id')->on('customers')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
           // $table->foreign('product_id')->references('product_id')->on('categories')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('invoice');
    }
}
