<link href="assets/css/schedule.css" rel="stylesheet">
<div class="container-fluid">
    <h1 class="h3 mb-3 text-gray-800"><strong>TDZ</strong> <i class="divider"> / </i> <span>Cash Advance</span></h1>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <input type="button" class="btn btn-facebook" value="New Cash Advance" data-toggle="modal" data-target="#addCashAdvance">
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <td>Date</td>
                            <td>Employee Name</td>
                            <td>Amount</td>
                            <td>Balance</td>
                            <td>Status</td>
                            <td>Tools</td>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>03/19/19</td>
                            <td>Mariel Padilla</td>
                            <td>10,000</td>
                            <td>50,000</td>
                            <td>Single</td>
                            <td class="text_center"><i class="btn btn-info fa fa-edit iconedit" data-toggle="modal" data-target="#cashAdEdit">&nbsp;&nbsp;Edit</i>&nbsp;&nbsp;&nbsp;
                                <i class="btn btn-danger fa fa-trash-alt icondelete" data-toggle="modal" data-target="#cashAdDelete">&nbsp;&nbsp;Delete</i>
                            </td>
                        </tr>
                        <tr>
                            <td>03/19/19</td>
                            <td>Mariel Padilla</td>
                            <td>10,000</td>
                            <td>50,000</td>
                            <td>Single</td>
                            <td class="text_center"><i class="btn btn-info fa fa-edit iconedit" data-toggle="modal" data-target="#cashAdEdit">&nbsp;&nbsp;Edit</i>&nbsp;&nbsp;&nbsp;
                                <i class="btn btn-danger fa fa-trash-alt icondelete" data-toggle="modal" data-target="#cashAdDelete">&nbsp;&nbsp;Delete</i>
                            </td>
                        </tr>
                        <tr>
                            <td>03/19/19</td>
                            <td>Mariel Padilla</td>
                            <td>10,000</td>
                            <td>50,000</td>
                            <td>Single</td>
                            <td class="text_center"><i class="btn btn-info fa fa-edit iconedit" data-toggle="modal" data-target="#cashAdEdit">&nbsp;&nbsp;Edit</i>&nbsp;&nbsp;&nbsp;
                                <i class="btn btn-danger fa fa-trash-alt icondelete" data-toggle="modal" data-target="#cashAdDelete">&nbsp;&nbsp;Delete</i>
                            </td>
                        </tr>
                        <tr>
                            <td>03/19/19</td>
                            <td>Mariel Padilla</td>
                            <td>10,000</td>
                            <td>50,000</td>
                            <td>Single</td>
                            <td class="text_center"><i class="btn btn-info fa fa-edit iconedit" data-toggle="modal" data-target="#cashAdEdit">&nbsp;&nbsp;Edit</i>&nbsp;&nbsp;&nbsp;
                                <i class="btn btn-danger fa fa-trash-alt icondelete" data-toggle="modal" data-target="#cashAdDelete">&nbsp;&nbsp;Delete</i>
                            </td>
                        </tr>
                        <tr>
                            <td>03/19/19</td>
                            <td>Mariel Padilla</td>
                            <td>10,000</td>
                            <td>50,000</td>
                            <td>Single</td>
                            <td class="text_center"><i class="btn btn-info fa fa-edit iconedit" data-toggle="modal" data-target="#cashAdEdit">&nbsp;&nbsp;Edit</i>&nbsp;&nbsp;&nbsp;
                                <i class="btn btn-danger fa fa-trash-alt icondelete" data-toggle="modal" data-target="#cashAdDelete">&nbsp;&nbsp;Delete</i>
                            </td>
                        </tr>
                        <tr>
                            <td>03/19/19</td>
                            <td>Mariel Padilla</td>
                            <td>10,000</td>
                            <td>50,000</td>
                            <td>Single</td>
                            <td class="text_center"><i class="btn btn-info fa fa-edit iconedit" data-toggle="modal" data-target="#cashAdEdit">&nbsp;&nbsp;Edit</i>&nbsp;&nbsp;&nbsp;
                                <i class="btn btn-danger fa fa-trash-alt icondelete" data-toggle="modal" data-target="#cashAdDelete">&nbsp;&nbsp;Delete</i>
                            </td>
                        </tr>
                        <tr>
                            <td>03/19/19</td>
                            <td>Mariel Padilla</td>
                            <td>10,000</td>
                            <td>50,000</td>
                            <td>Single</td>
                            <td class="text_center"><i class="btn btn-info fa fa-edit iconedit" data-toggle="modal" data-target="#cashAdEdit">&nbsp;&nbsp;Edit</i>&nbsp;&nbsp;&nbsp;
                                <i class="btn btn-danger fa fa-trash-alt icondelete" data-toggle="modal" data-target="#cashAdDelete">&nbsp;&nbsp;Delete</i>
                            </td>
                        </tr>
                        <tr>
                            <td>03/19/19</td>
                            <td>Mariel Padilla</td>
                            <td>10,000</td>
                            <td>50,000</td>
                            <td>Single</td>
                            <td class="text_center"><i class="btn btn-info fa fa-edit iconedit" data-toggle="modal" data-target="#cashAdEdit">&nbsp;&nbsp;Edit</i>&nbsp;&nbsp;&nbsp;
                                <i class="btn btn-danger fa fa-trash-alt icondelete" data-toggle="modal" data-target="#cashAdDelete">&nbsp;&nbsp;Delete</i>
                            </td>
                        </tr>

                    </tbody>
                </table>
            </div>
        </div>
    </div>

<!--    Add Cash Advance Modal-->
    <div class="modal fade" id="addCashAdvance" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Cash Advance</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="">
                        <div class="form-group row">
                            <label for="date" class="col-sm-4 col-form-label">Date</label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" id="date">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="empName" class="col-sm-4 col-form-label">Employee Name</label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" id="empName">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="amount" class="col-sm-4 col-form-label">Amount</label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" id="amount">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="balance" class="col-sm-4 col-form-label">Balance</label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" id="balance">
                            </div>
                        </div>

                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Add Overtime</button>
                </div>
            </div>
        </div>
    </div>
<!--Modal Edit-->
    <div class="modal fade" id="cashAdEdit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Cash Advance</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="">
                        <div class="form-group row">
                            <label for="date" class="col-sm-4 col-form-label">Date</label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" id="date">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="empName" class="col-sm-4 col-form-label">Employee Name</label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" id="empName">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="amount" class="col-sm-4 col-form-label">Amount</label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" id="amount">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="balance" class="col-sm-4 col-form-label">Balance</label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" id="balance">
                            </div>
                        </div>

                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save</button>
                </div>
            </div>
        </div>
    </div>
    <!--    Modal for delete-->
    <div class="modal fade" id="cashAdDelete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Delete Schedule</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p class="text_center">Are you sure you want to delete this?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                    <button type="button" class="btn btn-primary">Yes</button>
                </div>
            </div>
        </div>
    </div>
</div>