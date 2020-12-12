<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\SkusesRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;
use App\Models\Categories;
use App\Models\Segments;
use App\Models\Brands;
use App\Models\Skugroups;

/**
 * Class SkusesCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class SkusesCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    // use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation { store as traitStore; }

    /**
     * Configure the CrudPanel object. Apply settings to all operations.
     * 
     * @return void
     */
    public function setup()
    {
        CRUD::setModel(\App\Models\Skuses::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/skuses');
        CRUD::setEntityNameStrings('skuses', 'skuses');
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

        CRUD::addColumn([
            'name'    => 'cat_id',
            'label'   => 'Category',
            'type'    => 'select_from_array',
            'options' => Categories::pluck('title','id'),
        ]);  
        CRUD::addColumn([
            'name'    => 'segment_id',
            'label'   => 'Segment',
            'type'    => 'select_from_array',
            'options' => Segments::pluck('title','id'),
        ]);
        CRUD::addColumn([
            'name'    => 'brand_id',
            'label'   => 'Brand',
            'type'    => 'select_from_array',
            'options' => Brands::pluck('title','id'),
        ]);
        CRUD::addColumn([
            'name'    => 'sku_group_id',
            'label'   => 'SKU Group',
            'type'    => 'select_from_array',
            'options' => Skugroups::pluck('title','id'),
        ]);

        
        CRUD::column('title')->type('text');

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
        CRUD::setValidation(SkusesRequest::class);

        
        $this->crud->addField([
            'name'            => 'cat_id',
            'label'           => 'Category',
            'type'            => 'select_from_array',
            'options'         => Categories::pluck('title','id'),                
        ]);

        $this->crud->addField([
            'name'            => 'segment_id',
            'label'           => 'Segment',
            'type'            => 'select_from_array',
            'options'         => Segments::pluck('title','id'),                
        ]);

        $this->crud->addField([
            'name'            => 'brand_id',
            'label'           => 'Brand',
            'type'            => 'select_from_array',
            'options'         => Brands::pluck('title','id'),                
        ]);

        $this->crud->addField([
            'name'            => 'sku_group_id',
            'label'           => 'SKU Group',
            'type'            => 'select_from_array',
            'options'         => Skugroups::pluck('title','id'),                
        ]);

        CRUD::field('title')->type('text');
        CRUD::addField([
            'name'            => 'sts',
            'label'           => "Status",
            'type'            => 'select_from_array',
            'options'         => ['1' => 'Enable', '0' => 'Disable'],
            'allows_null'     => false,
            'allows_multiple' => false,
            
        ]);


}


public function store()
    {
        // dd($this->crud->getRequest()->request->all());

 $response = $this->traitStore();
        // do something after save
        return $response;
        // CRUD::setFromDb(); // fields

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
