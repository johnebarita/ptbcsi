<?php
/**
 * Created by PhpStorm.
 * User: capstonestudent
 * Date: 2/19/2020
 * Time: 2:45 AM
 */?>

<div class="modal fade" id="addPosition" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Position</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="add-position" method="post">
                    <div class="form-group row">
                        <label for="posTitle" class="col-sm-5 col-form-label">Position Title</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" name="position" id="posTitle" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="rph" class="col-sm-5 col-form-label">Rate</label>
                        <div class="col-sm-5">
                            <input type="number" class="form-control" min="1" name="rate" id="rph" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="sched" class="col-sm-5 col-form-label">Schedule</label>
                        <div class="col-sm-5">
                            <select class="form-control" name="schedule_id" data-style="btn-light">
                                <?php foreach ($schedules as $row){?>
                                    <option value=<?=$row->schedule_id?> ><?=$row->time_in." - ".$row->time_out?></option>
                                <?php }?>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Add Position</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>
