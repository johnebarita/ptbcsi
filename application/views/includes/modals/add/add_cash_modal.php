<?php
/**
 * Created by PhpStorm.
 * User: capstonestudent
 * Date: 2/19/2020
 * Time: 2:47 AM
 */?>

<div class="modal fade" id="addCashAdvance" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Cash Advance</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="add-cash-advance" method="post" id="cash">
                    <div class="form-group row">

                        <label for="empName" class="col-sm-4 col-form-label text-right">Employee Name</label>
                        <div class="col-sm-8">
                            <select name="user_id" id="month" class="input input-sm monthName form-control"
                                    style="width: 100%;padding: 5px">
                                <?php foreach ($users as $user): ?>
                                    <option value="<?= $user->employee_id; ?>"><?= strtoupper($user->lastname . " " . $user->firstname); ?></option>
                                <?php endforeach; ?>
                            </select>&nbsp;&nbsp;
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="amount" class="col-sm-4 col-form-label text-right">Requested Amount</label>
                        <div class="col-sm-8">
                            <input type="number" class="form-control" min="0" name="amount" id="amount" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="balance" class="col-sm-4 col-form-label text-right">Repayment Amount Every
                            Payroll </label>
                        <div class="col-sm-8">
                            <input type="number" class="form-control" name="repay_amount" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="balance" class="col-sm-4 col-form-label text-right">Purpose</label>
                        <div class="col-sm-8">
                                <textarea rows="3" class="form-control" name="purpose" form="cash"
                                          placeholder="Purpose..." required></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Add</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>
