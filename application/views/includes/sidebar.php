<?php
/**
 * Created by PhpStorm.
 * User: John Ebarita
 * Date: 1/15/2020
 * Time: 2:25 PM
 */ ?>

<?php
$landing = base_url();
$user_type = $_SESSION['user_type'];
if ($user_type == "Admin"):
    $landing .= "dashboard";
elseif ($user_type == "Payroll Master"):
    $landing .= "dtr";
elseif ($user_type == "Employee"):
    $landing .= "dtr";
endif;
?>

<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= $landing; ?>">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">PTBCSI <?= $user_type; ?></div>
    </a>

    <?php if ($user_type == "Admin"): ?>
        <hr class="sidebar-divider my-0">
        <div class="sidebar-heading">
            <br>
            REPORTS
        </div>
        <hr class="sidebar-divider my-1">
        <li class="nav-item <?=($active =='dashboard'? 'active':'');?>">
            <a class="nav-link" href="dashboard">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Dashboard</span></a>
        </li>
    <?php endif; ?>

    <hr class="sidebar-divider">
    <div class="sidebar-heading">
        MANAGE
    </div>

    <!--    DTR-->
    <li class="nav-item <?=($active =='dtr'? 'active':'');?>">
        <a class="nav-link " href="dtr">
            <i class="fas fa-fw fa-user-clock"></i>
            <span>DTR</span></a>
    </li>

    <!--    REQUESTS-->

    <?php if ($user_type != "Employee"): ?>
        <li class="nav-item <?=($active =='overtime'||$active =='leave'? 'active':'');?> ">
            <a class="nav-link collapsed " href="#" data-toggle="collapse" data-target="#collapseOne"
               aria-expanded="true"
               aria-controls="collapseTwo">
                <i class="fas fa-fw fa-retweet"></i>
                <span>Requests</span>
            </a>
            <div id="collapseOne" class="collapse <?=($active =='overtime'||$active =='leave'? 'show':'');?>" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Request Management :</h6>
                    <a class="collapse-item <?=($active =='overtime'? 'active':'');?> " href="overtime">Overtime</a>
                    <a class="collapse-item <?=($active =='leave'? 'active':'');?>" href="leave">Leave</a>
                </div>
            </div>
        </li>
    <?php else: ?>
        <li class="nav-item <?=($active =='leave'? 'active':'');?>">
            <a class="nav-link" href="leave">
                <i class="fas fa-fw fa-user-clock"></i>
                <span>Leaves</span></a>
        </li>
    <?php endif; ?>

    <!--    SCHEDULE-->
    <?php if ($user_type == "Admin"): ?>
        <li class="nav-item <?=($active =='schedule'? 'active':'');?>">
            <a class="nav-link" href="schedule">
                <i class="fas fa-fw fa-clock"></i>
                <span>Schedule</span></a>
        </li>
    <?php endif; ?>

    <!--    CALENDAR-->
    <li class="nav-item <?=($active =='calendar'? 'active':'');?>">
        <a class="nav-link" href="calendar">
            <i class="fas fa-fw fa-calendar-alt"></i>
            <span>Calendar</span></a>
    </li>

    <!--    EMPLOYEES-->
    <?php if ($user_type == "Admin"): ?>
        <li class="nav-item <?=($active =='employee'? 'active':'');?>">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
               aria-expanded="true"
               aria-controls="collapseTwo">
                <i class="fas fa-fw fa-cog"></i>
                <span>Employees</span>
            </a>
            <div id="collapseTwo" class="collapse <?=($active =='position'||$active =='employee'? 'show':'');?> " aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Employee Management :</h6>
                    <a class="collapse-item <?=($active =='employee'? 'active':'');?>" href="employee">Employee List</a>
                    <a class="collapse-item <?=($active =='position'? 'active':'');?>" href="position">Position</a>
                </div>
            </div>
        </li>
    <?php endif; ?>

    <!--    PAYROLL-->
    <li class="nav-item <?=($active =='payroll'? 'active':'');?>">
        <a class="nav-link" href="payroll">
            <i class="fas fa-fw fa-money-bill"></i>
            <span>Payroll</span></a>
    </li>

    <!--    CASH  ADVANCE-->
    <?php if ($user_type != "Employee"): ?>
        <li class="nav-item <?=($active =='cash advance'? 'active':'');?>">
            <a class="nav-link" href="cash-advance">
                <i class="fas fa-fw fa-cash-register"></i>
                <span>Cash Advance</span></a>
        </li>
    <?php endif; ?>

    <!--    DEDUCTIONS-->
    <?php if ($user_type != "Employee"): ?>
        <li class="nav-item <?=($active =='deduction'? 'active':'');?>">
            <a class="nav-link" href="#">
                <i class="fas fa-fw fa-receipt"></i>
                <span>Deductions</span></a>
        </li>
    <?php endif; ?>

    <!--    REPORTS-->
    <?php if ($user_type != "Employee"): ?>
        <li class="nav-item <?=($active =='attendance report'||$active =='payroll report'? 'active':'');?>">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseThree"
               aria-expanded="true"
               aria-controls="collapseTwo">
                <i class="fas fa-fw fa-retweet"></i>
                <span>Reports</span>
            </a>
            <div id="collapseThree" class="collapse <?=($active =='attendance report'||$active =='payroll report'? 'show':'');?> " aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Employee Summary Report :</h6>
                    <a class="collapse-item <?=($active =='attendance report'? 'active':'');?>" href="attendance_report">Attendance Report</a>
                    <a class="collapse-item <?=($active =='payroll report'? 'active':'');?>" href="payroll_report">Payroll Report</a>
                </div>
            </div>
        </li>
    <?php endif; ?>

    <hr class="sidebar-divider d-none d-md-block">

    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>
</ul>