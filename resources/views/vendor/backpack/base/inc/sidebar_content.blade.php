



        <!-- This file is used to store sidebar items, starting with Backpack\Base 0.9.0 -->

<li class="nav-item"><a class="nav-link" href="{{ backpack_url('dashboard') }}"><i class="la la-home nav-icon"></i> {{ trans('backpack::base.dashboard') }}</a></li>
<!-- <li class='nav-item'><a class='nav-link' href='{{ backpack_url('tag') }}'><i class='nav-icon la la-question'></i> Tags</a></li> -->

<li class='nav-item'><a class='nav-link' href='{{ backpack_url('roles') }}'><i class='nav-icon la la-question'></i> Roles</a></li>
<li class='nav-item'><a class='nav-link' href='{{ backpack_url('users') }}'><i class='nav-icon la la-question'></i> Users</a></li>

<li> <a href="#" class="waves-effect"><span class="hide-menu">Geography<span class="fa arrow"></span></span></a>
    <ul class="nav nav-second-level">
        <li class='nav-item' style="padding-left: 15px;"><a class='nav-link' href='{{ backpack_url('countries') }}'><i class='nav-icon la la-question'></i> Countries</a></li>
        <li class='nav-item' style="padding-left: 15px;"><a class='nav-link' href='{{ backpack_url('regions') }}'><i class='nav-icon la la-question'></i> Regions</a></li>
        <li class='nav-item' style="padding-left: 15px;"><a class='nav-link' href='{{ backpack_url('zones') }}'><i class='nav-icon la la-question'></i> Zones</a></li>
        <li class='nav-item' style="padding-left: 15px;"><a class='nav-link' href='{{ backpack_url('territories') }}'><i class='nav-icon la la-question'></i> Territories</a></li>
        <li class='nav-item' style="padding-left: 15px;"><a class='nav-link' href='{{ backpack_url('subterritories') }}'><i class='nav-icon la la-question'></i> Sub Territories</a></li>
        <li class='nav-item' style="padding-left: 15px;"><a class='nav-link' href='{{ backpack_url('sections') }}'><i class='nav-icon la la-question'></i> Sections</a></li>
        <li class='nav-item' style="padding-left: 15px;"><a class='nav-link' href='{{ backpack_url('shops') }}'><i class='nav-icon la la-question'></i> Shops</a></li>
        <li class='nav-item' style="padding-left: 15px;"><a class='nav-link' href='{{ backpack_url('salesoffices') }}'><i class='nav-icon la la-question'></i> Sales Offices</a></li>
    </ul>
</li>

<li> <a href="#" class="waves-effect"><span class="hide-menu">Product Management<span class="fa arrow"></span></span></a>
    <ul class="nav nav-second-level">

        <li class='nav-item' style="padding-left: 15px;"><a class='nav-link' href='{{ backpack_url('categories') }}'><i class='nav-icon la la-question'></i> Categories</a></li>
        <li class='nav-item' style="padding-left: 15px;"><a class='nav-link' href='{{ backpack_url('segments') }}'><i class='nav-icon la la-question'></i> Segments</a></li>
        <li class='nav-item' style="padding-left: 15px;"><a class='nav-link' href='{{ backpack_url('brands') }}'><i class='nav-icon la la-question'></i> Brands</a></li>
        <li class='nav-item' style="padding-left: 15px;"><a class='nav-link' href='{{ backpack_url('skugroups') }}'><i class='nav-icon la la-question'></i> Skugroups</a></li>
        <li class='nav-item' style="padding-left: 15px;"><a class='nav-link' href='{{ backpack_url('skuses') }}'><i class='nav-icon la la-question'></i> Skuses</a></li>    
        <li class='nav-item' style="padding-left: 15px;"><a class='nav-link' href='{{ backpack_url('variants') }}'><i class='nav-icon la la-question'></i> Variants</a></li>
        <li class='nav-item' style="padding-left: 15px;"><a class='nav-link' href='{{ backpack_url('products') }}'><i class='nav-icon la la-question'></i> Products</a></li>
        <li class='nav-item' style="padding-left: 15px;"><a class='nav-link' href='{{ backpack_url('stocks') }}'><i class='nav-icon la la-question'></i> Stocks</a></li>
    </ul>
