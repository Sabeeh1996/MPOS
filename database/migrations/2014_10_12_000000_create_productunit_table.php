<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductUnitTable extends Migration
{
    public function up()
    {
        Schema::create('productunit', function (Blueprint $table) {

            $table->bigIncrements('unit_id')->unsigned();
            $table->string('unit_name',10);



        });
    }



    public function down()
    {
        Schema::dropIfExists('productunit');
    }
}