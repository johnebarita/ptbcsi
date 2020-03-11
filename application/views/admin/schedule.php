<link href="<?= base_url(); ?>assets/css/schedule.css" rel="stylesheet">
<div class="container-fluid">
    <h1 class="h3 mb-3 text-gray-800"><strong>TDZ</strong> <i class="divider"> / </i> <span>Schedule</span></h1>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"><strong>TDZ</strong> <i class="divider"> / </i>
                <span>Schedule</span></h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <input type="button" class="btn btn-facebook" value="Add New Schedule" data-toggle="modal"
                       data-target="#addSched"><br><br>
                <table class="table table-bordered" id="dataTable" width="100%" style="max-height: 50vh;overflow: auto"
                       cellspacing="0">
                    <thead>
                    <tr>
                        <td class="text_center">Time in</td>
                        <td class="text_center">Time out</td>
                        <td class="text_center">Tools</td>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($schedules as $schedule): ?>
                        <tr>
                            <td><?= $schedule->time_in; ?></td>
                            <td><?= $schedule->time_out; ?></td>
                            <td class="text_center">
                                <i class="btn btn-info fa fa-edit iconedit" data-toggle="modal"
                                   data-target="#scheduleEdit<?= $schedule->schedule_id ?>"
                                   id='<?= $schedule->schedule_id ?>'>&nbsp;&nbsp;Edit</i>&nbsp;&nbsp; &nbsp;
                                <i class="btn btn-danger fa fa-trash-alt icondelete" data-toggle="modal"
                                   data-target="#scheduleDelete<?= $schedule->schedule_id; ?>"
                                   id='<?= $schedule->schedule_id ?>'>&nbsp;&nbsp;Delete</i>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>

<!--Modal for Adding Schedule-->

<!-- Modal -->
<?php include getcwd() . '/application/views/includes/modals/add/add_schedule_modal.php'; ?>
<!--    Modal for edit-->

<?php foreach ($schedules as $schedule): ?>
    <div class="modal fade" id="scheduleEdit<?= $schedule->schedule_id; ?>" tabindex="-1" role="dialog"
         aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Schedule</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="update-schedule" method="POST">
                        <div class="form-group row">
                            <label for="in" class="col-sm-3 col-form-label">Time in</label>
                            <div class="col-sm-5">
                                <input type="text" name="schedule_id" class="form-control"
                                       value=<?= $schedule->schedule_id; ?> hidden>
                                <input type="time" class="form-control" name="time_in" required
                                       value=<?= $schedule->time_in; ?>/>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="out" class="col-sm-3 col-form-label">Time out</label>
                            <div class="col-sm-5">
                                <input type="time" name="time_out" class="form-control" id="out"
                                       value=<?= $schedule->time_out; ?>>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
    <!--    Modal for delete-->
    <div class="modal fade" id="scheduleDelete<?= $schedule->schedule_id; ?>" tabindex="-1" role="dialog"
         aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Delete Schedule</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="delete-schedule" method="POST">
                        <input type="text" name="schedule_id" id="schedule_id<?= $schedule->schedule_id; ?>"
                               class="form-control" value=<?= $schedule->schedule_id; ?> hidden>
                        <p class="text_center">Are you sure you want to delete this schedule?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                    <button type="submit" class="btn btn-primary" id="delete<?= $schedule->schedule_id ?>">Yes</button>
                </div>
                </form>
            </div>
        </div>
    </div>
    <script>
        $("#delete<?=$schedule->schedule_id?>").on('click', function (e) {
            e.preventDefault();
            var schedule_id = $('#schedule_id<?=$schedule->schedule_id;?>').val();

            $.ajax({
                url: "<?=base_url('delete-schedule');?>",
                method: 'post',
                dataType: "JSON",
                data: {
                    schedule_id: schedule_id
                },
//                complete: function () {
//                    $('#loading').modal('hide');
//                },
                beforeSend: function () {
                    $('#scheduleDelete<?=$schedule->schedule_id;?>').modal('hide');
//                $('#loading').modal('show');
                },
                success: function (response) {
                    toastr.success("Employee added successfully!", 'Success :)');
//                    location.reload();
                },
                error: function () {

                    toastr.error('Unable to connect to the biometric device!', 'Errorssss :(');
                }
            });
        });
    </script>
<?php endforeach; ?>
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
                firstname: firstname,
                middlename: middlename,
                lastname: lastname,
                gender: gender,
                birth_date: birth_date,
                marital_status: marital_status,
                address: address,
                phone_number: phone_number,
                home_no: home_no,
                email: email,
                contact_person: contact_person,
                contact_phone_number: phone_number,
                date_hired: date_hired,
                bank_name: bank_name,
                tin_no: tin_no,
                philhealth_no: philhealth_no,
                sss_no: sss_no,
                pagibig_no: pagibig_no,
                active: active,
                position_id: position_id,
                monthly_pay: monthly_pay,
                isFixed_salary: isFixed_salary,
                transportation_allowance: transportation_allowance,
                internet_allowance: internet_allowance,
                meal_allowance: meal_allowance,
                phone_allowance: phone_allowance,
            },
            beforeSend: function () {
                $('#addEmp').modal('hide');
//                $('#loading').modal('show');
            },
            complete: function () {
                $('#loading').modal('hide');
            },
            success: function (response) {

                toastr.success("Employee added successfully!", 'Success :)');

            },
            error: function () {

                toastr.error('Unable to connect to the biometric device!', 'Errorssss :(');
            }
        });
    });
</script>