<link href="<?= base_url() ?>assets/css/custom.css" rel="stylesheet">
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
                <div class="row row-full">
                    <div class="col-md-7">
                        <form action="dtr" method="post">
                            <label for="half_month">Filter: </label>&nbsp;&nbsp;&nbsp;
                            <select name="half_month" id="half_month" class="input input-sm half_month">
                                <option value="A" <?= ($half_month == 'A' ? 'selected' : ''); ?>>A</option>
                                <option value="B" <?= ($half_month == 'B' ? 'selected' : ''); ?>>B</option>
                            </select>&nbsp;&nbsp;
                            <select name="month" id="month" class="input input-sm monthName ">
                                <option value="01" <?= ($month == 'January' ? 'selected' : ''); ?>>January</option>
                                <option value="02" <?= ($month == 'February' ? 'selected' : ''); ?>>February</option>
                                <option value="03" <?= ($month == 'March' ? 'selected' : ''); ?>>March</option>
                                <option value="04" <?= ($month == 'April' ? 'selected' : ''); ?>>April</option>
                                <option value="05" <?= ($month == 'May' ? 'selected' : ''); ?>>May</option>
                                <option value="06" <?= ($month == 'June' ? 'selected' : ''); ?>>June</option>
                                <option value="07" <?= ($month == 'July' ? 'selected' : ''); ?>>July</option>
                                <option value="08" <?= ($month == 'August' ? 'selected' : ''); ?>>August</option>
                                <option value="09" <?= ($month == 'September' ? 'selected' : ''); ?>>September</option>
                                <option value="10" <?= ($month == 'October' ? 'selected' : ''); ?>>October</option>
                                <option value="11" <?= ($month == 'November' ? 'selected' : ''); ?>>November</option>
                                <option value="12" <?= ($month == 'December' ? 'selected' : ''); ?>>December</option>
                            </select>&nbsp;&nbsp;
                            <select name="year" id="year" class="input input-sm year">
                                <option value="2020" <?= ($year == '2020' ? 'selected' : ''); ?>>2020</option>
                                <option value="2019" <?= ($year == '2019' ? 'selected' : ''); ?>>2019</option>
                                <option value="2018" <?= ($year == '2018' ? 'selected' : ''); ?>>2018</option>
                                <option value="2017" <?= ($year == '2017' ? 'selected' : ''); ?>>2017</option>
                                <option value="2016" <?= ($year == '2016' ? 'selected' : ''); ?>>2016</option>
                                <option value="2015" <?= ($year == '2015' ? 'selected' : ''); ?>>2015</option>
                                <option value="2014" <?= ($year == '2014' ? 'selected' : ''); ?>>2014</option>
                                <option value="2013" <?= ($year == '2013' ? 'selected' : ''); ?>>2013</option>
                                <option value="2012" <?= ($year == '2012' ? 'selected' : ''); ?>>2012</option>
                            </select>&nbsp;&nbsp;
                            <?php if ($_SESSION['user_type'] != "Employee"): ?>
                                <select name="user_id" id="name" class="input input-sm empName">
                                    <?php foreach ($users as $user): ?>
                                        <option value="<?= $user->employee_id; ?>" <?= ($user->employee_id == $user_id ? 'selected' : ''); ?> ><?= $user->lastname . ' ' . $user->firstname; ?></option>
                                    <?php endforeach; ?>
                                </select>&nbsp;&nbsp;
                            <?php endif; ?>
                            <button type="submit" class="btn btn-sm btn-primary">GO</button>
                            <?php if ($_SESSION['user_type'] == "Employee"): ?>
                                <input type="text" name="user_id" value="<?= $_SESSION['user_id']; ?>" hidden/>
                                <button type="button" class="btn btn-facebook btn-md center" data-toggle="modal"
                                        data-target="#add-overtime" <?= (!$request_ot ? 'disabled' : ''); ?>>Request
                                    Overtime
                                </button>
                            <?php endif; ?>
                        </form>
                    </div>
                    <div id="timestamp">

                    </div>
                    <span class="date_time">
                        <span class="time">
                            <span class="iconn"><i class="fa fa-clock icon pr-1"></i>Time: </span><span
                                    id="span"></span>
                        </span>
                        <span class="iconn"><i
                                    class="fa fa-calendar icon">&nbsp;&nbsp;&nbsp;</i>Date: <?= date('l F d, Y'); ?></span>
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
                    <span>Over Time:
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
                <table id="attendance" class="table table-sm table-bordered ">
                    <thead>
                    <tr>
                        <th colspan="2" class=" text_center border-left " style="white-space: nowrap">Half-Month</th>
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
                        <td class="width1 no_hover">Time</td>
                        <td class="width1 no_hover">Pre</td>
                        <td class="width1 no_hover">OT</td>
                        <td class="width1 no_hover">Late</td>
                    </tr>
                    </thead>
                    <tbody class="dtr_row">
                    <?php
                    $i;
                    $j = 0;
                    $today = date('Y:m:d');

                    foreach ($days as $day) {
                        $day_num = date('d', strtotime($day));
                        $day_name = date('D', strtotime($day));
                        $hol_name = '';
                        $class = '';
                        $is_hol = false;
                        $is_sun = false;
                        foreach ($holidays as $holiday) {
                            if ($holiday->date == $day) {
                                $class = ' holiday ';
                                $is_hol = true;
                                $hol_name = $holiday->description;
                            }
                        }
                        if ($day_name == "Sun") {
                            $class = ' sunday ';
                            $is_sun = true;
                        }
                        ?>
                        <tr class= "<?= $class; ?>"<?= ($is_hol ? ' data-toggle="tooltip" data-placement="top" title="' . $hol_name . '"' : ''); ?>>
                            <td width="40"><?= $day_num; ?></td>
                            <td width="40"><?= $day_name; ?></td>
                            <?php if (count($dtrs)==0|| $j==-1) { ?>
                                <td>
                                    <input value="" >:
                                    <input value="">
                                </td>
                                <td>
                                    <input value="">:
                                    <input value="">
                                </td>
                                <td></td>
                                <td>
                                    <input value="">:
                                    <input value="">
                                </td>
                                <td>
                                    <input value="">:
                                    <input value="">
                                </td>
                                <td></td>
                                <td>
                                    <input value="">:
                                    <input value="">
                                </td>
                                <td>
                                    <input value="">:
                                    <input value="">
                                </td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            <?php } elseif ($day == $dtrs[$j]->date ){ ?>
                                <td >
                                    <input value="<?= ($dtrs[$j]->m_i_h ?? ''); ?>">:
                                    <input value="<?= ($dtrs[$j]->m_i_m ??''); ?>">
                                </td>
                                <td>
                                    <input value="<?= ($dtrs[$j]->m_o_h ?? ''); ?>">:
                                    <input value="<?= ($dtrs[$j]->m_o_m ?? ''); ?>">
                                </td>
                                <td><?= ($dtrs[$j]->morning_time==0?'':$dtrs[$j]->morning_time) ?> </td>
                                <td>
                                    <input value="<?= $dtrs[$j]->a_i_h; ?>">:
                                    <input value="<?= $dtrs[$j]->a_i_m; ?>">
                                </td>
                                <td>
                                    <input value="<?= $dtrs[$j]->a_o_h; ?>">:
                                    <input value="<?= $dtrs[$j]->a_o_m; ?>">
                                </td>
                                <td><?=  ($dtrs[$j]->afternoon_time==0?'':$dtrs[$j]->afternoon_time); ?> </td>
                                <td>
                                    <input value="<?= $dtrs[$j]->o_i_h; ?>">:
                                    <input value="<?= $dtrs[$j]->o_i_m; ?>">
                                </td>
                                <td>
                                    <input value="<?= $dtrs[$j]->o_o_h; ?>">:
                                    <input value="<?= $dtrs[$j]->o_o_m; ?>">
                                </td>
                                <td><?= ($dtrs[$j]->overtime_time==0?'':$dtrs[$j]->overtime_time); ?></td>
                                <td><?= $dtrs[$j]->pre_time == 0 ? '' : $dtrs[$j]->pre_time; ?> </td>
                                <td><?= $dtrs[$j]->ot == 0 ? '' : $dtrs[$j]->ot; ?> </td>
                                <td class=<?=doubleval($dtrs[$j]->late)>0 ? 'late':''?>><?= $dtrs[$j]->late == 0 ? '' : $dtrs[$j]->late; ?> </td>
                                <?php ($j < count($dtrs) - 1 ? $j++ : $j = -1); ?>
                            <?php }elseif (!$is_sun && !$is_hol){ ?>
                            <td class="absent" colspan="12">ABSENT</td>
                            <?php }else{ ?>
                            <td colspan="12"></td>
                            <?php } ?>
                        </tr>
                    <?php } ?>
                    <tr>
                        <td style="text-align: right" colspan="11">Total Time:</td>
                        <td><?= $total_pre == 0 ? ' ' : $total_pre; ?></td>
                        <td><?= $total_ot == 0 ? ' ' : $total_ot; ?></td>
                        <td><?= $total_late == 0 ? ' ' : $total_late; ?></td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<?php include getcwd() . '/application/views/includes/modals/add/add_overtime_modal.php'; ?>
