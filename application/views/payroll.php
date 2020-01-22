<?php
/**
 * Created by PhpStorm.
 * User: John Ebarita
 * Date: 1/16/2020
 * Time: 10:45 AM
 */ ?>
<style>
    .fancyTable td, .fancyTable th {
        /* appearance */
        border: 1px solid #778899;

        /* size */
        padding: 5px;
    }

    .fancyTable {
        /* text */
        font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif;
    }

    .fancyTable tbody tr td {
        /* appearance */
        background-color: #eef2f9;
        background-image: -moz-linear-gradient(
                top,
                rgba(255,255,255,0.4) 0%,
                rgba(255,255,255,0.2) 50%,
                rgba(255,255,255,0.1) 51%,
                rgba(255,255,255,0.0) 100%);

        background-image: -webkit-gradient(
                linear, left top, left bottom,
                color-stop(0%,rgba(255,255,255,0.4)),
                color-stop(50%,rgba(255,255,255,0.2)),
                color-stop(51%,rgba(255,255,255,0.1)),
                color-stop(100%,rgba(255,255,255,0.0)));

        /* text */
        color: #262c31;
        font-size: 11px;
    }

    .fancyTable tbody tr.odd td {
        /* appearance */
        background-color: #d6e0ef;
        background-image: -moz-linear-gradient(
                top,
                rgba(255,255,255,0.4) 0%,
                rgba(255,255,255,0.2) 50%,
                rgba(255,255,255,0.1) 51%,
                rgba(255,255,255,0.0) 100%);

        background-image: -webkit-gradient(
                linear, left top, left bottom,
                color-stop(0%,rgba(255,255,255,0.4)),
                color-stop(50%,rgba(255,255,255,0.2)),
                color-stop(51%,rgba(255,255,255,0.1)),
                color-stop(100%,rgba(255,255,255,0.0)));
    }

    .fancyTable thead tr th,
    .fancyTable thead tr td,
    .fancyTable tfoot tr th,
    .fancyTable tfoot tr td {
        /* appearance */
        background-color: #8ca9cf;
        background-image: -moz-linear-gradient(
                top,
                rgba(255,255,255,0.4) 0%,
                rgba(255,255,255,0.2) 50%,
                rgba(255,255,255,0.1) 51%,
                rgba(255,255,255,0.0) 100%);

        background-image: -webkit-gradient(
                linear, left top, left bottom,
                color-stop(0%,rgba(255,255,255,0.4)),
                color-stop(50%,rgba(255,255,255,0.2)),
                color-stop(51%,rgba(255,255,255,0.1)),
                color-stop(100%,rgba(255,255,255,0.0)));

        /* text */
        color: #121517;
        font-size: 12px;
        font-weight: bold;
        text-shadow: 0 1px 1px #e8ebee;
    }
