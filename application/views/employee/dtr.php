<link href="assets/css/custom.css" rel="stylesheet">
<link href="../assets/css/custom.css" rel="stylesheet">
<div class="container-fluid">
    <!--    <h1 class="h3 mb-4 text-gray-800">Attendance - TODO ( Mariel) </h1>-->

    <h1 class="h3 mb-3 text-gray-800"><strong>TDZ</strong> <i class="divider"> / </i> <span>Daily Time Record</span>
    </h1>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"><strong>TDZ</strong> <i class="divider"> / </i> <span>Daily Time Record</span>
            </h6>
        </div>
        <div class="card-body">
            <div class="sec_head">
                <div class="row">
                    <div class="col-md-6">
                        <form action="dtr" method="post">
                            <label for="half_month">Filter: </label>&nbsp;&nbsp;&nbsp;
                            <select name="half_month" id="half_month" class="input input-sm half_month">
                                <option value="A" <?= ($half_month == 'A' ? 'selected' : ''); ?>>A</option>
                                <option value="B" <?= ($half_month == 'B' ? 'selected' : '') ?>>B</option>
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
                            <input name="user_id" value="<?=$_SESSION['user_id'];?>"  hidden/>
                            <button type="submit" class="btn btn-sm btn-primary">GO</button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <button type="button" class="btn btn-facebook btn-md center" data-toggle="modal" data-target="#overtimeRequest" <?=(!$request_ot? 'disabled':'');?>>Request Overtime</button>
                        </form>
                    </div>
                    <span class="date_time">
                        <span class="time">
                            <span class="iconn"><i class="fa fa-clock icon">&nbsp;&nbsp;&nbsp;</i>Time: </span>
                        </span>
                        <span class="iconn"><i class="fa fa-calendar icon">&nbsp;&nbsp;&nbsp;</i>Date: <?=date('l F d, Y')?> </span>
                    </span>
                </div>
            </div>
            <div class="details iconn">
                <div class="rh tb_rh text_center">
                    <span class="show_leave_details">Leave:
                        <span class="text-primary">___</span>
                        <div style="display: none;">
                            <span class="width-200"></span>
                        </div>
                    </span>&nbsp;&nbsp;&nbsp;
                    <span class="show_absent">Absent:
                        <span class="text-primary">___</span>
                        <div style="display: none;">
                            <span class="width-200"></span>
                        </div>
                    </span>&nbsp;&nbsp;&nbsp;
                    <span >Over Time:
                        <span class="text-primary">___</span>
                        <div style="display: none">
                            <span class="width-200"></span>
                        </div>
                    </span>&nbsp;&nbsp;&nbsp;
                    <span>Under Time:
                        <span class="text-primary">___</span>
                        <div style="display: none">
                            <span class="width-200"></span>
                        </div>
                    </span>&nbsp;&nbsp;&nbsp;
                    <span>Late:
                        <span class="text-primary">___</span>
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
                        <td class="width1 no_hover tc" title="Time Convention" data-toggle='tooltip'
                            data-container='body'>TC
                        </td>
                        <td class="width1 no_hover">Time</td>
                        <td class="width1 no_hover">Pre</td>
                        <td class="width1 no_hover">OT</td>
                        <td class="width1 no_hover">Late</td>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $j = 0;$total_time = 0; $total_ot=0?>
                    <?php $i;for ($i = 0;$i < count($days); $i++): ?>
                    <tr class=" <?=($days[$i][1]=='Sun'? 'sunday':'')?>">
                        <td width="40"><?= $days[$i][0] ?></td>
                        <td width="40"><?= $days[$i][1] ?></td>
                        <?php if(count($time)==0||$j==-1  || $days[$i][1]=='Sun'):?>
                        <td align="center">
                            <input value="" style="width: 30px;text-align: center;border: 0">:
                            <input value="" style="width: 30px;text-align: center;border: 0">
                        </td>
                        <td align="center">
                            <input value="" style="width: 30px;text-align: center;border: 0">:
                            <input value="" style="width: 30px;text-align: center;border: 0">
                        </td>
                        <td class="text_center"></td>
                        <td align="center">
                            <input value="" style="width: 30px;text-align: center;border: 0">:
                            <input value="" style="width: 30px;text-align: center;border: 0">
                        </td>
                        <td align="center">
                            <input value="" style="width: 30px;text-align: center;border: 0">:
                            <input value="" style="width: 30px;text-align: center;border: 0">
                        </td>
                        <td class="text_center"></td>
                        <td align="center">
                            <input value="" style="width: 30px;text-align: center;border: 0">:
                            <input value="" style="width: 30px;text-align: center;border: 0">
                        </td>
                        <td align="center">
                            <input value="" style="width: 30px;text-align: center;border: 0">:
                            <input value="" style="width: 30px;text-align: center;border: 0">
                        </td>
                        <td class="text_center"></td>
                        <td class="text_center"></td>
                        <td class="text_center"></td>
                        <td class="text_center"></td>
                        <?php elseif ($days[$i][0] == date('d', strtotime($time[$j]->date))) :?>
                        <td align="center">
                            <input value="<?= ($time[$j]->morning_in_hour ?? ''); ?>"
                                   style="width: 30px;text-align: center;border: 0">:
                            <input value="<?= ($time[$j]->morning_in_minute ??''); ?>"
                                   style="width: 30px;text-align: center;border: 0">
                        </td>
                        <td align="center">
                            <input value="<?= ($time[$j]->morning_out_hour ?? ''); ?>"
                                   style="width: 30px;text-align: center;border: 0">:
                            <input value="<?= ($time[$j]->morning_out_minute ?? ''); ?>"
                                   style="width: 30px;text-align: center;border: 0">
                        </td>
                        <td class="text_center"><?=($time[$j]->morning_time??'')?> </td>
                        <td align="center">
                            <input value="<?= $time[$j]->afternoon_in_hour; ?>"
                                   style="width: 30px;text-align: center;border: 0">:
                            <input value="<?= $time[$j]->afternoon_in_minute; ?>"
                                   style="width: 30px;text-align: center;border: 0">
                        </td>
                        <td align="center">
                            <input value="<?= $time[$j]->afternoon_out_hour; ?>"
                                   style="width: 30px;text-align: center;border: 0">:
                            <input value="<?= $time[$j]->afternoon_out_minute; ?>"
                                   style="width: 30px;text-align: center;border: 0">
                        </td>
                        <td class="text_center"><?=($time[$j]->afternoon_time??'')?> </td>
                        <td align="center">
                            <input value="<?= $time[$j]->over_in_hour; ?>"
                                       style="width: 30px;text-align: center;border: 0">:
                            <input value="<?= $time[$j]->over_in_minute; ?>"
                                       style="width: 30px;text-align: center;border: 0">
                        </td>
                        <td align="center">
                            <input value="<?= $time[$j]->over_out_hour; ?>"
                                   style="width: 30px;text-align: center;border: 0">:
                             <input value="<?= $time[$j]->over_out_minute; ?>"
                                   style="width: 30px;text-align: center;border: 0">
                        </td>
                        <td class="text_center">

                        <td class="text_center">
                            <?php
                                if($time[$j]->afternoon_time!=null&&$time[$j]->morning_time!=null){}{
                                    $pre = $time[$j]->afternoon_time+$time[$j]->morning_time;
                                    if($pre>=8){
                                        echo '8';
                                        $total_time +=8;
                                    }else if($pre>0){
                                        echo $pre;
                                        $total_time+=$pre;                                    }
                                }
                            ?>
                        </td>
                        <td class="text_center">
                            <?php
                                if($time[$j]->afternoon_time!=null&&$time[$j]->morning_time!=null){}{
                                    $pre = $time[$j]->afternoon_time+$time[$j]->morning_time;
                                    if($pre>=8){
                                        $pre-=8;
                                        echo  $pre+$time[$j]->over_time;
                                        $total_ot +=$pre+$time[$j]->over_time;
                                    }
                                }
                            ?>
                        </td>
                        <td class="text_center">
