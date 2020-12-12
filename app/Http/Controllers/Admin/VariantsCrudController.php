<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\VariantsRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;
use App\Models\Categories;
use App\Models\Segments;
use App\Models\Brands;

/**
 * Class VariantsCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class VariantsCrudController extends CrudController
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
        CRUD::setModel(\App\Models\Variants::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/variants');
        CRUD::setEntityNameStrings('variants', 'variants');
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
        CRUD::column('category_id')->type('text');
        CRUD::column('segment_id')->type('text');
        CRUD::column('brand_id')->type('text');
        CRUD::column('title')->type('text');
        CRUD::column('sts')->type('text');

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
        CRUD::setValidation(VariantsRequest::class);

        // CRUD::setFromDb(); // fields

$this->crud->addField([
    'name'            => 'category_id',
    'label'           => "Category",
    'type'            => 'select_from_array',
    'options'         => Categories::pluck('title','id'),
    'allows_null'     => false,
    
]);

$this->crud->addField([
    'name'            => 'segment_id',
    'label'           => "Segment",
    'type'            => 'select_from_array',
    'options'         => Segments::pluck('title','id'),
    'allows_null'     => false,
    
]);

$this->crud->addField([
    'name'            => 'brand_id',
    'label'           => "Brand",
    'type'            => 'select_from_array',
    'options'         => Brands::pluck('title','id'),
    'allows_null'     => false,
    
]);


        // CRUD::field('cat_id')->type('number');
        // CRUD::field('segment_id')->type('number');
        CRUD::field('title')->type('text');



//                         CRUD::field('title')->type('text');
//         CRUD::addField([
//     'name'            => 'sts',
//     'label'           => "Status",
//     'type'            => 'select_from_array',
//     'options'         => ['1' => 'Enable', '0' => 'Disable'],
//     'allows_null'     => false,
//     'allows_multiple' => false,
    
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
