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


                    <?php
                        if ($users)
                        {
                            foreach ($users as $row){
                    ?>
                    <tr>
                        <td class="text-center"><?= $row->employee_id;?><i class="btn fa fa-eye float-right" data-toggle="modal" data-target="#employeeView<?=$row->employee_id ;?>" id="<?=$row->employee_id ;?>"></i></td>
                        <td><?= $row->firstname?>&nbsp;<?=$row->lastname?></td>
                        <td><?= $row->employee_status?></td>
                        <td><?= $row->lastname?></td>
                        <td>Member Since</td>

                        <td class="text-center text_center">
                            <i class="btn btn-info fa fa-edit iconedit" data-toggle="modal" data-target="#employeeEdit<?=$row->employee_id ;?>" id="<?=$row->employee_id ;?>">&nbsp;&nbsp;Edit</i>&nbsp;&nbsp;&nbsp;
                        </td>
                    </tr>
                                <?php
                            }
                        }
                        else
                        {
                            ?>
                            <tr>
                                <td colspan="2">NO DATA FOUND</td>
                            </tr>
                            <?php
                        }
                    ?>

                    </tbody>

                </table>
            </div>
        </div>
    </div>
    <pre>
    </pre>
    <!-- Modal -->
<!-------------   ADD EMPLOYEE ---------------->

    <div class="modal fade" id="addEmp" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl modku" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title kulay" id="exampleModalLabel">Add Employee</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="post" action="home/addEmployee">
                    <div class="modal-body mod">
                        <div class="card">
                            <!--Card content-->
                            <div class="card-body px-lg-5 pt-0 border">
                                <br>
                                <!-- Heading -->
                                <div class="font-weight-bold">
                                    BASIC INFORMATION
                                </div>
                                <div class="row">
                                    <div class="col-2">
                                        <label for="formGroupExampleInput"></label>
                                        <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Employee ID" name="employee_id">
                                    </div>
                                    <div class="col-4">
                                        <label for="formGroupExampleInput2"></label>
                                        <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="Lastname" name="lastname">
                                    </div>
                                    <div class="col-3">
                                        <label for="formGroupExampleInput"></label>
                                        <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Firstname" name="firstname">
                                    </div>
                                    <div class="col-3">
                                        <label for="formGroupExampleInput2"></label>
                                        <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="Middle Name" name="middlename">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-3">
                                        <label for="formGroupExampleInput2"></label>
                                        <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="Birthdate" name="birth_date">
                                    </div>
                                    <div class="col-6">
                                        <label for="formGroupExampleInput"></label>
                                        <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Address" name="address">
                                    </div>
                                    <div class="col-3">
                                        <label for="formGroupExampleInput2"></label>
                                        <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="Mobile Number" name="phone_number">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-2">
                                        <label for="formGroupExampleInput"></label>
                                        <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Home Tel No." name="home_no">
                                    </div>
                                    <div class="col-3">
                                        <label for="formGroupExampleInput"></label>
                                        <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Contact Person" name="contact_person">
                                    </div>
                                    <div class="col-2">
                                        <label for="formGroupExampleInput"></label>
                                        <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Tin Number" name="tin_no">
                                    </div>
                                    <div class="col-2">
                                        <label for="formGroupExampleInput2"></label>
                                        <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="Philhealth No." name="philhealth_no">
                                    </div>
                                    <div class="col-3">
                                        <label for="formGroupExampleInput"></label>
                                        <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Employee Status" name="employee_status">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <label for="formGroupExampleInput"></label>
                                        <input type="email" class="form-control" id="formGroupExampleInput" placeholder="Email Address" name="email">
                                    </div>
                                    <div class="col-3">
                                        <label for="formGroupExampleInput2"></label>
                                        <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="Bank Name / Branch" name="bank_name">
                                    </div>
                                    <div class="col-3">
                                        <label for="formGroupExampleInput"></label>
                                        <input type="text" class="form-control" id="formGroupExampleInput" placeholder="SSS Number" name="sss_no">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-2">
                                        <label for="formGroupExampleInput"></label>
                                        <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Pag-Ibig No." name="pagibig_no">
                                    </div>
                                    <div class="col-2">
                                        <label for="formGroupExampleInput2"></label>
                                        <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="Is active?" name="isActive">
                                    </div>
                                    <div class="col-2">
                                        <label for="formGroupExampleInput2"></label>
                                        <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="Marital Status" name="marital_status">
                                    </div>
                                    <div class="col-6">
                                        <label for="formGroupExampleInput"></label>
                                        <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Office Location" name="office_location">
                                    </div>
                                </div>
                                <br>
                                <!-- Divider -->
                                <!--                            <hr class="sidebar-divider">-->

                                <!-- Heading -->
                                <div class="font-weight-bold">
                                    MONTHLY SALARY AND DEDUCTION
                                </div>
                                <div class="row">
                                    <div class="col-3">
                                        <label for="formGroupExampleInput"></label>
                                        <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Position" name="position">
                                    </div>
                                    <div class="col-6">
                                        <label for="formGroupExampleInput"></label>
                                        <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Monthly Pay" name="monthly_pay">
                                    </div>
                                    <div class="col-3">
                                        <label for="formGroupExampleInput"></label>
                                        <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Is fixed salary?" name="isFixed_salary">
                                    </div>
                                </div>
                                <br>
                                <!-- Divider -->
                                <!--                            <hr class="sidebar-divider">-->

                                <!-- Heading -->
                                <div class="font-weight-bold">
                                    ALLOWANCE
                                </div>
                                <div class="row">
                                    <div class="col-3">
                                        <label for="formGroupExampleInput"></label>
                                        <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Transportation" name="transportation_allowance">
                                    </div>
                                    <div class="col-3">
                                        <label for="formGroupExampleInput2"></label>
                                        <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="Internet" name="internet_allowance">
                                    </div>
                                    <div class="col-3">
                                        <label for="formGroupExampleInput"></label>
                                        <input type="text" class="form-control" id="formGroupExampleInput"  placeholder="Meal" name="meal_allowance">
                                    </div>
                                    <div class="col-3">
                                        <label for="formGroupExampleInput2"></label>
                                        <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="Phone" name="phone_allowance">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <label for="formGroupExampleInput"></label>
                                        <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Total Allowance" name="total_allowance">
                                    </div>
                                </div>


                                <!--                            HIDDEN INPUTS-->
                                <div class="col-3">
                                    <label for="formGroupExampleInput"></label>
                                    <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Username" name="username" hidden>
                                </div>
                                <div class="col-3">
                                    <label for="formGroupExampleInput2"></label>
                                    <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="Password" name="password" hidden>
                                </div>
                                <div class="col-3">
                                    <label for="formGroupExampleInput"></label>
                                    <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Basic Pay" name="basic_pay" hidden>
                                </div>
                                <div class="col-3">
                                    <label for="formGroupExampleInput2"></label>
                                    <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="User Role Id" name="user_role_id" hidden>
                                </div>
                                <div class="col-3">
                                    <label for="formGroupExampleInput"></label>
                                    <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Employee Login Id" name="employee_login_id" hidden>
                                </div>
                                <div class="col-3">
                                    <label for="formGroupExampleInput2"></label>
                                    <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="Address Id" name="address_id" hidden>
                                </div>
                                <div class="col-3">
                                    <label for="formGroupExampleInput"></label>
                                    <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Position Id" name="position_id" hidden>
                                </div>
                                <div class="col-3">
                                    <label for="formGroupExampleInput2"></label>
                                    <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="Date Modified" name="date_modified" hidden>
                                </div>
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

