$(document).ready(function () {
    
    var city_table = $('#city-table').DataTable({
        "info": true,
        "bSort": true,
        "paging": true,
        "searching": true,
        "iDisplayLength": 10,
        "bProcessing": true,
        "aoColumns": [
            {
                "mDataProp": "first_name"
            },
            {
                "mDataProp": "last_name"
            },
            {
                "mDataProp": "primary_mobile_number"
            },
            {
                "mDataProp": "secondary_mobile_number"
            },
            {
                "mDataProp": "email"
            },
            {
                "mDataProp": "state"
            },
            {
                "mDataProp": "city"
            },
            {
                "mDataProp": "pin_code"
            },
            {
                "mDataProp": "date_installation"
            },
            {
                "mDataProp": "model_name"
            },
            {
                "mDataProp": "pricing"
            },
            {
                "mDataProp": "remarks"
            },
            {
                "mDataProp": "warranty_status"
            },
            {
                "bSortable": false,
                "mDataProp": "action"
            }
        ],
        "serverSide": true,
        "sAjaxSource": base_url + 'customer/get_customer_data',
        "deferRender": true,
        "oLanguage": {
            "sEmptyTable": "No Customer in the system.",
            "sZeroRecords": "No Customer to display",
            "sProcessing": "Loading..."
        },
        "fnPreDrawCallback": function (oSettings) {

        },
        "fnServerParams": function (aoData) {
            aoData.push({
                "name": "get_giftcard_plan",
                "value": true
            });
        }
    });
    $(document).on('click', '.add-city', function () {
        $('#form-city')[0].reset();
        $('#modal-city #form-city #customer_id').val(0);
        $('#modal-city #form-city #blah').attr('src', '#');
        $('#modal-city #form-city #blah_div').hide();
        $('#inapp_product').attr('disabled', 'disabled');
        $('#inapp_product_div').css('display', 'none');
        $('#modal-city .modal-title').text('Add Customer');
        $('#modal-city #form-city #form-action').val('add');
        $('#state').val('21');
        $('#modal-city #form-city #state').attr('data-cityId', 0);
        $('#state').change();
        $('input[name="remarks[]"]').each(function(key, val) {
            if (key != 0) {
                $(this).parent().remove();
            }
        });
        $('#modal-city').modal('show');
    });
    $("#form-city").validate({
        rules: {
            'first_name': {
                required: true
            },
            'last_name': {
                required: true
            },
            'primary_mobile_number': {
                required: true
            },
            'city': {
                required: true
            },
            'state': {
                required: true
            },
            'pin_code': {
                required: true
            },
            'date_installation': {
                required: true
            },
            'model_name': {
                required: true
            },
            'remarks[]': {
                required: true
            },
            'warranty_status': {
                required: true
            }
        },
        messages: {
            'first_name': {
                required: "Please Enter First Name"
            },
            'last_name': {
                required: "Please Enter Last Name"
            },
            'primary_mobile_number': {
                required: "Please Enter Primary Mobile Number"
            },
            'city': {
                required: "Please Enter City"
            },
            'state': {
                required: "Select State"
            },
            'pin_code': {
                required: "Please Enter Pin Code"
            },
            'date_installation': {
                required: "Select Date Installation"
            },
            'model_name': {
                required: "Please Enter Model Name"
            },
            'remarks[]': {
                required: "Please Enter Remarks"
            },
            'warranty_status': {
                required: "Please Enter Warranty Status"
            }
        }
    });
    $(document).on('submit', '#form-city', function (e) {
        e.preventDefault();
        var data = new FormData(this);
        $.ajax({
            type: 'post',
            url: base_url + 'customer/add_edit_city',
            data: data,
            cache: false,
            processData: false,
            contentType: false,
            dataType: 'JSON',
            success: function (data) {
                if (data.flag) {
                    toastr.success(data.msg, "");
                    $('#modal-city').modal('hide');
                    $('#form-city')[0].reset();
                    city_table.draw();
                } else {
                    toastr.error(data.msg, "");
                }
            }
        });
    });
    $(document).on('click', '.edit-customer', function () {
        var city_id = $(this).data('id');
        $.ajax({
            type: 'post',
            url: base_url + 'customer/get_customer',
            data: 'customer_id=' + city_id,
            dataType: 'JSON',
            success: function (data) {
                if (data.flag) {
                    $('#modal-city .modal-title').text('Edit Customer');
                    $('#modal-city #form-city #form-action').val('edit');
                    $('#modal-city #form-city #customer_id').val(city_id);
                    $('#form-city')[0].reset();
                    $('#modal-city #form-city #state').val(data.data.state);
                    $('#modal-city #form-city #state').attr('data-cityId', data.data.city);
                    $('#state').change();
                    $('#modal-city #form-city #first_name').val(data.data.first_name);
                    $('#modal-city #form-city #last_name').val(data.data.last_name);
                    $('#modal-city #form-city #primary_mobile_number').val(data.data.primary_mobile_number);
                    $('#modal-city #form-city #secondary_mobile_number').val(data.data.secondary_mobile_number);
                    $('#modal-city #form-city #email').val(data.data.email);
                    $('#modal-city #form-city #pin_code').val(data.data.pin_code);
                    $('#modal-city #form-city #date_installation').val(data.data.date_installation);
                    $('#modal-city #form-city #model_name').val(data.data.model_name);
                    $('#modal-city #form-city #pricing').val(data.data.pricing);
                    $('#modal-city #form-city #warranty_status').val(data.data.warranty_status);
                    $('input[name="remarks[]"]').each(function (key, val) {
                        if (key != 0) {
                            $(this).parent().remove();
                        }
                    });
                    var remarks = data.data.remarks.split(',');
                    $(remarks).each(function(key, val) {
                        if (key == 0) {
                            $('#remarks').val(val);
                        } else {
                            var html = `<div class="form-group col-md-12 position-relative">
                                            <label for="remarks">&nbsp;</label>
                                            <input type="text" class="form-control" name="remarks[]" value="${val}" placeholder="Enter Remarks">
                                            <button class="remove_remarks"><i class="fa fa-times"></i></button>
                                        </div>`;
                            $('#remarks').parent().after(html);
                        }
                    });
                    $('#modal-city').modal('show');
                } else {
                    toastr.error(data.msg, "");
                }
            }
        });
    });

    $(document).on('click', '.delete-customer', function () {
        var customer_id = $(this).data('id');
        if (confirm('Are you sure you want to delete this customer?')) {
            $.ajax({
                type: 'post',
                url: base_url + 'customer/delete_customer',
                data: 'customer_id=' + customer_id,
                dataType: 'JSON',
                success: function (data) {
                    if (data.flag) {
                        city_table.draw();
                        toastr.success(data.msg, "");
                    } else {
                        toastr.error(data.msg, "");
                    }
                }
            });
        }
    });

    $('.add_more_remarks').click(function() {
        var html = `<div class="form-group col-md-12 position-relative">
                        <label for="remarks">&nbsp;</label>
                        <input type="text" class="form-control" name="remarks[]" placeholder="Enter Remarks">
                        <button class="remove_remarks"><i class="fa fa-times"></i></button>
                    </div>`;
        $('#remarks').parent().after(html);
    });

    $('#modal-city').on('click', '.remove_remarks', function () {
        $(this).parent().remove();
    });

    $('#modal-city').on('change', '#state', function() {
        var $this = this;
        $.ajax({
            type: 'post',
            url: base_url + 'customer/getCities',
            data: { 'StateId': $(this).val()},
            dataType: 'JSON',
            success: function (data) {
                var html = '';
                $(data).each(function(key, val) {
                    html += `<option value="${val.id}">${val.name}</option>`;
                });
                $('#city').html(html);
                if ($($this).attr('data-cityid') != 0) {
                    $('#city').val($($this).attr('data-cityid'));
                }
            }
        });
    });
});