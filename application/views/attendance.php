<link href="assets/css/custom.css" rel="stylesheet">
<div class="container-fluid">
    <!--    <h1 class="h3 mb-4 text-gray-800">Attendance - TODO ( Mariel) </h1>-->

    <h1 class="h3 mb-3 text-gray-800"><strong>TDZ</strong> <i class="divider"> / </i> <span>Daily Time Record</span>
    </h1>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"><strong>TDZ</strong> <i class="divider"> / </i> <span>Daily Time Record</span></h6>
        </div>
        <div class="card-body">
            <div class="sec_head">
                <div class="row">
                    <div class="col-md-6">
                        <table class="filter">
                            <tbody>
                            <tr>
                                <td>
                                    <input type="text" name="search_text_reports" id="search_text_reports" placeholder="Search Employee" class="form-control"/>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                        <br>
                        <form action="attendance" method="post">
                            <label for="half_month">Filter: </label>&nbsp;&nbsp;&nbsp;
                            <select name="half_month" id="half_month" class="input input-sm half_month">

                                <option value="A" <?php if($half_month =='A'){echo 'selected';}?>>A</option>
                                <option value="B" <?php if($half_month =='B'){echo 'selected';}?>>B</option>
                            </select>&nbsp;&nbsp;
                            <select name="month" id="month" class="input input-sm monthName">
                                <option value="1" <?php if($month =='January'){echo 'selected';}?>>January</option>
                                <option value="2" <?php if($month =='February'){echo 'selected';}?>>February</option>
                                <option value="3" <?php if($month =='March'){echo 'selected';}?>>March</option>
                                <option value="4" <?php if($month =='April'){echo 'selected';}?>>April</option>
                                <option value="5" <?php if($month =='May'){echo 'selected';}?>>May</option>
                                <option value="6" <?php if($month =='June'){echo 'selected';}?>>June</option>
                                <option value="7" <?php if($month =='July'){echo 'selected';}?>>July</option>
                                <option value="8" <?php if($month =='August'){echo 'selected';}?>>August</option>
                                <option value="9" <?php if($month =='September'){echo 'selected';}?>>September</option>
                                <option value="10" <?php if($month =='October'){echo 'selected';}?>>October</option>
                                <option value="11" <?php if($month =='November'){echo 'selected';}?>>November</option>
                                <option value="12" <?php if($month  =='December'){echo 'selected';}?>>December</option>
                            </select>&nbsp;&nbsp;
                            <select name="year" id="year" class="input input-sm year">
                                <option value="2020" <?php if($year =='2020'){echo 'selected';}?>>2020</option>
                                <option value="2019" <?php if($year =='2019'){echo 'selected';}?>>2019</option>
                                <option value="2018" <?php if($year =='2018'){echo 'selected';}?>>2018</option>
                                <option value="2017" <?php if($year =='2017'){echo 'selected';}?>>2017</option>
                                <option value="2016" <?php if($year =='2016'){echo 'selected';}?>>2016</option>
                                <option value="2015" <?php if($year =='2015'){echo 'selected';}?>>2015</option>
                                <option value="2014" <?php if($year =='2014'){echo 'selected';}?>>2014</option>
                                <option value="2013" <?php if($year =='2013'){echo 'selected';}?>>2013</option>
                                <option value="2012" <?php if($year =='2012'){echo 'selected';}?>>2012</option>
                            </select>&nbsp;&nbsp;
                            <select name="empName" id="name" class="input input-sm empName">
                                <option value="employeeID">Anunciacion Maricris Joy</option>
                                <option value="employeeID">Astillero Gelyn</option>
                                <option value="employeeID">Boiser Mariel</option>
                                <option value="employeeID">Ebarita John Regy</option>
                                <option value="employeeID">Opora Kerr</option>
                                <option value="employeeID">Rondina Noel</option>
                                <option value="employeeID">Song Horace</option>
                                <option value="employeeID">Castillon Kyle</option>
                                <option value="employeeID">Lesana Mica</option>
                                <option value="employeeID">Marcillana Nicka</option>
                                <option value="employeeID">Lawag Marjun</option>
                                <option value="employeeID">Ceniza Joel Jr.</option>
                            </select>&nbsp;&nbsp;
                            <button type="submit" class="btn btn-sm btn-primary">GO</button>
                        </form>
                    </div>
                    <span class="date_time">
                        <span class="time">
                            <span><i class="fa fa-clock">&nbsp;&nbsp;&nbsp;</i>Time: </span>
                        </span>
                        <span><i class="fa fa-calendar">&nbsp;&nbsp;&nbsp;</i>Date: </span>
                    </span>
                </div>
            </div>
            <div class="details">
                <div class="rh tb_rh text_center">
                    <span class="show_leave_details">Leave:
                        <span class="text-primary">sdfsf</span>
                        <div style="display: none;">
                            <span class="width-200"></span>
                        </div>
                    </span>&nbsp;&nbsp;&nbsp;
                    <span class="show_absent">Absent:
                        <span class="text-primary"></span>
                        <div style="display: none;">
                            <span class="width-200"></span>
                        </div>
                    </span>&nbsp;&nbsp;&nbsp;
                    <span>Over Time:
                        <span class="text-primary"></span>
                        <div style="display: none">
                            <span class="width-200"></span>
                        </div>
                    </span>&nbsp;&nbsp;&nbsp;
                    <span>Under Time:
                        <span class="text-primary"></span>
                        <div style="display: none">
                            <span class="width-200"></span>
                        </div>
                    </span>&nbsp;&nbsp;&nbsp;
                    <span>Late:
                        <span class="text-primary"></span>
                        <div style="display: none">
                            <span class="width-200"></span>
                        </div>
                    </span>
                </div>

            </div>
            <div class="table-responsive">
                <table id="attendance" class="table table-sm table-bordered">
                    <thead>
                    <tr>
                        <th colspan="2" class=" text_center border-left">Half-Month</th>
                        <th colspan="2" class="text_center">Morning</th>
                        <th class="width1"></th>
                        <th colspan="2" class="text_center">Afternoon</th>
                        <th class="width1"></th>
                        <th colspan="2" class="text_center">OverTime</th>
                        <th class="width1"></th>
                        <th colspan="3" class="text_center border-right">Total Time</th>
                    </tr>
                    <tr class="">
                        <td class="width1 no_hover" colspan="2">Days</td>
                        <td class="width1 no_hover">In</td>
                        <td class="width1 no_hover">Out</td>
                        <td class="width1 no_hover">Time</td>
                        <td class="width1 no_hover">In</td>
                        <td class="width1 no_hover">Out</td>
                        <td class="width1 no_hover">Time</td>
                        <td class="width1 no_hover">In</td>
                        <td class="width1 no_hover">Out</td>
                        <td class="width1 no_hover tc" title="Time Convention"  data-toggle='tooltip' data-container='body' >TC</td>
                        <td class="width1 no_hover">Time</td>
                        <td class="width1 no_hover">Pre</td>
                        <td class="width1 no_hover">OT</td>
                        <td class="width1 no_hover">Late</td>
                    </tr>
                    </thead>
                    <tbody>

                    <?php foreach ($days as $day){ ?>
                    <tr>
                        <td width="40"><?php echo $day[0]; ?></td>
                        <td width="80"><?php echo $day[1];?></td>
                        <td align="center"><?php echo $time[0]; ?></td>
                        <td class="text_center"><?php echo $time[1]; ?></td>
                        <td class="text_center"><?php echo $time[2]; ?></td>
                        <td class="text_center"><?php echo $time[3]; ?></td>
                        <td class="text_center"><?php echo $time[4]; ?></td>
                        <td class="text_center"><?php echo $time[5]; ?></td>
                        <td class="text_center"><?php echo $time[6]; ?></td>
                        <td class="text_center"><?php echo $time[7]; ?></td>
                        <td class="text_center"><?php echo $time[8]; ?></td>
                        <td class="text_center"><?php echo $time[9]; ?></td>
                        <td class="text_center"><?php echo $time[10]; ?></td>
                        <td class="text_center"><?php echo $time[11]; ?></td>
                    <?php } ?>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>