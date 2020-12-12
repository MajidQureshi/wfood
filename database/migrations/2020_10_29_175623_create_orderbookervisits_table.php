<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderbookervisitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orderbookervisits', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('order_booker_id');
            $table->integer('customer_id');
            $table->integer('order_id');
            $table->string('contact_no');
            $table->date('visit_datetime');
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
        Schema::dropIfExists('orderbookervisits');
    }
}
