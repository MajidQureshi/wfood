<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomermainsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customermains', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('customer_id');
            $table->integer('business_type');
            $table->integer('industry_nature');
            $table->integer('sales_office_hi');
            $table->integer('business_partner');
            $table->integer('classification');
            $table->integer('group');
            $table->integer('hierarchy');
            $table->integer('rating');
            $table->integer('country');
            $table->integer('city');
            $table->integer('language');
            $table->integer('currency');
            $table->integer('is_this_individual');
            $table->integer('no_of_childrens');
            $table->integer('gender');            
            $table->integer('is_blocked');            
            $table->integer('is_this_lead');            
            $table->integer('is_this_customer');            
            $table->integer('is_this_supplier');            
            $table->integer('is_this_employee');            
            $table->integer('dont_issue_scheme');            
            $table->integer('employee_id');            
            $table->integer('stop_sales');            
            $table->integer('stop_purchases');            
            $table->integer('stop_payments');            
            $table->integer('send_sms');            
            $table->integer('send_email');            
            $table->integer('is_credit_allowed');            
            $table->integer('is_current_cheque');            
            $table->integer('is_post_dated_cheques');            
            $table->integer('credit_days');            
            $table->integer('post_dated_cheques');            
            $table->integer('credit_amount');            
            $table->integer('current_cheque_amount');            
            $table->integer('sts')->default(1);            
            $table->date('dob');
            $table->date('date_of_marriage');
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
        Schema::dropIfExists('customermains');
    }
}
