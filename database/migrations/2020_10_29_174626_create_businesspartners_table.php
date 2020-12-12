<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBusinesspartnersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('businesspartners', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('pro_id');
            $table->integer('partner_type');
            $table->integer('leadtime');
            $table->integer('minimum_buy');
            $table->integer('is_prefered_supplier');
            $table->integer('sts')->default(1);
            $table->string('title');
            $table->string('business_partner_code');
            $table->string('business_partner_product_code');
            $table->string('native_lang_pro_name');
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
        Schema::dropIfExists('businesspartners');
    }
}
