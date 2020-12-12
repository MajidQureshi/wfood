<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStocksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stocks', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('pro_id');
            $table->integer('cat_id');
            $table->integer('segment_id');
            $table->integer('brand_id');
            $table->integer('skugroup_id');
            $table->integer('sku_id');
            $table->integer('qty');
            $table->date('effective_date');
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
        Schema::dropIfExists('stocks');
    }
}
