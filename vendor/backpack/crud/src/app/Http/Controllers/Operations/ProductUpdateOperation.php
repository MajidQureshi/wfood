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

trait ProductUpdateOperation
{
    /**
     * Define which routes are needed for this operation.
     *
     * @param string $name       Name of the current entity (singular). Used as first URL segment.
     * @param string $routeName  Prefix of the route name.
     * @param string $controller Name of the current CrudController.
     */
    protected function setupUpdateRoutes($segment, $routeName, $controller)
    {
        Route::get($segment.'/{id}/edit', [
            'as'        => $routeName.'.edit',
            'uses'      => $controller.'@edit',
            'operation' => 'update',
        ]);

        Route::get($segment.'/{id}/editchild', [
            'as'        => $routeName.'.editchild',
            'uses'      => $controller.'@editchild',
            'operation' => 'update',
        ]);

        Route::put($segment.'/{id}', [
            'as'        => $routeName.'.update',
            'uses'      => $controller.'@update',
            'operation' => 'update',
        ]);
    }

    /**
     * Add the default settings, buttons, etc that this operation needs.
     */
    protected function setupUpdateDefaults()
    {
        $this->crud->allowAccess('update');

        $this->crud->operation('update', function () {
            $this->crud->loadDefaultOperationSettingsFromConfig();

            if ($this->crud->getModel()->translationEnabled()) {
                $this->crud->addField([
                    'name' => 'locale',
                    'type' => 'hidden',
                    'value' => request()->input('locale') ?? app()->getLocale(),
                ]);
            }

            $this->crud->setupDefaultSaveActions();
        });

        $this->crud->operation(['list', 'show'], function () {
            $this->crud->addButton('line', 'update', 'view', 'crud::buttons.update', 'end');
        });
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     *
     * @return Response
     */
    public function editchild($id)
    {
        $this->crud->hasAccessOrFail('update');
        // get entry ID from Request (makes sure its the last ID for nested resources)
        $id = $this->crud->getCurrentEntryId() ?? $id;
        $this->crud->setOperationSetting('fields', $this->crud->getUpdateFields());
        // get the info for that entry
        $this->data['entry'] = $this->crud->getEntry($id);
        $this->data['crud'] = $this->crud;
        $this->data['saveAction'] = $this->crud->getSaveAction();
        $this->data['title'] = $this->crud->getTitle() ?? trans('backpack::crud.edit').' '.$this->crud->entity_name;

        $this->data['id'] = $id;
        $this->data['productmains'] = Productmains::where('product_id', $id)->get()->toArray();

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

        // load the view from /resources/views/vendor/backpack/crud/ if it exists, otherwise load the one in the package
        // return view($this->crud->getEditView(), $this->data);
        return view("crud::editchild", $this->data);
    }

    /**
     * Update the specified resource in the database.
     *
     * @return Response
     */
    public function update()
    {
        $this->crud->hasAccessOrFail('update');

        // execute the FormRequest authorization and validation, if one is required
        $request = $this->crud->validateRequest();
        // update the row in the db
        $item = $this->crud->update($request->get($this->crud->model->getKeyName()),
                            $this->crud->getStrippedSaveRequest());
        $this->data['entry'] = $this->crud->entry = $item;

        // show a success message
        \Alert::success(trans('backpack::crud.update_success'))->flash();

        // save the redirect choice for next time
        $this->crud->setSaveAction();

        return $this->crud->performSaveAction($item->getKey());
    }
}
