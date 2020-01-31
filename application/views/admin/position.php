<link rel="stylesheet" href="../../../assets/css/position.css">
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
                    <tr class="text_center">
                        <td>Programmer</td>
                        <td>16, 000</td>
                        <td>8:00 AM- 5:00PM</td>
                        <td class="text_center">
                            <i class="btn btn-info fa fa-edit iconedit" data-toggle="modal" data-target="#positionEdit">&nbsp;&nbsp;Edit</i>&nbsp;&nbsp;&nbsp;
                            <i class="btn btn-danger fa fa-trash-alt icondelete" data-toggle="modal" data-target="#positionDelete">&nbsp;&nbsp;Delete</i>
                        </td>
                    </tr>
                    <tr class="text_center">
                        <td>Programmer</td>
                        <td>16, 000</td>
                        <td>8:00 AM- 5:00PM</td>
                        <td class="text_center">
                            <i class="btn btn-info fa fa-edit iconedit" data-toggle="modal" data-target="#positionEdit">&nbsp;&nbsp;Edit</i>&nbsp;&nbsp;&nbsp;
                            <i class="btn btn-danger fa fa-trash-alt icondelete" data-toggle="modal" data-target="#positionDelete">&nbsp;&nbsp;Delete</i>
                        </td>
                    </tr>
                    <tr class="text_center">
                        <td>Programmer</td>
                        <td>16, 000</td>
                        <td>8:00 AM- 5:00PM</td>
                        <td class="text_center">
                            <i class="btn btn-info fa fa-edit iconedit" data-toggle="modal" data-target="#positionEdit">&nbsp;&nbsp;Edit</i>&nbsp;&nbsp;&nbsp;
                            <i class="btn btn-danger fa fa-trash-alt icondelete" data-toggle="modal" data-target="#positionDelete">&nbsp;&nbsp;Delete</i>
                        </td>
                    </tr>
                    <tr class="text_center">
                        <td>Programmer</td>
                        <td>16, 000</td>
                        <td>8:00 AM- 5:00PM</td>
                        <td class="text_center">
                            <i class="btn btn-info fa fa-edit iconedit" data-toggle="modal" data-target="#positionEdit">&nbsp;&nbsp;Edit</i>&nbsp;&nbsp;&nbsp;
                            <i class="btn btn-danger fa fa-trash-alt icondelete" data-toggle="modal" data-target="#positionDelete">&nbsp;&nbsp;Delete</i>
                        </td>
                    </tr>
                    <tr class="text_center">
                        <td>Programmer</td>
                        <td>16, 000</td>
                        <td>8:00 AM- 5:00PM</td>
                        <td class="text_center">
                            <i class="btn btn-info fa fa-edit iconedit" data-toggle="modal" data-target="#positionEdit">&nbsp;&nbsp;Edit</i>&nbsp;&nbsp;&nbsp;
                            <i class="btn btn-danger fa fa-trash-alt icondelete" data-toggle="modal" data-target="#positionDelete">&nbsp;&nbsp;Delete</i>
                        </td>
                    </tr>
                    <tr class="text_center">
                        <td>Programmer</td>
                        <td>16, 000</td>
                        <td>8:00 AM- 5:00PM</td>
                        <td class="text_center">
                            <i class="btn btn-info fa fa-edit iconedit" data-toggle="modal" data-target="#positionEdit">&nbsp;&nbsp;Edit</i>&nbsp;&nbsp;&nbsp;
                            <i class="btn btn-danger fa fa-trash-alt icondelete" data-toggle="modal" data-target="#positionDelete">&nbsp;&nbsp;Delete</i>
                        </td>
                    </tr>

                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!--Modal for Adding Schedule-->
    <!-- Modal -->
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
                    <form action="">
                        <div class="form-group row">
                            <label for="posTitle" class="col-sm-5 col-form-label">Position Title</label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" id="posTitle">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="rph" class="col-sm-5 col-form-label">Wage</label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" id="rph">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="sched" class="col-sm-5 col-form-label">Schedule</label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" id="sched">
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Add Position</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Edit Modal -->
    <div class="modal fade" id="positionEdit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Position</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="">
                        <div class="form-group row">
                            <label for="posTitle" class="col-sm-5 col-form-label">Position Title</label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" id="posTitle">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="rph" class="col-sm-5 col-form-label">Wage</label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" id="rph">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="sched" class="col-sm-5 col-form-label">Schedule</label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" id="sched">
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
    <div class="modal fade" id="positionDelete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Delete Schedule</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p class="text_center">Are you sure you want to delete this schedule?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                    <button type="button" class="btn btn-primary">Yes</button>
                </div>
            </div>
        </div>
    </div>
</div>
