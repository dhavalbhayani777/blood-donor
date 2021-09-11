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
            <p class="login-box-msg">Blood Donor Registration Form</p>

            <form id="form-register" method="post">
                <div class="form-group has-feedback">
                    <input type="text" class="form-control" id="name" name="name" placeholder="Name" required="">
                    <span class="glyphicon glyphicon-user form-control-feedback"></span>
                </div>
                <div class="form-group has-feedback">
                    <input type="text" class="form-control datepicker" id="dob" name="dob" placeholder="Date of Birth" required="">
                    <span class="glyphicon glyphicon-calendar form-control-feedback"></span>
                </div>
                <div class="form-group has-feedback">
                    <input type="text" class="form-control" id="age" name="age" placeholder="Age" required="" disabled>
                    <span class="glyphicon glyphicon-user form-control-feedback"></span>
                </div>
                <div class="form-group has-feedback">
                    <label>
                        Gender
                    </label>
                    <br>
                    <label>
                        <input type="radio" name="gender" class="male">&nbsp;&nbsp;&nbsp;Male
                    </label>&nbsp;&nbsp;&nbsp;
                    <label>
                        <input type="radio" name="gender" class="female">&nbsp;&nbsp;&nbsp;Female
                    </label>
                </div>
                <div class="form-group has-feedback">
                    <input type="text" class="form-control" id="blood_group" name="blood_group" placeholder="Blood Group" required="">
                    <span class="glyphicon glyphicon-tint form-control-feedback"></span>
                </div>
                <div class="form-group has-feedback">
                    <input type="text" class="form-control" id="place" name="place" placeholder="Place" required="">
                    <span class="glyphicon glyphicon glyphicon-map-marker form-control-feedback"></span>
                </div>
                <div class="form-group has-feedback">
                    <select class="form-control select2" id="State" name="State" required="" style="width: 100%;">
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
                    <input type="text" class="form-control" id="district" name="district" placeholder="District" required="">
                    <span class="glyphicon glyphicon glyphicon-map-marker form-control-feedback"></span>
                </div>
                <div class="form-group has-feedback">
                    <input type="text" class="form-control" id="taluk" name="taluk" placeholder="Taluk" required="">
                    <span class="glyphicon glyphicon glyphicon-map-marker form-control-feedback"></span>
                </div>
                <div class="form-group has-feedback">
                    <input type="text" class="form-control" id="panchayath" name="panchayath" placeholder="Panchayath" required="">
                    <span class="glyphicon glyphicon glyphicon-map-marker form-control-feedback"></span>
                </div>
                <div class="form-group has-feedback">
                    <input type="text" class="form-control" id="contact_number" name="contact_number" placeholder="Contact Number" required="" data-inputmask='"mask": "99999-99999"' data-mask>
                    <span class="glyphicon glyphicon-phone form-control-feedback"></span>
                </div>
                <div class="form-group has-feedback">
                    <input type="text" class="form-control" id="whatsapp_number" name="whatsapp_number" placeholder="Whatsapp Number" required="" data-inputmask='"mask": "99999-99999"' data-mask>
                    <span class="glyphicon glyphicon-phone form-control-feedback"></span>
                </div>
                <div class="form-group has-feedback">
                    <input type="email" class="form-control" id="email" name="email" placeholder="Email ID (optional)" required="">
                    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
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
                        <div class="checkbox icheck">
                            <label class="">
                                <div class="icheckbox_square-blue" aria-checked="false" aria-disabled="false" style="position: relative;">
                                    <input type="checkbox" style="position: absolute; top: -20%; left: -20%; display: block; width: 140%; height: 140%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;">
                                    <ins class="iCheck-helper" style="position: absolute; top: -20%; left: -20%; display: block; width: 140%; height: 140%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins>
                                </div>&nbsp;&nbsp;&nbsp;Check Declaration & Terms and condition.
                                <ol type="a" style="margin-left: 5px;">
                                    <li><a href="javascript:void(0);"> Declaration (frm db)</a></li>
                                    <li><a href="javascript:void(0);">Terms & Conditions(from db)</a></li>
                                </ol>
                            </label>
                        </div>
                    </div>
                    <!-- /.col -->
                    <!-- /.col -->
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-primary btn-block btn-flat">Register</button>
                    </div>
                </div>
            </form>

            <!-- <div class="social-auth-links text-center">
                <p>- OR -</p>
                <a href="#" class="btn btn-block btn-social btn-facebook btn-flat"><i class="fa fa-facebook"></i> Sign up using
                    Facebook</a>
                <a href="#" class="btn btn-block btn-social btn-google btn-flat"><i class="fa fa-google-plus"></i> Sign up using
                    Google+</a>
            </div> -->
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
        });
    </script>
</body>

</html>