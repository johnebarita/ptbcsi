<?php
/**
 * Created by PhpStorm.
 * User: capstonestudent
 * Date: 2/19/2020
 * Time: 2:42 AM
 */ ?>
<div class="modal fade" id="addSched" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Schedule</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="add-schedule" method="post">
                    <div class="form-group row">
                        <label for="in" class="col-sm-3 col-form-label">Time in</label>
                        <div class="col-sm-5">
                            <input type="time" class="form-control" id="in" name="time-in"
                                   value=<?php echo date('H:i a ', mktime(8, 00)); ?> required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="out" class="col-sm-3 col-form-label">Time out</label>
                        <div class="col-sm-5">
                            <input type="time" class="form-control" id="out" name="time-out"
                                   value=<?php echo date('G:i a ', mktime(17, 00)); ?> required>
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