<!--VIEW EMPLOYEE-->
    <?php
    if ($users) {
    foreach ($users as $row) {
    ?>

    <div class="modal fade" id="employeeView<?=$row->employee_id ;?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl modku" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title kulay" id="exampleModalLabel">View Employee Details</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="post" action="home/addEmployee">
                    <div class="modal-body mod">
                        <div class="card">
                            <!--Card content-->
                            <div class="card-body px-lg-5 pt-0 border">
                                <br>
                                <!-- Heading -->
                                <div class="font-weight-bold">
                                    BASIC INFORMATION
                                </div>
                                <div class="row">
                                    <div class="col-2">
                                        <label for="formGroupExampleInput"></label>
                                        <input type="text" class="form-control" id="formGroupExampleInput" value="<?=$row->employee_id;?>" name="employee_id">
                                    </div>
                                    <div class="col-4">
                                        <label for="formGroupExampleInput2"></label>
                                        <input type="text" class="form-control" id="formGroupExampleInput2" value="<?=$row->lastname;?>" name="lastname">
                                    </div>
                                    <div class="col-3">
                                        <label for="formGroupExampleInput"></label>
                                        <input type="text" class="form-control" id="formGroupExampleInput" value="<?=$row->firstname;?>" name="firstname">
                                    </div>
                                    <div class="col-3">
                                        <label for="formGroupExampleInput2"></label>
                                        <input type="text" class="form-control" id="formGroupExampleInput2" value="<?=$row->middlename;?>" name="middlename">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-3">
                                        <label for="formGroupExampleInput2"></label>
                                        <input type="text" class="form-control" id="formGroupExampleInput2" value="<?=$row->birth_date;?>" name="birth_date">
                                    </div>
                                    <div class="col-6">
                                        <label for="formGroupExampleInput"></label>
                                        <input type="text" class="form-control" id="formGroupExampleInput" value="<?=$row->address_id;?>" name="address">
                                    </div>
                                    <div class="col-3">
                                        <label for="formGroupExampleInput2"></label>
                                        <input type="text" class="form-control" id="formGroupExampleInput2" value="<?=$row->phone_number;?>" name="phone_number">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-2">
                                        <label for="formGroupExampleInput"></label>
                                        <input type="text" class="form-control" id="formGroupExampleInput" value="<?=$row->home_no;?>" name="home_no">
                                    </div>
                                    <div class="col-3">
                                        <label for="formGroupExampleInput"></label>
                                        <input type="text" class="form-control" id="formGroupExampleInput" value="<?=$row->contact_person;?>" name="contact_person">
                                    </div>
                                    <div class="col-2">
                                        <label for="formGroupExampleInput"></label>
                                        <input type="text" class="form-control" id="formGroupExampleInput" value="<?=$row->tin_no;?>" name="tin_no">
                                    </div>
                                    <div class="col-2">
                                        <label for="formGroupExampleInput2"></label>
                                        <input type="text" class="form-control" id="formGroupExampleInput2" value="<?=$row->philhealth_no;?>" name="philhealth_no">
                                    </div>
                                    <div class="col-3">
                                        <label for="formGroupExampleInput"></label>
                                        <input type="text" class="form-control" id="formGroupExampleInput" value="<?=$row->position_id;?>" name="employee_status">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <label for="formGroupExampleInput"></label>
                                        <input type="text" class="form-control" id="formGroupExampleInput" value="<?=$row->email;?>" name="email">
                                    </div>
                                    <div class="col-3">
                                        <label for="formGroupExampleInput2"></label>
                                        <input type="text" class="form-control" id="formGroupExampleInput2" value="<?=$row->bank_name;?>" name="bank_name">
                                    </div>
                                    <div class="col-3">
                                        <label for="formGroupExampleInput"></label>
                                        <input type="text" class="form-control" id="formGroupExampleInput" value="<?=$row->sss_no;?>" name="sss_no">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-2">
                                        <label for="formGroupExampleInput"></label>
                                        <input type="text" class="form-control" id="formGroupExampleInput" value="<?=$row->pagibig_no;?>" name="pagibig_no">
                                    </div>
                                    <div class="col-2">
                                        <label for="formGroupExampleInput2"></label>
                                        <input type="text" class="form-control" id="formGroupExampleInput2" value="<?=$row->isActive;?>" name="isActive">
                                    </div>
                                    <div class="col-2">
                                        <label for="formGroupExampleInput2"></label>
                                        <input type="text" class="form-control" id="formGroupExampleInput2" value="<?=$row->marital_status;?>" name="marital_status">
                                    </div>
                                    <div class="col-6">
                                        <label for="formGroupExampleInput"></label>
                                        <input type="text" class="form-control" id="formGroupExampleInput" value="<?=$row->office_location;?>" name="office_location">
                                    </div>
                                </div>
                                <br>
                                <div class="font-weight-bold">
                                    MONTHLY SALARY AND DEDUCTION
                                </div>
                                <div class="row">
                                    <div class="col-3">
                                        <label for="formGroupExampleInput"></label>
                                        <input type="text" class="form-control" id="formGroupExampleInput" value="<?=$row->position_id;?>" name="position">
                                    </div>
                                    <div class="col-6">
                                        <label for="formGroupExampleInput"></label>
                                        <input type="text" class="form-control" id="formGroupExampleInput" value="<?=$row->monthly_pay;?>" name="monthly_pay">
                                    </div>
                                    <div class="col-3">
                                        <label for="formGroupExampleInput"></label>
                                        <input type="text" class="form-control" id="formGroupExampleInput" value="<?=$row->isFixed_salary;?>" name="isFixed_salary">
                                    </div>
                                </div>
                                <br>
                                <div class="font-weight-bold">
                                    ALLOWANCE
                                </div>
                                <div class="row">
                                    <div class="col-3">
                                        <label for="formGroupExampleInput"></label>
                                        <input type="text" class="form-control" id="formGroupExampleInput" value="<?=$row->transportation_allowance;?>" name="transportation_allowance">
                                    </div>
                                    <div class="col-3">
                                        <!--                                        <span class="lutaw">Firstname</span>-->
                                        <label for="formGroupExampleInput2"></label>
                                        <input type="text" class="form-control" id="formGroupExampleInput2" value="<?=$row->internet_allowance;?>" name="internet_allowance">
                                    </div>
                                    <div class="col-3">
                                        <label for="formGroupExampleInput"></label>
                                        <input type="text" class="form-control" id="formGroupExampleInput" value="<?=$row->meal_allowance;?>" name="meal_allowance">
                                    </div>
                                    <div class="col-3">
                                        <label for="formGroupExampleInput2"></label>
                                        <input type="text" class="form-control" id="formGroupExampleInput2" value="<?=$row->phone_allowance;?>" name="phone_allowance">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <label for="formGroupExampleInput"></label>
                                        <input type="text" class="form-control" id="formGroupExampleInput" value="<?=$row->total_allowance;?>" name="total_allowance">
                                    </div>
                                </div>


                                <!--                            HIDDEN INPUTS-->
                                <div class="col-3">
                                    <label for="formGroupExampleInput"></label>
                                    <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Username" name="username" hidden>
                                </div>
                                <div class="col-3">
                                    <label for="formGroupExampleInput2"></label>
                                    <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="Password" name="password" hidden>
                                </div>
                                <div class="col-3">
                                    <label for="formGroupExampleInput"></label>
                                    <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Basic Pay" name="basic_pay" hidden>
                                </div>
                                <div class="col-3">
                                    <label for="formGroupExampleInput2"></label>
                                    <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="User Role Id" name="user_role_id" hidden>
                                </div>
                                <div class="col-3">
                                    <label for="formGroupExampleInput"></label>
                                    <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Employee Login Id" name="employee_login_id" hidden>
                                </div>
                                <div class="col-3">
                                    <label for="formGroupExampleInput2"></label>
                                    <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="Address Id" name="address_id" hidden>
                                </div>
                                <div class="col-3">
                                    <label for="formGroupExampleInput"></label>
                                    <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Position Id" name="position_id" hidden>
                                </div>
                                <div class="col-3">
                                    <label for="formGroupExampleInput2"></label>
                                    <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="Date Modified" name="date_modified" hidden>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
        </div>
    </div>
    </form>
</div>
<?php
}
}
?>