</style>
<div class="container-fluid ">

    <h1 class="h3 mb-4 text-gray-800">Payroll - TODO ( John) </h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4 ">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive-sm"  id="table-scroll" style="height:500px;overflow-y: scroll;border: 1px solid #e3e6f0 !important;">
                <table class="table table-bordered persistent-table " width="100%" cellspacing="0" style="overflow-y: scroll">
                    <thead class="persistent-tp">
                    <tr>
                        <th rowspan="2" class="align-middle">No.</span></th>
                        <th>Name</th>
                        <th>Position</th>
                        <th>Office</th>
                        <th>Age</th>
                        <th>Start date</th>
                        <th>Salary</th>

                    </tr>
                    <tr class="persistent-bt">
                        <th>Name</th>
                        <th>Position</th>
                        <th>Office</th>
                        <th>Age</th>
                        <th>Start date</th>
                        <th>Salary</th>

                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td></td>
                        <td>Gavin Joyce</td>
                        <td>Developer</td>
                        <td>Edinburgh</td>
                        <td>42</td>
                        <td>2010/12/22</td>
                        <td>$92,575</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>Gavin Joyce</td>
                        <td>Developer</td>
                        <td>Edinburgh</td>
                        <td>42</td>
                        <td>2010/12/22</td>
                        <td>$92,575</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>Gavin Joyce</td>
                        <td>Developer</td>
                        <td>Edinburgh</td>
                        <td>42</td>
                        <td>2010/12/22</td>
                        <td>$92,575</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>Gavin Joyce</td>
                        <td>Developer</td>
                        <td>Edinburgh</td>
                        <td>42</td>
                        <td>2010/12/22</td>
                        <td>$92,575</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>Jennifer Chang</td>
                        <td>Regional Director</td>
                        <td>Singapore</td>
                        <td>28</td>
                        <td>2010/11/14</td>
                        <td>$357,650</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>Jennifer Acosta</td>
                        <td>Junior Javascript Developer</td>
                        <td>Edinburgh</td>
                        <td>43</td>
                        <td>2013/02/01</td>
                        <td>$75,650</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>Cara Stevens</td>
                        <td>Sales Assistant</td>
                        <td>New York</td>
                        <td>46</td>
                        <td>2011/12/06</td>
                        <td>$145,600</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>Hermione Butler</td>
                        <td>Regional Director</td>
                        <td>London</td>
                        <td>47</td>
                        <td>2011/03/21</td>
                        <td>$356,250</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>Lael Greer</td>
                        <td>Systems Administrator</td>
                        <td>London</td>
                        <td>21</td>
                        <td>2009/02/27</td>
                        <td>$103,500</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>Jonas Alexander</td>
                        <td>Developer</td>
                        <td>San Francisco</td>
                        <td>30</td>
                        <td>2010/07/14</td>
                        <td>$86,500</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>Shad Decker</td>
                        <td>Regional Director</td>
                        <td>Edinburgh</td>
                        <td>51</td>
                        <td>2008/11/13</td>
                        <td>$183,000</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>Michael Bruce</td>
                        <td>Javascript Developer</td>
                        <td>Singapore</td>
                        <td>29</td>
                        <td>2011/06/27</td>
                        <td>$183,000</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>Donna Snider</td>
                        <td>Customer Support</td>
                        <td>New York</td>
                        <td>27</td>
                        <td>2011/01/25</td>
                        <td>$112,000</td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>


    <div class="card shadow mb-4 ">
        <div class="card-body">
            <div class="table" id="" style="width: 620px;height: 250px;overflow: auto;">
                <table class="fancyTable"  style="boder:1px solid red" id="myTable01" cellpadding="0" cellspacing="0">
                    <thead>
                    <tr>
                        <th rowspan="2">Browser</th>
                        <th>Visits</th>
                        <th>Pages/Visit</th>
                        <th>Avg. Time on Site</th>
                        <th>% New Visits</th>
                        <th>Bounce Rate</th>
                        <th>Browser</th>
                        <th>Visits</th>
                        <th>Pages/Visit</th>
                        <th>Avg. Time on Site</th>
                        <th>% New Visits</th>
                        <th>Bounce Rate</th>
                        <th>Browser</th>
                        <th>Visits</th>
                        <th>Pages/Visit</th>
                        <th>Avg. Time on Site</th>
                        <th>% New Visits</th>
                        <th>Bounce Rate</th>
                        <th>Browser</th>
                        <th>Visits</th>
                        <th>Pages/Visit</th>
                        <th>Avg. Time on Site</th>
                        <th>% New Visits</th>
                        <th>Bounce Rate</th>
                        <th>Browser</th>
                        <th>Visits</th>
                        <th>Pages/Visit</th>
                        <th>Avg. Time on Site</th>
                        <th>% New Visits</th>
                        <th>Bounce Rate</th>
                        <th>Browser</th>
                        <th>Visits</th>
                        <th>Pages/Visit</th>
                        <th>Avg. Time on Site</th>
                        <th>% New Visits</th>
                        <th>Bounce Rate</th>
                    </tr>
                    <tr>
                        <!--   --><th>Browser</th>
                        <th>Visits</th>
                        <th>Pages/Visit</th>
                        <th>Avg. Time on Site</th>
                        <th>% New Visits</th>
                        <th>Bounce Rate</th>

                    </tr>
                    </thead>
                    <tbody >
                    <tr>
                        <td>Firefox</td>
                        <td>1,990</td>
                        <td>3.11</td>
                        <td>00:04:22</td>
                        <td>70.00%</td>
                        <td>32.61%</td>
                        <td>Firefox</td>
                        <td>1,990</td>
                        <td>3.11</td>
                        <td>00:04:22</td>
                        <td>70.00%</td>
                        <td>32.61%</td>
                        <td>Firefox</td>
                        <td>1,990</td>
                        <td>3.11</td>
                        <td>00:04:22</td>
                        <td>70.00%</td>
                        <td>32.61%</td>
                        <td>Firefox</td>
                        <td>1,990</td>
                        <td>3.11</td>
                        <td>00:04:22</td>
                        <td>70.00%</td>
                        <td>32.61%</td>
                        <td>Firefox</td>
                        <td>1,990</td>
                        <td>3.11</td>
                        <td>00:04:22</td>
                        <td>70.00%</td>
                        <td>32.61%</td>
                        <td>Firefox</td>
                        <td>1,990</td>
                        <td>3.11</td>
                        <td>00:04:22</td>
                        <td>70.00%</td>
                        <td>32.61%</td>
                        <td>Firefox</td>
                        <td>1,990</td>
                        <td>3.11</td>
                        <td>00:04:22</td>
                        <td>70.00%</td>
                        <td>32.61%</td>
                    </tr>
                    <tr>
                        <td>Firefox</td>
                        <td>1,990</td>
                        <td>3.11</td>
                        <td>00:04:22</td>
                        <td>70.00%</td>
                        <td>32.61%</td>
                    </tr>
                    <tr>
                        <td>Firefox</td>
                        <td>1,990</td>
                        <td>3.11</td>
                        <td>00:04:22</td>
                        <td>70.00%</td>
                        <td>32.61%</td>
                    </tr>
                    <tr>
                        <td>Firefox</td>
                        <td>1,990</td>
                        <td>3.11</td>
                        <td>00:04:22</td>
                        <td>70.00%</td>
                        <td>32.61%</td>
                    </tr>
                    <tr>
                        <td>Firefox</td>
                        <td>1,990</td>
                        <td>3.11</td>
                        <td>00:04:22</td>
                        <td>70.00%</td>
                        <td>32.61%</td>
                    </tr>
                    <tr>
                        <td>Firefox</td>
                        <td>1,990</td>
                        <td>3.11</td>
                        <td>00:04:22</td>
                        <td>70.00%</td>
                        <td>32.61%</td>
                    </tr>
                    <tr>
                        <td>Firefox</td>
                        <td>1,990</td>
                        <td>3.11</td>
                        <td>00:04:22</td>
                        <td>70.00%</td>
                        <td>32.61%</td>
                    </tr>
                    <tr>
                        <td>Firefox</td>
                        <td>1,990</td>
                        <td>3.11</td>
                        <td>00:04:22</td>
                        <td>70.00%</td>
                        <td>32.61%</td>
                    </tr>
                    <tr>
                        <td>Firefox</td>
                        <td>1,990</td>
                        <td>3.11</td>
                        <td>00:04:22</td>
                        <td>70.00%</td>
                        <td>32.61%</td>
                    </tr>
                    <tr>
                        <td>Firefox</td>
                        <td>1,990</td>
                        <td>3.11</td>
                        <td>00:04:22</td>
                        <td>70.00%</td>
                        <td>32.61%</td>
                    </tr>
                    <tr>
                        <td>Firefox</td>
                        <td>1,990</td>
                        <td>3.11</td>
                        <td>00:04:22</td>
                        <td>70.00%</td>
                        <td>32.61%</td>
                    </tr>
                    <tr>
                        <td>Firefox</td>
                        <td>1,990</td>
                        <td>3.11</td>
                        <td>00:04:22</td>
                        <td>70.00%</td>
                        <td>32.61%</td>
                    </tr>
                    <tr>
                        <td>Firefox</td>
                        <td>1,990</td>
                        <td>3.11</td>
                        <td>00:04:22</td>
                        <td>70.00%</td>
                        <td>32.61%</td>
                    </tr>
                    <tr>
                        <td>Firefox</td>
                        <td>1,990</td>
                        <td>3.11</td>
                        <td>00:04:22</td>
                        <td>70.00%</td>
                        <td>32.61%</td>
                    </tr>
                    <tr>
                        <td>Firefox</td>
                        <td>1,990</td>
                        <td>3.11</td>
                        <td>00:04:22</td>
                        <td>70.00%</td>
                        <td>32.61%</td>
                    </tr>
                    <tr>
                        <td>Firefox</td>
                        <td>1,990</td>
                        <td>3.11</td>
                        <td>00:04:22</td>
                        <td>70.00%</td>
                        <td>32.61%</td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>


</div>

