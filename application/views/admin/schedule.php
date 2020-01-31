<link href="<?=base_url()?>assets/css/schedule.css" rel="stylesheet">
<div class="container-fluid">
    <h1 class="h3 mb-3 text-gray-800"><strong>TDZ</strong> <i class="divider"> / </i> <span>Schedule</span></h1>


    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"><strong>TDZ</strong> <i class="divider"> / </i> <span>Schedule</span></h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <input type="button" class="btn btn-facebook" value="Add New Schedule" data-toggle="modal" data-target="#addSched"><br><br>
                <table class="table table-bordered"  width="100%" style="max-height: 50vh;overflow: auto" cellspacing="0">
                    <thead>
                    <tr>
                        <td class="text_center">Time in</td>
                        <td class="text_center">Time out</td>
                        <td class="text_center">Tools</td>
                    </tr>
                    </thead>
                    <tbody>


                    <?php
                    if ($sched > 0)
                    {
                        foreach ($sched as $row)
                        {
                            ?>
                            <tr>
                                <td><?=$row->time_in?></td>
                                <td><?=$row->time_out?></td>
                                <td class="text_center">
                                    <i class="btn btn-info fa fa-edit iconedit" data-toggle="modal" data-target="#scheduleEdit<?=$row->schedule_id?>" id='<?=$row->schedule_id?>'>&nbsp;&nbsp;Edit</i>&nbsp;&nbsp;  &nbsp;
                                    <i class="btn btn-danger fa fa-trash-alt icondelete" data-toggle="modal" data-target="#scheduleDelete" id='<?=$row->schedule_id?>'>&nbsp;&nbsp;Delete</i>
                                </td>
                            </tr>
                            <?php
                        }

                              ?>
                        <?php
                    }
                    ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
    <!--Modal for Adding Schedule-->

    <!-- Modal -->
    <div class="modal fade" id="addSched" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Schedule</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="add_schedule" method="post">
                        <div class="form-group row">
                            <label for="in" class="col-sm-3 col-form-label">Time in</label>
                            <div class="col-sm-5">
                                <input type="time" class="form-control" id="in" name="time-in" value=<?php echo date('H:i a ', mktime(8, 00));?> required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="out" class="col-sm-3 col-form-label">Time out</label>
                            <div class="col-sm-5">
                                <input type="time" class="form-control" id="out" name ="time-out"  value=<?php echo date('G:i a ', mktime(17, 00));?> required>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <input type="submit" class="btn btn-primary" name="addSchedule" value="Add Schedule">
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
    <!--    Modal for edit-->
    <?php
    if ($sched > 0)
    {
        foreach ($sched as $row)
        {
            ?>

            <div class="modal fade" id="scheduleEdit<?=$row->schedule_id?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Edit Schedule</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="scheduleUpdate" method="POST">
                                <div class="form-group row">
                                    <label for="in" class="col-sm-3 col-form-label">Time in</label>
                                    <div class="col-sm-5">
                                        <input type="text" name="sched-id" class="form-control" value =<?=$row->schedule_id;?> hidden>
                                        <input type="time" class="form-control" id="in" name="time-in" min="09:00" max="18:00" required value=<?=$row->time_in?>/>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="out" class="col-sm-3 col-form-label">Time out</label>
                                    <div class="col-sm-5">
                                        <input type="time" name="time-out" class="form-control" id="out" value=<?=$row->time_out?>>
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
    <div class="modal fade" id="scheduleDelete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Delete Schedule</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="scheduleDelete" method="POST">
                        <input type="text" name="sched" class="form-control" value =<?=$row->schedule_id;?> hidden>
                        <p class="text_center">Are you sure you want to delete this schedule?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                    <button type="submit" class="btn btn-primary">Yes</button>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php
}
}
?>
