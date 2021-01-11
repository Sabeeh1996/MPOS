<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSuppliersTable extends Migration
{
    public function up()
    {
        Schema::create('suppliers', function (Blueprint $table) {

            $table->bigIncrements('supplier_id')->unsigned();
            $table->string('supplier_code',25);
            $table->string('supplier_name',35);
            $table->string('supplier_contact',15);

            $table->text('supplier_address');
            $table->string('email',60);



        });
    }



    public function down()
    {

        Schema::dropIfExists('suppliers');
    }
}