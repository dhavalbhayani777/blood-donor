$(document).ready(function () {
    $("#form-login").validate({
        rules: {
            'phone': {
                required: true
            },
            'password': {
                required: true
            }
        },
        messages: {
            'phone': {
                required: "Please Enter Phone Number"
            },
            'password': {
                required: "Please Enter Password"
            }
        }
    });

    $(document).on('submit', '#form-login', function (e) {
        e.preventDefault();
        var data = new FormData(this);
        $.ajax({
            type: 'post',
            url: base_url + 'login/validate',
            data: data,
            cache: false,
            processData: false,
            contentType: false,
            dataType: 'JSON',
            success: function (data) {
                if (data.flag) {
                    // toastr.success(data.msg, "");
                    // setTimeout(function () {
                        window.location.href = base_url + 'dashboard';
                    // }, 3000);
                } else {
                    toastr.error(data.msg, "");
                }
            }
        });
    });
});