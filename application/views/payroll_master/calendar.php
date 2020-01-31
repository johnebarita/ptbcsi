<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>Collapsible sidebar using Bootstrap 4</title>

<!--    <link rel="stylesheet" href="--><?php //echo base_url(); ?><!--assets/css/bootstrap.css">-->
<!--    <link rel="stylesheet" href="--><?php //echo base_url(); ?><!--assets/css/bootstrap-responsive.css">-->
<!--    <link rel="stylesheet" href="--><?php //echo base_url(); ?><!--assets/css/calendar.min.css">-->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/cale.css">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.css">

    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>
</head>

<body>

    <div class="container">

    <div class="calendar-base">

        <div class="year">2017</div>
        <!-- year -->

        <div class="triangle-left"></div>
        <!--triangle -->
        <div class="triangle-right"></div>
        <!--  triangle -->

        <div class="months">
            <span class="month-hover">Jan</span>
            <span class="month-hover">Feb</span>
            <span class="month-hover">Mar</span>
            <strong class="month-color">Apr</strong>
            <span class="month-hover">May</span>
            <span class="month-hover">Jun</span>
            <span class="month-hover">July</span>
            <span class="month-hover">Aug</span>
            <span class="month-hover">Sep</span>
            <span class="month-hover">Oct</span>
            <span class="month-hover">Nov</span>
            <span class="month-hover">Dec</span>
        </div><!-- months -->
        <hr class="month-line" />

        <div class="days">SUN MON TUE WED THU FRI SAT</div>
        <!-- days -->

        <div class="num-dates">

            <div class="first-week"><span class="grey">26 27 28 29 30 31</span> 01</div>
            <!-- first week -->
            <div class="second-week">02 03 04 05 06 07 08</div>
            <!-- week -->
            <div class="third-week"> 09 10 11 12 13 14 15</div>
            <!-- week -->
            <div class="fourth-week"> 16 17 18 19 20 21 22</div>
            <!-- week -->
            <div class="fifth-week"> 23 24 25 26 <strong class="white">27</strong> 28 29</div>
            <!-- week -->
            <div class="sixth-week"> 30 <span class="grey">01 02 03 04 05 06</span></div>
            <!-- week -->
        </div>
        <!-- num-dates -->
        <div class="event-indicator"></div>
        <!-- event-indicator -->
        <div class="active-day"></div>
        <!-- active-day -->
        <div class="event-indicator two"></div>
        <!-- event-indicator -->

    </div>
    <!-- calendar-base -->
    <div class="calendar-left">

        <div class="hamburger">
            <div class="burger-line"></div>
            <!-- burger-line -->
            <div class="burger-line"></div>
            <!-- burger-line -->
            <div class="burger-line"></div>
            <!-- burger-line -->
        </div>
        <!-- hamburger -->


        <div class="num-date">27</div>
        <!--num-date -->
        <div class="day">THURSDAY</div>
        <!--day -->
        <div class="current-events">Current Events
            <br/>
            <ul>
                <li>Day 09 Daily CSS Image</li>
            </ul>
            <span class="posts">See post events</span></div>
        <!--current-events -->

        <div class="create-event">Create an Event</div>
        <!-- create-event -->
        <hr class="event-line" />
        <div class="add-event"><span class="add">+</span></div>
        <!-- add-event -->

        <input type="button" data-toggle="modal" data-target="#myModal" value="Direction"/><br/>

        <div class="modal fade" id="myModal">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header" style="background-color:#101820; color:#F2AA4CFF;">
                        <h4 class="modal-title">&nbsp;&nbsp;How?</h4>
                    </div>
                    <div class="modal-body" style="color:#101820">
                        First, you need to click the OJT button if you want to apply as OJT or Draftsman
                        button if you want to become a Draftsman. After clicking the Draftsman or OJT button,
                        you may start filling up the given text fields and then click the Register button.
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" style="background-color:#101820" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- calendar-left -->
    </div>

<!-- container -->
</body>

</html>