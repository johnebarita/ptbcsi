<link href="<?=base_url()?>assets/css/custom.css" rel="stylesheet">
<div class="container-fluid">
    <!--    <h1 class="h3 mb-4 text-gray-800">Attendance - TODO ( Mariel) </h1>-->


    <!-- DataTales -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"><strong>TDZ</strong> <i class="divider"> / </i> <span>Overtime</span></h6>
        </div>
        <div class="card-body">
            <input type="button" class="btn btn-facebook" value="Add New Overtime" data-toggle="modal" data-target="#addOvertime"><br><br>
            <div class="table-responsive">
                <table class="table table-bordered" style="max-height: 50vh;overflow: auto" width="100%" cellspacing="0">
                    <thead>
                    <tr class="fonts">
                        <th>Date</th>
                        <th>EMPLOYEE ID</th>
                        <th>EMPLOYEE NAME</th>
                        <th>From</th>
                        <th>To</th>
                        <th>Reason</th>
                        <th>Status</th>
                        <th class="text_center">TOOLS</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($overtimes as $overtime):?>
                        <tr>
                            <td><?=$overtime->date_request;?></td>
                            <td><?=$overtime->employee_id;?></td>
                            <td><?=strtoupper($overtime->lastname." ".$overtime->firstname);?></td>
                            <td><?=$overtime->request_start_time;?></td>
                            <td><?=$overtime->request_end_time;?></td>
                            <td><?=$overtime->reason;?></td>
                            <td><?=$overtime->status;?></td>
                            <td class="text_center">
                                <i class="btn btn-info fa fa-edit iconaccept" <?=($overtime->status=='Pending' ? 'data-toggle="modal" ':'style=" cursor: not-allowed;"');?>
                                   data-target="#overtimeAccept<?=$overtime->overtime_request_id?>" >Accept</i>&nbsp;&nbsp;&nbsp;
                                <i class="btn btn-danger fa fa-trash-alt icondelete"<?=($overtime->status=='Pending' ? 'data-toggle="modal" ':'style=" cursor: not-allowed;"');?>
                                   data-target="#overtimeReject<?=$overtime->overtime_request_id?>">&nbsp;&nbsp;Reject</i>
                            </td>
                    <?php endforeach;?>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

<!--    Modal for Adding overtime-->
    <div class="modal fade" id="addOvertime" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title kulay" id="exampleModalLabel">Request Overtime</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body mod">
                    <div class="card">
                        <!--Card content-->
                        <div class="card-body px-lg-5 pt-0 border">
                            <br>
                            <form method="post" action="requestOvertime">
                                <select name="user_id" id="month" class="input input-sm monthName" style="width: 100%;padding: 5px;margin-top: 10px;">
                                    <?php foreach ($users as $user):?>
                                        <option value="<?=$user->employee_id;?>" ><?= strtoupper($user->lastname." ".$user->firstname);?></option>
                                    <?php endforeach;?>
                                </select>&nbsp;&nbsp;
                                <div class="form-group">
                                    <label for="formGroupExampleInput">Reason</label>
                                    <input type="text" class="form-control" id="formGroupExampleInput" name="reason" placeholder="Please state your reason" required/>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </form>
                            <!-- Form -->
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>



<!--    Edit Modal-->
    <div class="modal fade" id="overtimeEdit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Overtime</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="">
                        <div class="form-group row">
                            <label for="date" class="col-sm-4 col-form-label">Date</label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" id="date">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="empID" class="col-sm-4 col-form-label">Employee ID</label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" id="empID">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="empName" class="col-sm-4 col-form-label">Employee Name</label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" id="empName">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="datefrm" class="col-sm-4 col-form-label">Date From</label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" id="datefrm">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="dateto" class="col-sm-4 col-form-label">Date To</label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" id="dateto">
                            </div>
                        </div>

                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save</button>
                </div>
            </div>
        </div>
    </div>
    <?php foreach ($overtimes as $overtime):?>
        <div class="modal fade" id="overtimeAccept<?=$overtime->overtime_request_id?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <form action="updateOvertimeStatus" method="post">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Delete Schedule</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <p class="text_center">Are you sure you want to accept this?</p>
                        </div>
                        <input type="text" value=<?=$overtime->overtime_request_id?> name="overtime_id" hidden>
                        <input type="text" value="Accepted" name="status" hidden>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                            <button type="submit" class="btn btn-primary">Yes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    <?php endforeach;?>

    <!--    Modal for delete-->
    <?php foreach ($overtimes as $overtime):?>
    <div class="modal fade" id="overtimeReject<?=$overtime->overtime_request_id?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form action="updateOvertimeStatus" method="post">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Delete Schedule</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p class="text_center">Are you sure you want to reject this?</p>
                </div>
                    <input type="text" value=<?=$overtime->overtime_request_id?> name="overtime_id" hidden>
                    <input type="text" value="Rejected" name="status" hidden>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                    <button type="submit" class="btn btn-primary">Yes</button>
                </div>
                </form>
            </div>
        </div>
    </div>
    <?php endforeach;?>
</div>