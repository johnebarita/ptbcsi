<?php
/**
 * Created by PhpStorm.
 * User: capstonestudent
 * Date: 1/15/2020
 * Time: 9:23 PM
 */ ?>
<link href="<?=base_url()?>assets/css/custom.css" rel="stylesheet">
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-3 text-gray-800"><strong>TDZ</strong> <i class="divider"> / </i> <span>Leave Requests</span></h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"><a href="leave"><span>My Leave Requests</span></a></h6>
        </div>
        <br>
        <div>&nbsp;&nbsp;&nbsp;&nbsp;
            <button type="button" class="btn btn-facebook btn-md" data-toggle="modal" data-target="#leaveRequest">Add Leave Request</button>&nbsp;
        </div>
        <div class="card-body">
            <div class="table-responsive" style="overflow:auto; max-height: 50vh">
                <table class="table table-bordered" id="dataTable"  width="100%" cellspacing="0">
                    <thead>
                    <tr class="fonts">
                        <th>EMPLOYEE ID</th>
                        <th>EMPLOYEE NAME</th>
                        <th>DATE REQUESTED</th>
                        <th>DATE FROM</th>
                        <th>DATE TO</th>
                        <th>TYPE</th>
                        <th>STATUS</th>
                        <th class="text_center">TOOLS</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($leaves as $leave):?>
                    <tr>
                        <td><?=$leave->employee_id;?></td>
                        <td><?=strtoupper($leave->lastname." ".$leave->firstname);?></td>
                        <td><?=$leave->date_request;?></td>
                        <td><?=$leave->request_start_time;?></td>
                        <td><?=$leave->request_duration;?></td>
                        <td><?=$leave->type;?></td>
                        <td><?=$leave->status;?></td>
                        <td class="text_center display-flex">
                            <i class="btn btn-info fa fa-edit iconaccept"<?=($leave->status=='Pending' ? 'data-toggle="modal" ':'style=" cursor: not-allowed;"');?>
                               data-target="#leaveRequestAccept<?=$leave->leave_request_id?>" >Accept</i>&nbsp;&nbsp;&nbsp;
                            <i class="btn btn-danger fa fa-trash-alt icondelete" <?=($leave->status=='Pending' ? 'data-toggle="modal" ':'style=" cursor: not-allowed; "');?>
                               data-target="#leaveRequestReject<?=$leave->leave_request_id?>">&nbsp;&nbsp;Reject</i>
                        </td>
                    <?php endforeach;?>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>

<!--add-->
<?php include  getcwd().'/application/views/includes/modals/add/add_leave_modal.php';?>

<!--accept-->
<?php foreach ($leaves as $leave):?>
<div class="modal fade" id="leaveRequestAccept<?=$leave->leave_request_id;?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title kulay" id="exampleModalLabel">Request Leave</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body mod">
                <div class="card">
                    <!--Card content-->
                    <div class="card-body px-lg-5 pt-0 border">
                        <br>
                        <form method="post" action="update-leave-status">
                            <div class="form-group">
                                <h5 for="formGroupExampleInput">Confirm accept leave request.</h5>
                                <input name ="leave_id" value=<?=$leave->leave_request_id;?> hidden type="text"/>
                                <input name ="status" value="Accepted" hidden type="text"/>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Accept</button>
                            </div>
                        </form>
                        <!-- Form -->
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
<?php endforeach;?>

<!--edit-->
<div class="modal fade" id="leaveRequestEdit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title kulay" id="exampleModalLabel">Edit Leave Request</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body mod">
                <div class="card">
                    <!--Card content-->
                    <div class="card-body px-lg-5 pt-0 border">
                        <br>
                        <form method="post" action="">
                            <div class="form-group">
                                <label for="formGroupExampleInput">Employee Name</label>
                                <input type="text" class="form-control" placeholder="Valerie Luna">
                            </div>
                            <div class="form-group">
                                <label for="formGroupExampleInput2">Date Requested</label>
                                <input type="text" class="form-control"  placeholder="mm / dd / yy">
                            </div>
                            <div>
                                <div class="form-group">
                                    <label for="formGroupExampleInput">Date from</label>
                                    <input type="text" class="form-control" placeholder="mm / dd / yy">
                                </div>
                                <div class="form-group">
                                    <label for="formGroupExampleInput2">Date to</label>
                                    <input type="text" class="form-control"  placeholder="mm / dd / yy">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="formGroupExampleInput">Type of Leave</label>
                                <input type="text" class="form-control" placeholder="dropdown ni">
                            </div>
                        </form>
                        <!-- Form -->
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>

<!--reject-->
<?php foreach ($leaves as $leave):?>
<div class="modal fade" id="leaveRequestReject<?=$leave->leave_request_id?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title kulay" id="exampleModalLabel">Request Leave</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body mod">
                <div class="card">
                    <!--Card content-->
                    <div class="card-body px-lg-5 pt-0 border">
                        <br>
                        <form method="post" action="update-leave-status">
                            <div class="form-group">
                                <h5 for="formGroupExampleInput">Confirm reject leave request.</h5>
                                <input name ="leave_id" value=<?=$leave->leave_request_id?> hidden type="text"/>
                                <input name ="status" value="Rejected" hidden type="text"/>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Reject</button>
                            </div>
                        </form>
                        <!-- Form -->
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
<?php endforeach;?>