<!--                            --><?php
//                                if($time[$j]->afternoon_time!=null&&$time[$j]->morning_time!=null){}{
//                                    $pre = $time[$j]->afternoon_time+$time[$j]->morning_time;
//                                    if($pre<8){
//                                        $pre-=8;
//                                        echo round(abs($pre));
//                                    }
//                                }
//                            ?>
                        </td>
                        <?php ($j < count($time) - 1 ? $j++ : $j = -1)?>
                        <?php elseif($days[$i][1]!='Sun'):?>
                        <td class="text_center absent" colspan="12">ABSENT</td>
                    <?php endif; endfor;?>
                    </tr>
                    <tr>
                        <td style="text-align: right" colspan="11">Total Time:</td>
                        <td class="text_center"><?=$total_time?></td>
                        <td class="text_center"><?=$total_ot?></td>
                        <td class="text_center"></td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!--REQUEST OVERTIME-->

<div class="modal fade" id="overtimeRequest" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title kulay" id="exampleModalLabel">Request Overtime</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body mod">
                <div class="card">
                    <!--Card content-->
                    <div class="card-body px-lg-5 pt-0 border">
                        <br>
                        <form method="post" action="requestOvertime">
                            <div class="form-group">
                                <label for="formGroupExampleInput">Reason</label>
                                <input type="text" class="form-control" id="formGroupExampleInput" name="reason" placeholder="Please state your reason" required/>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>

                        <!-- Form -->
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>