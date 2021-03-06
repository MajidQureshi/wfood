<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<style>
.table-wrapper {
    width: 700px;
    margin: 30px auto;
    background: #fff;
    padding: 20px;  
    box-shadow: 0 1px 1px rgba(0,0,0,.05);
}
.table-title {
    padding-bottom: 10px;
    margin: 0 0 10px;
}
.table-title h2 {
    margin: 6px 0 0;
    font-size: 22px;
}
.table-title .add-new-businesspartners {
    float: right;
    height: 30px;
    font-weight: bold;
    font-size: 12px;
    text-shadow: none;
    min-width: 100px;
    border-radius: 50px;
    line-height: 13px;
}
.table-title .add-new-businesspartners i {
    margin-right: 4px;
}
table.table {
    table-layout: fixed;
}
table.table tr th, table.table tr td {
    border-color: #e9e9e9;
}
table.table th i {
    font-size: 13px;
    margin: 0 5px;
    cursor: pointer;
}
table.table th:last-child {
    width: 100px;
}
table.table td a {
    cursor: pointer;
    display: inline-block;
    margin: 0 5px;
    min-width: 24px;
}    
table.table td a.add {
    color: #27C46B;
}
table.table td a.edit {
    color: #FFC107;
}
table.table td a.delete {
    color: #E34724;
}
table.table td i {
    font-size: 19px;
}
table.table td a.add i {
    font-size: 24px;
    margin-right: -1px;
    position: relative;
    top: 3px;
}    
table.table .form-control {
    height: 32px;
    line-height: 32px;
    box-shadow: none;
    border-radius: 2px;
}
table.table .form-control.error {
    border-color: #f50000;
}
table.table td .add {
    display: none;
}
</style>
<script>
$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();
    var actions = $("table td:last-child").html();
    // Append table with add row form on add new button click
    $(".add-new-businesspartners").click(function(){
        // $(this).attr("disabled", "disabled");
        var index = $("table tbody tr:last-child").index();
        var row = '<tr>' +
            '<td>'+
            '<input type="text" class="form-control" name="partner_type[]">'+
            '</td>'+
            '<td>'+
            '<input type="text" class="form-control" name="business_partner_code[]">'+
            '</td>'+
            '<td>'+
            '<input type="text" class="form-control" name="business_partner_name[]">'+
            '</td>'+
            '<td>'+
            '<input type="text" class="form-control" name="business_partner_product_code[]">'+
            '</td>'+
            '<td>'+
            '<input type="text" class="form-control" name="leadtime[]">'+
            '</td>'+
            '<td>'+
            '<input type="text" class="form-control" name="minimum_buy[]">'+
            '</td>'+
            '<td>'+
            '<input type="text" class="form-control" name="is_prefered_supplier[]">'+
            '</td>'+
            '<td>'+
            '<input type="text" class="form-control" name="native_lang_pro_name[]">'+
            '</td>'+
            '<td>' + actions + '</td>' +
        '</tr>';



        $("#businesspartners").append(row);     
        // $("#businesspartners tbody tr").eq(index + 1).find(".add, .edit").toggle();
        $('[data-toggle="tooltip"]').tooltip();
        $('.edit').hide();
    });
    // Add row on add button click
    $(document).on("click", ".add", function(){
        var empty = false;
        var input = $(this).parents("tr").find('input[type="text"]');
        input.each(function(){
            if(!$(this).val()){
                $(this).addClass("error");
                empty = true;
            } else{
                $(this).removeClass("error");
            }
        });
        $(this).parents("tr").find(".error").first().focus();
        if(!empty){
            input.each(function(){
                $(this).parent("td").html($(this).val());
            });         
            $(this).parents("tr").find(".add, .edit").toggle();
            $(".add-new-businesspartners").removeAttr("disabled");
        }       
    });
    // Edit row on edit button click
    $(document).on("click", ".edit", function(){        
        $(this).parents("tr").find("td:not(:last-child)").each(function(){
            $(this).html('<input type="text" class="form-control" value="' + $(this).text() + '">');
        });     
        $(this).parents("tr").find(".add, .edit").toggle();
        $(".add-new-businesspartners").attr("disabled", "disabled");
    });
    // Delete row on delete button click
    $(document).on("click", ".delete", function(){
        $(this).parents("tr").remove();
        $(".add-new-businesspartners").removeAttr("disabled");
    });
});
</script>
<div class="container-lg">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-8"><h2>Business Partners</h2></div>
                    <div class="col-sm-4">
                        <button type="button" class="btn btn-info add-new-businesspartners"><i class="fa fa-plus"></i> Add New</button>
                    </div>
                </div>
            </div>
    <div class="table-responsive" style="overflow-y: auto;height: 300px; overflow-y: visible;">
        
            
            <table class="table" id="businesspartners">
                <thead>
                    <tr>
                        
                        <th>Supplier Or Customer</th>
                                            <th>Business Partner Code</th>
                                            <th>Business Partner Name</th>
                                            <th>Business Partner Product Code</th>
                                            <th>Leadtime</th>
                                            <th>Minimum Buy</th>
                                            <th>Is Prefered Supplier</th>
                                            <th>Name of Product In Native Language</th>
                                            <th>Actions</th>
                    </tr>
                </thead>





                <tbody>
                    <tr>
                        <td>
                            <input type="text" class="form-control" name="partner_type[]">
                        </td>
                        <td>
                            <input type="text" class="form-control" name="business_partner_code[]">
                        </td>
                        <td>
                            <input type="text" class="form-control" name="business_partner_name[]">
                        </td>
                        <td>
                            <input type="text" class="form-control" name="business_partner_product_code[]">
                        </td>
                        <td>
                            <input type="text" class="form-control" name="leadtime[]">
                        </td>
                        <td>
                            <input type="text" class="form-control" name="minimum_buy[]">
                        </td>
                        <td>
                            <input type="text" class="form-control" name="is_prefered_supplier[]">
                        </td>
                        <td>
                            <input type="text" class="form-control" name="native_lang_pro_name[]">
                        </td>
                        <td>
                            
                            <a class="delete" title="Delete" data-toggle="tooltip"><i class="material-icons">&#xE872;</i></a>
                        </td>
                    </tr>
                    
                         
                </tbody>
            </table>
        
    </div>
