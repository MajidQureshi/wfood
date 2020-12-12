<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePricreditlmtdivTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('principlecreditlimitdivisions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('customer_id');
            $table->integer('principle');
            $table->integer('division');
            $table->integer('is_credit_allowed');
            $table->integer('credit_allowed_amount');
            $table->integer('is_current_credit_allowed');
            $table->integer('curent_credit_allowed_amount');
            $table->integer('is_post_dated_cheque_allowed');
            $table->integer('post_dated_cheque_allowed_amt');
            $table->integer('is_stop_sales');
            $table->integer('is_stop_sales_return');
            $table->integer('credit_allowed_days');
            $table->date('effective_from_date');
            $table->date('to_date');
            $table->mediumText('details');
            $table->integer('is_active')->default(1); 
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
        Schema::dropIfExists('principlecreditlimitdivisions');
    }
}
