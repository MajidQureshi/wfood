<?php

namespace Backpack\CRUD\app\Http\Controllers\Operations;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use App\Models\Products;
use App\Models\Stocknorms;
use App\Models\Businesspartners;
use App\Models\Skuses;
use App\Models\Productmains;
use App\Models\Departments;
use App\Models\Classifications;
use App\Models\AbcIndicators;
use App\Models\Principles;
use App\Models\Divisions;
use App\Models\Brands;
use App\Models\Variants;
use App\Models\Skugroups;
use App\Models\Colors;
use App\Models\Warehouses;
use App\Models\Salesoffices;
use App\Models\Otherlanguages;
use App\Models\Sizes;
use App\Models\Alternatesubsituteproducts;
use App\Models\Salestaxes;
use App\Models\Productoffices;
use App\Models\Characteristics;
use App\Models\Childbarcodes;
use App\Models\Schemesinfos;
use App\Models\Pricehistories;

trait ProductCreateOperation
{
    /**
     * Define which routes are needed for this operation.
     *
     * @param string $segment    Name of the current entity (singular). Used as first URL segment.
     * @param string $routeName  Prefix of the route name.
     * @param string $controller Name of the current CrudController.
     */
    protected function setupCreateRoutes($segment, $routeName, $controller)
    {
        Route::get($segment.'/create', [
            'as'        => $routeName.'.create',
            'uses'      => $controller.'@create',
            'operation' => 'create',
        ]);

        Route::get($segment.'/createchild', [
            'as'        => $routeName.'.createchild',
            'uses'      => $controller.'@createchild',
            'operation' => 'create',
        ]);

        Route::post($segment, [
            'as'        => $routeName.'.store',
            'uses'      => $controller.'@store',
            'operation' => 'create',
        ]);
    }

    /**
     * Add the default settings, buttons, etc that this operation needs.
     */
    protected function setupCreateDefaults()
    {
        $this->crud->allowAccess('create');

        $this->crud->operation('create', function () {
            $this->crud->loadDefaultOperationSettingsFromConfig();
            $this->crud->setupDefaultSaveActions();
        });

        $this->crud->operation('list', function () {
            $this->crud->addButton('top', 'create', 'view', 'crud::buttons.create');
        });
    }

    /**
     * Show the form for creating inserting a new row.
     *
     * @return Response
     */
    public function create()
    {
        $this->crud->hasAccessOrFail('create');

        // prepare the fields you need to show
        $this->data['crud'] = $this->crud;
        $this->data['saveAction'] = $this->crud->getSaveAction();
        $this->data['title'] = $this->crud->getTitle() ?? trans('backpack::crud.add').' '.$this->crud->entity_name;

        // load the view from /resources/views/vendor/backpack/crud/ if it exists, otherwise load the one in the package
        return view($this->crud->getCreateView(), $this->data);
    }

    public function createchild()
    {
        $this->crud->hasAccessOrFail('create');

        // prepare the fields you need to show
        $this->data['crud'] = $this->crud;
        $this->data['saveAction'] = $this->crud->getSaveAction();
        $this->data['title'] = $this->crud->getTitle() ?? trans('backpack::crud.add').' '.$this->crud->entity_name;
        $this->data['departments'] = Departments::get()->toArray('id', 'title');
        $this->data['classifications'] = Classifications::get()->toArray('id', 'title');
        $this->data['abc_indicators'] = AbcIndicators::get()->toArray('id', 'title');
        $this->data['principles'] = Principles::get()->toArray('id', 'title');
        $this->data['divisions'] = Divisions::get()->toArray('id', 'title');
        $this->data['brands'] = Brands::get()->toArray('id', 'title');
        $this->data['variants'] = Variants::get()->toArray('id', 'title');
        $this->data['product_groups'] = Skugroups::get()->toArray('id', 'title');
        $this->data['colors'] = Colors::get()->toArray('id', 'title');
        $this->data['sale_offices'] = Salesoffices::get()->toArray('id', 'title');
        $this->data['warehouses'] = Warehouses::get()->toArray('id', 'title');
        $this->data['skuses'] = Skuses::get()->toArray('id', 'title');
        $this->data['languages'] = Otherlanguages::get()->toArray('id', 'lname');
        $this->data['sizes'] = Sizes::get()->toArray('id', 'title');
            
        // dd($this->data['departments']);
        // load the view from /resources/views/vendor/backpack/crud/ if it exists, otherwise load the one in the package
        // dd($this->crud->getCreateView());
        // return view($this->crud->getCreateView(), $this->data);
        return view("crud::createchild", $this->data);
        
    }

