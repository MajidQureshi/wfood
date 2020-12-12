<div class="col-sm-12">
    <div class="col-md-3">
        
            <label class="col-sm-12">Department</label>
        <select name="departments" id="departments" class="form-control">
            <option value="">Select</option>
          @foreach($departments as $department)
            <option value="{{ $department['id'] }}">{{ $department['title'] }}</option>
          @endforeach
        </select>
        
        
    
        <label class="col-sm-12">Classification</label>
        <select name="classifications" id="classifications" class="form-control">
            <option value="">Select</option>
          @foreach($classifications as $classification)
            <option value="{{ $classification['id'] }}">{{ $classification['title'] }}</option>
          @endforeach
        </select>
    

    
        <label class="col-sm-12">ABC Indicator</label>
        <select name="abc_indicators" id="abc_indicators" class="form-control">
            <option value="">Select</option>
          @foreach($abc_indicators as $abc_indicator)
            <option value="{{ $abc_indicator['id'] }}">{{ $abc_indicator['title'] }}</option>
          @endforeach
        </select>
    

   
        <label class="col-sm-12">Principle</label>
        <select name="principles" id="principles" class="form-control">
            <option value="">Select</option>
          @foreach($principles as $principle)
            <option value="{{ $principle['id'] }}">{{ $principle['title'] }}</option>
          @endforeach
        </select>
    

    
        <label class="col-sm-12">Division</label>
        <select name="divisions" id="divisions" class="form-control">
            <option value="">Select</option>
          @foreach($divisions as $division)
            <option value="{{ $division['id'] }}">{{ $division['title'] }}</option>
          @endforeach
        </select>
    
    
        <label class="col-sm-12">Brand</label>
        <select name="brands" id="brands" class="form-control">
            <option value="">Select</option>
          @foreach($brands as $brand)
            <option value="{{ $brand['id'] }}">{{ $brand['title'] }}</option>
          @endforeach
        </select>
    

    
        <label class="col-sm-12">Variant</label>
        <select name="variants" id="variants" class="form-control">
            <option value="">Select</option>
          @foreach($variants as $variant)
            <option value="{{ $variant['id'] }}">{{ $variant['title'] }}</option>
          @endforeach
        </select>


    
        <label class="col-sm-12">Hierarchy</label>
        <select name="hierarchy" id="hierarchy" class="form-control">
            <option value="">Select</option>
          @foreach($departments as $department)
            <option value="{{ $department['id'] }}">{{ $department['title'] }}</option>
          @endforeach
        </select>
    

    
        <label class="col-sm-12">Product Group</label>
        <select name="product_groups" id="product_groups" class="form-control">
            <option value="">Select</option>
          @foreach($skuses as $sku)
            <option value="{{ $sku['id'] }}">{{ $sku['title'] }}</option>
          @endforeach
        </select>
    

    </div>
    <div class="col-md-3">
        <label class="col-sm-6">Min Qty</label>
        <input type="text" class="form-control" id="min_qty" name="min_qty" placeholder="Minimum Qty">
        <label class="col-sm-6">Max Qty</label>
        <input type="text" class="form-control" id="max_qty" name="max_qty" placeholder="Maximum Qty">
        <label class="col-sm-12">Reorder Level Quantity</label>
        <input type="text" class="form-control" id="re_order_level_qty" name="re_order_level_qty" placeholder="Reorder Level Qty">

        <label class="col-sm-12">Min Order Qty</label>
        <input type="text" class="form-control" id="min_order_qty" name="min_order_qty" placeholder="Minimum Order Qty">
        <label class="col-sm-12">Max Order Qty</label>
        <input type="text" class="form-control" id="max_order_qty" name="max_order_qty" placeholder="Maximum Order Qty">
        <label class="col-sm-12">PO Quantity Tolerence</label>
        <input type="text" class="form-control" id="po_qty_tolerence" name="po_qty_tolerence" placeholder="PO Qty Tolerence">
        
        <label class="col-sm-12">Office Selection</label>
        <select name="office_selection" id="office_selection" class="form-control">
            <option value="">Select</option>
          @foreach($departments as $department)
            <option value="{{ $department['id'] }}">{{ $department['title'] }}</option>
          @endforeach
        </select>
        <br>
        <input id="is_imported" name="is_imported" value="1" type="checkbox" > Is Imported
                <br>
        <input id="is_purchaseable" value="1" name="is_purchaseable" type="checkbox"> Is Purchaseable
        <br>
        <input id="is_saleable" value="1" name="is_saleable" type="checkbox"> Is Saleable
        <br>
        <input id="is_asset" name="is_asset" value="1" type="checkbox"> Is Asset
        <br>
        <input id="maintain_inventory" value="1" name="maintain_inventory" type="checkbox"> Maintain Inventory
        <br>
        <input id="maintain_serial" value="1" name="maintain_serial" type="checkbox"> Maintain Serial
        <br>
        <input id="maintain_batch" value="1" name="maintain_batch" type="checkbox"> Maintain Batch
        <br>
        
    
    </div>
    <div class="col-md-3">
        <label class="col-sm-12">Size/Packaging</label>
        <select name="size_pkg" id="size_pkg" class="form-control">
            <option value="">Select</option>
          @foreach($departments as $department)
            <option value="{{ $department['id'] }}">{{ $department['title'] }}</option>
          @endforeach
        </select>
        <label class="col-sm-12">Color</label>
        <select name="colors" id="colors" class="form-control">
            <option value="">Select</option>
          @foreach($colors as $color)
            <option value="{{ $color['id'] }}">{{ $color['title'] }}</option>
          @endforeach
        </select>

        <label class="col-sm-12">Catalog/Design No</label>
        <input type="text" class="form-control" id="catalog_design" name="catalog_design" placeholder="Catalog/Design No">
        <label class="col-sm-12">Article/Part No</label>
        <input type="text" class="form-control" id="article_part" name="article_part" placeholder="Article/Part No">
        <label class="col-sm-6">Registration</label>
        <input type="text" class="form-control" id="registration" name="registration" placeholder="Registration">
    </div>
    <div class="col-md-3">
        <label class="col-sm-12">Pieces in a Pack</label>
        <input type="text" class="form-control" id="pieces_pack" name="pieces_pack" placeholder="Pieces in a Pack">
        <label class="col-sm-12">Pieces in a Carton</label>
        <input type="text" class="form-control" id="pieces_carton" name="pieces_carton" placeholder="Pieces in a Carton">
        <label class="col-sm-12">Per piece Gramage or mililitre</label>
        <input type="text" class="form-control" id="pieces_gramage" name="pieces_gramage" placeholder="Per piece Gramage or mililitre">
        <label class="col-sm-12">Pieces in Msu</label>
        <input type="number" class="form-control" id="pieces_msu" name="pieces_msu">
        <label class="col-sm-12">Cases per Pallet</label>
        <input type="number" class="form-control" id="cases_per_pallet" name="cases_per_pallet">
    </div>
    
    <div class="col-md-3">
        <label class="col-sm-12">Cost Price</label>
        <input type="number" class="form-control" id="cost_price" name="cost_price">
        <label class="col-sm-6">Sales Price</label>
        <input type="number" class="form-control" id="sales_price" name="sales_price">
        <label class="col-sm-6">Retail Price</label>
        <input type="number" class="form-control" id="retail_price" name="retail_price">
    </div>

    <div class="col-md-3">
        <label class="col-sm-12">Principles</label>
        <input type="text" class="form-control" id="principle_order" name="principle_order" placeholder="Sorting Order">
        <label class="col-sm-6">Distributors</label>
        <input type="text" class="form-control" id="distributor_order" name="distributor_order" placeholder="Distributor">
        <label class="col-sm-6">Mobile</label>
        <input type="text" class="form-control" id="mobile_order" name="mobile_order" placeholder="Mobile">
    </div>

    
    
</div>