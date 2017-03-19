jQuery(document).ready(function($){

    loadAllProducts();

    /*
    Init Ajax Verify Token
     */
    $.ajaxSetup(
        {
            headers:
            {
                'X-CSRF-Token': $('input[name="_token"]').val()
            }
        });


    /*
    Submit Form
     */
    $('#btn-submit').click(function() {

        $.ajax({
            type: "POST",
            url: '/add',
            data: $('form#frm-product').serialize()

        }).done(function( msg ) {
            loadAllProducts();
        });
    });


    /*
    Load All Products
     */
    function loadAllProducts() {

        $.ajax({
            type: "GET",
            url: '/products',
        }).done(function( data ) {

            $("table.table tbody").html('');

            var product_data = $.parseJSON(data);

            var html = '';
            var total_products = 0;
            var total_value = 0;
            var total_item = 0;

            $.each(product_data, function(idx, product) {


                html += '<tr>';
                html += '<td>'+ product.product_name +'</td>';
                html += '<td>'+ product.quantity_in_stock +'</td>';
                html += '<td>'+ product.price +'</td>';
                html += '<td>'+ parseFloat(product.quantity_in_stock) * parseFloat(product.price) +'</td>';
                html += '<td>'+ product.time +'</td>';
                html += '</tr>';

                total_products++;
                total_value += parseFloat(product.quantity_in_stock) * parseFloat(product.price);
                total_item += parseFloat(product.quantity_in_stock);
            });

            html += '<tr>';
            html += '<td> <strong>Total Products: </strong>'+ total_products +'</td>';
            html += '<td> <strong>Total quantity: </strong>'+ total_item +'</td>';
            html += '<td></td>';
            html += '<td> <strong>Total Values:</strong> '+ total_value +'</td>';
            html += '<td></td>';
            html += '</tr>';

            $("table.table tbody").append(html);
        });
    }
});