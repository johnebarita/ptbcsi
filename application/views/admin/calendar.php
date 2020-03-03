<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2/6/2020
 * Time: 6:11 PM
 */ ?>

<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/cale.css">

<div class="container container-fluid" style="width: 100%;">
    <div class="card shadow">
        <div class="card-header">
            <div class="row text-center">
                <div class="col-4">
                    <div class="card border-left-warning shadow h-100 py" style="width: 80%;">
                        <div class="card-body" style="width: 140%; margin-top: -10px; margin-bottom: 5px;">
                            <div class="calendar-left" style="padding: 0%;"><br>
                                <div class="dot">
                                <div class="num-date"><?= date('d'); ?></div>
                                </div>
                                <div><?=date('l');?></div>
                                <hr>
                                <div style="margin-top: 50px;"><i class="far fa-calendar-check"></i> My Birthday</div>
                                <input class="text-center btn btn-info" style="width: 50%;font-size: 12px; margin-top: 50%" type="button" data-toggle="modal"
                                       data-target="#myModal" value="+ Add Event"/><br/>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-8">
                    <div class="card border-left-warning shadow h-100 py-2" style="left: -15%; width: 115%">
                        <div class="card-body" style="width: 93%">
                            <div id="calendar" style="color: black;  margin-left: 25px;  height: 10%; width: 100%;margin-top: -10px;"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="myModal">
    <div class="modal-dialog modal-lg" style="width:500px;">
        <div class="modal-content">
            <div class="modal-header" style="background-color:dodgerblue; color:#F2AA4CFF;">
                <h4 class="modal-title">&nbsp;&nbsp;</h4>
            </div>
            <div class="modal-body" style="color:#101820; ">
                <div class="form-group">

                    <div class='input-group date' style="left: 20px;">
                        <?php echo form_open(base_url() . 'calendar1'); ?>
                        <i class="fas fa-calendar-alt"></i>&nbsp; <label for="dob">Date of Event</label>
                        <?php $attributes = 'id="dob" placeholder="Date" name="date"';
                        echo form_input('dob', set_value('dob'), $attributes); ?>
                        <input type="text" class="form-control" name="date" id="exampleInputPassword1" placeholder="Date"><br>
                        <i class="fas fa-marker"></i>&nbsp;<label for="exampleInputPassword1"> Event</label>
                        <input type="text" class="form-control" name="event" id="exampleInputPassword2" placeholder="Add Event"><br>
                        <input type="hidden" name="submitForm"/>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" name="submitForm" style="background-color:#101820" class="btn btn-success">
                    Submit
                </button>
                <button type="button" class="btn btn-secondary" style="background-color:#101820" data-dismiss="modal">
                    Close
                </button>
            </div>
        </div>
    </div>
</div>


<script type="text/javascript">

    var events = <?php echo json_encode($data) ?>;

    var date = new Date()
    var d = date.getDate(),
        m = date.getMonth(),
        y = date.getFullYear()

    $('#calendar').fullCalendar({
        header: {
            left: '',
            center: 'title',
            right: 'prev,next today'
        },
        buttonText: {
            today: 'today',
            month: 'month'
        },
        events: events
    })

    $(function () {
        $("#dob").datepicker();
    });

</script>