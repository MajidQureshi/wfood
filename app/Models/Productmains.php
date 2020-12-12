<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Model;

class Productmains extends Model
{
    use CrudTrait;

    /*
    |--------------------------------------------------------------------------
    | GLOBAL VARIABLES
    |--------------------------------------------------------------------------
    */

    protected $table = 'productmains';
    // protected $primaryKey = 'id';
    // public $timestamps = false;
    protected $guarded = ['id'];
    protected $fillable = ["PRINCIPLE_ORDER", 
"DISTRIBUTOR_ORDER", 
"MOBILE_ORDER", 
"PRODUCT_ID", 
"DEPT_ID", 
"CLASSIFICATION_ID", 
"DIVISION", 
"BRAND", 
"VARIANT", 
"ABC_INDICATOR", 
"PRINCIPLE", 
"MIN_QTY", 
"MAX_QTY", 
"RE_ORDER_LEVEL_QTY", 
"MIN_ORDER_QTY", 
"MAX_ORDER_QTY", 
"PO_QTY_TOLERENCE", 
"SIZE_PKG", 
"COLOR", 
"PIECES_IN_PACK", 
"PIECES_IN_CARTON", 
"PER_PIECE_GRAM_OR_ML", 
"PIECES_IN_MSU", 
"CASES_PER_PALLET", 
"COST_PRICE", 
"SALES_PRICE", 
"RETAIL_PRICE", 
"IS_IMPORTED", 
"IS_SALEABLE", 
"IS_PURCHASEABLE", 
"OFFICE_SELECTION", 
"IS_ASSET", 
"MAINTAIN_INVENTORY", 
"MAINTAIN_SERIAL", 
"MAINTAIN_BATCH", 
"CATALOG_DESIGN", 
"ARTICLE_PART_NO", 
"REGISTRATION_NO"];
    // protected $hidden = [];
    // protected $dates = [];

    /*
    |--------------------------------------------------------------------------
    | FUNCTIONS
    |--------------------------------------------------------------------------
    */

    /*
    |--------------------------------------------------------------------------
    | RELATIONS
    |--------------------------------------------------------------------------
    */

    /*
    |--------------------------------------------------------------------------
    | SCOPES
    |--------------------------------------------------------------------------
    */

    /*
    |--------------------------------------------------------------------------
    | ACCESSORS
    |--------------------------------------------------------------------------
    */

    /*
    |--------------------------------------------------------------------------
    | MUTATORS
    |--------------------------------------------------------------------------
    */
}
