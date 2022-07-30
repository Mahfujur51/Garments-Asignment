<script>
$(document).ready(function() {

    fetch_data();

    function statusChange(data) {
        if (data == 0) {
            return '<span class="badge badge-success" data-id="{data}"><i class="fa-solid fa-circle-check"></i></span>'
        } else {
            return '<span class="badge badge-danger" data-id="{data}"><i class="fa-solid fa-circle-xmark"></i></span>';

        }
    }

    function filterData(data) {
        if (data == null) {
            return ''
        } else {
            return data;
        }
    }


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
                    html +='<td contenteditable class="column_name" data-column_name="production_unit" data-id="' +data[count].id + '">' + filterData(data[count].production_unit) +'</td>';
                    html +='<td contenteditable class="column_name" data-column_name="fabric_ref" data-id="' +data[count].id + '">' + filterData(data[count].fabric_ref) + '</td>';
                    html +='<td  class="column_name" data-column_name="dye_factory" data-id="'+data[count].id + '">' + data[count].dye_factory + '</td>';
                    html += '<td class="column_status" data-column_name="pp_status" data-id="' +data[count].id + '" data-status="'+data[count].pp_status+'">' + statusChange(data[count].pp_status) + '</td>';
                    html += '<td class="column_status" data-column_name="fab_status" data-id="' +data[count].id + '" data-status="'+data[count].fab_status+'">' + statusChange(data[count].fab_status) + '</td>';
                    html += '<td  class="column_status" data-column_name="acc_status" data-id="' +data[count].id + '" data-status="'+data[count].acc_status+'">' + statusChange(data[count].acc_status) + '</td>';
                    html +='<td  class="column_status" data-column_name="prod_status" data-id="' +data[count].id + '" data-status="'+data[count].prod_status+'">' + statusChange(data[count].prod_status) + '</td>';

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
//Status Change Code 
$(document).on('click', '.column_status', function() {

      var column_name = $(this).data("column_name");
      var id = $(this).data("id")
      var status = $(this).data("status")
      var column_value;
        if(status==0){
            column_value=1;
        }else{
           column_value=0;
        }       
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
                console.log(data);
                fetch_data();
                toastr.success('Successfully Status Updated.')  
            }
        })
        fetch_data();

        function statusChange(data) {
            if (data == 0) {
                return '<span class="badge badge-success" data-id="{data}"><i class="fa-solid fa-circle-check"></i></span>'
            } else {
                return '<span class="badge badge-danger" data-id="{data}"><i class="fa-solid fa-circle-xmark"></i></span>';

            }
        }

        function filterData(data) {
            if (data == null) {
                return ''
            } else {
                return data;
            }
        }

        function fetch_data() {
        $.ajax({
            url: "/product",
            dataType: "json",
            success: function(data) {

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
                    html +='<td contenteditable class="column_name" data-column_name="production_unit" data-id="' +data[count].id + '">' + filterData(data[count].production_unit) +'</td>';
                    html +='<td contenteditable class="column_name" data-column_name="fabric_ref" data-id="' +data[count].id + '">' + filterData(data[count].fabric_ref) + '</td>';
                    html +='<td  class="column_name" data-column_name="dye_factory" data-id="'+data[count].id + '">' + data[count].dye_factory + '</td>';
                    html += '<td class="column_status" data-column_name="pp_status" data-id="' +data[count].id + '" data-status="'+data[count].pp_status+'">' + statusChange(data[count].pp_status) + '</td>';
                    html += '<td class="column_status" data-column_name="fab_status" data-id="' +data[count].id + '" data-status="'+data[count].fab_status+'">' + statusChange(data[count].fab_status) + '</td>';
                    html += '<td  class="column_status" data-column_name="acc_status" data-id="' +data[count].id + '" data-status="'+data[count].acc_status+'">' + statusChange(data[count].acc_status) + '</td>';
                    html +='<td  class="column_status" data-column_name="prod_status" data-id="' +data[count].id + '" data-status="'+data[count].prod_status+'">' + statusChange(data[count].prod_status) + '</td>';

                }
                $('tbody').html(html);
            }
        })
    }
})

</script>