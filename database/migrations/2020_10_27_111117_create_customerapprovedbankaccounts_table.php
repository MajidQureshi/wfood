<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomerapprovedbankaccountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customerapprovedbankaccounts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('shop_id');
            $table->integer('bank_id');
            $table->string('bank_branch_name');
            $table->string('bank_account_no');
            $table->string('swift_code');
            $table->integer('country_id');
            $table->string('ref_no');
            $table->mediumText('details');
            $table->string('sts')->default(1);
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
        Schema::dropIfExists('customerapprovedbankaccounts');
    }
}
