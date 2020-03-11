<link rel="stylesheet" href="<?=base_url();?>assets/css/position.css">
<div class="container-fluid">
    <h1 class="h3 mb-3 text-gray-800"><strong>TDZ</strong> <i class="divider"> / </i> <span>Position</span></h1>


    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <input type="button" class="btn btn-facebook" value="Add Position" data-toggle="modal" data-target="#addPosition">
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable">
                    <thead>
                        <tr>
                            <td class="text_center">Position</td>
                            <td class="text_center">Wage</td>
                            <td class="text_center">Schedule</td>
                            <td class="text_center">Tools</td>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                    if ($positions > 0)
                    {
                        foreach ($positions as $position)
                        {
                            ?>
                            <tr class="text_center">
                                <td><?=$position->position;?></td>
                                <td><?=number_format($position->rate, 2);?></td>
                                <td><?=$position->time_in.' - '.$position->time_out;?></td>
                                <td>
                                    <i class="btn btn-info fa fa-edit iconedit" data-toggle="modal" data-target="#positionEdit<?=$position->position_id;?>">&nbsp;&nbsp;Edit</i>&nbsp;&nbsp;&nbsp;
                                    <i class="btn btn-danger fa fa-trash-alt icondelete" data-toggle="modal" data-target="#positionDelete<?=$position->position_id;?>">&nbsp;&nbsp;Delete</i>
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
</div>

    <!--Modal for Adding Schedule-->
    <!-- Modal -->

<?php include  getcwd().'/application/views/includes/modals/add/add_position_modal.php';?>
    <!-- Edit Modal -->
    <?php foreach ($positions as $position):?>
    <div class="modal fade" id="positionEdit<?=$position->position_id;?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Position</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="update-position" method="post">
                        <div class="form-group row">
                            <label for="posTitle" class="col-sm-5 col-form-label">Position Title</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control"  name="position" required value="<?=$position->position;?>">
                                <input type="text" name="position_id" value="<?= $position->position_id ?>" hidden/>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="rph" class="col-sm-5 col-form-label">Wage</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control"  min="1" required name="rate" value="<?=($position->rate);?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="sched" class="col-sm-5 col-form-label">Schedule</label>
                            <div class="col-sm-6">
                                <select class="form-control" name="schedule_id" id="sched" data-style="btn-light">
                                    <?php foreach ($schedules as $row){?>
                                        <option value=<?=$row->schedule_id?> ><?=$row->time_in." - ".$row->time_out?></option>
                                    <?php }?>
                                </select>
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
    <div class="modal fade" id="positionDelete<?=$position->position_id;?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Delete Schedule</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="delete-position" method="post">
                        <input type="text" name="position_id" class="form-control" value =<?=$position->position_id;?> hidden>
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

<?php endforeach;?>