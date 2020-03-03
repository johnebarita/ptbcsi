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
                                <td><?= $employee->position;?></td>
                                <td><?= $employee->time_in." - ".$employee->time_out?></td>
                                <td><?= $employee->date_hire;?></td>

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
    <?php include  getcwd().'/application/views/includes/modals/add/add_employee_modal.php';?>
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
                                <div class="row mt-2">
                                    <div class="col-1">
                                        <label for="formGroupExampleInput">ID</label>
                                        <input type="text" class="form-control" id="formGroupExampleInput"  value="<?=$employee->employee_id;?>" readonly>
                                    </div>
                                    <div class="col-3">
                                        <label for="formGroupExampleInput">First Name</label>
                                        <input type="text" class="form-control" id="formGroupExampleInput"  value="<?=$employee->firstname;?>" readonly>
                                    </div>
                                    <div class="col-3">
                                        <label for="formGroupExampleInput2">Last Name</label>
                                        <input type="text" class="form-control" id="formGroupExampleInput2"  value="<?=$employee->middlename;?>" readonly>
                                    </div>
                                    <div class="col-3">
                                        <label for="formGroupExampleInput2">Middle Name</label>
                                        <input type="text" class="form-control" id="formGroupExampleInput2"  value="<?=$employee->lastname;?>" readonly>
                                    </div>
                                    <div class="col-2">
                                        <label for="formGroupExampleInput">Gender</label>
                                        <input type="text" class="form-control" id="formGroupExampleInput2"  value="<?=$employee->gender;?>" readonly>
                                    </div>
                                </div>
                                <div class="row mt-2">
                                    <div class="col-3">
                                        <label for="formGroupExampleInput2">Birth Date</label>
                                        <input class="form-control" id="formGroupExampleInput2" value="<?=$employee->birth_date;?>" readonly>
                                    </div>
                                    <div class="col-3">
                                        <label for="formGroupExampleInput2">Marital Status</label>
                                        <input class="form-control" id="formGroupExampleInput2" value="<?=$employee->marital_status;?>" readonly>
                                    </div>
                                    <div class="col-6">
                                        <label for="formGroupExampleInput">Address</label>
                                        <input type="text" class="form-control" id="formGroupExampleInput"  readonly>
                                    </div>
                                </div>
                                <div class="row mt-2">
                                    <div class="col-3">
                                        <label for="formGroupExampleInput2">Mobile Number</label>
                                        <input type="text" class="form-control" id="formGroupExampleInput2" value="<?=$employee->phone_number;?>" readonly>
                                    </div>
                                    <div class="col-3">
                                        <label for="formGroupExampleInput">Telephone No.</label>
                                        <input type="text" class="form-control"   readonly>
                                    </div>
                                    <div class="col-6">
                                        <label for="formGroupExampleInput">Email</label>
                                        <input type="email" class="form-control" id="formGroupExampleInput" value="<?=$employee->email;?>" readonly>
                                    </div>
                                </div>
                                <div class="row mt-2">
                                    <div class="col-3">
                                        <label for="formGroupExampleInput">Contact Person</label>
                                        <input type="text" class="form-control" id="formGroupExampleInput" value="<?=$employee->contact_person;?>" readonly>
                                    </div>
                                    <div class="col-3">
                                        <label for="formGroupExampleInput2">Contact Person / Mobile Number</label>
                                        <input type="text" class="form-control" id="formGroupExampleInput2" value="<?=$employee->phone_number;?>" readonly>
                                    </div>
                                    <div class="col-3">
                                        <label for="formGroupExampleInput">Date Hired</label>
                                        <input type="text" class="form-control" id="formGroupExampleInput"  value="<?=$employee->date_hire;?>" readonly>
                                    </div>
                                    <div class="col-3">
                                        <label for="formGroupExampleInput2">Bank</label>
                                        <input type="text" class="form-control" id="formGroupExampleInput2"  value="<?=$employee->bank_name;?>" readonly>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-3">
                                        <label for="formGroupExampleInput">Tin Number</label>
                                        <input type="text" class="form-control" id="formGroupExampleInput"  value="<?=$employee->tin_no;?>" readonly>
                                    </div>
                                    <div class="col-3">
                                        <label for="formGroupExampleInput2">Philhealth No.</label>
                                        <input type="text" class="form-control" id="formGroupExampleInput2"  value="<?=$employee->philhealth_no;?>" readonly>
                                    </div>
                                    <div class="col-3">
                                        <label for="formGroupExampleInput">SSS Number</label>
                                        <input type="text" class="form-control" id="formGroupExampleInput" value="<?=$employee->sss_no;?>" readonly>
                                    </div>
                                    <div class="col-3">
                                        <label for="formGroupExampleInput">Pag-ibig No.</label>
                                        <input type="text" class="form-control" id="formGroupExampleInput"  value="<?=$employee->pagibig_no;?>" readonly>
                                    </div>
                                </div>
                                <div class="row mt-2">
                                    <div class="col-3">
                                        <label for="formGroupExampleInput">Active</label>
                                        <input type="text" class="form-control" id="formGroupExampleInput"  value="<?=($employee->isActive==1? 'Yes' :'No');?>" readonly>
                                    </div>
                                </div>
                                <br>
                                <div class="font-weight-bold">MONTHLY SALARY AND DEDUCTION</div>
                                <div class="row mt-2">
                                    <div class="col-3">
                                        <label for="formGroupExampleInput">Position</label>
                                        <input type="text" class="form-control" id="formGroupExampleInput"  value="<?=$employee->position;?>" readonly>
                                    </div>
                                    <div class="col-6">
                                        <label for="formGroupExampleInput">Salary</label>
                                        <input type="number" class="form-control" id="formGroupExampleInput"  value="<?=$employee->monthly_pay;?>" readonly>
                                    </div>
                                    <div class="col-3">
                                        <label for="formGroupExampleInput">Fixed Salary</label>
                                        <input type="text" class="form-control" id="formGroupExampleInput" value="<?=($employee->isFixed_salary==1? 'Yes' :'No');?>" readonly>
                                    </div>
                                </div>
                                <br>
                                <div class="font-weight-bold">ALLOWANCE</div>
                                <div class="row">
                                    <div class="col-3">
                                        <label for="formGroupExampleInput">Transportation</label>
                                        <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Transportation" name="transportation_allowance" value="<?=$employee->transportation_allowance;?>" readonly>
                                    </div>
                                    <div class="col-3">
                                        <label for="formGroupExampleInput2">Internet</label>
                                        <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="Internet" name="internet_allowance" value="<?=$employee->internet_allowance;?>" readonly>
                                    </div>
                                    <div class="col-3">
                                        <label for="formGroupExampleInput">Meal</label>
                                        <input type="text" class="form-control" id="formGroupExampleInput"  placeholder="Meal" name="meal_allowance" value="<?=$employee->meal_allowance;?>" readonly>
                                    </div>
                                    <div class="col-3">
                                        <label for="formGroupExampleInput2">Phone</label>
                                        <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="Phone" name="phone_allowance" value="<?=$employee->phone_allowance;?>" readonly>
                                    </div>
                                </div>
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
                        <h5 class="modal-title kulay" id="exampleModalLabel">View Employee Details</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form method="post" action="update-employee" >
                        <div class="modal-body mod">
                            <div class="card">
                                <div class="card-body px-lg-5 pt-0 border">
                                    <br>
                                    <div class="font-weight-bold">BASIC INFORMATION</div>
                                    <div class="row mt-2">
                                        <div class="col-3">
                                            <label for="formGroupExampleInput">First Name</label>
                                            <input type="text" class="form-control" id="formGroupExampleInput" value="<?=$employee->firstname;?>" name="firstname"
                                                   required>
                                        </div>
                                        <div class="col-3">
                                            <label for="formGroupExampleInput2">Middle Name</label>
                                            <input type="text" class="form-control" id="formGroupExampleInput2" value="<?=$employee->middlename;?>"
                                                   name="middlename">
                                        </div>
                                        <div class="col-4">
                                            <label for="formGroupExampleInput2">Last Name</label>
                                            <input type="text" class="form-control" id="formGroupExampleInput2" name="lastname" value="<?=$employee->lastname;?>"
                                                   required>
                                        </div>
                                        <div class="col-2">
                                            <label for="formGroupExampleInput">Gender</label>
                                            <select required name="gender" id="gender"
                                                    class="form-control input input-sm monthName"
                                                    style="width: 100%;padding: 5px" required>
                                                <option <?=($employee->gender == "Male");?> value="Male">Male</option>
                                                <option <?=($employee->gender == "Female");?> value="Female">Female</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row mt-2">
                                        <div class="col-3">
                                            <label for="formGroupExampleInput2">Birth Date</label>
                                            <input onfocus=" (this. type='date')" type="text" value="<?=$employee->birth_date;?>" class="form-control"
                                                   id="formGroupExampleInput2" name="birth_date" required>
                                        </div>
                                        <div class="col-3">
                                            <label for="formGroupExampleInput2">Marital Status</label>
                                            <select required name="marital_status" id="marital_status"
                                                    class="form-control input input-sm monthName"
                                                    style="width: 100%;padding: 5px" required>
                                                <option <?=($employee->gender == "Single");?>value="Single">Single</option>
                                                <option <?=($employee->gender == "Married");?>value="Married">Married</option>
                                                <option <?=($employee->gender == "Widow");?>value="Widow">Widow</option>
                                            </select>
                                        </div>
                                        <div class="col-6">
                                            <label for="formGroupExampleInput">Address</label>
                                            <input type="text" class="form-control" id="formGroupExampleInput" name="address"
                                                   required>
                                        </div>
                                    </div>
                                    <div class="row mt-2">
                                        <div class="col-3">
                                            <label for="formGroupExampleInput2">Mobile Number</label>
                                            <input type="text" class="form-control" id="formGroupExampleInput2" value="<?=$employee->phone_number;?>"
                                                   name="phone_number" required>
                                        </div>
                                        <div class="col-3">
                                            <label for="formGroupExampleInput">Telephone Number</label>
                                            <input type="text" class="form-control" id="formGroupExampleInput" name="home_no" value="<?=$employee->home_no;?>">
                                        </div>
                                        <div class="col-6">
                                            <label for="formGroupExampleInput">Email Address</label>
                                            <input type="email" class="form-control" id="formGroupExampleInput" name="email" value="<?=$employee->email;?>">
                                        </div>
                                    </div>
                                    <div class="row mt-2">
                                        <div class="col-3">
                                            <label for="formGroupExampleInput">Contact Person</label>
                                            <input type="text" class="form-control" id="formGroupExampleInput" value="<?=$employee->contact_person;?>"
                                                   name="contact_person">
                                        </div>
                                        <div class="col-3">
                                            <label for="formGroupExampleInput2">Contact Person / Mobile Number</label>
                                            <input type="text" class="form-control" id="formGroupExampleInput2"
                                                   name="phone_number" required>
                                        </div>
                                        <!--                                <div class="col-3">-->
                                        <!--                                    <label for="formGroupExampleInput">Employee Type</label>-->
                                        <!--                                    <input type="text" class="form-control" id="formGroupExampleInput"-->
                                        <!--                                           name="employee_status">-->
                                        <!--                                </div>-->
                                        <div class="col-3">
                                            <label for="formGroupExampleInput">Date Hired</label>
                                            <input onfocus=" (this. type='date')" type="text" class="form-control"
                                                   id="formGroupExampleInput" name="date_hired" value="<?=$employee->date_hire;?>">
                                        </div>
                                        <div class="col-3">
                                            <label for="formGroupExampleInput2">Bank</label>
                                            <input type="text" class="form-control" id="formGroupExampleInput2" value="<?=$employee->bank_name;?>"
                                                   name="bank_name">
                                        </div>
                                    </div>
                                    <div class="row mt-2">

                                        <div class="col-3">
                                            <label for="formGroupExampleInput">Tin Number</label>
                                            <input type="text" class="form-control" id="formGroupExampleInput" name="tin_no" value="<?=$employee->tin_no;?>">
                                        </div>
                                        <div class="col-3">
                                            <label for="formGroupExampleInput2">Philhealth No.</label>
                                            <input type="text" class="form-control" id="formGroupExampleInput2" value="<?=$employee->philhealth_no;?>"
                                                   name="philhealth_no">
                                        </div>
                                        <div class="col-3">
                                            <label for="formGroupExampleInput">SSS Number</label>
                                            <input type="text" class="form-control" id="formGroupExampleInput" name="sss_no" value="<?=$employee->sss_no;?>">
                                        </div>
                                        <div class="col-3">
                                            <label for="formGroupExampleInput">Pag-ibig No.</label>
                                            <input type="text" class="form-control" id="formGroupExampleInput" value="<?=$employee->pagibig_no;?>"
                                                   name="pagibig_no">
                                        </div>
                                    </div>
                                    <br>
                                    <div class="font-weight-bold">
                                        MONTHLY SALARY AND DEDUCTION
                                    </div>
                                    <div class="row mt-2">
                                        <div class="col-3">
                                            <label for="formGroupExampleInput">Position</label>
                                            <select required name="position_id" id="position" class="form-control input input-sm monthName"
                                                    style="width: 100%;padding: 5px">
                                                <?php foreach ($positions as $position): ?>
                                                    <option   <?=($employee->position == $position->position ? 'selected' : '');?> value="<?= $position->position_id; ?>"><?= $position->position; ?></option>
                                                <?php endforeach; ?>
                                                <option  value="Admin">Admin</option>
                                                <option  value="Admin">Payroll Master</option>
                                            </select>
                                        </div>
                                        <div class="col-6">
                                            <label for="formGroupExampleInput">Salary</label>
                                            <input type="number" class="form-control" id="formGroupExampleInput" value=<?= $employee->monthly_pay ?> placeholder="Monthly Pay" name="monthly_pay">
                                        </div>
                                        <div class="col-3">
                                            <label for="formGroupExampleInput">Fixed Salary</label>
                                            <select required name="isFixed_salary" id="position" class="form-control input input-sm monthName" style="width: 100%;padding: 5px">
                                                <option <?=($employee->isFixed_salary == 0 ? 'Yes' : '');?>value="No">No</option>
                                                <option <?=($employee->isFixed_salary == 1 ? 'Yes' : '');?>value="Yes">Yes</option>
                                            </select>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="font-weight-bold">ALLOWANCE</div>
                                    <div class="row">
                                        <div class="col-3">
                                            <label for="formGroupExampleInput">Transportation</label>
                                            <input type="text" class="form-control" id="formGroupExampleInput" value="<?=$employee->transportation_allowance;?>" name="transportation_allowance">
                                        </div>
                                        <div class="col-3">
                                            <label for="formGroupExampleInput2">Internet</label>
                                            <input type="text" class="form-control" id="formGroupExampleInput2" value="<?=$employee->internet_allowance;?>"name="internet_allowance">
                                        </div>
                                        <div class="col-3">
                                            <label for="formGroupExampleInput">Meal</label>
                                            <input type="text" class="form-control" id="formGroupExampleInput" value="<?=$employee->meal_allowance;?>" name="meal_allowance">
                                        </div>
                                        <div class="col-3">
                                            <label for="formGroupExampleInput2">Phone</label>
                                            <input type="text" class="form-control" id="formGroupExampleInput2" value="<?=$employee->phone_allowance;?>"name="phone_allowance">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary" name="add-employee">Submit</button>
                        </div>
                        <input hidden value=<?=$employee->employee_id?>>
                    </form>
                </div>
            </div>
    <?php endforeach;?>
</div>



