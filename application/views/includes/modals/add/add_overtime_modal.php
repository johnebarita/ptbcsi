<div class="modal fade" id="add-overtime" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title kulay" id="exampleModalLabel">Request Overtime</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body mod">
                <div class="card">
                    <div class="card-body px-lg-5 pt-0 border">
                        <br>
                        <form method="post" action="add-overtime">
                            <?php if($_SESSION['user_type']!="Employee"):?>
                                <select name="user_id"  class="input input-sm monthName" style="width: 100%;padding: 5px">
                                    <?php foreach ($users as $user):?>
                                        <?php if($user->employee_id!=$_SESSION['user_id']):?>
                                            <option value="<?=$user->employee_id;?>" ><?= strtoupper($user->lastname." ".$user->firstname);?></option>
                                    <?php endif; endforeach;?>
                                </select>&nbsp;
                            <?php else:?>
                                <input type="text" name="user_id" value="<?= $_SESSION['user_id']; ?>" hidden/>
                            <?php endif;?>
                            <div class="form-group">
                                <label for="formGroupExampleInput">Reason</label>
                                <input type="text" class="form-control" id="formGroupExampleInput" name="reason" placeholder="Please state your reason" required/>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>