<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShopsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shops', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('country_id');
            $table->integer('region_id');
            $table->integer('zone_id');
            $table->integer('territory_id');
            $table->integer('subterritory_id');
            $table->integer('section_id');
            $table->string('title')->unique();
            $table->string('customer_name', 100);
            $table->string('account_id', 100);
            $table->string('contact_person_name', 100);
            $table->string('business_partner', 100);
            $table->string('name_in_native', 100);
            $table->string('old_code', 100);
            $table->string('map_code', 100);
            $table->string('account_id_name', 100);
            $table->string('account_structure_code', 100);
            $table->string('account_structure_error', 100);
            $table->string('lead_time', 100);
            $table->string('insurance_rate', 100);
            $table->integer('name_to_be_pri');
            $table->integer('cloud_office');
            $table->integer('cloud_business');
            $table->integer('is_this_urban');
            $table->integer('created_by_user');
            $table->integer('is_approved');
            $table->integer('is_active');
            $table->integer('is_cash_discount');
            $table->integer('deduct_freight');
            $table->mediumText('address');
            $table->date('opening_date');
            $table->date('closing_date');
            $table->timestamps();
        });
    }
Schema::create('pricreditlmtsdiv', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('customer_id');
            $table->integer('principle');
            $table->integer('division');
            $table->integer('is_credit_allowed');
            $table->integer('credit_allowed_days');


            $table->integer('credit_allowed_amount');
            $table->integer('is_current_credit_allowed');
            $table->integer('curent_credit_allowed_amount');
            $table->integer('is_post_dated_cheque_allowed');
            $table->integer('post_dated_cheque_allowed_amount');
            $table->integer('is_stop_sales');
            $table->integer('is_stop_sales_return');
            $table->integer('credit_allowed_days');
            $table->date('effective_from_date');
            $table->date('to_date');
            $table->mediumText('details');
            $table->integer('is_active')->default(1); 
            $table->timestamps();
        });
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('shops');
    }
}
