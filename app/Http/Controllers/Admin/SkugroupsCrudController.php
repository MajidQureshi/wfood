<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\SkugroupsRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;
use App\Models\Categories;
use App\Models\Segments;
use App\Models\Brands;

/**
 * Class SkugroupsCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class SkugroupsCrudController extends CrudController
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
        CRUD::setModel(\App\Models\Skugroups::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/skugroups');
        CRUD::setEntityNameStrings('skugroups', 'skugroups');
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
        // CRUD::addColumn('cat_id')->type('text');
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
        
        CRUD::column('title')->type('text');
        CRUD::addColumn([
            'name'    => 'created_at',
            'label'   => 'Created',
            'type'    => 'date',
        ]);

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
        CRUD::setValidation(SkugroupsRequest::class);

        // CRUD::setFromDb(); // fields
        // CRUD::field('opening_date')->type('date');
        // CRUD::field('closing_date')->type('date');    
        // CRUD::field('details')->type('text');
        
        // CRUD::field('map_code')->type('text');
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

        CRUD::field('title')->type('text');

        // $this->crud->addField([   // Checkbox
        //     'name'  => 'is_active',
        //     'label' => 'Active',
        //     'type'  => 'checkbox'
        // ]);
        // $this->crud->addField([   // Checkbox
        //     'name'  => 'free_flow',
        //     'label' => 'Free Flow',
        //     'type'  => 'checkbox'
        // ]);
        // $this->crud->addField([   // Checkbox
        //     'name'  => 'print_short_name',
        //     'label' => 'Print Short Name',
        //     'type'  => 'checkbox'
        // ]);

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
