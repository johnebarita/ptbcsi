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
                <form>
                    <div class="modal-body">
                            <input type="text" name="schedule_id" id="schedule_id<?= $schedule->schedule_id; ?>"
                                   class="form-control" value=<?= $schedule->schedule_id; ?> hidden>
                            <p class="text_center">Do you want to delete this schedule?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                        <button type="submit" class="btn btn-primary" id="delete<?= $schedule->schedule_id ;?>">Yes</button>
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
                    toastr.success("Schedule deleted successfully", 'Success');
                    window.setTimeout(function(){location.reload()},3000)
                },
                error: function () {

                    toastr.error('Unable to delete the selected schedule. The schedule is currently being used!', 'Error!');
                }
            });
        });
    </script>
<?php endforeach; ?>

for(int i = 0; i<3;i++){ //months
    start_date = ...
    end_data = ...
    holidays = ....
    employees = ...
    for(employees){
        dtrs = get time_sheets of each employee from start to end dates.
        since kabalo naman ka if pila ka days ang month (days_in_month())
        int ndx= 0;
        for(int j = 0 ; j<days_in_month(); j++){
            //Lates per month
            check sa dtr na controller


            //Absences per month
            if(dtr[ndx]->date == j){ //date is in YYYY-mm-dd you just need to get the d part (ask me if nana ka dri na part)

            }elseif(j !=="sun" || j!= holiday || j != today){// compare the d part of the date (ask me nalang sad dri na part)
                absent ++;
            }
        }
    }
}