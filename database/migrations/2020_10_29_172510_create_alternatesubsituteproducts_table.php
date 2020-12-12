<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAlternatesubsituteproductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alternatesubsituteproducts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('alt_pro_bar_code', 100);
            $table->integer('is_allow_usr_manually_sel_list');
            $table->integer('is_use_code_if_stock_end');
            $table->integer('sort_by');
            $table->integer('color');
            $table->integer('cost_price');
            $table->integer('sales_price');
            $table->integer('retail_price');
            $table->integer('matching_with_base_product');
            $table->string('alt_pro_id_name', 100);
            $table->date('effective_from_date');
            $table->date('to_date');
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
        Schema::dropIfExists('alternatesubsituteproducts');
    }
}
