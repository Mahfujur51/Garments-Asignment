<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.1.1.min.js">
        < script src = "https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" >
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" ></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.css">
  
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.js"></script>

    <title>Assignment</title>
</head>

<body>
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <h3 class="text-center">Assignment</h3>
            </div>
            <div class="card-body">

                <div class="card">
                    <div class="card-header bg-success">
                        Product Details
                    </div>
                    <div class="row mt-2 ml-2">
                        <div class="col-md-5">
                           <select name="filter" id="filter_item" class="form-control">
                               <option value="">Select Search filed</option>
                               <option value="article_no">Ariticle Number</option>
                               <option value="item">Item</option>
                               <option value="quantity">Quantity</option>
                               <option value="shipment_date">Shipment Date</option>
                               <option value="revise_date">Revised Date</option>
                               <option value="production_unit">Production Unit</option>
                               <option value="fabric_ref">Fabric Ref</option>
                               <option value="dye_factory">Dyeing Factory</option>
                               <option value="pp_status">PP Status</option>
                               <option value="fab_status">Fabrics Status</option>
                               <option value="acc_status">Accessories Status</option>
                               <option value="prod_status">Production Status</option>
                            </select>    
                        </div>
                        <div class="col-md-5">
                            <input type="text" class="form-control" id="search_value"  name="value">
                            </div>
                        <div class="col-md-2 text-center">
                            <button type="submit" class="btn btn-success" id="filter">FIlter Data</button>
                            </div>
                    
                     </div>
                    <div class="card-body">
                        <table class="table">
                            <thead class="text-success" style="background-color:#D5E6D6 !important">
                                <tr class="text-center">
                                    <th scope="col">Article No</th>
                                    <th scope="col">Item</th>
                                    <th scope="col">Qty</th>
                                    <th scope="col">Shipment Date</th>
                                    <th scope="col">Revised Date</th>
                                    <th scope="col">Production Unit</th>
                                    <th scope="col">Fabric Reference</th>
                                    <th scope="col">Dyeing Fectory</th>
                                    <th scope="col">PP Status</th>
                                    <th scope="col">Fabrics Status</th>
                                    <th scope="col">Accessories Status</th>
                                    <th scope="col">Production Status</th>
                                </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                        {{ csrf_field() }}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {

            fetch_data();

            function fetch_data() {
                $.ajax({
                    url: "/product",
                    dataType: "json",
                    success: function(data) {
                        console.log(data)


                        var html = '';
                        for (let count = 0; count < data.length; count++) {

                            html += '<tr>'
                            html += '<td class="column_name" data-column_name="article_no" data-id="' +
                                data[count].id + '">' + data[count].article_no + '</td>';
                            html += '<td  class="column_name" data-column_name="item" data-id="' + data[
                                count].id + '">' + data[count].item + '</td>';
                            html += '<td  class="column_name" data-column_name="quantity" data-id="' +
                                data[count].id + '">' + data[count].quantity + '</td>';
                            html +=
                                '<td  class="column_name" data-column_name="shipment_date" data-id="' +
                                data[count].id + '">' + data[count].shipment_date + '</td>';
                            html += '<td class="column_name" data-column_name="revise_date" data-id="' +
                                data[count].id + '">' + data[count].revise_date + '</td>';
                            html +='<td contenteditable class="column_name" data-column_name="production_unit" data-id="' +data[count].id + '">' + data[count].production_unit +'</td>';
                            html +='<td contenteditable class="column_name" data-column_name="fabric_ref" data-id="' +data[count].id + '">' + data[count].fabric_ref + '</td>';
                            html +='<td contenteditable class="column_name" data-column_name="dye_factory" data-id="'+data[count].id + '">' + data[count].dye_factory + '</td>';
                            html += '<td contenteditable class="column_name" data-column_name="pp_status" data-id="' +data[count].id + '" >' + data[count].pp_status + '</td>';
                            html += '<td contenteditable class="column_name" data-column_name="fab_status" data-id="' +data[count].id + '" >' + data[count].fab_status + '</td>';
                            html += '<td  contenteditable class="column_name" data-column_name="acc_status" data-id="' +data[count].id + '" >' + data[count].acc_status + '</td>';
                            html +='<td  contenteditable class="column_name" data-column_name="prod_status" data-id="' +data[count].id + '" >' + data[count].prod_status + '</td>';

                        }
                        $('tbody').html(html);
                    }
                })
            }
        });

        var _token = $('input[name="_token"]').val();

        $(document).on('blur', '.column_name', function() {
            var column_name = $(this).data("column_name");
            var column_value = $(this).text();
            var id = $(this).data("id");
            if (column_value != '') {
                $.ajax({
                    url: "{{ route('product.update') }}",
                    method: "POST",

                    data: {
                        column_name: column_name,
                        column_value: column_value,
                        id: id,
                        _token: _token
                    },
                    success: function(data) {
                        toastr.success('Successfully Data Updated.')  
                    }
                })
            } else {
               toastr.error('Data not Fill the Value');
            }
        });


    $(document).on('click','#filter',function(){
        let item_name = $('#filter_item').children("option:selected").val();
        let item_value = $('#search_value').val();
        //fetch_data();
        $.ajax({
            url: "/product",
            method:"GET",
            data: {
                    item_name: item_name,
                    item_value: item_value,
                    _token: _token
                },
            success:function(data){
                var html = '';
    
                for (let count = 0; count < data.length; count++) {
                            html += '<tr>'
                            html += '<td class="column_name" data-column_name="article_no" data-id="' +
                                data[count].id + '">' + data[count].article_no + '</td>';
                            html += '<td  class="column_name" data-column_name="item" data-id="' + data[
                                count].id + '">' + data[count].item + '</td>';
                            html += '<td  class="column_name" data-column_name="quantity" data-id="' +
                                data[count].id + '">' + data[count].quantity + '</td>';
                            html +=
                                '<td  class="column_name" data-column_name="shipment_date" data-id="' +
                                data[count].id + '">' + data[count].shipment_date + '</td>';
                            html += '<td class="column_name" data-column_name="revise_date" data-id="' +
                                data[count].id + '">' + data[count].revise_date + '</td>';
                            html +='<td contenteditable class="column_name" data-column_name="production_unit" data-id="' +data[count].id + '">' + data[count].production_unit +'</td>';
                            html +='<td contenteditable class="column_name" data-column_name="fabric_ref" data-id="' +data[count].id + '">' + data[count].fabric_ref + '</td>';
                            html +='<td contenteditable class="column_name" data-column_name="dye_factory" data-id="'+data[count].id + '">' + data[count].dye_factory + '</td>';
                            html += '<td contenteditable class="column_name" data-column_name="pp_status" data-id="' +data[count].id + '" >' + data[count].pp_status + '</td>';
                            html += '<td contenteditable class="column_name" data-column_name="fab_status" data-id="' +data[count].id + '" >' + data[count].fab_status + '</td>';
                            html += '<td  contenteditable class="column_name" data-column_name="acc_status" data-id="' +data[count].id + '" >' + data[count].acc_status + '</td>';
                            html +='<td  contenteditable class="column_name" data-column_name="prod_status" data-id="' +data[count].id + '" >' + data[count].prod_status + '</td>';

                 }       
                $('tbody').html(html);

            }

        })


      
      
    })    
    //Status Change Code 
 
  
    </script>

</body>

</html>
