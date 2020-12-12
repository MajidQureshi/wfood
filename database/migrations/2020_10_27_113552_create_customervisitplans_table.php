<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomervisitplansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customervisitplans', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->integer('customer_id');
            $table->integer('delivery_man');
            $table->integer('visting_person');
            $table->string('visitor_name');            
            $table->string('vehicle');            
            $table->string('contact_no');            
            $table->date('delivery_date');
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
        Schema::dropIfExists('customervisitplans');
    }
}
