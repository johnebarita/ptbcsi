<?php
/**
 * Created by PhpStorm.
 * User: capstonestudent
 * Date: 2/18/2020
 * Time: 9:57 PM
 */ ?>
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-3 text-gray-800"><strong>TDZ</strong> <i class="divider"> / </i> <span>Calendar</span></h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4 "style="height:70vh;">
        <div class="card-body">
            <div class="row " style="height: 100%">
                <div class="col-xl-3    ">
                    <div class="card border-left-primary  h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total Employees</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">10</div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-calendar fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-9">
                    <div class="card border-left-success  h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col-sm-1">
                                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1"><
                                    </div>
                                </div>
                                <div class="col-sm-2">
                                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                        Date
                                    </div>
                                </div>
                                <div class="col-sm-2">
                                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">>
                                    </div>
                                </div>
                            </div>
                            <div class="card shadow" style="height:95%;">
                                <div class="table-responsive">
                                    <table class="table table-bordered"  width="100%" cellspacing="0" >
                                        <thead>
                                        <tr >
                                            <th>Sunday</th>
                                            <th>Monday</th>
                                            <th>Tuesday</th>
                                            <th>Wednesday</th>
                                            <th>Thursday</th>
                                            <th>Friday</th>
                                            <th>Saturday</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                            <?php for($i=0;$i<5;$i++):?>
                                                <tr style="height: 4rem">
                                                    <td>1</td>
                                                    <td>2</td>
                                                    <td>3</td>
                                                    <td>4</td>
                                                    <td>5</td>
                                                    <td>6</td>
                                                    <td>7   </td>
                                                </tr>
                                            <?php endfor;?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
