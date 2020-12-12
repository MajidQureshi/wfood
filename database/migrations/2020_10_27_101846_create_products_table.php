<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('category_id');
            $table->integer('segment_id');
            $table->integer('brand_id');
            $table->integer('sku_group_id');
            $table->string('sts')->default(1);
            $table->string('is_approved')->default(0);
            $table->integer('sku_id');
            $table->integer('in_stock')->default(0);
            $table->string('title')->unique();
            $table->string('short_name');
            $table->string('principle_erp_product_code');
            $table->date('launch_date');
            $table->date('opening_date');
            $table->date('closing_date');
            $table->mediumText('map_code');
            $table->mediumText('details');
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
        Schema::dropIfExists('products');
    }
}
