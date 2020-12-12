<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\DepartmentsRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;
use App\Models\Products;
use App\Models\Skugroups;
use App\Models\Skuses;
use App\Models\Productmains;

/**
 * Class DepartmentsCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class DepartmentsCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    /**
     * Configure the CrudPanel object. Apply settings to all operations.
     * 
     * @return void
     */
    public function setup()
    {
        CRUD::setModel(\App\Models\Departments::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/departments');
        CRUD::setEntityNameStrings('departments', 'departments');
    }

    /**
     * Define what happens when the List operation is loaded.
     * 
     * @see  https://backpackforlaravel.com/docs/crud-operation-list-entries
     * @return void
     */
    protected function setupListOperation()
    {

        // category_id->
        // segment_id->
        // brand_id->
        // sku_group_id-> // Known
        // sku_id  // Known
        $data = Productmains::where('product_id', 83)->get()->toArray();
        dd($data[0]['min_qty']);
        // $p_attr = Productmains::where('id', 61)->get();

      //   "cat_id" => "1"
      // "segment_id" => "1"
      // "brand_id" => "28"
      // "sku_group_id" => "7"

        dd($p_attr);
        // Skuses::get()->dd();
        // Skugroups::truncate();
        // Skugroups::get()->dd();
        // $r = Products::latest()->first();
        // dd($r);
        // CRUD::setFromDb(); // columns
        // CRUD::column('title')->type('text');
        // CRUD::column('sts')->type('text');

        /**
         * Columns can be defined using the fluent syntax or array syntax:
         * - CRUD::column('price')->type('number');
         * - CRUD::addColumn(['name' => 'price', 'type' => 'number']); 
         */
    }

    /**
     * Define what happens when the Create operation is loaded.
     * 
     * @see https://backpackforlaravel.com/docs/crud-operation-create
     * @return void
     */
    protected function setupCreateOperation()
    {
        CRUD::setValidation(DepartmentsRequest::class);

        // CRUD::setFromDb(); // fields

        CRUD::field('title')->type('text');
        CRUD::addField([
    'name'            => 'sts',
    'label'           => "Status",
    'type'            => 'select_from_array',
    'options'         => ['1' => 'Enable', '0' => 'Disable'],
    'allows_null'     => false,
    'allows_multiple' => false,
    
]);


        /**
         * Fields can be defined using the fluent syntax or array syntax:
         * - CRUD::field('price')->type('number');
         * - CRUD::addField(['name' => 'price', 'type' => 'number'])); 
         */
    }

    /**
     * Define what happens when the Update operation is loaded.
     * 
     * @see https://backpackforlaravel.com/docs/crud-operation-update
     * @return void
     */
    protected function setupUpdateOperation()
    {
        $this->setupCreateOperation();
    }
}
