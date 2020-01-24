<?php
/**
 * Created by PhpStorm.
 * User: capstonestudent
 * Date: 1/15/2020
 * Time: 9:23 PM
 */ ?>
<link href="assets/css/custom.css" rel="stylesheet">
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Tables</h1>
    <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below. For more
        information about DataTables, please visit the <a target="_blank" href="https://datatables.net">official
            DataTables documentation</a>.</p>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Employee Lists</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <input type="button" class="btn btn-facebook" value="Add Employee" data-toggle="modal" data-target="#addEmp"><br><br>

                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <td class="text-center">Employee ID</td>
                        <td class="text-center">Name</td>
                        <td class="text-center">Position</td>
                        <td class="text-center">Schedule</td>
                        <td class="text-center">Member Since</td>
                        <td class="text-center">Tools</td>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td class="text-center">23</td>
                        <td>Mara Anunciacion</td>
                        <td>CEO</td>
                        <td></td>
                        <td>Member Since</td>
<!--                        <td>--><?php //echo $row->employee_id;?><!--</td>-->
<!--                        <td>--><?php //echo $row->employee_name;?><!--</td>-->
<!--                        <td>--><?php //echo $row->position;?><!--</td>-->
<!--                        <td>--><?php //echo $row->schedule; ?><!--</td>-->
<!--                        <td>--><?php //echo $row->datehired; ?><!--</td>-->
                        <td class="text-center text_center">
                            <i class="btn btn-info fa fa-edit iconedit" data-toggle="modal" data-target="#employeeEdit">&nbsp;&nbsp;Edit</i>&nbsp;&nbsp;&nbsp;
                            <i class="btn btn-danger fa fa-trash-alt icondelete" data-toggle="modal" data-target="#employeeDelete">&nbsp;&nbsp;Delete</i>
                        </td>
                    </tr>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- Modal -->
<!-------------   ADD EMPLOYEE ---------------->
    <div class="modal fade" id="addEmp" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title kulay" id="exampleModalLabel">Add Employee</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="post" action="<?=base_url('add_employee')?>">
                <div class="modal-body mod">
                    <div class="card">
                        <!--Card content-->
                        <div class="card-body px-lg-5 pt-0 border">
                            <br>
                                <div class="row">
                                    <div class="col">
                                        <label for="formGroupExampleInput"></label>
                                        <input type="text" class="form-control" id="formGroupExampleInput" placeholder="First name" name="firstname">
                                    </div>
                                    <div class="col-6">
                                        <label for="formGroupExampleInput2"></label>
                                        <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="Last name" name="lastname">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="formGroupExampleInput"></label>
                                    <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Address" name="address">
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <label for="formGroupExampleInput2"></label>
                                        <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="Birth date" name="birthdate">
                                    </div>
                                    <div class="col-6">
                                        <label for="formGroupExampleInput"></label>
                                        <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Contact number" name="contact">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="formGroupExampleInput2"></label>
                                    <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="Gender" name="gender">
                                </div>
                                <div class="form-group">
                                    <label for="formGroupExampleInput"></label>
                                    <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Position" name="position">
                                </div>
                                <div class="form-group">
                                    <label for="formGroupExampleInput"></label>
                                    <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Work schedule" name="schedule">
                                </div>
                                <div class="form-group">
                                    <label for="formGroupExampleInput2"></label>
                                    <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="Date hired" name="datehired">
                                </div>
                            <!-- Form -->
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" name="addEmployee">Submit</button>
                </div>
            </div>
        </div>
    </div>
    </form>

</div>
<!---------------EDIT MODAL-------------------->
<div class="modal fade" id="employeeEdit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title kulay" id="exampleModalLabel">Edit Employee Profile</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="post" action="<?=base_url('add_employee')?>">
            <div class="modal-body mod">
                <div class="card">
                    <!--Card content-->
                    <div class="card-body px-lg-5 pt-0 border">
                        <br>
                        <div class="row">
                            <div class="col">
                                <label for="formGroupExampleInput"></label>
                                <input type="text" class="form-control" id="formGroupExampleInput" placeholder="First name" name="firstname">
                            </div>
                            <div class="col-6">
                                <label for="formGroupExampleInput2"></label>
                                <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="Last name" name="lastname">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="formGroupExampleInput"></label>
                            <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Address" name="address">
                        </div>
                        <div class="row">
                            <div class="col">
                                <label for="formGroupExampleInput2"></label>
                                <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="Birth date" name="birthdate">
                            </div>
                            <div class="col-6">
                                <label for="formGroupExampleInput"></label>
                                <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Contact number" name="contact">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="formGroupExampleInput2"></label>
                            <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="Gender" name="gender">
                        </div>
                        <div class="form-group">
                            <label for="formGroupExampleInput"></label>
                            <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Position" name="position">
                        </div>
                        <div class="form-group">
                            <label for="formGroupExampleInput"></label>
                            <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Work schedule" name="schedule">
                        </div>
                        <div class="form-group">
                            <label for="formGroupExampleInput2"></label>
                            <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="Date hired" name="datehired">
                        </div>
                        <!-- Form -->
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
            </form>
        </div>
    </div>
</div>
<!--            END OF EDIT MODAL-->

<!---------------DELETE MODAL-------------------->
<div class="modal fade" id="employeeDelete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title kulay" id="exampleModalLabel">Delete Employee</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body mod">
                <div>
                    <!--Card content-->
                    <div>
                        <span style="color: black">Are you sure you want to delete this employee?</span>
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