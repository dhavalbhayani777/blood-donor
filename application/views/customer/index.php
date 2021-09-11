<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Customer
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?= base_url() ?>dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Customer</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <!-- Info boxes -->
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <div class="col-xs-12 col-md-6">
                            <!-- <h3 class="box-title">Category List</h3> -->
                        </div>
                        <div class="col-xs-12 col-md-6 text-right">
                            <a href="javascript:void(0)" class="btn btn-info btn-flat add-city"><i class="fa fa-plus"></i>&nbsp;&nbsp;Add</a>
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body table-responsive">
                        <table id="city-table" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>Primary Mobile Number</th>
                                    <th>Secondary Mobile Number</th>
                                    <th>Email Address</th>
                                    <th>State</th>
                                    <th>City</th>
                                    <th>Pin Code</th>
                                    <th>Date of Installation</th>
                                    <th>Model Name/ Number</th>
                                    <th>Pricing</th>
                                    <th>Remarks</th>
                                    <th>Warranty Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<div class="modal fade" id="modal-city">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"></h4>
            </div>
            <form id="form-city" enctype="multipart/form-data">
                <input type="hidden" name="form-action" id="form-action">
                <input type="hidden" name="customer_id" id="customer_id">
                <div class="modal-body">
                    <div class="row grid-50">
                        <div class="form-group col-md-12">
                            <label for="first_name">First Name *</label>
                            <input type="text" class="form-control" name="first_name" id="first_name" placeholder="Enter First Name">
                        </div>
                        <div class="form-group col-md-12">
                            <label for="last_name">Last Name *</label>
                            <input type="text" class="form-control" name="last_name" id="last_name" placeholder="Enter Last Name">
                        </div>
                        <div class="form-group col-md-12">
                            <label for="primary_mobile_number">Primary Mobile Number *</label>
                            <input type="text" class="form-control" name="primary_mobile_number" id="primary_mobile_number" placeholder="Enter Primary Mobile Number">
                        </div>
                        <div class="form-group col-md-12">
                            <label for="secondary_mobile_number">Secondary Mobile Number</label>
                            <input type="text" class="form-control" name="secondary_mobile_number" id="secondary_mobile_number" placeholder="Enter Secondary Mobile Number">
                        </div>
                        <div class="form-group col-md-12">
                            <label for="email">Email Address</label>
                            <input type="text" class="form-control" name="email" id="email" placeholder="Enter Email Address">
                        </div>
                        <div class="form-group col-md-12">
                            <label for="state">State *</label>
                            <select class="form-control" name="state" id="state">
                                <?php
                                foreach ($state as $key => $value) {
                                ?>
                                    <option value="<?= $value['id']; ?>"><?= $value['name']; ?></option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group col-md-12">
                            <label for="city">City *</label>
                            <select class="form-control" name="city" id="city">
                                <?php
                                foreach ($city as $key => $value) {
                                ?>
                                    <option value="<?= $value['id']; ?>"><?= $value['name']; ?></option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group col-md-12">
                            <label for="pin_code">Pin Code *</label>
                            <input type="text" class="form-control" name="pin_code" id="pin_code" placeholder="Enter Pin Code">
                        </div>
                        <div class="form-group col-md-12">
                            <label for="date_installation">Date of Installation *</label>
                            <input type="date" class="form-control" name="date_installation" id="date_installation" placeholder="Enter Date of Installation">
                        </div>
                        <div class="form-group col-md-12">
                            <label for="model_name">Model Name/ Number *</label>
                            <input type="text" class="form-control" name="model_name" id="model_name" placeholder="Enter Model Name/ Number">
                        </div>
                        <div class="form-group col-md-12">
                            <label for="pricing">Pricing</label>
                            <input type="text" class="form-control" name="pricing" id="pricing" placeholder="Enter Pricing">
                        </div>
                        <div class="form-group col-md-12 position-relative">
                            <label for="remarks">Remarks *</label>
                            <input type="text" class="form-control" name="remarks[]" id="remarks" placeholder="Enter Remarks">
                            <div class="add_more_remarks"><i class="fa fa-plus"></i></div>
                        </div>
                        <div class="form-group col-md-12">
                            <label for="warranty_status">Warranty Status *</label>
                            <input type="text" class="form-control" name="warranty_status" id="warranty_status" placeholder="Enter Warranty Status">
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
<!-- /.modal -->