</li>

<li> <a href="#" class="waves-effect"><span class="hide-menu">Customer Management<span class="fa arrow"></span></span></a>
    <ul class="nav nav-second-level">

        <li class='nav-item'><a class='nav-link' href='{{ backpack_url('addresses') }}'><i class='nav-icon la la-question'></i> Addresses</a></li>
        <li class='nav-item'><a class='nav-link' href='{{ backpack_url('customeraccounts') }}'><i class='nav-icon la la-question'></i> Customer Accounts</a></li>
        <li class='nav-item'><a class='nav-link' href='{{ backpack_url('customerapprovedbankaccounts') }}'><i class='nav-icon la la-question'></i> Customer Approved Bank Accounts</a></li>
        <li class='nav-item'><a class='nav-link' href='{{ backpack_url('customerbillings') }}'><i class='nav-icon la la-question'></i> Customer Billings</a></li>
        <li class='nav-item'><a class='nav-link' href='{{ backpack_url('customermains') }}'><i class='nav-icon la la-question'></i> Customer Mains</a></li>
        <li class='nav-item'><a class='nav-link' href='{{ backpack_url('customervisitplans') }}'><i class='nav-icon la la-question'></i> Customer Visit Plans</a></li>
        <li class='nav-item'><a class='nav-link' href='{{ backpack_url('principlecreditlimitdivisions') }}'><i class='nav-icon la la-question'></i> Principle Credit Limit Divisions</a></li>
    </ul>
</li>

<li> <a href="#" class="waves-effect"><span class="hide-menu">Channels<span class="fa arrow"></span></span></a>
    <ul class="nav nav-second-level">

        <li class='nav-item' style="padding-left: 15px;"><a class='nav-link' href='{{ backpack_url('channels') }}'><i class='nav-icon la la-question'></i> Channels</a></li>
        <li class='nav-item' style="padding-left: 15px;"><a class='nav-link' href='{{ backpack_url('subchannels') }}'><i class='nav-icon la la-question'></i> Sub Channels</a></li>
                
    </ul>
</li>

