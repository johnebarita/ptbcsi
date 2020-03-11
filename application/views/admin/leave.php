<?php
/**
 * Created by PhpStorm.
 * User: capstonestudent
 * Date: 1/15/2020
 * Time: 9:23 PM
 */ ?>
<link href="<?=base_url();?>assets/css/custom.css" rel="stylesheet">
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-3 text-gray-800"><strong>TDZ</strong> <i class="divider"> / </i> <span>Leave Requests</span></h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <?php if($_SESSION['user_type']!="Employee"):?>
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"><a href="leave"><span>My Leave Requests</span></a></h6>
        </div>
        <?php endif;?>
        <br>
        <div>&nbsp;&nbsp;&nbsp;&nbsp;
            <button type="button" class="btn btn-facebook btn-md" data-toggle="modal" data-target="#leaveRequest">Add Leave Request</button>&nbsp;
            <?php if($_SESSION['user_type']!="Employee"):?>
            <button type="button" class="btn btn-facebook btn-md">
                <a href="employee-leave" class="kolor">Employees Leave Requests</a>
            </button>
            <?php endif;?>
        </div>
        <div class="card-body">
            <div class="table-responsive " style="overflow:auto; max-height: 50vh">
                <table class="table table-bordered"  id="dataTable" width="100%" cellspacing="0">
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
                        <td><?=$leave->employee_id?></td>
                        <td><?=$_SESSION['name']?></td>
                        <td><?=$leave->date_request?></td>
                        <td><?=$leave->request_start_time?></td>
                        <td><?=$leave->request_duration?></td>
                        <td><?=$leave->type?></td>
                        <td><?=$leave->status?></td>
                        <td class="text_center display-flex ">
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

<?php include  getcwd().'/application/views/includes/modals/add/add_leave_modal.php';?>
<!---------------LEAVE REQUEST MODAL-------------------->

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
                        <form method="post" action="update-leave">
                            <div class="form-group">
                                <label for="formGroupExampleInput">Employee Name</label>
                                <input type="text" class="form-control" value="<?=$_SESSION['name'];?>"  disabled>
                                <input type="text" name="leave_id" hidden value=<?=$leave->leave_request_id;?> />
                            </div>
                            <div class="form-group">
                                <label for="formGroupExampleInput2">Date Requested</label>
                                <input type="text" class="form-control"  value="<?=$leave->date_request;?>" disabled/>
                            </div>
                            <div>
                                <div class="form-group">
                                    <label for="formGroupExampleInput">Date from</label>
                                    <input type="date" class="form-control" name="date_from"min=<?=date('Y-m-d');?> value=<?=$leave->request_start_time;?>>
                                </div>
                                <div class="form-group">
                                    <label for="formGroupExampleInput2">Date to</label>
                                    <input type="date"  class="form-control" name="date_to"  value=<?=$leave->request_duration;?>>
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
            <form action="delete-leave" method="post">
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
<!--            END OF DELETE MODAL-->