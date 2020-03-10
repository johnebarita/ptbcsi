<div class="modal fade" id="leaveRequest" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title kulay" id="exampleModalLabel">Request Leave</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body mod">
                <div class="card">
                    <!--Card content-->
                    <div class="card-body px-lg-5 pt-0 border">
                        <br>
                        <form method="post" action="add-leave">
                            <div class="form-group">
                                <label for="formGroupExampleInput">Employee Name</label>
                                <br/>
                                <?php if($my_leave):?>
                                    <input type="text" class="form-control" id="formGroupExampleInput" value="<?=$_SESSION['name'];?>"  disabled>
                                    <input type="text" name="user_id" value="<?= $_SESSION['user_id']; ?>" hidden/>
                                <?php elseif($_SESSION['user_type']!="Employee"):?>
                                    <select name="user_id" id="month" class="input input-sm monthName" style="width: 100%;padding: 5px">
                                        <?php foreach ($users as $user):?>
                                            <?php if($user->employee_id!=$_SESSION['user_id']):?>
                                                <option value="<?=$user->employee_id;?>" ><?= strtoupper($user->lastname." ".$user->firstname);?></option>
                                            <?php endif; endforeach;?>
                                    </select>&nbsp;
                                <?php else:?>
                                    <input type="text" name="user_id" value="<?= $_SESSION['user_id']; ?>" hidden/>
                                <?php endif;?>
                            </div>
                            <div class="form-group">
                                <input type="date" class="form-control" id="formGroupExampleInput2" placeholder="mm : dd : yy" hidden>
                            </div>
                            <div>
                                <div class="form-group">
                                    <label for="formGroupExampleInput">Date from</label>
                                    <input type="date" id="date" class="form-control" id="formGroupExampleInput" name="date_from" value="<?=date("Y-m-d");?>" >
                                </div>
                                <div class="form-group">
                                    <label for="formGroupExampleInput2">Date to</label>
                                    <input type="date" class="form-control" id="formGroupExampleInput2" name="date_to" value="<?=date("Y-m-d");?>" >
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="formGroupExampleInput">Type of Leave</label>
                                <select name="leave_type" id="leave_type" class="input input-sm year">
                                    <option value="Sick" >Sick</option>
                                    <option value="Maternity" >Maternity</option>
                                </select>&nbsp;&nbsp;
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                        <!-- Form -->
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>