</div>     



























<!-- 
<div class="col-lg-12">
                        <div class="white-box">
                           
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Sale Office</th>
                                            <th>Warehouse</th>
                                            <th>Min Qty</th>
                                            <th>Max Qty</th>
                                            <th>Reorder Level Qty</th>
                                            <th>Lead Time Transfer</th>
                                            <th>Ref. No</th>
                                            <th>Details</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>
                                                <select name="sale_offices" id="sale_offices" class="form-control">
            <option value="">Select</option>
          @foreach($sale_offices as $sale_office)
            <option value="{{ $sale_office['id'] }}">{{ $sale_office['title'] }}</option>
          @endforeach
        </select>

                                            </td>
                                            <td>
                                                <select name="warehouses" id="warehouses" class="form-control">
            <option value="">Select</option>
          @foreach($warehouses as $warehouse)
            <option value="{{ $warehouse['id'] }}">{{ $warehouse['title'] }}</option>
          @endforeach
        </select>
                                            </td>
                                            <td>
                                                <input type="text" class="form-control" name="stocknorms_min_qty[]">
                                            </td>
                                            <td>
                                                <input type="text" class="form-control" name="stocknorms_max_qty[]">
                                            </td>
                                            <td>
                                                <input type="text" class="form-control" name="stocknorms_reorder_level_qty[]">
                                            </td>
                                            <td>
                                                <input type="text" class="form-control" name="stocknorms_leadtime_transfer[]">
                                            </td>
                                            <td>
                                                <input type="text" class="form-control" name="stocknorms_ref_no[]">
                                            </td>
                                            <td>
                                                <input type="text" class="form-control" name="stocknorms_details[]">
                                            </td>
                                        </tr>
                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div> -->