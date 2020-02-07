<?php
/**
 * Created by PhpStorm.
 * User: capstonestudent
 * Date: 2/06/2020
 * Time: 6:38 PM
 */ ?>
<link href="<?=base_url()?>assets/css/custom.css" rel="stylesheet">
<div class="container-fluid">
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
                    <?php foreach ($employees as $employee):?>
                            <tr>
                                <td class="text-center"><?= $employee->employee_id;?>
                                    <i class="btn fa fa-eye float-right" data-toggle="modal" data-target="#employeeView<?=$employee->employee_id ;?>" id="<?=$employee->employee_id ;?>"></i>
                                </td>
                                <td><?= $employee->firstname.' '.$employee->middlename.' '.$employee->lastname;?></td>
                                <td><?= $employee->employee_status;?></td>
                                <td>Schedule</td>
                                <td>Member Since</td>
                                <td class="text-center text_center">
                                    <i class="btn btn-info fa fa-edit iconedit" data-toggle="modal" data-target="#employeeEdit<?=$employee->employee_id ;?>" id="<?=$employee->employee_id ;?>">&nbsp;&nbsp;Edit</i>&nbsp;&nbsp;&nbsp;
                                </td>
                            </tr>
                    <?php endforeach;?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="modal fade" id="addEmp" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl modku" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title kulay" id="exampleModalLabel">Add Employee</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <?php echo validation_errors(); ?>
                <form method="post" action="add-employee">
                    <div class="modal-body mod">
                        <div class="card">
                            <div class="card-body px-lg-5 pt-0 border">
                                <br>
                                <div class="font-weight-bold">BASIC INFORMATION</div>
                                <div class="row">
                                    <div class="col-3">
                                        <label for="formGroupExampleInput"></label>
                                        <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Firstname" name="firstname" required>
                                    </div>
                                    <div class="col-3">
                                        <label for="formGroupExampleInput2"></label>
                                        <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="Middle Name" name="middlename">
                                    </div>
                                    <div class="col-4">
                                        <label for="formGroupExampleInput2"></label>
                                        <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="Lastname" name="lastname" required>
                                    </div>
                                    <div class="col-2">
                                        <label for="formGroupExampleInput"></label>
                                        <select required name="gender" id="gender" class="input input-sm monthName" style="width: 100%;padding: 5px" required>
                                            <option selected hidden>Gender</option>
                                            <option value="Male">Male</option>
                                            <option value="Female">Female</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-3">
                                        <label for="formGroupExampleInput2"></label>
                                        <input onfocus=" (this. type='date')" type="text" class="form-control" id="formGroupExampleInput2" placeholder="Birthdate" name="birth_date" required>
                                    </div>
                                    <div class="col-3">
                                        <label for="formGroupExampleInput2"></label>
                                        <select required name="marital_status" id="marital_status" class="input input-sm monthName" style="width: 100%;padding: 5px" required>
                                            <option selected hidden>Marital Status</option>
                                            <option value="Single">Single</option>
                                            <option value="Married">Married</option>
                                            <option value="Widow">Widow</option>
                                        </select>
                                    </div>
                                    <div class="col-6">
                                        <label for="formGroupExampleInput"></label>
                                        <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Address" name="address" required>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <label for="formGroupExampleInput"></label>
                                        <input type="email" class="form-control" id="formGroupExampleInput" placeholder="Email Address" name="email">
                                    </div>
                                    <div class="col-3">
                                        <label for="formGroupExampleInput2"></label>
                                        <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="Mobile Number" name="phone_number" required>
                                    </div>
                                    <div class="col-3">
                                        <label for="formGroupExampleInput"></label>
                                        <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Home Tel No." name="home_no">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-3">
                                        <label for="formGroupExampleInput"></label>
                                        <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Contact Person" name="contact_person">
                                    </div>
                                    <div class="col-2">
                                        <label for="formGroupExampleInput"></label>
                                        <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Employee Status" name="employee_status">
                                    </div>
                                    <div class="col-2">
                                        <label for="formGroupExampleInput"></label>
                                        <input onfocus=" (this. type='date')" type="text" class="form-control" id="formGroupExampleInput" placeholder="Date Hired" name="date_hired">
                                    </div>
                                    <div class="col-2">
                                        <label for="formGroupExampleInput2"></label>
                                        <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="Bank Name / Branch" name="bank_name">
                                    </div>
                                    <div class="col-3">
                                        <label for="formGroupExampleInput"></label>
                                        <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Tin Number" name="tin_no">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-3">
                                        <label for="formGroupExampleInput2"></label>
                                        <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="Philhealth No." name="philhealth_no">
                                    </div>
                                    <div class="col-3">
                                        <label for="formGroupExampleInput"></label>
                                        <input type="text" class="form-control" id="formGroupExampleInput" placeholder="SSS Number" name="sss_no">
                                    </div>
                                    <div class="col-3">
                                        <label for="formGroupExampleInput"></label>
                                        <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Pag-Ibig No." name="pagibig_no">
                                    </div>
                                    <div class="col-3">
                                        <label for="formGroupExampleInput2"></label>
                                        <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="Is active?" name="isActive">
                                    </div>
                                </div>
                                <br>
                                <div class="font-weight-bold">
                                    MONTHLY SALARY AND DEDUCTION
                                </div>
                                <div class="row">
                                    <div class="col-3">
                                        <label for="formGroupExampleInput"></label>
                                        <select required name="position" id="position" class="input input-sm monthName" style="width: 100%;padding: 5px">
                                            <option selected hidden>Position</option>
                                            <option value="Administrator">Administrator</option>
                                            <option value="Team Lead">Team Lead</option>
                                            <option value="Draftsman">Draftsman</option>
                                            <option value="OJT - Draftsman">OJT - Draftsman</option>
                                            <option value="Programmer">Programmer</option>
                                            <option value="OJT - Programmer">OJT - Programmer</option>
                                        </select>
                                    </div>
                                    <div class="col-6">
                                        <label for="formGroupExampleInput"></label>
                                        <input type="number" class="form-control" id="formGroupExampleInput" placeholder="Monthly Pay" name="monthly_pay">
                                    </div>
                                    <div class="col-3">
                                        <label for="formGroupExampleInput"></label>
                                        <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Is fixed salary?" name="isFixed_salary">
                                    </div>
                                </div>
                                <br>
                                <div class="font-weight-bold">ALLOWANCE</div>
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
                        <button type="submit" class="btn btn-primary" name="add-employee">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <?php foreach ($employees as $employee):?>
        <div class="modal fade" id="employeeView<?=$employee->employee_id ;?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl modku" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title kulay" id="exampleModalLabel">View Employee Details</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body mod">
                        <div class="card">
                            <div class="card-body px-lg-5 pt-0 border">
                                <br>
                                <div class="font-weight-bold">BASIC INFORMATION</div>
                                <div class="row">
                                    <div class="col-2">
                                        <label for="formGroupExampleInput"></label>
                                        <input type="text" class="form-control" id="formGroupExampleInput"  name="employee_id" value="<?=$employee->employee_id;?>" readonly>
                                    </div>
                                    <div class="col-3">
                                        <label for="formGroupExampleInput"></label>
                                        <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Firstname" name="firstname" value="<?=$employee->firstname;?>" readonly>
                                    </div>
                                    <div class="col-2">
                                        <label for="formGroupExampleInput2"></label>
                                        <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="Middle Name" name="middlename" value="<?=$employee->middlename;?>" readonly>
                                    </div>
                                    <div class="col-3">
                                        <label for="formGroupExampleInput2"></label>
                                        <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="Lastname" name="lastname" value="<?=$employee->lastname;?>" readonly>
                                    </div>
                                    <div class="col-2">
                                        <label for="formGroupExampleInput"></label>
                                        <select name="gender" id="gender" class="input input-sm monthName" style="width: 100%;padding: 5px" value="<?=$employee->gender;?>" disabled>
                                            <option selected hidden>Gender</option>
                                            <option value="Male">Male</option>
                                            <option value="Female">Female</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-3">
                                        <label for="formGroupExampleInput2"></label>
                                        <input onfocus=" (this. type='date')" type="text" class="form-control" id="formGroupExampleInput2" placeholder="Birthdate" name="birth_date" value="<?=$employee->birth_date;?>" readonly>
                                    </div>
                                    <div class="col-3">
                                        <label for="formGroupExampleInput2"></label>
                                        <select name="marital_status" id="marital_status" class="input input-sm monthName" style="width: 100%;padding: 5px" value="<?=$employee->marital_status;?>" disabled>
                                            <option selected hidden>Marital Status</option>
                                            <option value="Single">Single</option>
                                            <option value="Married">Married</option>
                                            <option value="Widow">Widow</option>
                                        </select>
                                    </div>
                                    <div class="col-6">
                                        <label for="formGroupExampleInput"></label>
                                        <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Address" name="address" value="<?=$employee->address_id;?>" readonly>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <label for="formGroupExampleInput"></label>
                                        <input type="email" class="form-control" id="formGroupExampleInput" placeholder="Email Address" name="email" value="<?=$employee->email;?>" readonly>
                                    </div>
                                    <div class="col-3">
                                        <label for="formGroupExampleInput2"></label>
                                        <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="Mobile Number" name="phone_number" value="<?=$employee->phone_number;?>" readonly>
                                    </div>
                                    <div class="col-3">
                                        <label for="formGroupExampleInput"></label>
                                        <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Home Tel No." name="home_no" value="<?=$employee->home_no;?>" readonly>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-3">
                                        <label for="formGroupExampleInput"></label>
                                        <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Contact Person" name="contact_person" value="<?=$employee->contact_person;?>" readonly>
                                    </div>
                                    <div class="col-2">
                                        <label for="formGroupExampleInput"></label>
                                        <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Employee Status" name="employee_status" value="<?=$employee->employee_status;?>" readonly>
                                    </div>
                                    <div class="col-2">
                                        <label for="formGroupExampleInput"></label>
                                        <input onfocus=" (this. type='date')" type="text" class="form-control" id="formGroupExampleInput" placeholder="Date Hired" name="date_hired" value="<?=$employee->date_hired;?>" readonly>
                                    </div>
                                    <div class="col-2">
                                        <label for="formGroupExampleInput2"></label>
                                        <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="Bank Name / Branch" name="bank_name" value="<?=$employee->bank_name;?>" readonly>
                                    </div>
                                    <div class="col-3">
                                        <label for="formGroupExampleInput"></label>
                                        <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Tin Number" name="tin_no" value="<?=$employee->tin_no;?>" readonly>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-3">
                                        <label for="formGroupExampleInput2"></label>
                                        <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="Philhealth No." name="philhealth_no" value="<?=$employee->philhealth_no;?>" readonly>
                                    </div>
                                    <div class="col-3">
                                        <label for="formGroupExampleInput"></label>
                                        <input type="text" class="form-control" id="formGroupExampleInput" placeholder="SSS Number" name="sss_no" value="<?=$employee->sss_no;?>" readonly>
                                    </div>
                                    <div class="col-3">
                                        <label for="formGroupExampleInput"></label>
                                        <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Pag-Ibig No." name="pagibig_no" value="<?=$employee->pagibig_no;?>" readonly>
                                    </div>
                                    <div class="col-3">
                                        <label for="formGroupExampleInput2"></label>
                                        <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="Is active?" name="isActive" value="<?=$employee->isActive;?>" readonly>
                                    </div>
                                </div>
                                <br>
                                <div class="font-weight-bold">MONTHLY SALARY AND DEDUCTION</div>
                                <div class="row">
                                    <div class="col-3">
                                        <label for="formGroupExampleInput"></label>
                                        <select name="position" id="position" class="input input-sm monthName" style="width: 100%;padding: 5px" value="<?=$employee->position_id;?>" disabled>
                                            <option selected hidden>Position</option>
                                            <option value="Administrator">Administrator</option>
                                            <option value="Team Lead">Team Lead</option>
                                            <option value="Draftsman">Draftsman</option>
                                            <option value="OJT - Draftsman">OJT - Draftsman</option>
                                            <option value="Programmer">Programmer</option>
                                            <option value="OJT - Programmer">OJT - Programmer</option>
                                        </select>
                                    </div>
                                    <div class="col-6">
                                        <label for="formGroupExampleInput"></label>
                                        <input type="number" class="form-control" id="formGroupExampleInput" placeholder="Monthly Pay" name="monthly_pay" value="<?=$employee->monthly_pay;?>" readonly>
                                    </div>
                                    <div class="col-3">
                                        <label for="formGroupExampleInput"></label>
                                        <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Is fixed salary?" name="isFixed_salary" value="<?=$employee->isFixed_salary;?>" readonly>
                                    </div>
                                </div>
                                <br>
                                <div class="font-weight-bold">ALLOWANCE</div>
                                <div class="row">
                                    <div class="col-3">
                                        <label for="formGroupExampleInput"></label>
                                        <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Transportation" name="transportation_allowance" value="<?=$employee->transportation_allowance;?>" readonly>
                                    </div>
                                    <div class="col-3">
                                        <label for="formGroupExampleInput2"></label>
                                        <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="Internet" name="internet_allowance" value="<?=$employee->internet_allowance;?>" readonly>
                                    </div>
                                    <div class="col-3">
                                        <label for="formGroupExampleInput"></label>
                                        <input type="text" class="form-control" id="formGroupExampleInput"  placeholder="Meal" name="meal_allowance" value="<?=$employee->meal_allowance;?>" readonly>
                                    </div>
                                    <div class="col-3">
                                        <label for="formGroupExampleInput2"></label>
                                        <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="Phone" name="phone_allowance" value="<?=$employee->phone_allowance;?>" readonly>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <label for="formGroupExampleInput"></label>
                                        <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Total Allowance" name="total_allowance" value="<?=$employee->total_allowance;?>" readonly>
                                    </div>
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
        <div class="modal fade" id="employeeEdit<?=$employee->employee_id ;?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl modku" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title kulay" id="exampleModalLabel">Edit Employee Details</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form method="post" action="update-employee">
                        <div class="modal-body mod">
                            <div class="card">
                                <div class="card-body px-lg-5 pt-0 border">
                                    <br>
                                    <div class="font-weight-bold">BASIC INFORMATION</div>
                                    <div class="row">
                                        <div class="col-2">
                                            <label for="formGroupExampleInput"></label>
                                            <input type="text" class="form-control" id="formGroupExampleInput"  name="employee_id" value="<?=$employee->employee_id;?>">
                                        </div>
                                        <div class="col-3">
                                            <label for="formGroupExampleInput"></label>
                                            <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Firstname" name="firstname" value="<?=$employee->firstname;?>">
                                        </div>
                                        <div class="col-2">
                                            <label for="formGroupExampleInput2"></label>
                                            <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="Middle Name" name="middlename" value="<?=$employee->middlename;?>">
                                        </div>
                                        <div class="col-3">
                                            <label for="formGroupExampleInput2"></label>
                                            <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="Lastname" name="lastname" value="<?=$employee->lastname;?>">
                                        </div>
                                        <div class="col-2">
                                            <label for="formGroupExampleInput"></label>
                                            <select name="gender" id="gender" class="input input-sm monthName" style="width: 100%;padding: 5px" value="<?=$employee->gender;?>">
                                                <option selected hidden>Gender</option>
                                                <option value="Male">Male</option>
                                                <option value="Female">Female</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-3">
                                            <label for="formGroupExampleInput2"></label>
                                            <input onfocus=" (this. type='date')" type="text" class="form-control" id="formGroupExampleInput2" placeholder="Birthdate" name="birth_date" value="<?=$employee->birth_date;?>">
                                        </div>
                                        <div class="col-3">
                                            <label for="formGroupExampleInput2"></label>
                                            <select name="marital_status" id="marital_status" class="input input-sm monthName" style="width: 100%;padding: 5px" value="<?=$employee->marital_status;?>">
                                                <option selected hidden>Marital Status</option>
                                                <option value="Single">Single</option>
                                                <option value="Married">Married</option>
                                                <option value="Widow">Widow</option>
                                            </select>
                                        </div>
                                        <div class="col-6">
                                            <label for="formGroupExampleInput"></label>
                                            <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Address" name="address" value="<?=$employee->address_id;?>">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6">
                                            <label for="formGroupExampleInput"></label>
                                            <input type="email" class="form-control" id="formGroupExampleInput" placeholder="Email Address" name="email" value="<?=$employee->email;?>">
                                        </div>
                                        <div class="col-3">
                                            <label for="formGroupExampleInput2"></label>
                                            <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="Mobile Number" name="phone_number" value="<?=$employee->phone_number;?>">
                                        </div>
                                        <div class="col-3">
                                            <label for="formGroupExampleInput"></label>
                                            <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Home Tel No." name="home_no" value="<?=$employee->home_no;?>">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-3">
                                            <label for="formGroupExampleInput"></label>
                                            <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Contact Person" name="contact_person" value="<?=$employee->contact_person;?>">
                                        </div>
                                        <div class="col-2">
                                            <label for="formGroupExampleInput"></label>
                                            <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Employee Status" name="employee_status" value="<?=$employee->employee_status;?>">
                                        </div>
                                        <div class="col-2">
                                            <label for="formGroupExampleInput"></label>
                                            <input onfocus=" (this. type='date')" type="text" class="form-control" id="formGroupExampleInput" placeholder="Date Hired" name="date_hired" value="<?=$employee->date_hired;?>">
                                        </div>
                                        <div class="col-2">
                                            <label for="formGroupExampleInput2"></label>
                                            <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="Bank Name / Branch" name="bank_name" value="<?=$employee->bank_name;?>">
                                        </div>
                                        <div class="col-3">
                                            <label for="formGroupExampleInput"></label>
                                            <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Tin Number" name="tin_no" value="<?=$employee->tin_no;?>">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-3">
                                            <label for="formGroupExampleInput2"></label>
                                            <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="Philhealth No." name="philhealth_no" value="<?=$employee->philhealth_no;?>">
                                        </div>
                                        <div class="col-3">
                                            <label for="formGroupExampleInput"></label>
                                            <input type="text" class="form-control" id="formGroupExampleInput" placeholder="SSS Number" name="sss_no" value="<?=$employee->sss_no;?>">
                                        </div>
                                        <div class="col-3">
                                            <label for="formGroupExampleInput"></label>
                                            <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Pag-Ibig No." name="pagibig_no" value="<?=$employee->pagibig_no;?>">
                                        </div>
                                        <div class="col-3">
                                            <label for="formGroupExampleInput2"></label>
                                            <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="Is active?" name="isActive" value="<?=$employee->isActive;?>">
                                        </div>
                                    </div>
                                    <br>
                                    <div class="font-weight-bold">MONTHLY SALARY AND DEDUCTION</div>
                                    <div class="row">
                                        <div class="col-3">
                                            <label for="formGroupExampleInput"></label>
                                            <select name="position" id="position" class="input input-sm monthName" style="width: 100%;padding: 5px" value="<?=$employee->position_id;?>">
                                                <option selected hidden>Position</option>
                                                <option value="Administrator">Administrator</option>
                                                <option value="Team Lead">Team Lead</option>
                                                <option value="Draftsman">Draftsman</option>
                                                <option value="OJT - Draftsman">OJT - Draftsman</option>
                                                <option value="Programmer">Programmer</option>
                                                <option value="OJT - Programmer">OJT - Programmer</option>
                                            </select>
                                        </div>
                                        <div class="col-6">
                                            <label for="formGroupExampleInput"></label>
                                            <input type="number" class="form-control" id="formGroupExampleInput" placeholder="Monthly Pay" name="monthly_pay" value="<?=$employee->monthly_pay;?>">
                                        </div>
                                        <div class="col-3">
                                            <label for="formGroupExampleInput"></label>
                                            <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Is fixed salary?" name="isFixed_salary" value="<?=$employee->isFixed_salary;?>">
                                        </div>
                                    </div>
                                    <br>
                                    <div class="font-weight-bold">ALLOWANCE</div>
                                    <div class="row">
                                        <div class="col-3">
                                            <label for="formGroupExampleInput"></label>
                                            <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Transportation" name="transportation_allowance" value="<?=$employee->transportation_allowance;?>">
                                        </div>
                                        <div class="col-3">
                                            <label for="formGroupExampleInput2"></label>
                                            <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="Internet" name="internet_allowance" value="<?=$employee->internet_allowance;?>">
                                        </div>
                                        <div class="col-3">
                                            <label for="formGroupExampleInput"></label>
                                            <input type="text" class="form-control" id="formGroupExampleInput"  placeholder="Meal" name="meal_allowance" value="<?=$employee->meal_allowance;?>">
                                        </div>
                                        <div class="col-3">
                                            <label for="formGroupExampleInput2"></label>
                                            <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="Phone" name="phone_allowance" value="<?=$employee->phone_allowance;?>">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6">
                                            <label for="formGroupExampleInput"></label>
                                            <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Total Allowance" name="total_allowance" value="<?=$employee->total_allowance;?>">
                                        </div>
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
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-primary" name="editEmployee">Save Changes</button>
                        </div>
                    </form>
                </div>
            </div>
    <?php endforeach;?>
</div>



