<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\BanksRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;
use App\Models\Countries;

/**
 * Class BanksCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class BanksCrudController extends CrudController
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
        CRUD::setModel(\App\Models\Banks::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/banks');
        CRUD::setEntityNameStrings('banks', 'banks');
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
        CRUD::column('country_id')->type('text');
        CRUD::column('title')->type('text');
        CRUD::column('address')->type('text');
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
        $t = Countries::pluck('title');
        // dd($t);
        CRUD::setValidation(BanksRequest::class);

        // CRUD::setFromDb(); // fields
        CRUD::field('title')->type('text');
        CRUD::addField([
            'name'            => 'country_id',
            'label'           => "Country",
            'type'            => 'select_from_array',
            'options'         => $t,
            'allows_null'     => false,
            'allows_multiple' => false,
        ]);
        CRUD::addField([
            'name'            => 'sts',
            'label'           => "Status",
            'type'            => 'select_from_array',
            'options'         => ['1' => 'Enable', '0' => 'Disable'],
            'allows_null'     => false,
            'allows_multiple' => false,
            
        ]);
        CRUD::field('address')->type('text');



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
