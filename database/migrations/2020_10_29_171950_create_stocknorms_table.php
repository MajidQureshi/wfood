<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStocknormsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stocknorms', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('product_id');
            $table->integer('sales_office_id');
            $table->integer('warehouse_id');
            $table->integer('min_qty');
            $table->integer('max_qty');
            $table->integer('re_order_level_qty');
            $table->integer('lead_time_transfer');
            $table->mediumText('details');
            $table->string('refernce_no');
            $table->integer('qty_to_order');
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
        Schema::dropIfExists('stocknorms');
    }
}
