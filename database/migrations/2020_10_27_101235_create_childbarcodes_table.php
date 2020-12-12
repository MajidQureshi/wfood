<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChildbarcodesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('childbarcodes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('pro_id');
            $table->integer('color_id');
            $table->string('size');
            $table->string('sts')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('childbarcodes');
    }
}
