<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\ProductsRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;
use App\Models\Categories;
use App\Models\Segments;
use App\Models\Brands;

/**
 * Class ProductsCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class ProductsCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ProductCreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ProductUpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    /**
     * Configure the CrudPanel object. Apply settings to all operations.
     * 
     * @return void
     */
    public function setup()
    {
        CRUD::setModel(\App\Models\Products::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/products');
        CRUD::setEntityNameStrings('products', 'products');
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
        // CRUD::column('category_id')->type('text');
        // CRUD::column('segment_id')->type('text');
        // CRUD::column('brand_id')->type('text');
        // CRUD::column('sku_group_id')->type('text');
        // CRUD::column('title')->type('text');
        // CRUD::column('id')->type('text');
        CRUD::addColumn([
            'name'            => 'category_id',
            'label'           => 'Category',
            'type'            => 'select_from_array',
            'options'         => Categories::pluck('title','id'),                
        ]);

        CRUD::addColumn([
            'name'            => 'segment_id',
            'label'           => 'Segment',
            'type'            => 'select_from_array',
            'options'         => Segments::pluck('title','id'),                
        ]);

        CRUD::addColumn([
            'name'            => 'brand_id',
            'label'           => 'Brand',
            'type'            => 'select_from_array',
            'options'         => Brands::pluck('title','id'),                
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
        
        CRUD::setValidation(ProductsRequest::class);

        // CRUD::setFromDb(); // fields
            CRUD::field('product_bar_code')->type('text');
            CRUD::field('old_product_code')->type('text');
            CRUD::field('title')->type('text');
            CRUD::field('short_name')->type('text');
            CRUD::field('launch_date')->type('date');         
            CRUD::field('principle_erp_product_code')->type('text');
            CRUD::field('opening_date')->type('date');
            CRUD::field('closing_date')->type('date');    
            CRUD::field('details')->type('text');
            
            CRUD::field('map_code')->type('text');
            $this->crud->addField([
                'name'            => 'is_approved',
                'label'           => 'Is Approved',
                'type'            => 'select_from_array',
                'options'         => [0 => 'Not Required', 1 => 'Required'],                
            ]);
            // CRUD::field('is_approved')->type('text');

            $this->crud->addField([   // Checkbox
                'name'  => 'is_active',
                'label' => 'Active',
                'type'  => 'checkbox'
            ]);
            $this->crud->addField([   // Checkbox
                'name'  => 'free_flow',
                'label' => 'Free Flow',
                'type'  => 'checkbox'
            ]);
            $this->crud->addField([   // Checkbox
                'name'  => 'print_short_name',
                'label' => 'Print Short Name',
                'type'  => 'checkbox'
            ]);

//             [   // Checkbox
//     'name'  => 'active',
//     'label' => 'Active',
//     'type'  => 'checkbox'
// ],
                
             // CRUD::field('category_id')->type('text');
             // CRUD::field('category_id')->type('text');
        // CRUD::field('category_id')->type('text');
        // CRUD::field('segment_id')->type('text');
        // CRUD::field('brand_id')->type('text');
        // CRUD::field('sku_group_id')->type('text');
        // CRUD::field('title')->type('text');
        
        
        // CRUD::field('sku_id')->type('text');
        
        
        
        

        
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
