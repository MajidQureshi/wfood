<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductofficesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productoffices', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('pro_id');
            $table->integer('sale_office');
            $table->integer('sale_office_hierarchy_id');
            $table->date('to_date');
            $table->string('details');
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
        Schema::dropIfExists('productoffices');
    }
}
