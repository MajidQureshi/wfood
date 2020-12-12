<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\ShopsRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class ShopsCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class ShopsCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShopCreateOperation;
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
        CRUD::setModel(\App\Models\Shops::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/shops');
        CRUD::setEntityNameStrings('shops', 'shops');
    }

    /**
     * Define what happens when the List operation is loaded.
     * 
     * @see  https://backpackforlaravel.com/docs/crud-operation-list-entries
     * @return void
     */
    protected function setupListOperation()
    {
        CRUD::setFromDb(); // columns

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
        CRUD::setValidation(ShopsRequest::class);

        // CRUD::setFromDb(); // fields
        CRUD::field('TITLE')->type('text');
        CRUD::field('CUSTOMER_NAME')->type('text');
        CRUD::field('NAME_TO_BE_PRI')->type('number');
        CRUD::field('CLOUD_OFFICE')->type('text');
        CRUD::field('OPENING_DATE')->type('date');
        
        CRUD::field('CONTACT_PERSON_NAME')->type('text');
        CRUD::field('NAME_IN_NATIVE')->type('text');

        CRUD::field('CLOUD_BUSINESS')->type('text');
        CRUD::field('CLOSING_DATE')->type('date');
        CRUD::field('BUSINESS_PARTNER')->type('text');
        CRUD::field('OLD_CODE')->type('text');

        
        // CRUD::field('IS_APPROVED')->type('number');
        // CRUD::field('IS_ACTIVE')->type('number');
        // CRUD::field('IS_CASH_DISCOUNT')->type('number');
        // CRUD::field('IS_THIS_URBAN')->type('number');


        CRUD::field('CREATED_BY_USER')->type('text');
        CRUD::field('ACCOUNT_ID')->type('text');
        CRUD::field('ACCOUNT_STRUCTURE_CODE')->type('text');
        CRUD::field('MAP_CODE')->type('text');
        CRUD::field('ACCOUNT_ID_NAME')->type('text');
        CRUD::field('ACCOUNT_STRUCTURE_ERROR')->type('text');

        CRUD::field('LEAD_TIME')->type('text');
        CRUD::field('INSURANCE_RATE')->type('text');
        CRUD::field('DEDUCT_FREIGHT')->type('text');

        $this->crud->addField([   // Checkbox
                'name'  => 'IS_APPROVED',
                'label' => 'Approved',
                'type'  => 'checkbox'
            ]);
            $this->crud->addField([   // Checkbox
                'name'  => 'IS_ACTIVE',
                'label' => 'Active',
                'type'  => 'checkbox'
            ]);
            $this->crud->addField([   // Checkbox
                'name'  => 'IS_CASH_DISCOUNT',
                'label' => 'CASH DISCOUNT',
                'type'  => 'checkbox'
            ]);
            $this->crud->addField([   // Checkbox
                'name'  => 'IS_THIS_URBAN',
                'label' => 'Is This Urban',
                'type'  => 'checkbox'
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
