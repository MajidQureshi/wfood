<?php

// --------------------------
// Custom Backpack Routes
// --------------------------
// This route file is loaded automatically by Backpack\Base.
// Routes you generate using Backpack\Generators will be placed here.

Route::group([
    'prefix'     => config('backpack.base.route_prefix', 'admin'),
    'middleware' => array_merge(
        (array) config('backpack.base.web_middleware', 'web'),
        (array) config('backpack.base.middleware_key', 'admin')
    ),
    'namespace'  => 'App\Http\Controllers\Admin',
], function () { // custom admin routes
    Route::crud('tag', 'TagCrudController');    
    Route::crud('classifications', 'ClassificationsCrudController');
    Route::crud('departments', 'DepartmentsCrudController');
    Route::crud('principles', 'PrinciplesCrudController');
    Route::crud('divisions', 'DivisionsCrudController');
    Route::crud('abcindicators', 'AbcIndicatorsCrudController');
    Route::crud('variants', 'VariantsCrudController');
    Route::crud('addresses', 'AddressesCrudController');
    Route::crud('countries', 'CountriesCrudController');
    Route::crud('regions', 'RegionsCrudController');
    
    Route::crud('zones', 'ZonesCrudController');
    Route::crud('territories', 'TerritoriesCrudController');
    Route::crud('subterritories', 'SubterritoriesCrudController');
    Route::crud('sections', 'SectionsCrudController');
    Route::crud('shops', 'ShopsCrudController');
    Route::crud('banks', 'BanksCrudController');
    Route::crud('categories', 'CategoriesCrudController');
    Route::crud('segments', 'SegmentsCrudController');
    Route::crud('brands', 'BrandsCrudController');
    Route::crud('skugroups', 'SkugroupsCrudController');
    Route::crud('skuses', 'SkusesCrudController');
    Route::crud('channels', 'ChannelsCrudController');
    Route::crud('subchannels', 'SubchannelsCrudController');
    Route::crud('salesoffices', 'SalesofficesCrudController');
    Route::crud('schemestypes', 'SchemestypesCrudController');
    Route::crud('colors', 'ColorsCrudController');
    Route::crud('companies', 'CompaniesCrudController');
    Route::crud('languages', 'LanguagesCrudController');
    Route::crud('otherlanguages', 'OtherlanguagesCrudController');
    Route::crud('productoffices', 'ProductofficesCrudController');
    Route::crud('characteristics', 'CharacteristicsCrudController');
    Route::crud('childbarcodes', 'ChildbarcodesCrudController');
    Route::crud('products', 'ProductsCrudController');
    Route::crud('salestaxgroups', 'SalestaxgroupsCrudController');
    Route::crud('salestaxes', 'SalestaxesCrudController');
    Route::crud('schemesinfos', 'SchemesinfosCrudController');
    Route::crud('containers', 'ContainersCrudController');
    Route::crud('containersizes', 'ContainersizesCrudController');
    Route::crud('customeraccounts', 'CustomeraccountsCrudController');
    Route::crud('customerapprovedbankaccounts', 'CustomerapprovedbankaccountsCrudController');
    Route::crud('customerbillings', 'CustomerbillingsCrudController');
    Route::crud('customermains', 'CustomermainsCrudController');
    Route::crud('customervisitplans', 'CustomervisitplansCrudController');
    Route::crud('offices', 'OfficesCrudController');
    Route::crud('orderbookers', 'OrderbookersCrudController');
    Route::crud('pricehistories', 'PricehistoriesCrudController');
    Route::crud('principlecreditlimitdivisions', 'PrinciplecreditlimitdivisionsCrudController');
    Route::crud('productmains', 'ProductmainsCrudController');
    Route::crud('stocks', 'StocksCrudController');
    Route::crud('stocknorms', 'StocknormsCrudController');
    Route::crud('alternatesubsituteproducts', 'AlternatesubsituteproductsCrudController');
    Route::crud('businesspartners', 'BusinesspartnersCrudController');
    Route::crud('orderbookervisits', 'OrderbookervisitsCrudController');
    Route::crud('warehouses', 'WarehousesCrudController');
    Route::crud('sizes', 'SizesCrudController');
}); // this should be the absolute last line of this file