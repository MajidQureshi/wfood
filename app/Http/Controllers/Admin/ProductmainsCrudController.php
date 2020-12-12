<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\ProductmainsRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;
use App\Models\Products;

/**
 * Class ProductmainsCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class ProductmainsCrudController extends CrudController
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
        CRUD::setModel(\App\Models\Productmains::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/productmains');
        CRUD::setEntityNameStrings('productmains', 'productmains');
    }

    /**
     * Define what happens when the List operation is loaded.
     * 
     * @see  https://backpackforlaravel.com/docs/crud-operation-list-entries
     * @return void
     */
    protected function setupListOperation()
    {
        // CRUD::setFromDb(); // columns
        // CRUD::column('product_id')->type('number');
        CRUD::addColumn([
            'name'    => 'product_id',
            'label'   => 'Product',
            'type'    => 'select_from_array',
            'options' => Products::pluck('title','id'),
        ]); 
        // CRUD::column('price')->type('number');

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
        CRUD::setValidation(ProductmainsRequest::class);

        // CRUD::setFromDb(); // fields
        CRUD::addfield([
            'name'    => 'product_id',
            'label'   => 'Product',
            'type'    => 'select_from_array',
            'options' => Products::pluck('title','id'),
        ]);

        CRUD::field('dept_id')->type('text');
        CRUD::field('classification_id')->type('text');
        CRUD::field('division')->type('text');

        CRUD::field('brand')->type('text');
        CRUD::field('variant')->type('text');
        CRUD::field('abc_indicator')->type('text');

        CRUD::field('principle')->type('text');
        CRUD::field('min_qty')->type('text');
        CRUD::field('max_qty')->type('text');

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
