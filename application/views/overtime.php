<link href="assets/css/custom.css" rel="stylesheet">
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
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
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
                    <tr>
                        <td width="40">01</td>
                        <td width="80">faw</td>
                        <td align="center">hj</td>
                        <td class="text_center">jgyjh</td>
                        <td class="text_center">jhfjfh</td>
                        <td class="text_center">jfj</td>
                        <td class="text_center">jmhgnj</td>
                        <td class="text_center">
                            <i class="btn btn-info fa fa-edit iconaccept" data-toggle="modal" data-target="#overtimeEdit">&nbsp;&nbsp;Accept</i>&nbsp;&nbsp;&nbsp;
                            <i class="btn btn-danger fa fa-trash-alt icondelete" data-toggle="modal" data-target="#overtimeDelete">&nbsp;&nbsp;Delete</i>
                        </td>
                    </tr>
                    <tr>
                        <td width="40">01</td>
                        <td width="80">faw</td>
                        <td align="center">hj</td>
                        <td class="text_center">jgyjh</td>
                        <td class="text_center">jhfjfh</td>
                        <td class="text_center">jfj</td>
                        <td class="text_center">jmhgnj</td>
                        <td class="text_center">
                            <i class="btn btn-info fa fa-edit iconaccept" data-toggle="modal" data-target="#overtimeEdit">&nbsp;&nbsp;Accept</i>&nbsp;&nbsp;&nbsp;
                            <i class="btn btn-danger fa fa-trash-alt icondelete" data-toggle="modal" data-target="#overtimeDelete">&nbsp;&nbsp;Delete</i>
                        </td>
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
                    <button type="button" class="btn btn-primary">Add Overtime</button>
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

    <!--    Modal for delete-->
    <div class="modal fade" id="overtimeDelete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Delete Schedule</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p class="text_center">Are you sure you want to delete this?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                    <button type="button" class="btn btn-primary">Yes</button>
                </div>
            </div>
        </div>
    </div>
</div>