<!---------------EDIT MODAL-------------------->

<?php
    if ($users) {
        foreach ($users as $row) {
            ?>

<div class="modal fade" id="employeeEdit<?=$row->employee_id ;?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl modku" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title kulay" id="exampleModalLabel">Edit Employee Details</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="post" action="editEmployee">
                <div class="modal-body mod">
                    <div class="card">
                        <!--Card content-->
                        <div class="card-body px-lg-5 pt-0 border">
                            <br>
                            <!-- Heading -->
                            <div class="font-weight-bold">
                                BASIC INFORMATION
                            </div>
                            <div class="row">
                                <div class="col-2">
                                    <label for="formGroupExampleInput"></label>
                                    <input type="text" class="form-control" id="formGroupExampleInput" value="<?=$row->employee_id;?>" name="employee_id">
                                </div>
                                <div class="col-4">
                                    <label for="formGroupExampleInput2"></label>
                                    <input type="text" class="form-control" id="formGroupExampleInput2" value="<?=$row->lastname;?>" placeholder="Lastname" name="lastname">
                                </div>
                                <div class="col-3">
                                    <label for="formGroupExampleInput"></label>
                                    <input type="text" class="form-control" id="formGroupExampleInput" value="<?=$row->firstname;?>" placeholder="Firstname" name="firstname">
                                </div>
                                <div class="col-3">
                                    <label for="formGroupExampleInput2"></label>
                                    <input type="text" class="form-control" id="formGroupExampleInput2" value="<?=$row->middlename;?>" placeholder="Middle Name" name="middlename">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-3">
                                    <label for="formGroupExampleInput2"></label>
                                    <input type="text" class="form-control" id="formGroupExampleInput2" value="<?=$row->birth_date;?>" placeholder="Birthdate" name="birth_date">
                                </div>
                                <div class="col-6">
                                    <label for="formGroupExampleInput"></label>
                                    <input type="text" class="form-control" id="formGroupExampleInput" value="<?=$row->address_id;?>" placeholder="Address" name="address">
                                </div>
                                <div class="col-3">
                                    <label for="formGroupExampleInput2"></label>
                                    <input type="text" class="form-control" id="formGroupExampleInput2" value="<?=$row->phone_number;?>" placeholder="Mobile Number" name="phone_number">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-2">
                                    <label for="formGroupExampleInput"></label>
                                    <input type="text" class="form-control" id="formGroupExampleInput" value="<?=$row->home_no;?>" placeholder="Home Tel Number" name="home_no">
                                </div>
                                <div class="col-3">
                                    <label for="formGroupExampleInput"></label>
                                    <input type="text" class="form-control" id="formGroupExampleInput" value="<?=$row->contact_person;?>" placeholder="Contact Person" name="contact_person">
                                </div>
                                <div class="col-2">
                                    <label for="formGroupExampleInput"></label>
                                    <input type="text" class="form-control" id="formGroupExampleInput" value="<?=$row->tin_no;?>" placeholder="Tin Number" name="tin_no">
                                </div>
                                <div class="col-2">
                                    <label for="formGroupExampleInput2"></label>
                                    <input type="text" class="form-control" id="formGroupExampleInput2" value="<?=$row->philhealth_no;?>" placeholder="Philhealth Number" name="philhealth_no">
                                </div>
                                <div class="col-3">
                                    <label for="formGroupExampleInput"></label>
                                    <input type="text" class="form-control" id="formGroupExampleInput" value="<?=$row->position_id;?>" placeholder="Employee Status" name="employee_status">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <label for="formGroupExampleInput"></label>
                                    <input type="text" class="form-control" id="formGroupExampleInput" value="<?=$row->email;?>" placeholder="Email Address" name="email">
                                </div>
                                <div class="col-3">
                                    <label for="formGroupExampleInput2"></label>
                                    <input type="text" class="form-control" id="formGroupExampleInput2" value="<?=$row->bank_name;?>" placeholder="Bank Name / Branch" name="bank_name">
                                </div>
                                <div class="col-3">
                                    <label for="formGroupExampleInput"></label>
                                    <input type="text" class="form-control" id="formGroupExampleInput" value="<?=$row->sss_no;?>" placeholder="SSS Number" name="sss_no">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-2">
                                    <label for="formGroupExampleInput"></label>
                                    <input type="text" class="form-control" id="formGroupExampleInput" value="<?=$row->pagibig_no;?>" placeholder="Pag-Ibig Number" name="pagibig_no">
                                </div>
                                <div class="col-2">
                                    <label for="formGroupExampleInput2"></label>
                                    <input type="text" class="form-control" id="formGroupExampleInput2" value="<?=$row->isActive;?>" placeholder="Is active?" name="isActive">
                                </div>
                                <div class="col-2">
                                    <label for="formGroupExampleInput2"></label>
                                    <input type="text" class="form-control" id="formGroupExampleInput2" value="<?=$row->marital_status;?>" placeholder="Marital Status" name="marital_status">
                                </div>
                                <div class="col-6">
                                    <label for="formGroupExampleInput"></label>
                                    <input type="text" class="form-control" id="formGroupExampleInput" value="<?=$row->office_location;?>" placeholder="Office Location" name="office_location">
                                </div>
                            </div>
                            <br>
                            <!-- Divider -->
                            <!--                            <hr class="sidebar-divider">-->

                            <!-- Heading -->
                            <div class="font-weight-bold">
                                MONTHLY SALARY AND DEDUCTION
                            </div>
                            <div class="row">
                                <div class="col-3">
                                    <label for="formGroupExampleInput"></label>
                                    <input type="text" class="form-control" id="formGroupExampleInput" value="<?=$row->position_id;?>"  placeholder="Position" name="position">
                                </div>
                                <div class="col-6">
                                    <label for="formGroupExampleInput"></label>
                                    <input type="text" class="form-control" id="formGroupExampleInput" value="<?=$row->monthly_pay;?>" placeholder="Monthly Pay" name="monthly_pay">
                                </div>
                                <div class="col-3">
                                    <label for="formGroupExampleInput"></label>
                                    <input type="text" class="form-control" id="formGroupExampleInput" value="<?=$row->isFixed_salary;?>" placeholder="Is fixed salary?" name="isFixed_salary">
                                </div>
                            </div>
                            <br>
                            <!-- Divider -->
                            <!--                            <hr class="sidebar-divider">-->

                            <!-- Heading -->
                            <div class="font-weight-bold">
                                ALLOWANCE
                            </div>
                            <div class="row">
                                <div class="col-3">
                                    <label for="formGroupExampleInput"></label>
                                    <input type="text" class="form-control" id="formGroupExampleInput" value="<?=$row->transportation_allowance;?>" placeholder="Transportation" name="transportation_allowance">
                                </div>
                                <div class="col-3">
                                    <!--                                        <span class="lutaw">Firstname</span>-->
                                    <label for="formGroupExampleInput2"></label>
                                    <input type="text" class="form-control" id="formGroupExampleInput2" value="<?=$row->internet_allowance;?>" placeholder="Internet" name="internet_allowance">
                                </div>
                                <div class="col-3">
                                    <label for="formGroupExampleInput"></label>
                                    <input type="text" class="form-control" id="formGroupExampleInput" value="<?=$row->meal_allowance;?>" placeholder="Meal" name="meal_allowance">
                                </div>
                                <div class="col-3">
                                    <label for="formGroupExampleInput2"></label>
                                    <input type="text" class="form-control" id="formGroupExampleInput2" value="<?=$row->phone_allowance;?>" placeholder="Phone" name="phone_allowance">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <label for="formGroupExampleInput"></label>
                                    <input type="text" class="form-control" id="formGroupExampleInput" value="<?=$row->total_allowance;?>" placeholder="Total Allowance" name="total_allowance">
                                </div>
                            </div>


                            <!--                            HIDDEN INPUTS-->
                            <div class="col-3">
                                <label for="formGroupExampleInput"></label>
                                <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Username" name="username" hidden>
                            </div>
                            <div class="col-3">
                                <label for="formGroupExampleInput2"></label>
                                <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="Password" name="password" hidden>
                            </div>
                            <div class="col-3">
                                <label for="formGroupExampleInput"></label>
                                <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Basic Pay" name="basic_pay" hidden>
                            </div>
                            <div class="col-3">
                                <label for="formGroupExampleInput2"></label>
                                <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="User Role Id" name="user_role_id" hidden>
                            </div>
                            <div class="col-3">
                                <label for="formGroupExampleInput"></label>
                                <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Employee Login Id" name="employee_login_id" hidden>
                            </div>
                            <div class="col-3">
                                <label for="formGroupExampleInput2"></label>
                                <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="Address Id" name="address_id" hidden>
                            </div>
                            <div class="col-3">
                                <label for="formGroupExampleInput"></label>
                                <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Position Id" name="position_id" hidden>
                            </div>
                            <div class="col-3">
                                <label for="formGroupExampleInput2"></label>
                                <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="Date Modified" name="date_modified" hidden>
                            </div>
                            <!--                                <div class="form-group">-->
                            <!--                                    <label for="formGroupExampleInput2"></label>-->
                            <!--                                    <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="Date hired" name="datehired">-->
                            <!--                                </div>-->
                            <!-- Form -->
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" name="editEmployee">Submit</button>
                </div>
        </div>
    </div>
</div>
</form>
</div>
<?php
}
}
?>
