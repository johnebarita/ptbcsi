<?php
/**
 * Created by PhpStorm.
 * User: John Ebarita
 * Date: 1/16/2020
 * Time: 10:45 AM
 */ ?>

<!--<script type="text/javascript"-->
<!--        src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>-->
<!--<script type="text/javascript"-->
<!--        src="https://cdnjs.cloudflare.com/ajax/libs/floatthead/2.1.3/jquery.floatThead.min.js"></script>-->
<script
        type="text/javascript"
        src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.js"

></script>
<style id="compiled-css" type="text/css">

    /* CSS overrides for JQuery UI theme */
    /* General table formatting */
    table {
        border-collapse: collapse;
        border-spacing: 0px;
    }


    th {
        border: 1px solid black;
        text-align: left;
        padding: 5px;
        background-color: #5C9CCC;
        color: #ffffff;
    }

    .basic-table td {
        border: 1px solid black;
        padding: 5px;
        white-space: nowrap!important;s
    }

    .compact-table td {
        padding-top: 1px;
        padding-right: 5px;
        padding-bottom: 1px;
        padding-left: 5px;
    }

    .row-selectable-table > tbody > tr:hover {
        background-color: #6CACDC;
        color: white;
        cursor: pointer;
    }

    #prod-list > tbody > tr:hover {
        cursor: default;
    }

    #wages-table-container { /* Fixed header tables */
        height: 70vh;
        overflow-y: scroll;
    }


</style>

<div class="container-fluid ">

    <!-- DataTales Example -->
