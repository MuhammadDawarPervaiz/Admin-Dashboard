// AJAX For Category
    
    $(document).ready(function(){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    });

    $('#add_cat').click(function(e) 
    {
        e.preventDefault();
        id = $('#cat option:last-child').val();
        id++;
        category_name = $('input[name=category_name]').val();
        $.ajax(
        {
            type: 'post',
            url: '/add_cat',
            data: 
            {
                //'_token': $('input[name=_token]').val(), 
                'category_name': category_name
            },
            success: function(data) 
            {
                $('#cat').append("<option value='" + id + "'>" + data.category_name + "</option>");
            }
        });
        $('input[name=category_name]').val('');
    });

// AJAX For Brands

    $('#add_brand').click(function(e) 
    {
        e.preventDefault();
        id = $('#brand option:last-child').val();
        id++;
        brand_name = $('input[name=brand_name]').val();
        $.ajax(
        {
            type: 'post',
            url: '/add_brands',
            data: 
            {
                //'_token': $('input[name=_token]').val(), 
                'brand_name': brand_name
            },
            success: function(data) 
            {
                $('#brand').append("<option value='" + id + "'>" + data.brand_name + "</option>");
            }
        });
        $('input[name=brand_name]').val('');
    });

// AJAX For Delete Problem

    $('button[name^=delete_problem]').click(function(e) 
    {
        id = $(this).val();
        $.ajax(
        {
            type: 'post',
            url: 'delete_problem',
            data: 
            {
                'id': id
            },
            success: function(data) 
            {
                console.log();
            }
        });
    });

// AJAX For Default Status

    $('input[name=default_status]').click(function(e) 
    {
        id = $(this).val();
        $.ajax(
        {
            type: 'post',
            url: 'default_status',
            data: 
            {
                'id': id
            },
            success: function(data) 
            {
                console.log();
            }
        });
    });

// Code to calculate Grand Total    

    $('[data-repeater-list="group-c"]').on('keyup click', function(e) {
        var sum = 0;
        $('input[name*=problem_price]').each(function () {
            var value = $(this).val();
            if (isNaN(parseInt(value)) == false) {
                sum = sum + parseInt(value);
            }
        }, null);

        $('#total_ammount').text(sum);
        $('input[name="total"]').val(sum);

        $('#balance').val(0);
        $("#advance").val(0);
    });

    $('#advance').focus(function(e) {
        $("#advance").val("");
        var sum = 0;
        $('input[name*=problem_price]').each(function () {
            var value = $(this).val();
            if (isNaN(parseInt(value)) == false) {
                sum = sum + parseInt(value);
            }
        }, null);

        $('#total_ammount').text(sum);
        $('input[name="total"]').val(sum);
    });
    
// Code to calculate Balance    

    $('#advance').keyup(function(e)
    {
        advance = parseInt($("#advance").val());
        total_ammount = parseInt($('input[name="total"]').val());
        
        if(advance > total_ammount)
        {
            balance = 0;
            e.preventDefault();
            $('#advance_validation').modal('show');
        }
        else
        {
            balance =  total_ammount - advance;
            if(isNaN(balance))
            {
                balance = 0;
            }
        }
        
        $('#balance').val(balance);
    });
    $('#advance_validation').on('hide.bs.modal', function (e) {
        $('#advance').focus();
    });

// Code for Dashboard (Latest 10)

    $('#latest').click(function(e) 
    {
        e.preventDefault();
        $.ajax(
        {
            type: 'post',
            url: '/latest_order',
            success: function(data) 
            {
                console.log(data);
                $('#overview_table').append("<td>" + data.category_id + "</td>");
            }
        });
        $('input[name=category_name]').val('');
    });

// Print and submit

    $('#print_btn').click(function(e)
    { 
        $('#print').val('true');
    });