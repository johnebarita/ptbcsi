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

                        <form action="">
                            <label for="half_month">Filter: </label>&nbsp;&nbsp;&nbsp;
                            <select name="half_month" id="half_month" class="input input-sm half_month">
                                <option value="A">A</option>
                                <option value="B">B</option>
                            </select>&nbsp;&nbsp;
                            <select name="month" id="month" class="input input-sm monthName">
                                <option value="January">January</option>
                                <option value="February">February</option>
                                <option value="March">March</option>
                                <option value="April">April</option>
                                <option value="May">May</option>
                                <option value="June">June</option>
                                <option value="July">July</option>
                                <option value="August">August</option>
                                <option value="September">September</option>
                                <option value="October">October</option>
                                <option value="November">November</option>
                                <option value="December">December</option>
                            </select>&nbsp;&nbsp;
                            <select name="year" id="year" class="input input-sm year">
                                <option value="2012">2012</option>
                                <option value="2013">2013</option>
                                <option value="2014">2014</option>
                                <option value="2015">2015</option>
                                <option value="2016">2016</option>
                                <option value="2017">2017</option>
                                <option value="2018">2018</option>
                                <option value="2019">2019</option>
                                <option value="2020">2020</option>
                                <option value="2021">2021</option>
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
                            <button type="button" class="btn btn-sm btn-primary">GO</button>
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
                    <span >Over Time:
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
                    <tr>
                        <td width="40">01</td>
                        <td width="80">faw</td>
                        <td align="center">hj</td>
                        <td class="text_center">jgyjh</td>
                        <td class="text_center">jhfjfh</td>
                        <td class="text_center">jfj</td>
                        <td class="text_center">jmhgnj</td>
                        <td class="text_center">er</td>
                        <td class="text_center">gf</td>
                        <td class="text_center">ggs</td>
                        <td class="text_center">gb</td>
                        <td class="text_center">kjl</td>
                        <td class="text_center">lgh</td>
                        <td class="text_center">lgy</td>
                    </tr>
                    <tr>
                        <td width="40">01</td>
                        <td width="80">faw</td>
                        <td align="center">hj</td>
                        <td class="text_center">jgyjh</td>
                        <td class="text_center">jhfjfh</td>
                        <td class="text_center">jfj</td>
                        <td class="text_center">jmhgnj</td>
                        <td class="text_center">er</td>
                        <td class="text_center">mara</td>
                        <td class="text_center">ggs</td>
                        <td class="text_center">gb</td>
                        <td class="text_center">kjl</td>
                        <td class="text_center">lgh</td>
                        <td class="text_center">lgy</td>
                    </tr>
                    <tr>
                        <td width="40">01</td>
                        <td width="80">faw</td>
                        <td align="center">hj</td>
                        <td class="text_center">jgyjh</td>
                        <td class="text_center">jhfjfh</td>
                        <td class="text_center">jfj</td>
                        <td class="text_center">jmhgnj</td>
                        <td class="text_center">er</td>
                        <td class="text_center">gf</td>
                        <td class="text_center">ggs</td>
                        <td class="text_center">gb</td>
                        <td class="text_center">kjl</td>
                        <td class="text_center">lgh</td>
                        <td class="text_center">lgy</td>
                    </tr>
                    <tr>
                        <td width="40">01</td>
                        <td width="80">faw</td>
                        <td align="center">hj</td>
                        <td class="text_center">jgyjh</td>
                        <td class="text_center">jhfjfh</td>
                        <td class="text_center">jfj</td>
                        <td class="text_center">jmhgnj</td>
                        <td class="text_center">er</td>
                        <td class="text_center">gf</td>
                        <td class="text_center">ggs</td>
                        <td class="text_center">gb</td>
                        <td class="text_center">kjl</td>
                        <td class="text_center">lgh</td>
                        <td class="text_center">lgy</td>
                    </tr>
                    <tr>
                        <td width="40">01</td>
                        <td width="80">faw</td>
                        <td align="center">hj</td>
                        <td class="text_center">jgyjh</td>
                        <td class="text_center">jhfjfh</td>
                        <td class="text_center">jfj</td>
                        <td class="text_center">jmhgnj</td>
                        <td class="text_center">er</td>
                        <td class="text_center">gf</td>
                        <td class="text_center">ggs</td>
                        <td class="text_center">gb</td>
                        <td class="text_center">kjl</td>
                        <td class="text_center">lgh</td>
                        <td class="text_center">lgy</td>
                    </tr>
                    <tr>
                        <td width="40">01</td>
                        <td width="80">faw</td>
                        <td align="center">hj</td>
                        <td class="text_center">jgyjh</td>
                        <td class="text_center">jhfjfh</td>
                        <td class="text_center">jfj</td>
                        <td class="text_center">jmhgnj</td>
                        <td class="text_center">er</td>
                        <td class="text_center">gf</td>
                        <td class="text_center">ggs</td>
                        <td class="text_center">gb</td>
                        <td class="text_center">kjl</td>
                        <td class="text_center">lgh</td>
                        <td class="text_center">lgy</td>
                    </tr>
                    <tr>
                        <td width="40">01</td>
                        <td width="80">faw</td>
                        <td align="center">hj</td>
                        <td class="text_center">jgyjh</td>
                        <td class="text_center">jhfjfh</td>
                        <td class="text_center">jfj</td>
                        <td class="text_center">jmhgnj</td>
                        <td class="text_center">er</td>
                        <td class="text_center">gf</td>
                        <td class="text_center">ggs</td>
                        <td class="text_center">gb</td>
                        <td class="text_center">kjl</td>
                        <td class="text_center">lgh</td>
                        <td class="text_center">lgy</td>
                    </tr>
                    <tr>
                        <td width="40">01</td>
                        <td width="80">faw</td>
                        <td align="center">hj</td>
                        <td class="text_center">jgyjh</td>
                        <td class="text_center">jhfjfh</td>
                        <td class="text_center">jfj</td>
                        <td class="text_center">jmhgnj</td>
                        <td class="text_center">er</td>
                        <td class="text_center">gf</td>
                        <td class="text_center">ggs</td>
                        <td class="text_center">gb</td>
                        <td class="text_center">kjl</td>
                        <td class="text_center">lgh</td>
                        <td class="text_center">lgy</td>
                    </tr>
                    <tr>
                        <td width="40">01</td>
                        <td width="80">faw</td>
                        <td align="center">hj</td>
                        <td class="text_center">jgyjh</td>
                        <td class="text_center">jhfjfh</td>
                        <td class="text_center">jfj</td>
                        <td class="text_center">jmhgnj</td>
                        <td class="text_center">er</td>
                        <td class="text_center">gf</td>
                        <td class="text_center">ggs</td>
                        <td class="text_center">gb</td>
                        <td class="text_center">kjl</td>
                        <td class="text_center">lgh</td>
                        <td class="text_center">lgy</td>
                    </tr>
                    <tr>
                        <td width="40">01</td>
                        <td width="80">faw</td>
                        <td align="center">hj</td>
                        <td class="text_center">jgyjh</td>
                        <td class="text_center">jhfjfh</td>
                        <td class="text_center">jfj</td>
                        <td class="text_center">jmhgnj</td>
                        <td class="text_center">er</td>
                        <td class="text_center">gf</td>
                        <td class="text_center">ggs</td>
                        <td class="text_center">gb</td>
                        <td class="text_center">kjl</td>
                        <td class="text_center">lgh</td>
                        <td class="text_center">lgy</td>
                    </tr>
                    <tr>
                        <td width="40">01</td>
                        <td width="80">faw</td>
                        <td align="center">hj</td>
                        <td class="text_center">jgyjh</td>
                        <td class="text_center">jhfjfh</td>
                        <td class="text_center">jfj</td>
                        <td class="text_center">jmhgnj</td>
                        <td class="text_center">er</td>
                        <td class="text_center">gf</td>
                        <td class="text_center">ggs</td>
                        <td class="text_center">gb</td>
                        <td class="text_center">kjl</td>
                        <td class="text_center">lgh</td>
                        <td class="text_center">lgy</td>
                    </tr>
                    <tr>
                        <td width="40">01</td>
                        <td width="80">faw</td>
                        <td align="center">hj</td>
                        <td class="text_center">jgyjh</td>
                        <td class="text_center">jhfjfh</td>
                        <td class="text_center">jfj</td>
                        <td class="text_center">jmhgnj</td>
                        <td class="text_center">er</td>
                        <td class="text_center">gf</td>
                        <td class="text_center">ggs</td>
                        <td class="text_center">gb</td>
                        <td class="text_center">kjl</td>
                        <td class="text_center">lgh</td>
                        <td class="text_center">lgy</td>
                    </tr>
                    <tr>
                        <td width="40">01</td>
                        <td width="80">faw</td>
                        <td align="center">hj</td>
                        <td class="text_center">jgyjh</td>
                        <td class="text_center">jhfjfh</td>
                        <td class="text_center">jfj</td>
                        <td class="text_center">jmhgnj</td>
                        <td class="text_center">er</td>
                        <td class="text_center">gf</td>
                        <td class="text_center">ggs</td>
                        <td class="text_center">gb</td>
                        <td class="text_center">kjl</td>
                        <td class="text_center">lgh</td>
                        <td class="text_center">lgy</td>
                    </tr>
                    <tr>
                        <td width="40">01</td>
                        <td width="80">faw</td>
                        <td align="center">hj</td>
                        <td class="text_center">jgyjh</td>
                        <td class="text_center">jhfjfh</td>
                        <td class="text_center">jfj</td>
                        <td class="text_center">jmhgnj</td>
                        <td class="text_center">er</td>
                        <td class="text_center">gf</td>
                        <td class="text_center">ggs</td>
                        <td class="text_center">gb</td>
                        <td class="text_center">kjl</td>
                        <td class="text_center">lgh</td>
                        <td class="text_center">lgy</td>
                    </tr>
                    <tr>
                        <td width="40">01</td>
                        <td width="80">faw</td>
                        <td align="center">hj</td>
                        <td class="text_center">jgyjh</td>
                        <td class="text_center">jhfjfh</td>
                        <td class="text_center">jfj</td>
                        <td class="text_center">jmhgnj</td>
                        <td class="text_center">er</td>
                        <td class="text_center">gf</td>
                        <td class="text_center">ggs</td>
                        <td class="text_center">gb</td>
                        <td class="text_center">kjl</td>
                        <td class="text_center">lgh</td>
                        <td class="text_center">lgy</td>
                    </tr>

                    </tbody>
                </table>
            </div>
        </div>
    </div>



</div>