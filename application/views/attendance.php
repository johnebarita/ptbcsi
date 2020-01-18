<div class="container-fluid">
    <!--    <h1 class="h3 mb-4 text-gray-800">Attendance - TODO ( Mariel) </h1>-->

    <h1 class="h3 mb-3 text-gray-800"><strong>TDZ</strong> <i class="divider"> / </i> <span>Daily Time Record</span>
    </h1>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Tables</h6>
        </div>
        <div class="card-body">
            <div class="sec_head">
                <div class="row">
                    <div class="col-md-6">
                        <form action="">
                            <label for="half_month">Filter: </label>&nbsp;&nbsp;&nbsp;<select name="half_month" id="half_month">
                                <option value="A">A</option>
                                <option value="B">B</option>
                            </select>
                            <select name="month" id="month">
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
                            </select>
                            <select name="year" id="year">
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
                            </select>
                            <button type="button" class="btn btn-sm btn-primary">GO</button>

                        </form>
                    </div>
                    <div class="col-md-6" align="right">
                        <ul class="list-inline">
                            <div class="date_time">
                                <div class="heads">
                                    <div onload="startTime()">
                                        <a class="time">Time:
                                            <p id="timex"></p>
                                        </a>
                                        <span>
                            <a class="date">Date:

                            </a>
                            </span>
                                    </div>
                                </div>
                            </div>
                        </ul>
                    </div>
                </div>

            </div>
            <div class="table-responsive">
                <table id="attendance" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                    <tr>
                        <th colspan="2" class=" center border-left">Half-Month</th>
                        <th colspan="2" class="center">Morning</th>
                        <th></th>
                        <th colspan="2" class="center">Afternoon</th>
                        <th></th>
                        <th colspan="2" class="center">OverTime</th>
                        <th></th>
                        <th colspan="3" class="center border-right">Total Time</th>
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
                        <!--            <td class="width1 no_hover tc" title="Time Convention"  data-toggle='tooltip' data-container='body' >TC</td>-->
                        <td class="width1 no_hover">Time</td>
                        <td class="width1 no_hover">Pre</td>
                        <td class="width1 no_hover">OT</td>
                        <td class="width1 no_hover">Late</td>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>fef</td>
                        <td>faw</td>
                        <td>hj</td>
                        <td>jgyjh</td>
                        <td>jhfjfh</td>
                        <td>jfj</td>
                        <td>jmhgnj</td>
                        <td>er</td>
                        <td>gf</td>
                        <td>ggs</td>
                        <td>gb</td>
                        <td>kjl</td>
                        <td>lgh</td>
                        <td>lgy</td>
                    </tr>

                    </tbody>
                </table>
            </div>
        </div>
    </div>



</div>