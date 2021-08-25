<?php $this->load->view('backend/header'); ?>
<?php $this->load->view('backend/sidebar'); ?>
         <div class="page-wrapper">
            <div class="message"></div>
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-themecolor"><i class="fa fa-hard-of-hearing" style="color:#1976d2"></i>Clocking</h3>
                </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item active">Clocking</li>
                    </ol>
                </div>
            </div>
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">

                <div class="row m-b-10"> 
                    <div class="col-12">
                        <button type="button" class="btn btn-info"><i class="fa fa-plus"></i><a href="<?php echo base_url(); ?>clocking/Save_Clocking" class="text-white"><i class="" aria-hidden="true"></i> Add Clocking </a></button>
                        <button type="button" class="btn btn-primary"><i class="fa fa-bars"></i><a href="#" class="text-white" data-toggle="modal" data-target="#Bulkmodal"><i class="" aria-hidden="true"></i>  Add Bulk Clocking</a></button>
                        <button type="button" class="btn btn-info"><i class="fa fa-plus"></i><a href="<?php echo base_url(); ?>clocking/Clocking_Report" class="text-white"><i class="" aria-hidden="true"></i> Clocking Report </a></button>
                    </div>
                </div>  
                <div class="row">
                    <div class="col-12">
                        <div class="card card-outline-info">
                            <div class="card-header">
                                <h4 class="m-b-0 text-white"> Clocking List  </h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive ">
                                    <table id="clocking123" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Employee Name</th>
                                                <th>PIN</th>
                                                <th>Date </th>
                                                <th>Sign In</th>
                                                <th>Sign Out</th>
                                                <th>Working Hour</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>#</th>
                                                <th>Employee Name</th>
                                                <th>PIN</th>
                                                <th>Date </th>
                                                <th>Sign In</th>
                                                <th>Sign Out</th>
                                                <th>Working Hour</th>
                                                <th>Action</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                           <?php 
                                                $counter = 1;
                                                foreach($clockinglist as $value): ?>
                                                    <tr>
                                                        <td><?php echo $counter; ?></td>
                                                        <td><mark><?php echo $value->name; ?></mark></td>
                                                        <td><?php echo $value->emp_id; ?></td>
                                                        <td><?php echo $value->clock_in_date; ?></td>
                                                        <td><?php echo $value->clock_in_time; ?></td>
                                                        <td><?php echo $value->clock_out_time; ?></td>
                                                        <td><?php echo $value->duration_hours; ?></td>
                                                        <td class="jsgrid-align-center ">
                                                        <?php if($value->clock_out_time == '2001-01-01 00:00:00') { ?>
                                                            <a href="Save_Clocking?A=<?php echo $value->clockingId; ?>" title="Edit" class="btn btn-sm btn-info waves-effect waves-light" data-value="Approve" >Sign Out</a><br>                           
                                                        <?php } ?>
                                                            <a href="Save_Clocking?A=<?php echo $value->clockingId; ?>" title="Edit" class="btn btn-sm btn-info waves-effect waves-light" data-value="Approve" ><i class="fa fa-pencil-square-o"></i></a>
                                                        </td>
                                                    </tr>
                                            <?php 
                                                $counter = $counter + 1;
                                                endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

<div id="Bulkmodal" class="modal fade " tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                           <form method="post" action="import" enctype="multipart/form-data">
                                            <div class="modal-header">
                                                <h4 class="modal-title" id="myModalLabel">Add Clocking</h4>
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                            </div>
                                            <div class="modal-body">
                                                <h4>Import Clocking<span><img src="<?php echo base_url(); ?>assets/images/finger.jpg" height="100px" width="100px"></span>Upload only CSV file</h4>
                                             
                                            <input type="file" name="csv_file" id="csv_file" accept=".csv"><br><br>
                                                                                        
                                            </div>
                                            <div class="modal-footer">
                                                <button type="submit" class="btn btn-info waves-effect">Save</button>
                                                <button type="button" class="btn btn-info waves-effect" data-dismiss="modal">Close</button>
                                            </div>
                                            </form>
                                        </div>
                                        <!-- /.modal-content -->
                                    </div>
                                    <!-- /.modal-dialog -->
                                </div>                             
<?php $this->load->view('backend/footer'); ?>
<script>
    $('#clocking123').DataTable({
        "aaSorting": [[2,'desc']],
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    });
</script>