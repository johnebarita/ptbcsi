<?php
/**
 * Created by PhpStorm.
 * User: capstonestudent
 * Date: 2/19/2020
 * Time: 2:43 AM
 */ ?>

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
                            <div class="row mt-2">
                                <div class="col-3">
                                    <label for="formGroupExampleInput">First Name</label>
                                    <input type="text" class="form-control" id="formGroupExampleInput" name="firstname"
                                           required>
                                </div>
                                <div class="col-3">
                                    <label for="formGroupExampleInput2">Middle Name</label>
                                    <input type="text" class="form-control" id="formGroupExampleInput2"
                                           name="middlename">
                                </div>
                                <div class="col-4">
                                    <label for="formGroupExampleInput2">Last Name</label>
                                    <input type="text" class="form-control" id="formGroupExampleInput2" name="lastname"
                                           required>
                                </div>
                                <div class="col-2">
                                    <label for="formGroupExampleInput">Gender</label>
                                    <select required name="gender" id="gender"
                                            class="form-control input input-sm monthName"
                                            style="width: 100%;padding: 5px" required>
                                        <option value="Male">Male</option>
                                        <option value="Female">Female</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col-3">
                                    <label for="formGroupExampleInput2">Birth Date</label>
                                    <input onfocus=" (this. type='date')" type="text" class="form-control"
                                           id="formGroupExampleInput2" name="birth_date" required>
                                </div>
                                <div class="col-3">
                                    <label for="formGroupExampleInput2">Marital Status</label>
                                    <select required name="marital_status" id="marital_status"
                                            class="form-control input input-sm monthName"
                                            style="width: 100%;padding: 5px" required>
                                        <option value="Single">Single</option>
                                        <option value="Married">Married</option>
                                        <option value="Widow">Widow</option>
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
                                    <input type="text" class="form-control" id="formGroupExampleInput2"
                                           name="phone_number" required>
                                </div>
                                <div class="col-3">
                                    <label for="formGroupExampleInput">Telephone Number</label>
                                    <input type="text" class="form-control" id="formGroupExampleInput" name="home_no">
                                </div>
                                <div class="col-6">
                                    <label for="formGroupExampleInput">Email Address</label>
                                    <input type="email" class="form-control" id="formGroupExampleInput" name="email">
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col-3">
                                    <label for="formGroupExampleInput">Contact Person</label>
                                    <input type="text" class="form-control" id="formGroupExampleInput"
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
                                           id="formGroupExampleInput" name="date_hired">
                                </div>
                                <div class="col-3">
                                    <label for="formGroupExampleInput2">Bank</label>
                                    <input type="text" class="form-control" id="formGroupExampleInput2"
                                           name="bank_name">
                                </div>
                            </div>
                            <div class="row mt-2">

                                <div class="col-3">
                                    <label for="formGroupExampleInput">Tin Number</label>
                                    <input type="text" class="form-control" id="formGroupExampleInput" name="tin_no">
                                </div>
                                <div class="col-3">
                                    <label for="formGroupExampleInput2">Philhealth No.</label>
                                    <input type="text" class="form-control" id="formGroupExampleInput2"
                                           name="philhealth_no">
                                </div>
                                <div class="col-3">
                                    <label for="formGroupExampleInput">SSS Number</label>
                                    <input type="text" class="form-control" id="formGroupExampleInput" name="sss_no">
                                </div>
                                <div class="col-3">
                                    <label for="formGroupExampleInput">Pag-ibig No.</label>
                                    <input type="text" class="form-control" id="formGroupExampleInput"
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
                                            <option value="<?= $position->position_id; ?>"><?= $position->position; ?></option>
                                        <?php endforeach; ?>
                                        <option  value="Admin">Admin</option>
                                        <option  value="Admin">Payroll Master</option>
                                    </select>
                                </div>
                                <div class="col-6">
                                    <label for="formGroupExampleInput">Salary</label>
                                    <input type="number" class="form-control" id="formGroupExampleInput" value=<?= $position->rate ?> placeholder="Monthly Pay" name="monthly_pay">
                                </div>
                                <div class="col-3">
                                    <label for="formGroupExampleInput">Fixed Salary</label>
                                    <select required name="isFixed_salary" id="position" class="form-control input input-sm monthName" style="width: 100%;padding: 5px">
                                        <option value="No">No</option>
                                        <option value="Yes">Yes</option>
                                    </select>
                                </div>
                            </div>
                            <br>
                            <div class="font-weight-bold">ALLOWANCE</div>
                            <div class="row">
                                <div class="col-3">
                                    <label for="formGroupExampleInput">Transportation</label>
                                    <input type="text" class="form-control" id="formGroupExampleInput" name="transportation_allowance">
                                </div>
                                <div class="col-3">
                                    <label for="formGroupExampleInput2">Internet</label>
                                    <input type="text" class="form-control" id="formGroupExampleInput2" name="internet_allowance">
                                </div>
                                <div class="col-3">
                                    <label for="formGroupExampleInput">Meal</label>
                                    <input type="text" class="form-control" id="formGroupExampleInput" name="meal_allowance">
                                </div>
                                <div class="col-3">
                                    <label for="formGroupExampleInput2">Phone</label>
                                    <input type="text" class="form-control" id="formGroupExampleInput2" name="phone_allowance">
                                </div>
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