    /**
     * Store a newly created resource in the database.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store()
    {

        
        $req = $this->crud->getRequest()->request->all();

        $p_attr = Skuses::where('id', $req['product_groups'])->get();
        
        // dd($req);

        $this->crud->hasAccessOrFail('create');

        // execute the FormRequest authorization and validation, if one is required
        $request = $this->crud->validateRequest();

        // insert item in the db

        // Products
        $pro = new Products;

        $pro->category_id = $p_attr[0]->cat_id;
        $pro->segment_id = $p_attr[0]->segment_id;
        $pro->brand_id = $p_attr[0]->brand_id;
        $pro->sku_group_id = $p_attr[0]->sku_group_id;
        $pro->sku_id = $req['product_groups'];
        $pro->product_bar_code = $req['product_bar_code'];
        $pro->old_product_code = $req['old_product_code'];
        $pro->title = $req['title'];
        $pro->short_name = $req['short_name'];
        $pro->launch_date = $req['launch_date'];
        $pro->principle_erp_product_code = $req['principle_erp_product_code'];
        $pro->opening_date = $req['opening_date'];
        $pro->closing_date = $req['closing_date'];
        $pro->details = $req['details'];
        $pro->map_code = $req['map_code'];
        $pro->is_approved = $req['is_approved'];
        $pro->is_active = isset($req['is_active']) ? $req['is_active'] : 0;
        $pro->free_flow = isset($req['free_flow']) ? $req['free_flow'] : 0;
        $pro->print_short_name = isset($req['print_short_name']) ? $req['print_short_name'] : 0;

        $pro->save();
        $lastInsertId = $pro->id;
        // dd($req);
        // Productmains
        DB::table('productmains')->insert([
            'product_id' => $lastInsertId,
            'DEPT_ID' => $req['departments'],
            'CLASSIFICATION_ID' => $req['classifications'],
            'ABC_INDICATOR' => $req['abc_indicators'],
            'PRINCIPLE' => $req['principles'], 
            'DIVISION' => $req['divisions'], 
            'BRAND' => $req['brands'],
            'VARIANT' => $req['variants'],
            'MIN_QTY' => $req['min_qty'],
            'MAX_QTY' => $req['max_qty'],
            'RE_ORDER_LEVEL_QTY' => $req['re_order_level_qty'],
            'MIN_ORDER_QTY' => $req['min_order_qty'],
            'MAX_ORDER_QTY' => $req['max_order_qty'],
            'PO_QTY_TOLERENCE' => $req['po_qty_tolerence'],
            'COLOR' => $req['colors'],
            'CATALOG_DESIGN' => $req['catalog_design'],
            'ARTICLE_PART_NO' => $req['article_part'],
            'REGISTRATION_NO' => $req['registration'],
            'PIECES_IN_PACK' => $req['pieces_pack'],
            'PIECES_IN_CARTON' => $req['pieces_carton'],
            'PER_PIECE_GRAM_OR_ML' => $req['pieces_gramage'],
            'PIECES_IN_MSU' => $req['pieces_msu'],
            'CASES_PER_PALLET' => $req['cases_per_pallet'],
            'COST_PRICE' => $req['cost_price'],
            'SALES_PRICE' => $req['sales_price'],
            'RETAIL_PRICE' => $req['retail_price'],
            'PRINCIPLE_ORDER' => $req['principle_order'],
            'DISTRIBUTOR_ORDER' => $req['distributor_order'],
            'MOBILE_ORDER' => $req['mobile_order'],
            'IS_IMPORTED' => isset($req['is_imported']) ? $req['is_imported'] : 0,
            'IS_PURCHASEABLE' => isset($req['is_purchaseable']) ? $req['is_purchaseable'] : 0,
            'IS_SALEABLE' => isset($req['is_saleable']) ? $req['is_saleable'] : 0,
            'IS_ASSET' => isset($req['is_asset']) ? $req['is_asset'] : 0,
            'MAINTAIN_INVENTORY' => isset($req['maintain_inventory']) ? $req['maintain_inventory'] : 0,
            'MAINTAIN_SERIAL' => isset($req['maintain_serial']) ? $req['maintain_serial'] : 0,
            'MAINTAIN_BATCH' => isset($req['maintain_batch']) ? $req['maintain_batch'] : 0,
            'OFFICE_SELECTION' => $req['office_selection'],

        ]);        

        dd($req);
        // Stocknorms
        $stock_norms_data[] = [];
        foreach($req['sale_offices'] as $key => $sale_office){
            $stocknorms = new Stocknorms;
            
            $stocknorms->product_id = $lastInsertId;
            $stocknorms->SALES_OFFICE_ID = $sale_office;
            $stocknorms->WAREHOUSE_ID = $req['warehouses'][$key];
            $stocknorms->MIN_QTY = $req['stocknorms_min_qty'][$key];
            $stocknorms->MAX_QTY = $req['stocknorms_max_qty'][$key];
            $stocknorms->RE_ORDER_LEVEL_QTY = $req['stocknorms_reorder_level_qty'][$key];
            $stocknorms->LEAD_TIME_TRANSFER = $req['stocknorms_leadtime_transfer'][$key];
            $stocknorms->DETAILS = $req['stocknorms_details'][$key];
            $stocknorms->REFERNCE_NO = $req['stocknorms_ref_no'][$key];

            $stocknorms->save();
        }
        

        // Business Partners
        // $business_partners_data[] = [];
        foreach($req['partner_type'] as $key => $p_type){
            
            $business_partners = new Businesspartners;

            $business_partners->PRO_ID = $lastInsertId;
            $business_partners->PARTNER_TYPE = $p_type;
            $business_partners->LEADTIME = $req['leadtime'][$key];
            $business_partners->MINIMUM_BUY =  $req['minimum_buy'][$key];
            $business_partners->IS_PREFERED_SUPPLIER = $req['is_prefered_supplier'][$key];
            // $business_partners->TITLE = $lastInsertId;
            $business_partners->BUSINESS_PARTNER_CODE = $req['business_partner_code'][$key];
            $business_partners->BUSINESS_PARTNER_PRODUCT_CODE = $req['business_partner_product_code'][$key];
            $business_partners->NATIVE_LANG_PRO_NAME = $req['native_lang_pro_name'][$key];

            $business_partners->save();

        }


        // Alt/Subsitude Product
        // $alt_subsitude_data[] = [];
        // foreach($req['alt_pro_bar_code'] as $key => $alt_pro_bcode){
            
        //     $alt_subsitude_data = new Alternatesubsituteproducts;

        //     $alt_subsitude_data->PRO_ID = $lastInsertId;
        //     $alt_subsitude_data->ALT_PRO_BAR_CODE = $alt_pro_bcode;
        //     $alt_subsitude_data->ALT_PRO_ID_NAME = $req['alt_pro_id_name'][$key];
        //     $alt_subsitude_data->IS_ALLOW_USR_MANUALLY_SEL_LIST =  $req['is_allow_usr_manually_sel_list'][$key];
        //     $alt_subsitude_data->IS_ALLOW_USR_MANUALLY_SEL_LIST = $req['is_use_code_if_stock_end'][$key];
        //     $alt_subsitude_data->COLOR = $req['alt_color'][$key];
        //     $alt_subsitude_data->SORT_BY = $req['alt_sort_by'][$key];
        //     $alt_subsitude_data->EFFECTIVE_FROM_DATE = $req['alt_effective_from_date'][$key];
        //     $alt_subsitude_data->TO_DATE = $req['alt_to_date'][$key];

        //     $alt_subsitude_data->COST_PRICE = $req['alt_cost_price'][$key];
        //     $alt_subsitude_data->SALES_PRICE = $req['alt_sales_price'][$key];
        //     $alt_subsitude_data->RETAIL_PRICE = $req['alt_retail_price'][$key];

        //     $alt_subsitude_data->save();

        // }




        // Other Languages
        // $other_languages_data[] = [];
        foreach($req['ol_language'] as $key => $ol_language){
            
            $other_languages_data = new Otherlanguages;

            $other_languages_data->PRO_ID = $lastInsertId;
            $other_languages_data->LANG_ID = $ol_language;
            $other_languages_data->LNAME = $req['ol_name'][$key];
            $other_languages_data->SHORT_NAME =  $req['ol_short_name'][$key];
            $other_languages_data->DETAILS = $req['ol_details'][$key];
            $other_languages_data->IS_ACTIVE = $req['ol_is_active'][$key];
            
            $other_languages_data->save();

        }


        // Sales Tax
        // $other_languages_data[] = [];
        foreach($req['st_group_code'] as $key => $st_group_code){
            
            $sales_tax_data = new Salestaxes;

            $sales_tax_data->PRO_ID = $lastInsertId;
            $sales_tax_data->ST_GROUP_ID = $st_group_code;
            $sales_tax_data->EFFECTIVE_FROM_DATE = $req['st_effective_from_date'][$key];
            $sales_tax_data->TO_DATE = $req['st_to_date'][$key];
            $sales_tax_data->VALIDATE_FROM_DATE =  $req['st_validate_from_date'][$key];
            $sales_tax_data->VALIDATE_TO_DATE = $req['st_validate_to_date'][$key];
            // $sales_tax_data->NAME = $req['ol_is_active'][$key];
            $sales_tax_data->STS = $req['st_is_active'][$key];
            
            $sales_tax_data->save();

        }


        // Product Offices
        // $other_languages_data[] = [];
        foreach($req['so_sales_office'] as $key => $so_sales_office){
            
            $pro_office_data = new Productoffices;

            $pro_office_data->PRO_ID = $lastInsertId;
            $pro_office_data->SALE_OFFICE = $so_sales_office;
            $pro_office_data->SALE_OFFICE_HIERARCHY_ID = $req['so_hierarchy_code'][$key];
            $pro_office_data->EFFECTIVE_FROM_DATE = $req['so_effective_from_date'][$key];
            $pro_office_data->TO_DATE = $req['so_to_date'][$key];
            $pro_office_data->DETAILS =  $req['so_details'][$key];
            $pro_office_data->STS = 1;
                        
            $pro_office_data->save();

        }



        // Characteristics
        // $other_languages_data[] = [];
        foreach($req['ch_name'] as $key => $ch_name){
            
            $ch_data = new Characteristics;

            $ch_data->PRO_ID = $lastInsertId;
            $ch_data->CNAME = $ch_name;
            $ch_data->SHORT_NAME = $req['ch_short_name'][$key];
            $ch_data->SORT_BY = $req['ch_sort_by'][$key];
            $ch_data->VALUEOF_C = $req['ch_value'][$key];
            $ch_data->STS =  $req['ch_is_active'][$key];
                                   
            $ch_data->save();

        }



        // Child Barcodes
        // $other_languages_data[] = [];
        foreach($req['cb_color'] as $key => $cb_color){
            
            $cb_data = new Childbarcodes;

            $cb_data->PRO_ID = $lastInsertId;
            $cb_data->COLOR_ID = $cb_color;
            $cb_data->SIZE = $req['cb_size'][$key];
            $cb_data->STS =  1;
                                   
            $cb_data->save();

        }



        // Scheme Information
        // $other_languages_data[] = [];
        // foreach($req['si_name'] as $key => $si_name){
            
        //     $si_data = new Schemesinfos;

        //     $si_data->PRO_ID = $lastInsertId;
        //     $si_data->SCHEME_TYPE = $req['si_scheme_type'][$key];
        //     $si_data->EFFECTIVE_FROM_DATE = $req['si_effective_from_date'][$key];
        //     $si_data->TO_DATE = $req['si_to_date'][$key];
        //     $si_data->TITLE = $si_name;
        //     $si_data->SCHEME_NATURE =  $req['si_scheme_nature'][$key];
        //     $si_data->STS = $req['si_is_active'][$key];
                        
        //     $si_data->save();

        // }



        // Price History
        // $other_languages_data[] = [];
        foreach($req['ph_effective_from_date'] as $key => $ph_effective_from_date){
            
            $ph_data = new Pricehistories;

            $ph_data->PRO_ID = $lastInsertId;
            $ph_data->COST_PRICE = $req['ph_cost_price'][$key];
            $ph_data->SALE_PRICE = $req['ph_sale_price'][$key];
            $ph_data->RETAIL_PRICE = $req['ph_retail_price'][$key];
            $ph_data->RATE_FOR_ALL_BRANCHES = $req['ph_rate_for_all_branches'][$key];;
            $ph_data->EFFECTIVE_FROM_DATE =  $ph_effective_from_date;
            $ph_data->TO_DATE = $req['ph_to_date'][$key];
            $ph_data->BRANCHES = $req['ph_branches'][$key];
            $ph_data->STS = 1;
                        
            $ph_data->save();

        }


        // dd($stock_norms_data);
        // dd($business_partners_data);


        // $item = $this->crud->create($this->crud->getStrippedSaveRequest());
        // $this->data['entry'] = $this->crud->entry = $item;

        // show a success message
        \Alert::success(trans('backpack::crud.insert_success'))->flash();

        // save the redirect choice for next time
        $this->crud->setSaveAction();
        return redirect('/admin/products');

        // return $this->crud->performSaveAction($item->getKey());
    }
}