<li> <a href="#" class="waves-effect"><span class="hide-menu">Setup<span class="fa arrow"></span></span></a>
    <ul class="nav nav-second-level">
        <li class='nav-item' style="padding-left: 15px;"><a class='nav-link' href='{{ backpack_url('departments') }}'><i class='nav-icon la la-question'></i> Departments</a></li>
        <li class='nav-item' style="padding-left: 15px;"><a class='nav-link' href='{{ backpack_url('classifications') }}'><i class='nav-icon la la-question'></i> Classifications</a></li>
        <li class='nav-item' style="padding-left: 15px;"><a class='nav-link' href='{{ backpack_url('salestaxgroups') }}'><i class='nav-icon la la-question'></i> Sales Tax Groups</a></li>
        <li class='nav-item' style="padding-left: 15px;"><a class='nav-link' href='{{ backpack_url('containersizes') }}'><i class='nav-icon la la-question'></i> Container Sizes</a></li>
        <li class='nav-item' style="padding-left: 15px;"><a class='nav-link' href='{{ backpack_url('abcindicators') }}'><i class='nav-icon la la-question'></i> ABC Indicators</a></li>
        <li class='nav-item' style="padding-left: 15px;"><a class='nav-link' href='{{ backpack_url('schemestypes') }}'><i class='nav-icon la la-question'></i> Schemestypes</a></li>
        <li class='nav-item' style="padding-left: 15px;"><a class='nav-link' href='{{ backpack_url('companies') }}'><i class='nav-icon la la-question'></i> Companies</a></li>
        <li class='nav-item' style="padding-left: 15px;"><a class='nav-link' href='{{ backpack_url('banks') }}'><i class='nav-icon la la-question'></i> Banks</a></li>
        <li class='nav-item' style="padding-left: 15px;"><a class='nav-link' href='{{ backpack_url('divisions') }}'><i class='nav-icon la la-question'></i> Divisions</a></li>
        <li class='nav-item' style="padding-left: 15px;"><a class='nav-link' href='{{ backpack_url('languages') }}'><i class='nav-icon la la-question'></i> Languages</a></li>
        <li class='nav-item' style="padding-left: 15px;"><a class='nav-link' href='{{ backpack_url('principles') }}'><i class='nav-icon la la-question'></i> Principles</a></li>
        <li class='nav-item' style="padding-left: 15px;"><a class='nav-link' href='{{ backpack_url('colors') }}'><i class='nav-icon la la-question'></i> Colors</a></li>
        <li class='nav-item' style="padding-left: 15px;"><a class='nav-link' href='{{ backpack_url('containers') }}'><i class='nav-icon la la-question'></i> Containers</a></li>
        <li class='nav-item' style="padding-left: 15px;"><a class='nav-link' href='{{ backpack_url('sizes') }}'><i class='nav-icon la la-question'></i> Sizes</a></li>
        <li class='nav-item' style="padding-left: 15px;"><a class='nav-link' href='{{ backpack_url('warehouses') }}'><i class='nav-icon la la-question'></i> Warehouses</a></li>
        <li class='nav-item' style="padding-left: 15px;"><a class='nav-link' href='{{ backpack_url('otherlanguages') }}'><i class='nav-icon la la-question'></i> Other Languages</a></li>
        <li class='nav-item' style="padding-left: 15px;"><a class='nav-link' href='{{ backpack_url('offices') }}'><i class='nav-icon la la-question'></i> Offices</a></li>
                
    </ul>
</li>


<li class='nav-item'><a class='nav-link' href='{{ backpack_url('orderbookers') }}'><i class='nav-icon la la-question'></i> Order Booker(s)</a></li>

<!-- <li class='nav-item'><a class='nav-link' href='{{ backpack_url('productmains') }}'><i class='nav-icon la la-question'></i> Productmains</a></li> -->
<!-- <li class='nav-item'><a class='nav-link' href='{{ backpack_url('salestaxes') }}'><i class='nav-icon la la-question'></i> Salestaxes</a></li> -->
<!-- <li class='nav-item'><a class='nav-link' href='{{ backpack_url('stocknorms') }}'><i class='nav-icon la la-question'></i> Stocknorms</a></li> -->
<!-- <li class='nav-item'><a class='nav-link' href='{{ backpack_url('alternatesubsituteproducts') }}'><i class='nav-icon la la-question'></i> Alternatesubsituteproducts</a></li> -->
<!-- <li class='nav-item'><a class='nav-link' href='{{ backpack_url('businesspartners') }}'><i class='nav-icon la la-question'></i> Businesspartners</a></li> -->
<!-- <li class='nav-item'><a class='nav-link' href='{{ backpack_url('productoffices') }}'><i class='nav-icon la la-question'></i> Productoffices</a></li> -->
<!-- <li class='nav-item'><a class='nav-link' href='{{ backpack_url('characteristics') }}'><i class='nav-icon la la-question'></i> Characteristics</a></li> -->
<!-- <li class='nav-item'><a class='nav-link' href='{{ backpack_url('childbarcodes') }}'><i class='nav-icon la la-question'></i> Childbarcodes</a></li> -->
<!-- <li class='nav-item'><a class='nav-link' href='{{ backpack_url('schemesinfos') }}'><i class='nav-icon la la-question'></i> Schemesinfos</a></li> -->


<!-- <li class='nav-item'><a class='nav-link' href='{{ backpack_url('pricehistories') }}'><i class='nav-icon la la-question'></i> Pricehistories</a></li> -->
<li class='nav-item'><a class='nav-link' href='{{ backpack_url('orderbookervisits') }}'><i class='nav-icon la la-question'></i> Order Booker Visit(s)</a></li>