<!--    <div class="card shadow mb-4 ">-->
<!--        <div class="card-header py-3">-->
<!--            <h6 class="m-0 font-weight-bold text-primary">Payroll</h6>-->
<!--        </div>-->
<!--        <div class="card-body">-->
<!--            <div class="table-responsive-sm"  id="table-scroll" style="height:500px;overflow-y: scroll;border: 1px solid #e3e6f0 !important;">-->
<!--                    <table class="table table-bordered persistent-table " width="100%" cellspacing="0" style="overflow-y: scroll">-->
<!--                    <thead class="persistent-tp">-->
<!---->
<!---->
<!--                    <tr>-->
<!--                        <th rowspan="2" class="align-middle">No.</span></th>-->
<!--                        <th>Employee</th>-->
<!--                        <th>Daily</th>-->
<!--                        <th>Monthly</th>-->
<!--                        <th># Day(s)</th>-->
<!--                        <th># Day(s)</th>-->
<!--                        <th rowspan="2"class="align-middle">Late(min)</th>-->
<!--                        <th>Basic </th>-->
<!--                        <th rowspan="2"class="align-middle">Allowance</th>-->
<!--                        <th colspan="2"class="align-middle">Normal Day Overtime</th>-->
<!--                        <th colspan="8"class="align-middle text-center" >Rest Day and Sunday Holiday Overtime</th>-->
<!--                        <th colspan="4"class="align-middle text-center" >Rest Day and Sunday Holiday</th>-->
<!--                        <th colspan="6"class="align-middle text-center" >Holiday Overtime</th>-->
<!--                        <th colspan="3"class="align-middle text-center" >Holiday Rate</th>-->
<!--                        <th>Total hrs</th>-->
<!--                        <th>Other</th>-->
<!--                        <th rowspan="2"class="align-middle">Gross Pay</th>-->
<!--                        <th>With</th>-->
<!--                        <th rowspan="2"class="align-middle">Phi</th>-->
<!--                        <th rowspan="2"class="align-middle">SSS</th>-->
<!--                        <th rowspan="2"class="align-middle">HDMF</th>-->
<!--                        <th>Cash</th>-->
<!--                        <th>SSS</th>-->
<!--                        <th>PAG-IBIG</th>-->
<!--                        <th>Other</th>-->
<!--                        <th>Total</th>-->
<!--                        <th rowspan="2"class="align-middle">Net Pay</th>-->
<!--                        <th rowspan="2"class="align-middle">Action</th>-->
<!---->
<!---->
<!--                    </tr>-->
<!--                    <tr class="persistent-bt">-->
<!--                        <th>Name</th>-->
<!--                        <th>Rate</th>-->
<!--                        <th>Rate</th>-->
<!--                        <th>Present</th>-->
<!--                        <th>Absent</th>-->
<!--                        <th>Salary</th>-->
<!--                        <th># of hours</th>-->
<!--                        <th>OT</th>-->
<!--                        <th># of hours</th>-->
<!--                        <th>Sunday OT</th>-->
<!--                        <th># of hours</th>-->
<!--                        <th>Regular OT</th>-->
<!--                        <th># of hours</th>-->
<!--                        <th>Double OT</th>-->
<!--                        <th># of hours</th>-->
<!--                        <th>Special OT</th>-->
<!--                        <th>Sunday</th>-->
<!--                        <th>Regular</th>-->
<!--                        <th>Double</th>-->
<!--                        <th>Special</th>-->
<!--                        <th># of hours</th>-->
<!--                        <th>Regular OT</th>-->
<!--                        <th># of hours</th>-->
<!--                        <th>Double OT</th>-->
<!--                        <th># of hours</th>-->
<!--                        <th>Special OT</th>-->
<!--                        <th>Regular</th>-->
<!--                        <th>Double</th>-->
<!--                        <th>Special</th>-->
<!--                        <th>OT</th>-->
<!--                        <th>Income</th>-->
<!--                        <th>Tax</th>-->
<!--                        <th>Advance</th>-->
<!--                        <th>Loan</th>-->
<!--                        <th>Loan</th>-->
<!--                        <th>Deduction</th>-->
<!--                        <th>Deduction</th>-->
<!--                    </tr>-->
<!--                    </thead>-->
<!--                    <tbody>-->
<!--
<!--                    <tr>-->
<!--
<!--                    </tr>-->
<!--                    </tbody>-->
<!--                </table>-->
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->
    <div class="card shadow mb-4 ">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Payroll</h6>
        </div>
        <div class="card-body">
            <form action="" method="post">
                <label for="half_month">Filter: </label>&nbsp;&nbsp;&nbsp;
                <select name="half_month" id="half_month" class="input input-sm half_month">
                    <option value="A">A</option>
                    <option value="B" >B</option>
                </select>&nbsp;&nbsp;
                <select name="month" id="month" class="input input-sm monthName">
                    <option value="01" <?= ($month == 'January' ? 'selected' : '') ?>>January</option>
                    <option value="02" <?= ($month == 'February' ? 'selected' : '') ?>>February</option>
                    <option value="03" <?= ($month == 'March' ? 'selected' : '') ?>>March</option>
                    <option value="04" <?= ($month == 'April' ? 'selected' : '') ?>>April</option>
                    <option value="05" <?= ($month == 'May' ? 'selected' : '') ?>>May</option>
                    <option value="06" <?= ($month == 'June' ? 'selected' : '') ?>>June</option>
                    <option value="07" <?= ($month == 'July' ? 'selected' : '') ?>>July</option>
                    <option value="08" <?= ($month == 'August' ? 'selected' : '') ?>>August</option>
                    <option value="09" <?= ($month == 'September' ? 'selected' : '') ?>>September</option>
                    <option value="10" <?= ($month == 'October' ? 'selected' : '') ?>>October</option>
                    <option value="11" <?= ($month == 'November' ? 'selected' : '') ?>>November</option>
                    <option value="12" <?= ($month == 'December' ? 'selected' : '') ?>>December</option>
                </select>&nbsp;&nbsp;
                <select name="year" id="year" class="input input-sm year">
                    <option value="2020" <?= ($year == '2020' ? 'selected' : '') ?>>2020</option>
                    <option value="2019" <?= ($year == '2019' ? 'selected' : '') ?>>2019</option>
                    <option value="2018" <?= ($year == '2018' ? 'selected' : '') ?>>2018</option>
                    <option value="2017" <?= ($year == '2017' ? 'selected' : '') ?>>2017</option>
                    <option value="2016" <?= ($year == '2016' ? 'selected' : '') ?>>2016</option>
                    <option value="2015" <?= ($year == '2015' ? 'selected' : '') ?>>2015</option>
                    <option value="2014" <?= ($year == '2014' ? 'selected' : '') ?>>2014</option>
                    <option value="2013" <?= ($year == '2013' ? 'selected' : '') ?>>2013</option>
                    <option value="2012" <?= ($year == '2012' ? 'selected' : '') ?>>2012</option>
                </select>&nbsp;&nbsp;
                <button type="button" class="btn btn-sm btn-primary">GENERATE</button>
            </form>
        </div>
        <div class="card-body">
            <div id="wages-table-container">
                <table id="prod-list" style="white-space: nowrap" class="row-selectable-table basic-table compact-table" width="100%">
                    <div>
                        <thead>
                        <tr style="vertical-align:middle;">
                            <th rowspan="2" class="align-middle">No.</span></th>
                            <th>Employee</th>
                            <th>Daily</th>
                            <th>Monthly</th>
                            <th># Day(s)</th>
                            <th># Day(s)</th>
                            <th rowspan="2"class="align-middle">Late(min)</th>
                            <th>Basic </th>
                            <th rowspan="2"class="align-middle">Allowance</th>
                            <th colspan="2"class="align-middle">Normal Day Overtime</th>
                            <th colspan="8"class="align-middle text-center" >Rest Day and Sunday Holiday Overtime</th>
                            <th colspan="4"class="align-middle text-center" >Rest Day and Sunday Holiday</th>
                            <th colspan="6"class="align-middle text-center" >Holiday Overtime</th>
                            <th colspan="3"class="align-middle text-center" >Holiday Rate</th>
                            <th>Total hrs</th>
                            <th>Other</th>
                            <th rowspan="2"class="align-middle">Gross Pay</th>
                            <th>With</th>
                            <th rowspan="2"class="align-middle">Phi</th>
                            <th rowspan="2"class="align-middle">SSS</th>
                            <th rowspan="2"class="align-middle">HDMF</th>
                            <th>Cash</th>
                            <th>SSS</th>
                            <th>PAG-IBIG</th>
                            <th>Other</th>
                            <th>Total</th>
                            <th rowspan="2"class="align-middle">Net Pay</th>
                            <th rowspan="2"class="align-middle">Action</th>
                        </tr>
                        <tr>
                            <th>Name</th>
                            <th>Rate</th>
                            <th>Rate</th>
                            <th>Present</th>
                            <th>Absent</th>
                            <th>Salary</th>
                            <th># of hours</th>
                            <th>OT</th>
                            <th># of hours</th>
                            <th>Sunday OT</th>
                            <th># of hours</th>
                            <th>Regular OT</th>
                            <th># of hours</th>
                            <th>Double OT</th>
                            <th># of hours</th>
                            <th>Special OT</th>
                            <th>Sunday</th>
                            <th>Regular</th>
                            <th>Double</th>
                            <th>Special</th>
                            <th># of hours</th>
                            <th>Regular OT</th>
                            <th># of hours</th>
                            <th>Double OT</th>
                            <th># of hours</th>
                            <th>Special OT</th>
                            <th>Regular</th>
                            <th>Double</th>
                            <th>Special</th>
                            <th>OT</th>
                            <th>Income</th>
                            <th>Tax</th>
                            <th>Advance</th>
                            <th>Loan</th>
                            <th>Loan</th>
                            <th>Deduction</th>
                            <th>Deduction</th>
                        </tr>
                        </thead>
                    </div>
                    <tbody>

                    <?php $i=1;foreach ($users as $user){?>
                    <tr>
                        <td><?=$i?></td>
                        <td><?=$user->last_name.' '.$user->name?></td>
                        <td>386.00</td>
                        <td>10,068.20</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>

                        <?php $i++; }?>
                    </tr>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>



