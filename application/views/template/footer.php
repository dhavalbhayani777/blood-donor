<footer class="main-footer">
  <div class="pull-right hidden-xs"></div>
  <strong>Copyright &copy; <?= date('Y'); ?> IMS.</strong> All rights reserved.
</footer>

<!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
<div class="control-sidebar-bg"></div>

<div class="modal fade" id="modal-change-password">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Change Password</h4>
      </div>
      <form id="form-change_password" enctype="multipart/form-data">
        <input type="hidden" name="user_id" id="user_id" value="<?= $this->session->userdata('user_id'); ?>">
        <div class="modal-body">
          <div class="row">
            <div class="form-group col-md-12">
              <label for="current_password">Current Password *</label>
              <input type="text" class="form-control" name="current_password" id="current_password" placeholder="Enter Current Password">
            </div>
            <div class="form-group col-md-12">
              <label for="new_password">New Password *</label>
              <input type="text" class="form-control" name="new_password" id="new_password" placeholder="Enter New Password">
            </div>
            <div class="form-group col-md-12">
              <label for="confirm_password">Confirm Password *</label>
              <input type="text" class="form-control" name="confirm_password" id="confirm_password" placeholder="Enter Confirm Password">
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Save</button>
        </div>
      </form>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<div class="modal fade" id="modal-change-company">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Change Company Name</h4>
      </div>
      <form id="form-change_company" enctype="multipart/form-data">
        <input type="hidden" name="user_id" id="user_id" value="<?= $this->session->userdata('user_id'); ?>">
        <div class="modal-body">
          <div class="row">
            <div class="form-group col-md-12">
              <label for="company_name">Company Name *</label>
              <input type="text" class="form-control" name="company_name" id="company_name" placeholder="Enter Company Name" value="<?= $this->session->userdata('company_name'); ?>">
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Save</button>
        </div>
      </form>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>

</div>
<!-- ./wrapper -->
<script>
  var base_url = '<?php echo base_url(); ?>';
</script>
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
<!-- ChartJS -->
<?php $this->load->view('template/page_level_scripts'); ?>

<script>
  $(function() {
    $('.btn_change_password').click(function() {
      $('#form-change_password')[0].reset();
      $('#modal-change-password').modal('show');
    });

    $('.btn_change_company').click(function() {
      $('#modal-change-company').modal('show');
    });

    $("#form-change_password").validate({
      rules: {
        'current_password': {
          required: true
        },
        'new_password': {
          required: true,
          notEqualTo: "#current_password"
        },
        'confirm_password': {
          required: true,
          equalTo: "#new_password"
        }
      },
      messages: {
        'current_password': {
          required: "Please Enter Current Password"
        },
        'new_password': {
          required: "Please Enter New Password",
          notEqualTo: "New password must be the not same as the current password"
        },
        'confirm_password': {
          required: "Please Enter Confirm Password",
          equalTo: "Confirmation password must be the same as the new password"
        }
      }
    });

    $("#form-change_company").validate({
      rules: {
        'company_name': {
          required: true
        }
      },
      messages: {
        'company_name': {
          required: "Please Enter Company Name"
        }
      }
    });

    $('#modal-change-password').on('submit', "#form-change_password", function(e) {
      e.preventDefault();
      console.log(base_url);
      // var data = new FormData(this);
      $.ajax({
        type: 'post',
        url: base_url + 'login/changepassword',
        data: {
          "user_id": $('#user_id').val(),
          "current_password": $('#current_password').val(),
          "new_password": $('#new_password').val(),
        },
        dataType: 'JSON',
        success: function(data) {
          if (data.flag) {
            toastr.success(data.msg, "");
            $('#modal-change-password').modal('hide');
            $('#form-change_password')[0].reset();
          } else {
            toastr.error(data.msg, "");
          }
        }
      });
    });

    $('#modal-change-company').on('submit', "#form-change_company", function(e) {
      e.preventDefault();
      console.log(base_url);
      // var data = new FormData(this);
      $.ajax({
        type: 'post',
        url: base_url + 'login/changecompanyname',
        data: {
          "user_id": $('#user_id').val(),
          "company_name": $('#company_name').val()
        },
        dataType: 'JSON',
        success: function(data) {
          if (data.flag) {
            toastr.success(data.msg, "");
            $('#modal-change-company').modal('hide');
          } else {
            toastr.error(data.msg, "");
          }
        }
      });
    });
  });
</script>
</body>

</html>