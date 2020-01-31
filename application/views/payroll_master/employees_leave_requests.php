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
            <h6 class="m-0 font-weight-bold text-primary"><a href="leave_requests"><span>My Leave Requests</span></a></h6>
        </div>
        <br>
        <div>&nbsp;&nbsp;&nbsp;&nbsp;
            <button type="button" class="btn btn-facebook btn-md" data-toggle="modal" data-target="#leaveRequest">Add Leave Request</button>&nbsp;
<!--            <span class="date_time_leave_employee">-->
<!--                <span class="time">-->
<!--                    <span class="iconn"><i class="fa fa-clock icon">&nbsp;&nbsp;&nbsp;</i>Time: </span>-->
<!--                </span>-->
<!--                <span class="iconn"><i class="fa fa-calendar icon">&nbsp;&nbsp;&nbsp;</i>Date: </span>-->
<!--            </span>-->
        </div>
        <div class="card-body">
            <div class="table-responsive" style="overflow:auto; max-height: 50vh">
                <table class="table table-bordered"  width="100%" cellspacing="0">
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
                        <td class="text_center">
                            <i class="btn btn-info fa fa-edit iconaccept" data-toggle="modal" data-target="#leaveRequestAccept<?=$leave->leave_request_id?>" >Accept</i>&nbsp;&nbsp;&nbsp;
                            <i class="btn btn-danger fa fa-trash-alt icondelete" data-toggle="modal" data-target="#leaveRequestReject<?=$leave->leave_request_id?>">&nbsp;&nbsp;Reject</i>
                        </td>
                    <?php endforeach;?>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>

<!---------------LEAVE ACCEPT MODAL-------------------->
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
                        <form method="post" action="updateLeaveStatus">
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
<!---------------LEAVE REQUEST MODAL-------------------->
<div class="modal fade" id="leaveRequest" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                        <form method="post" action="addEmployeeLeave">
                            <div class="form-group">
                                <label for="formGroupExampleInput">Employee Name</label>
                                <br/>
                                <select name="user_id" id="month" class="input input-sm monthName" style="width: 100%;padding: 5px">
                                    <?php foreach ($users as $user):?>
                                    <option value="<?=$user->employee_id;?>" ><?= strtoupper($user->lastname." ".$user->firstname);?></option>
                                    <?php endforeach;?>
                                </select>&nbsp;&nbsp;
                            </div>
                            <div class="form-group">
                                <input type="date" class="form-control" id="formGroupExampleInput2" placeholder="mm : dd : yy" hidden>
                            </div>
                            <div>
                                <div class="form-group">
                                    <label for="formGroupExampleInput">Date from</label>
                                    <input type="date" id="date" class="form-control" id="formGroupExampleInput" name="date_from" value="<?=date("Y-m-d");?>" >
                                </div>
                                <div class="form-group">
                                    <label for="formGroupExampleInput2">Date to</label>
                                    <input type="date" class="form-control" id="formGroupExampleInput2" name="date_to" value="<?=date("Y-m-d");?>" >
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="formGroupExampleInput">Type of Leave</label>
                                <select name="leave_type" id="leave_type" class="input input-sm year">
                                    <option value="Sick" >Sick</option>
                                    <option value="Maternity" >Maternity</option>
                                </select>&nbsp;&nbsp;
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

<!--            END OF LEAVE REQUEST MODAL-->

<!---------------EDIT MODAL-------------------->
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
                                <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Valerie Luna">
                            </div>
                            <div class="form-group">
                                <label for="formGroupExampleInput2">Date Requested</label>
                                <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="mm / dd / yy">
                            </div>
                            <div>
                                <div class="form-group">
                                    <label for="formGroupExampleInput">Date from</label>
                                    <input type="text" class="form-control" id="formGroupExampleInput" placeholder="mm / dd / yy">
                                </div>
                                <div class="form-group">
                                    <label for="formGroupExampleInput2">Date to</label>
                                    <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="mm / dd / yy">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="formGroupExampleInput">Type of Leave</label>
                                <input type="text" class="form-control" id="formGroupExampleInput" placeholder="dropdown ni">
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
<!--            END OF EDIT MODAL-->

<!---------------REJECT MODAL-------------------->
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
                        <form method="post" action="updateLeaveStatus">
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
<?php endforeach;?><!--            END OF DELETE MODAL-->