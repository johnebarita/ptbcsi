<link href="<?= base_url() ?>assets/css/schedule.css" rel="stylesheet">
<div class="container-fluid">
    <h1 class="h3 mb-3 text-gray-800"><strong>TDZ</strong> <i class="divider"> / </i> <span>Cash Advance</span></h1>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <input type="button" class="btn btn-facebook" value="New Cash Advance" data-toggle="modal"
                   data-target="#addCashAdvance">
        </div>
        <div class="card-body">
            <div class="row">
                <div class="table-responsive col-xl-7 col-md-6 mb-6">
                    <table class="table table-bordered" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <td>Date</td>
                            <td>Employee Name</td>
                            <td>Amount</td>
                            <td>Repayment</td>
                            <td>Balance</td>
                            <td>Status</td>
                            <td>Tools</td>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($cashAdvances as $cashAdvance): ?>
                        <tr>
                            <td><?= $cashAdvance->date_advance; ?></td>
                            <td><?= strtoupper($cashAdvance->lastname . ' ' . $cashAdvance->firstname); ?></td>
                            <td><?= $cashAdvance->amount; ?></td>
                            <td><?= $cashAdvance->repay_amount; ?></td>
                            <td><?= $cashAdvance->balance; ?></td>
                            <td><?= $cashAdvance->status; ?></td>
                            <td class="text_center">
                                <i class="btn btn-info fa fa-edit iconedit" data-toggle="modal"
                                   data-target="#cashAdEdit<?= $cashAdvance->cash_advance_id; ?>"> &nbsp;&nbsp;Edit</i>&nbsp;&nbsp;&nbsp;
                                <i class="btn btn-danger fa fa-trash-alt icondelete" data-toggle="modal"
                                   data-target="#cashAdDelete<?= $cashAdvance->cash_advance_id; ?>">&nbsp;&nbsp;Delete</i>
                            </td>
                            <?php endforeach; ?>
                        </tr>
                        </tbody>
                    </table>
                </div>
                <div class="table-responsive col-xl-5 col-md-6 mb-6">
                    <div>
                        <h1 class="h3 mb-3 text-gray-800" align="center"> Cash Advance Details</h1>
                        <hr>
                        <h5 class="h6 mb-3 text-gray-800" align="center">Under Construction</h5>
                    </div>
                    <div>
                        <table class="table table-bordered" width="100%" cellspacing="0">
                            <thead>
                            <tr>
                                <td>Payroll Date Range</td>
                                <td>Payroll #</td>
                                <td>Amount Pay</td>
                                <td>Balance</td>
                                <td>Status</td>
                            </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--    Add Cash Advance Modal-->
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
    <!--Modal Edit-->

    <?php foreach ($cashAdvances as $cashAdvance): ?>
        <div class="modal fade" id="cashAdEdit<?= $cashAdvance->cash_advance_id; ?>" tabindex="-1" role="dialog"
             aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Edit Cash Advance</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="update-cash-advance" method="post">
                            <div class="form-group row">
                                <label for="empName" class="col-sm-4 col-form-label">Employee Name</label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" id="empName"
                                           value="<?= strtoupper($cashAdvance->lastname . " " . $cashAdvance->firstname); ?>"
                                           disabled/>
                                    <input type="text" name="cash_advance_id"
                                           value="<?= $cashAdvance->cash_advance_id ?>" hidden/>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="amount" class="col-sm-4 col-form-label">Amount</label>
                                <div class="col-sm-5">
                                    <input type="number" class="form-control" name="amount"
                                           value="<?= $cashAdvance->amount; ?>"/>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="balance" class="col-sm-4 col-form-label">Repay Amount</label>
                                <div class="col-sm-5">
                                    <input type="number" class="form-control" name="repay_amount"
                                           value="<?= $cashAdvance->repay_amount; ?>"/>
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
        <div class="modal fade" id="cashAdDelete<?= $cashAdvance->cash_advance_id; ?>" tabindex="-1" role="dialog"
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
                        <form action="delete-cash-advance" method="post">
                            <p class="text_center">Are you sure you want to delete this?</p>
                            <input type="text" name="cash_advance_id"
                                   value="<?= $cashAdvance->cash_advance_id ?>" hidden/>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                                <button type="submit" class="btn btn-primary">Yes</button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>