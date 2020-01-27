<?php
/**
 * Created by PhpStorm.
 * User: capstonestudent
 * Date: 1/15/2020
 * Time: 9:23 PM
 */ ?>
<link href="assets/css/custom.css" rel="stylesheet">
<link href="../assets/css/custom.css" rel="stylesheet">
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
            <button type="button" class="btn btn-facebook btn-md" data-toggle="modal" data-target="#leaveRequest">Add Leave Request</button>
            <span class="date_time_leave">
                <span class="time">
                    <span class="iconn"><i class="fa fa-clock icon">&nbsp;&nbsp;&nbsp;</i>Time: </span>
                </span>
                <span class="iconn"><i class="fa fa-calendar icon">&nbsp;&nbsp;&nbsp;</i>Date: </span>
            </span>
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
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
                        <tr>
                            <td class="text_center">1807</td>
                            <td>Adams Apple</td>
                            <td>January 18, 2020</td>
                            <td>January 29, 2020</td>
                            <td>February 14, 2020</td>
                            <td>Sick Leave</td>
                            <td>Pending</td>
                            <td class="text_center">
                                <i class="btn btn-info fa fa-edit iconedit" data-toggle="modal" data-target="#leaveRequestEdit">&nbsp;&nbsp;Edit</i>&nbsp;&nbsp;&nbsp;
                                <i class="btn btn-danger fa fa-trash-alt icondelete" data-toggle="modal" data-target="#leaveRequestDelete">&nbsp;&nbsp;Delete</i>
                            </td>
                        </tr>
                        <tr>
                            <td class="text_center">1807</td>
                            <td>Adams Apple</td>
                            <td>December 12, 2019</td>
                            <td>December 15, 2019</td>
                            <td>December 30, 2019</td>
                            <td>Maternity Leave</td>
                            <td>Approved</td>
                            <td class="text_center">
                                <i class="btn btn-info fa fa-edit iconedit" data-toggle="modal" data-target="#leaveRequestEdit">&nbsp;&nbsp;Edit</i>&nbsp;&nbsp;&nbsp;
                                <i class="btn btn-danger fa fa-trash-alt icondelete" data-toggle="modal" data-target="#leaveRequestDelete">&nbsp;&nbsp;Delete</i>
                            </td>
                        </tr>
                        <tr>
                            <td class="text_center">1807</td>
                            <td>Adams Apple</td>
                            <td>April 11, 2019</td>
                            <td>April 30, 2019</td>
                            <td>May 5, 2019</td>
                            <td>Fraternity Leave</td>
                            <td>Approved</td>
                            <td class="text_center">
                                <i class="btn btn-info fa fa-edit iconedit" data-toggle="modal" data-target="#leaveRequestEdit">&nbsp;&nbsp;Edit</i>&nbsp;&nbsp;&nbsp;
                                <i class="btn btn-danger fa fa-trash-alt icondelete" data-toggle="modal" data-target="#leaveRequestDelete">&nbsp;&nbsp;Delete</i>
                            </td>
                        </tr>
                        <tr>
                            <td class="text_center">1807</td>
                            <td>Adams Apple</td>
                            <td>March 9, 2019</td>
                            <td>March 20, 2019</td>
                            <td>March 28, 2019</td>
                            <td>Sick Leave</td>
                            <td>Approved</td>
                            <td class="text_center">
                                <i class="btn btn-info fa fa-edit iconedit" data-toggle="modal" data-target="#leaveRequestEdit">&nbsp;&nbsp;Edit</i>&nbsp;&nbsp;&nbsp;
                                <i class="btn btn-danger fa fa-trash-alt icondelete" data-toggle="modal" data-target="#leaveRequestDelete">&nbsp;&nbsp;Delete</i>
                            </td>
                        </tr>
                        <tr>
                            <td class="text_center">1807</td>
                            <td>Adams Apple</td>
                            <td>December 12, 2019</td>
                            <td>December 15, 2019</td>
                            <td>December 30, 2019</td>
                            <td>Maternity Leave</td>
                            <td>Approved</td>
                            <td class="text_center">
                                <i class="btn btn-info fa fa-edit iconedit" data-toggle="modal" data-target="#leaveRequestEdit">&nbsp;&nbsp;Edit</i>&nbsp;&nbsp;&nbsp;
                                <i class="btn btn-danger fa fa-trash-alt icondelete" data-toggle="modal" data-target="#leaveRequestDelete">&nbsp;&nbsp;Delete</i>
                            </td>
                        </tr>
                        <tr>
                            <td class="text_center">1807</td>
                            <td>Adams Apple</td>
                            <td>April 11, 2019</td>
                            <td>April 30, 2019</td>
                            <td>May 5, 2019</td>
                            <td>Fraternity Leave</td>
                            <td>Approved</td>
                            <td class="text_center">
                                <i class="btn btn-info fa fa-edit iconedit" data-toggle="modal" data-target="#leaveRequestEdit">&nbsp;&nbsp;Edit</i>&nbsp;&nbsp;&nbsp;
                                <i class="btn btn-danger fa fa-trash-alt icondelete" data-toggle="modal" data-target="#leaveRequestDelete">&nbsp;&nbsp;Delete</i>
                            </td>
                        </tr>
                        <tr>
                            <td class="text_center">1807</td>
                            <td>Adams Apple</td>
                            <td>March 9, 2019</td>
                            <td>March 20, 2019</td>
                            <td>March 28, 2019</td>
                            <td>Sick Leave</td>
                            <td>Approved</td>
                            <td class="text_center">
                                <i class="btn btn-info fa fa-edit iconedit" data-toggle="modal" data-target="#leaveRequestEdit">&nbsp;&nbsp;Edit</i>&nbsp;&nbsp;&nbsp;
                                <i class="btn btn-danger fa fa-trash-alt icondelete" data-toggle="modal" data-target="#leaveRequestDelete">&nbsp;&nbsp;Delete</i>
                            </td>
                        </tr>
                        <tr>
                            <td class="text_center">1807</td>
                            <td>Adams Apple</td>
                            <td>December 12, 2019</td>
                            <td>December 15, 2019</td>
                            <td>December 30, 2019</td>
                            <td>Maternity Leave</td>
                            <td>Approved</td>
                            <td class="text_center">
                                <i class="btn btn-info fa fa-edit iconedit" data-toggle="modal" data-target="#leaveRequestEdit">&nbsp;&nbsp;Edit</i>&nbsp;&nbsp;&nbsp;
                                <i class="btn btn-danger fa fa-trash-alt icondelete" data-toggle="modal" data-target="#leaveRequestDelete">&nbsp;&nbsp;Delete</i>
                            </td>
                        </tr>
                        <tr>
                            <td class="text_center">1807</td>
                            <td>Adams Apple</td>
                            <td>April 11, 2019</td>
                            <td>April 30, 2019</td>
                            <td>May 5, 2019</td>
                            <td>Fraternity Leave</td>
                            <td>Approved</td>
                            <td class="text_center">
                                <i class="btn btn-info fa fa-edit iconedit" data-toggle="modal" data-target="#leaveRequestEdit">&nbsp;&nbsp;Edit</i>&nbsp;&nbsp;&nbsp;
                                <i class="btn btn-danger fa fa-trash-alt icondelete" data-toggle="modal" data-target="#leaveRequestDelete">&nbsp;&nbsp;Delete</i>
                            </td>

                        <tr>
                            <td class="text_center">1807</td>
                            <td>Adams Apple</td>
                            <td>January 18, 2020</td>
                            <td>January 29, 2020</td>
                            <td>February 14, 2020</td>
                            <td>Sick Leave</td>
                            <td>Pending</td>
                            <td class="text_center">
                                <i class="btn btn-info fa fa-edit iconedit" data-toggle="modal" data-target="#leaveRequestEdit">&nbsp;&nbsp;Edit</i>&nbsp;&nbsp;&nbsp;
                                <i class="btn btn-danger fa fa-trash-alt icondelete" data-toggle="modal" data-target="#leaveRequestDelete">&nbsp;&nbsp;Delete</i>
                            </td>
                        </tr>
                        <tr>
                            <td class="text_center">1807</td>
                            <td>Adams Apple</td>
                            <td>December 12, 2019</td>
                            <td>December 15, 2019</td>
                            <td>December 30, 2019</td>
                            <td>Maternity Leave</td>
                            <td>Approved</td>
                            <td class="text_center">
                                <i class="btn btn-info fa fa-edit iconedit" data-toggle="modal" data-target="#leaveRequestEdit">&nbsp;&nbsp;Edit</i>&nbsp;&nbsp;&nbsp;
                                <i class="btn btn-danger fa fa-trash-alt icondelete" data-toggle="modal" data-target="#leaveRequestDelete">&nbsp;&nbsp;Delete</i>
                            </td>
                        </tr>
                        <tr>
                            <td class="text_center">1807</td>
                            <td>Adams Apple</td>
                            <td>April 11, 2019</td>
                            <td>April 30, 2019</td>
                            <td>May 5, 2019</td>
                            <td>Fraternity Leave</td>
                            <td>Approved</td>
                            <td class="text_center">
                                <i class="btn btn-info fa fa-edit iconedit" data-toggle="modal" data-target="#leaveRequestEdit">&nbsp;&nbsp;Edit</i>&nbsp;&nbsp;&nbsp;
                                <i class="btn btn-danger fa fa-trash-alt icondelete" data-toggle="modal" data-target="#leaveRequestDelete">&nbsp;&nbsp;Delete</i>
                            </td>
                        </tr>
                        <tr>
                            <td class="text_center">1807</td>
                            <td>Adams Apple</td>
                            <td>March 9, 2019</td>
                            <td>March 20, 2019</td>
                            <td>March 28, 2019</td>
                            <td>Sick Leave</td>
                            <td>Approved</td>
                            <td class="text_center">
                                <i class="btn btn-info fa fa-edit iconedit" data-toggle="modal" data-target="#leaveRequestEdit">&nbsp;&nbsp;Edit</i>&nbsp;&nbsp;&nbsp;
                                <i class="btn btn-danger fa fa-trash-alt icondelete" data-toggle="modal" data-target="#leaveRequestDelete">&nbsp;&nbsp;Delete</i>
                            </td>
                        </tr>
                        <tr>
                            <td class="text_center">1807</td>
                            <td>Adams Apple</td>
                            <td>December 12, 2019</td>
                            <td>December 15, 2019</td>
                            <td>December 30, 2019</td>
                            <td>Maternity Leave</td>
                            <td>Approved</td>
                            <td class="text_center">
                                <i class="btn btn-info fa fa-edit iconedit" data-toggle="modal" data-target="#leaveRequestEdit">&nbsp;&nbsp;Edit</i>&nbsp;&nbsp;&nbsp;
                                <i class="btn btn-danger fa fa-trash-alt icondelete" data-toggle="modal" data-target="#leaveRequestDelete">&nbsp;&nbsp;Delete</i>
                            </td>
                        </tr>
                        <tr>
                            <td class="text_center">1807</td>
                            <td>Adams Apple</td>
                            <td>April 11, 2019</td>
                            <td>April 30, 2019</td>
                            <td>May 5, 2019</td>
                            <td>Fraternity Leave</td>
                            <td>Approved</td>
                            <td class="text_center">
                                <i class="btn btn-info fa fa-edit iconedit" data-toggle="modal" data-target="#leaveRequestEdit">&nbsp;&nbsp;Edit</i>&nbsp;&nbsp;&nbsp;
                                <i class="btn btn-danger fa fa-trash-alt icondelete" data-toggle="modal" data-target="#leaveRequestDelete">&nbsp;&nbsp;Delete</i>
                            </td>
                        </tr>
                        <tr>
                            <td class="text_center">1807</td>
                            <td>Adams Apple</td>
                            <td>March 9, 2019</td>
                            <td>March 20, 2019</td>
                            <td>March 28, 2019</td>
                            <td>Sick Leave</td>
                            <td>Approved</td>
                            <td class="text_center">
                                <i class="btn btn-info fa fa-edit iconedit" data-toggle="modal" data-target="#leaveRequestEdit">&nbsp;&nbsp;Edit</i>&nbsp;&nbsp;&nbsp;
                                <i class="btn btn-danger fa fa-trash-alt icondelete" data-toggle="modal" data-target="#leaveRequestDelete">&nbsp;&nbsp;Delete</i>
                            </td>
                        </tr>
                        <tr>
                            <td class="text_center">1807</td>
                            <td>Adams Apple</td>
                            <td>December 12, 2019</td>
                            <td>December 15, 2019</td>
                            <td>December 30, 2019</td>
                            <td>Maternity Leave</td>
                            <td>Approved</td>
                            <td class="text_center">
                                <i class="btn btn-info fa fa-edit iconedit" data-toggle="modal" data-target="#leaveRequestEdit">&nbsp;&nbsp;Edit</i>&nbsp;&nbsp;&nbsp;
                                <i class="btn btn-danger fa fa-trash-alt icondelete" data-toggle="modal" data-target="#leaveRequestDelete">&nbsp;&nbsp;Delete</i>
                            </td>
                        </tr>
                        <tr>
                            <td class="text_center">1807</td>
                            <td>Adams Apple</td>
                            <td>April 11, 2019</td>
                            <td>April 30, 2019</td>
                            <td>May 5, 2019</td>
                            <td>Fraternity Leave</td>
                            <td>Approved</td>
                            <td class="text_center">
                                <i class="btn btn-info fa fa-edit iconedit" data-toggle="modal" data-target="#leaveRequestEdit">&nbsp;&nbsp;Edit</i>&nbsp;&nbsp;&nbsp;
                                <i class="btn btn-danger fa fa-trash-alt icondelete" data-toggle="modal" data-target="#leaveRequestDelete">&nbsp;&nbsp;Delete</i>
                            </td>
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
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Submit</button>
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

<!---------------DELETE MODAL-------------------->
<div class="modal fade" id="leaveRequestDelete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
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
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary">Delete</button>
            </div>
        </div>
    </div>
</div>
<!--            END OF DELETE MODAL-->