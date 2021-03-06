<?php
/**
 * Created by PhpStorm.
 * User: capstonestudent
 * Date: 1/15/2020
 * Time: 9:23 PM
 */ ?>
<link href="../../../assets/css/custom.css" rel="stylesheet">
<link href="../assets/css/custom.css" rel="stylesheet">
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-3 text-gray-800"><strong>TDZ</strong> <i class="divider"> / </i> <span>Leave Requests</span></h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">My Leave Requests</h6>
        </div>
        <br>
        <div>&nbsp;&nbsp;&nbsp;&nbsp;
            <button type="button" class="btn btn-facebook btn-md" data-toggle="modal" data-target="#leaveRequest">Add Leave Request</button>
<!--            <span class="date_time_leave">-->
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
                        <th>TOOLS</th>
<!--                        <th class="text_center">TOOLS</th>-->
                    </tr>
                    </thead>
                    <tbody>
                       <?php foreach ($leaves as $leave):?>
                        <tr>
                            <td><?=$leave->employee_id?></td>
                            <td><?=$_SESSION['name']?></td>
                            <td><?=$leave->date_request?></td>
                            <td><?=$leave->request_start_time?></td>
                            <td><?=$leave->request_duration?></td>
                            <td><?=$leave->type?></td>
                            <td><?=$leave->status?></td>
                            <td class="text_center">
                                <i class="btn btn-info fa fa-edit iconedit" <?=($leave->status=='Pending' ? 'data-toggle="modal" ':'style=" cursor: not-allowed;"');?>
                                   data-target="#leaveRequestEdit<?=$leave->leave_request_id;?>"  >  &nbsp;&nbsp;Edit</i>&nbsp;&nbsp;&nbsp;
                                <i class="btn btn-danger fa fa-trash-alt icondelete"<?=($leave->status=='Pending' ? 'data-toggle="modal" ':'style=" cursor: not-allowed;"');?>
                                   data-target="#leaveRequestDelete<?=$leave->leave_request_id;?>">&nbsp;&nbsp;Delete</i>
                            </td>
                            <?php endforeach;?>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>

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
                        <form method="post" action="add_Leave">
                            <div class="form-group">
                                <label for="formGroupExampleInput">Employee Name</label>
                                <input type="text" class="form-control" id="formGroupExampleInput" value="<?=$_SESSION['name'];?>"  disabled>
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
<?php foreach ($leaves as $leave):?>
    <div class="modal fade" id="leaveRequestEdit<?=$leave->leave_request_id;?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                            <form method="post" action="updateLeaveRequest">
                                <div class="form-group">
                                    <label for="formGroupExampleInput">Employee Name</label>
                                    <input type="text" class="form-control" id="formGroupExampleInput" value="<?=$_SESSION['name'];?>"  disabled>
                                    <input type="text" name="leave_id" hidden value=<?=$leave->leave_request_id;?> />
                                </div>
                                <div class="form-group">
                                    <label for="formGroupExampleInput2">Date Requested</label>
                                    <input type="text" class="form-control" id="formGroupExampleInput2" value="<?=$leave->date_request;?>" disabled/>
                                </div>
                                <div>
                                    <div class="form-group">
                                        <label for="formGroupExampleInput">Date from</label>
                                        <input type="date" class="form-control" name="date_from"id="formGroupExampleInput" min=<?=date('Y-m-d');?> value=<?=$leave->request_start_time;?>>
                                    </div>
                                    <div class="form-group">
                                        <label for="formGroupExampleInput2">Date to</label>
                                        <input type="date"  class="form-control" name="date_to" id="formGroupExampleInput2" value=<?=$leave->request_duration;?>>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="formGroupExampleInput">Type of Leave</label>
                                    <select name="leave_type" id="leave_type" class="input input-sm year">
                                        <option value="Sick" <?=($leave->type=='Sick'? 'selected':'');?> >Sick</option>
                                        <option value="Maternity" <?=($leave->type=='Maternity'? 'selected':'');?> >Maternity</option>
                                    </select>&nbsp;&nbsp;
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                    <button type="submit" class="btn btn-primary">Save changes</button>
                                </div>
                            </form>
                            <!-- Form -->
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!--            END OF EDIT MODAL-->
<?php endforeach;?>
    <!---------------DELETE MODAL-------------------->
<?php foreach ($leaves as $leave):?>
    <div class="modal fade" id="leaveRequestDelete<?=$leave->leave_request_id;?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form action="deleteLeave" method="post">
                    <div class="modal-header">
                        <h5 class="modal-title kulay" id="exampleModalLabel">Delete Leave Request</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body mod">
                        <div>
                            <!--Card content-->
                            <div>
                                <span style="color: black">Are you sure you want to delete this request?</span>
                            </div>
                        </div>
                    </div>
                    <input type="text" name="leave_id" hidden value=<?=$leave->leave_request_id;?> />
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Delete</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php endforeach;?>