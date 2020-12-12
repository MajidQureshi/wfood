<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePriceHistoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('price_histories', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->integer('pro_id');
            $table->integer('cost_price');
            $table->integer('sale_price');
            $table->integer('retail_price');
            $table->integer('rate_for_all_branches');
            $table->date('effective_from_date');
            $table->date('to_date');
            $table->string('branches');
            $table->integer('sts')->default(1);            
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
        Schema::dropIfExists('price_histories');
    }
}
