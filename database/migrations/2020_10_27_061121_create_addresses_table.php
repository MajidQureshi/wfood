<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAddressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('addresses', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('customer_id');
            $table->mediumText('address');
            $table->integer('country');
            $table->integer('postal_code');
            $table->string('country_region', 200);
            $table->string('district', 200);
            $table->integer('purpose_of_address');
            $table->integer('city');
            $table->string('po_box', 200);
            $table->string('provience', 200);
            $table->string('tehsil', 200);
            $table->string('long_latitude', 200);
            $table->integer('is_active');
            $table->mediumText('contact_details');
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
        Schema::dropIfExists('addresses');
    }
}
