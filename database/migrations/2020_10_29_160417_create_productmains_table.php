<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductmainsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productmains', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('product_id');
            $table->integer('dept_id');
            $table->integer('classification_id');
            $table->integer('division');
            $table->integer('brand');
            $table->integer('variant');
            $table->integer('abc_indicator');
            $table->integer('principle');
            $table->integer('min_qty');
            $table->integer('max_qty');
            $table->integer('re_order_level_qty');
            $table->integer('min_order_qty');
            $table->integer('max_order_qty');
            $table->integer('po_qty_tolerence');
            $table->integer('size_pkg');
            $table->integer('color');
            $table->integer('pieces_in_pack');
            $table->integer('pieces_in_carton');
            $table->integer('per_piece_gram_or_ml');
            $table->integer('pieces_in_msu');
            $table->integer('cases_per_pallet');
            $table->integer('cost_price');
            $table->integer('sales_price');
            $table->integer('retail_price');
            $table->integer('is_imported');
            $table->integer('is_saleable');
            $table->integer('is_purchaseable');            
            $table->integer('office_selection');
            $table->integer('is_asset');
            $table->integer('maintain_inventory');
            $table->integer('maintain_serial');
            $table->integer('maintain_batch');
            $table->string('catalog_design');
            $table->string('article_part_no');
            $table->string('registration_no');
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
        Schema::dropIfExists('productmains');
    }
}
