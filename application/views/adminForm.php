<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?= $company_name; ?> | Register</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="<?= base_url() ?>public/bower_components/bootstrap/dist/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?= base_url() ?>public/bower_components/font-awesome/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="<?= base_url() ?>public/bower_components/Ionicons/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= base_url() ?>public/dist/css/AdminLTE.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="<?= base_url() ?>public/plugins/iCheck/square/blue.css">

    <link rel="stylesheet" href="<?= base_url() ?>public/bower_components/toastr/css/toastr.min.css">

    <link rel="stylesheet" href="<?= base_url() ?>public/plugins/datepicker/datepicker3.css">

    <link rel="stylesheet" href="<?= base_url() ?>public/plugins/select2/select2.min.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<style>
    .has-feedback label~.form-control-feedback {
        top: 0px;
    }

    .datepicker {
        padding-left: 12px;
    }

    .select2-container .select2-selection--single {
        height: 33px;
    }

    .select2-container--default .select2-selection--single,
    .select2-selection .select2-selection--single {
        padding: 6px 4px;
    }
</style>

<body class="hold-transition login-page">
    <div class="login-box">
        <div class="login-logo">
            <a href="<?= base_url() ?>"><b><?= $company_name; ?></b></a>
        </div>
        <!-- /.login-logo -->
        <div class="register-box-body">
            <p class="login-box-msg">Admin Registration</p>

            <form id="form-register" method="post">
                <div class="form-group has-feedback">
                    <label>
                        Type of Admin
                    </label>
                    <br>
                    <label>
                        <input type="radio" name="adminType" value="individual" checked="true">&nbsp;&nbsp;&nbsp;Individual
                    </label>&nbsp;&nbsp;&nbsp;
                    <label>
                        <input type="radio" name="adminType" value="institution">&nbsp;&nbsp;&nbsp;Institution
                    </label>
                </div>
                <div id="individualForm">
                    <div class="form-group has-feedback">
                        <input type="text" class="form-control" id="name" name="name" placeholder="Name" required="">
                        <span class="glyphicon glyphicon-user form-control-feedback"></span>
                    </div>
                    <div class="form-group has-feedback">
                        <input type="text" class="form-control datepicker" id="birthday" name="birthday" placeholder="birthday" required="">
                        <span class="glyphicon glyphicon-calendar form-control-feedback"></span>
                    </div>
                    <div class="form-group has-feedback">
                        <select class="form-control select2" name="State" required="" style="width: 100%;">
                            <option disabled>State</option>
                            <option selected="selected">Kerala</option>
                            <option>Alaska</option>
                            <option>California</option>
                            <option>Delaware</option>
                            <option>Tennessee</option>
                            <option>Texas</option>
                            <option>Washington</option>
                        </select>
                    </div>
                    <div class="form-group has-feedback">
                        <input type="text" class="form-control" name="District" placeholder="District" required="">
                        <span class="glyphicon glyphicon glyphicon-map-marker form-control-feedback"></span>
                    </div>
                    <div class="form-group has-feedback">
                        <input type="text" class="form-control" name="Taluk" placeholder="Taluk" required="">
                        <span class="glyphicon glyphicon glyphicon-map-marker form-control-feedback"></span>
                    </div>
                    <div class="form-group has-feedback">
                        <input type="text" class="form-control" name="panchayath" placeholder="Panchayath" required="">
                        <span class="glyphicon glyphicon glyphicon-map-marker form-control-feedback"></span>
                    </div>
                    <div class="form-group has-feedback">
                        <input type="tel" class="form-control" id="telNumber" name="telNumber" placeholder="Contact Number" required="" data-inputmask='"mask": "99999-99999"' data-mask>
                        <span class="glyphicon glyphicon-phone form-control-feedback"></span>
                    </div>
                    <div class="form-group has-feedback">
                        <input type="tel" class="form-control" name="WhatsappNumber" placeholder="Whatsapp Number" required="" data-inputmask='"mask": "99999-99999"' data-mask>
                        <span class="glyphicon glyphicon-phone form-control-feedback"></span>
                    </div>
                    <div class="form-group has-feedback">
                        <input type="email" class="form-control" id="email" name="email" placeholder="Email (optional)" required="">
                        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                    </div>
                    <div class="form-group has-feedback">
                        <input type="text" class="form-control" name="PostOffice" placeholder="Post Office" required="">
                        <span class="glyphicon glyphicon-phone form-control-feedback"></span>
                    </div>
                    <div class="form-group has-feedback">
                        <input type="text" class="form-control" name="Pincode" placeholder="Pincode" required="" pattern="[0-9]{6}" maxlength="6">
                        <span class="glyphicon glyphicon glyphicon-map-marker form-control-feedback"></span>
                    </div>
                </div>
                <div id="institutionForm" class="hide">
                    <div class="form-group has-feedback">
                        <input type="text" class="form-control" name="name_institution" placeholder="Name of institution" required="">
                        <span class="glyphicon glyphicon glyphicon-map-marker form-control-feedback"></span>
                    </div>
                    <div class="form-group has-feedback">
                        <select class="form-control select2" name="State" required="" style="width: 100%;">
                            <option selected disabled>Type of Institution</option>
                            <option>Alaska</option>
                            <option>California</option>
                            <option>Delaware</option>
                            <option>Tennessee</option>
                            <option>Texas</option>
                            <option>Washington</option>
                        </select>
                    </div>
                    <div class="form-group has-feedback">
                        <input type="text" class="form-control" name="register_number" placeholder="Register Number" required="">
                        <span class="glyphicon glyphicon glyphicon-map-marker form-control-feedback"></span>
                    </div>
                    <div class="form-group has-feedback">
                        <input type="tel" class="form-control" name="contact_name1" placeholder="Contact Name 1" required="">
                        <span class="glyphicon glyphicon-phone form-control-feedback"></span>
                    </div>
                    <div class="form-group has-feedback">
                        <input type="text" class="form-control" name="designation1" placeholder="Designation" required="">
                        <span class="glyphicon glyphicon glyphicon-map-marker form-control-feedback"></span>
                    </div>
                    <div class="form-group has-feedback">
                        <input type="tel" class="form-control" name="contact_number1" placeholder="Contact Number 1" required="" data-inputmask='"mask": "99999-99999"' data-mask>
                        <span class="glyphicon glyphicon-phone form-control-feedback"></span>
                    </div>
                    <div class="form-group has-feedback">
                        <input type="tel" class="form-control" name="contact_name2" placeholder="Contact Name 2" required="">
                        <span class="glyphicon glyphicon-phone form-control-feedback"></span>
                    </div>
                    <div class="form-group has-feedback">
                        <input type="text" class="form-control" name="designation2" placeholder="Designation" required="">
                        <span class="glyphicon glyphicon glyphicon-map-marker form-control-feedback"></span>
                    </div>
                    <div class="form-group has-feedback">
                        <input type="tel" class="form-control" name="contact_number2" placeholder="Contact Number 2" required="" data-inputmask='"mask": "99999-99999"' data-mask>
                        <span class="glyphicon glyphicon-phone form-control-feedback"></span>
                    </div>
                    <div class="form-group has-feedback">
                        <input type="email" class="form-control" id="email" name="email" placeholder="Email" required="">
                        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                    </div>
                    <div class="form-group has-feedback">
                        <input type="tel" class="form-control" name="WhatsappNumber" placeholder="Whatsapp Number" required="" data-inputmask='"mask": "99999-99999"' data-mask>
                        <span class="glyphicon glyphicon-phone form-control-feedback"></span>
                    </div>
                    <div class="form-group has-feedback">
                        <select class="form-control select2" name="State" required="" style="width: 100%;">
                            <option disabled>State</option>
                            <option selected="selected">Kerala</option>
                            <option>Alaska</option>
                            <option>California</option>
                            <option>Delaware</option>
                            <option>Tennessee</option>
                            <option>Texas</option>
                            <option>Washington</option>
                        </select>
                    </div>
                    <div class="form-group has-feedback">
                        <input type="text" class="form-control" name="District" placeholder="District" required="">
                        <span class="glyphicon glyphicon glyphicon-map-marker form-control-feedback"></span>
                    </div>
                    <div class="form-group has-feedback">
                        <input type="text" class="form-control" name="Taluk" placeholder="Taluk" required="">
                        <span class="glyphicon glyphicon glyphicon-map-marker form-control-feedback"></span>
                    </div>
                    <div class="form-group has-feedback">
                        <input type="text" class="form-control" name="panchayath" placeholder="Panchayath" required="">
                        <span class="glyphicon glyphicon glyphicon-map-marker form-control-feedback"></span>
                    </div>
                    <div class="form-group has-feedback">
                        <input type="text" class="form-control" name="PostOffice" placeholder="Post Office" required="">
                        <span class="glyphicon glyphicon-phone form-control-feedback"></span>
                    </div>
                    <div class="form-group has-feedback">
                        <input type="text" class="form-control" name="Pincode" placeholder="Pincode" required="" pattern="[0-9]{6}" maxlength="6">
                        <span class="glyphicon glyphicon glyphicon-map-marker form-control-feedback"></span>
                    </div>
                </div>
                <div class="form-group has-feedback">
                    <input type="password" class="form-control" id="password" name="password" placeholder="Password" required="">
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                </div>
                <div class="form-group has-feedback">
                    <input type="password" class="form-control" id="confirmPassword" name="confirmPassword" placeholder="Retype password" required="">
                    <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-primary btn-block btn-flat">Register</button>
                    </div>
                </div>
            </form>

            <br>

            <a href="<?= base_url() ?>login" class="text-center">I have already registered</a>
        </div>
        <!-- /.login-box-body -->
    </div>
    <!-- /.login-box -->

    <!-- jQuery 3 -->
    <script src="<?= base_url() ?>public/bower_components/jquery/dist/jquery.js"></script>
    <script src="<?= base_url() ?>public/bower_components/validate/jquery.validate.min.js"></script>
    <script src="<?= base_url() ?>public/bower_components/validate/additional-methods.min.js"></script>
    <!-- Bootstrap 3.3.7 -->
    <script src="<?= base_url() ?>public/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- Toastr -->
    <script src="<?= base_url() ?>public/bower_components/toastr/js/toastr.min.js"></script>
    <script src="<?= base_url() ?>public/bower_components/toastr/js/ui-toastr.min.js"></script>
    <!-- FastClick -->
    <script src="<?= base_url() ?>public/bower_components/fastclick/lib/fastclick.js"></script>
    <!-- AdminLTE App -->
    <script src="<?= base_url() ?>public/dist/js/adminlte.min.js"></script>
    <!-- DataTables -->
    <script src="<?= base_url() ?>public/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="<?= base_url() ?>public/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <!-- SlimScroll -->
    <script src="<?= base_url() ?>public/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
    <!-- iCheck -->
    <script src="<?= base_url() ?>public/plugins/iCheck/icheck.min.js"></script>
    <script src="<?= base_url() ?>public/plugins/datepicker/bootstrap-datepicker.js"></script>
    <script src="<?= base_url() ?>public/plugins/select2/select2.full.min.js"></script>
    <script src="<?= base_url() ?>public/plugins/input-mask/jquery.inputmask.js"></script>
    <script src="<?= base_url() ?>public/plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
    <script src="<?= base_url() ?>public/plugins/input-mask/jquery.inputmask.extensions.js"></script>
    <script src="<?= base_url() ?>public/dist/js/pages/register.js"></script>
    <script>
        var base_url = '<?php echo base_url(); ?>';
        $(function() {
            $(".select2").select2();

            $("[data-mask]").inputmask();

            $('input').iCheck({
                checkboxClass: 'icheckbox_square-blue',
                radioClass: 'iradio_square-blue',
                increaseArea: '20%' /* optional */
            });

            $('.datepicker').datepicker({
                autoclose: true,
                format: 'dd/mm/yyyy'
            });

            $('input[name="adminType"]').on('ifChecked', function(event) {
                $('#individualForm, #institutionForm').addClass('hide');
                $('#' + $(this).val() + 'Form').removeClass('hide');
            });
        });
    </script>
</body>

</html>