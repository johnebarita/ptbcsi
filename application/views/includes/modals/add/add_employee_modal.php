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
<!--            <form method="post" action="add-employee">-->
            <form>
                <div class="modal-body mod">
                    <div class="card">
                        <div class="card-body px-lg-5 pt-0 border">
                            <br>
                            <div class="font-weight-bold">BASIC INFORMATION</div>
                            <div class="row mt-2">
                                <div class="col-3">
                                    <label for="formGroupExampleInput">First Name</label>
                                    <input type="text" class="form-control" id="firstname" name="firstname"
                                           required>
                                </div>
                                <div class="col-3">
                                    <label for="formGroupExampleInput2">Middle Name</label>
                                    <input type="text" class="form-control" id="middlename"
                                           name="middlename">
                                </div>
                                <div class="col-4">
                                    <label for="formGroupExampleInput2">Last Name</label>
                                    <input type="text" class="form-control" id="lastname" name="lastname"
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
                                           id="birth_date" name="birth_date" required>
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
                                    <input type="text" class="form-control" id="address" name="address"
                                           required>
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col-3">
                                    <label for="formGroupExampleInput2">Mobile Number</label>
                                    <input type="text" class="form-control" id="phone_number"
                                           name="phone_number" required>
                                </div>
                                <div class="col-3">
                                    <label for="formGroupExampleInput">Telephone Number</label>
                                    <input type="text" class="form-control" id="home_no" name="home_no">
                                </div>
                                <div class="col-6">
                                    <label for="formGroupExampleInput">Email Address</label>
                                    <input type="email" class="form-control" id="email" name="email">
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col-3">
                                    <label for="formGroupExampleInput">Contact Person</label>
                                    <input type="text" class="form-control" id="contact_person"
                                           name="contact_person">
                                </div>
                                <div class="col-3">
                                    <label for="formGroupExampleInput2">Contact Person / Mobile Number</label>
                                    <input type="text" class="form-control" id="contact_phone_number"
                                           name="phone_number" >
                                </div>
                                <!--                                <div class="col-3">-->
                                <!--                                    <label for="formGroupExampleInput">Employee Type</label>-->
                                <!--                                    <input type="text" class="form-control" id="formGroupExampleInput"-->
                                <!--                                           name="employee_status">-->
                                <!--                                </div>-->
                                <div class="col-3">
                                    <label for="formGroupExampleInput">Date Hired</label>
                                    <input onfocus=" (this. type='date')" type="text" class="form-control"
                                           id="date_hired" name="date_hired">
                                </div>
                                <div class="col-3">
                                    <label for="formGroupExampleInput2">Bank</label>
                                    <input type="text" class="form-control" id="bank_name"
                                           name="bank_name">
                                </div>
                            </div>
                            <div class="row mt-2">

                                <div class="col-3">
                                    <label for="formGroupExampleInput">Tin Number</label>
                                    <input type="text" class="form-control" id="tin_no" name="tin_no">
                                </div>
                                <div class="col-3">
                                    <label for="formGroupExampleInput2">Philhealth No.</label>
                                    <input type="text" class="form-control" id="philhealth_no"
                                           name="philhealth_no">
                                </div>
                                <div class="col-3">
                                    <label for="formGroupExampleInput">SSS Number</label>
                                    <input type="text" class="form-control" id="sss_no" name="sss_no">
                                </div>
                                <div class="col-3">
                                    <label for="formGroupExampleInput">Pag-ibig No.</label>
                                    <input type="text" class="form-control" id="pagibig_no"
                                           name="pagibig_no">
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col-2">
                                    <label for="formGroupExampleInput">Active</label>
                                    <select required name="active"
                                            class="form-control input input-sm monthName"
                                            style="width: 100%;padding: 5px" required>
                                        <option value="1">Yes</option>
                                        <option value="0">No</option>
                                    </select>
                                </div>
                            </div>
                            <br>
                            <div class="font-weight-bold">
                                MONTHLY SALARY AND DEDUCTION
                            </div>
                            <div class="row mt-2">
                                <div class="col-3">
                                    <label for="formGroupExampleInput">Position</label>
                                    <select required name="position_id" id="position_id"
                                            class="form-control input input-sm monthName"
                                            style="width: 100%;padding: 5px">
                                        <?php foreach ($positions as $position): ?>
                                            <option value="<?= $position->position_id; ?>"><?= $position->position; ?></option>
                                        <?php endforeach; ?>
                                        <option value="Admin">Admin</option>
                                        <option value="Admin">Payroll Master</option>
                                    </select>
                                </div>
                                <div class="col-6">
                                    <label for="formGroupExampleInput">Salary</label>
                                    <input type="number" class="form-control" id="monthly_pay"
                                           value=<?= $position->rate ?>  placeholder="Monthly Pay" name="monthly_pay">
                                </div>
                                <div class="col-3">
                                    <label for="formGroupExampleInput">Fixed Salary</label>
                                    <select required name="isFixed_salary" id="isFixed_salary"
                                            class="form-control input input-sm monthName"
                                            style="width: 100%;padding: 5px">
                                        <option value="0">No</option>
                                        <option value="1">Yes</option>
                                    </select>
                                </div>
                            </div>
                            <br>
                            <div class="font-weight-bold">ALLOWANCE</div>
                            <div class="row">
                                <div class="col-3">
                                    <label for="formGroupExampleInput">Transportation</label>
                                    <input type="text" class="form-control" id="transportation_allowance"
                                           name="transportation_allowance">
                                </div>
                                <div class="col-3">
                                    <label for="formGroupExampleInput2">Internet</label>
                                    <input type="text" class="form-control" id="internet_allowance"
                                           name="internet_allowance">
                                </div>
                                <div class="col-3">
                                    <label for="formGroupExampleInput">Meal</label>
                                    <input type="text" class="form-control" id="meal_allowance"
                                           name="meal_allowance">
                                </div>
                                <div class="col-3">
                                    <label for="formGroupExampleInput2">Phone</label>
                                    <input type="text" class="form-control" id="phone_allowance"
                                           name="phone_allowance">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" name="add-employee" id="add-employee">Submit</button>
                </div>
            </form>
            <div class="modal fade" id="loading" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="lds-facebook">Loading...</div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $('#add-employee').on('click', function (e) {
        e.preventDefault();

        var firstname = $('#firstname').val();
        var middlename = $('#middlename').val();
        var lastname = $('#lastname').val();
        var gender = $('#gender').val();
        var birth_date = $('#birth_date').val();
        var marital_status = $('#marital_status').val();
        var address = $('#address').val();
        var phone_number = $('#phone_number').val();
        var home_no = $('#home_no').val();
        var email = $('#email').val();
        var contact_person = $('#contact_person').val();
        var contact_phone_number = $('#contact_phone_number').val();
        var date_hired = $('#date_hired').val();
        var bank_name = $('#bank_name').val();
        var tin_no = $('#tin_no').val();
        var philhealth_no = $('#philhealth_no').val();
        var sss_no = $('#sss_no').val();
        var pagibig_no = $('#pagibig_no').val();
        var active = $('.active').val();
        var position_id = $('#position_id').val();
        var monthly_pay = $('#monthly_pay').val();
        var isFixed_salary = $('#isFixed_salary').val();
        var transportation_allowance = $('#transportation_allowance').val();
        var internet_allowance = $('#internet_allowance').val();
        var meal_allowance = $('#meal_allowance').val();
        var phone_allowance = $('#phone_allowance').val();

        $.ajax({
            url: "<?=base_url('add-employee');?>",
            method: 'post',
            dataType: "JSON",
            data: {
            firstname:firstname,
            middlename:middlename,
            lastname:lastname,
            gender:gender,
            birth_date:birth_date,
            marital_status:marital_status,
            address:address,
            phone_number:phone_number,
            home_no:home_no,
            email:email,
            contact_person:contact_person,
            contact_phone_number:phone_number,
            date_hired:date_hired,
            bank_name:bank_name,
            tin_no:tin_no,
            philhealth_no:philhealth_no,
            sss_no:sss_no,
            pagibig_no:pagibig_no,
            active:active,
            position_id:position_id,
            monthly_pay:monthly_pay,
            isFixed_salary:isFixed_salary,
            transportation_allowance:transportation_allowance,
            internet_allowance:internet_allowance,
            meal_allowance:meal_allowance,
            phone_allowance:phone_allowance,
            },
            beforeSend: function () {
                $('#addEmp').modal('hide');
                $('#loading').modal('show');
            },
            complete: function () {
                $('#loading').modal('hide');
            },
            success: function (response) {
                toastr.success("Employee added successfully!", 'Success :)');

            },
            error: function () {
                toastr.error('Unable to connect to the biometric device!', 'Error :(');
            }
        });
    });
</script>