$(document).ready(function () {
    $("#form-register").validate({
        rules: {
            'firstname': {
                required: true
            },
            'lastname': {
                required: true
            },
            'phone_no': {
                required: true
            },
            'district': {
                required: true
            },
            'panchayath': {
                required: true
            },
            'email': {
                required: true
            }, 
            'password': {
                required: true
            },
            'confirmPassword': {
                required: true,
                equalTo: "#password"
            }
        },
        messages: {
            'firstname': {
                required: "Please Enter First Name"
            },
            'lastname': {
                required: "Please Enter Last Name"
            },
            'phone_no': {
                required: "Please Enter Mobile Number"
            },
            'district': {
                required: "Please Enter District"
            },
            'panchayath': {
                required: "Please Enter Panchayath"
            },
            'email': {
                required: "Please Enter Email"
            },
            'password': {
                required: "Please Enter Password"
            },
            'confirmPassword': {
                required: "Please Enter Confirm Password",
                equalTo: "Confirmation password must be the same as the new password"
            }
        }
    });

    $(document).on('submit', '#form-register', function (e) {
        e.preventDefault();
        var data = new FormData(this);
        $.ajax({
            type: 'post',
            url: base_url + 'login/registration',
            data: data,
            cache: false,
            processData: false,
            contentType: false,
            dataType: 'JSON',
            success: function (data) {
                if (data.flag) {
                    toastr.success(data.msg, "");
                    setTimeout(function () {
                        // window.href.location = base_url + 'login';
                        window.location.href = base_url + 'login';
                    }, 3000);
                } else {
                    toastr.error(data.msg, "");
                }
            }
        });
    });
});