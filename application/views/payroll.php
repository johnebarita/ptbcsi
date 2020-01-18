<?php
/**
 * Created by PhpStorm.
 * User: John Ebarita
 * Date: 1/16/2020
 * Time: 10:45 AM
 */ ?>
<style>

    .data-table {
        overflow: auto;
        height: 500px;
        position: relative;
        font-size: 14px;
    }

    .data-table th,
    .data-table td {
        white-space: nowrap;
    }

    .data-table thead .una th {
        background: #000;
        color: #fff;
        position: -webkit-sticky;
        position: sticky;
        top: 0;
        border-right: 1px solid #aaa;
    }

    .data-table thead .duha th {
        background: #000;
        color: #fff;
        position: -webkit-sticky;
        position: sticky;
        top: 9.1%;
        border-right: 1px solid #aaa;
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
            <div class="table-responsive-sm"
                 style="height:500px;overflow-y: scroll;border: 1px solid #e3e6f0 !important;">
                <table class="table table-bordered " width="100%" cellspacing="0" style="overflow-y: scroll">
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
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive-sm data-table" id="table">
                <table class=" table table-bordered data-table ">
                    <thead>
                    <tr class="una">
                        <th>No</th>
                        <th>Header 1</th>
                        <th>Header 2</th>
                        <th>Header 3</th>
                        <th>Header 4</th>
                        <th>Header 5</th>
                        <th>Header 6</th>
                        <th>Header 7</th>
                        <th>Header 8</th>
                        <th>Header 9</th>
                        <th>Header 5</th>
                        <th>Header 6</th>
                        <th>Header 7</th>
                        <th>Header 8</th>
                        <th>Header 9</th>
                        <th>Header 5</th>
                        <th>Header 6</th>
                        <th>Header 7</th>
                        <th>Header 8</th>
                        <th>Header 9</th>
                        <th>Header 5</th>
                        <th>Header 6</th>
                        <th>Header 7</th>
                        <th>Header 8</th>
                        <th>Header 9</th>
                        <th>Header 5</th>
                        <th>Header 6</th>
                        <th>Header 7</th>
                        <th>Header 8</th>
                        <th>Header 9</th>
                    </tr>
                    <tr class="duha">
                        <th></th>
                        <th>Header 1</th>
                        <th>Header 2</th>
                        <th>Header 3</th>
                        <th>Header 4</th>
                        <th>Header 5</th>
                        <th>Header 6</th>
                        <th>Header 7</th>
                        <th>Header 8</th>
                        <th>Header 9</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td></td>
                        <td>Data - 1256</td>
                        <td>Data - 1256 Data - 1256 Data - 1256</td>
                        <td>Data - 1256</td>
                        <td>1256</td>
                        <td>125</td>
                        <td>Data - abc</td>
                        <td>abc</td>
                        <td>abc</td>
                        <td>ABCDE</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>Data - 1256</td>
                        <td>Data - 1256 Data - 1256 Data - 1256</td>
                        <td>Data - 1256</td>
                        <td>1256</td>
                        <td>125</td>
                        <td>Data - abc</td>
                        <td>abc</td>
                        <td>abc</td>
                        <td>ABCDE</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>Data - 1256</td>
                        <td>Data - 1256 Data - 1256 Data - 1256</td>
                        <td>Data - 1256</td>
                        <td>1256</td>
                        <td>125</td>
                        <td>Data - abc</td>
                        <td>abc</td>
                        <td>abc</td>
                        <td>ABCDE</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>Data - 1256</td>
                        <td>Data - 1256 Data - 1256 Data - 1256</td>
                        <td>Data - 1256</td>
                        <td>1256</td>
                        <td>125</td>
                        <td>Data - abc</td>
                        <td>abc</td>
                        <td>abc</td>
                        <td>ABCDE</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>Data - 1256</td>
                        <td>Data - 1256 Data - 1256 Data - 1256</td>
                        <td>Data - 1256</td>
                        <td>1256</td>
                        <td>125</td>
                        <td>Data - abc</td>
                        <td>abc</td>
                        <td>abc</td>
                        <td>ABCDE</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>Data - 1256</td>
                        <td>Data - 1256 Data - 1256 Data - 1256</td>
                        <td>Data - 1256</td>
                        <td>1256</td>
                        <td>125</td>
                        <td>Data - abc</td>
                        <td>abc</td>
                        <td>abc</td>
                        <td>ABCDE</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>Data - 1256</td>
                        <td>Data - 1256 Data - 1256 Data - 1256</td>
                        <td>Data - 1256</td>
                        <td>1256</td>
                        <td>125</td>
                        <td>Data - abc</td>
                        <td>abc</td>
                        <td>abc</td>
                        <td>ABCDE</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>Data - 1256</td>
                        <td>Data - 1256 Data - 1256 Data - 1256</td>
                        <td>Data - 1256</td>
                        <td>1256</td>
                        <td>125</td>
                        <td>Data - abc</td>
                        <td>abc</td>
                        <td>abc</td>
                        <td>ABCDE</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>Data - 1256</td>
                        <td>Data - 1256 Data - 1256 Data - 1256</td>
                        <td>Data - 1256</td>
                        <td>1256</td>
                        <td>125</td>
                        <td>Data - abc</td>
                        <td>abc</td>
                        <td>abc</td>
                        <td>ABCDE</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>Data - 1256</td>
                        <td>Data - 1256 Data - 1256 Data - 1256</td>
                        <td>Data - 1256</td>
                        <td>1256</td>
                        <td>125</td>
                        <td>Data - abc</td>
                        <td>abc</td>
                        <td>abc</td>
                        <td>ABCDE</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>Data - 1256</td>
                        <td>Data - 1256 Data - 1256 Data - 1256</td>
                        <td>Data - 1256</td>
                        <td>1256</td>
                        <td>125</td>
                        <td>Data - abc</td>
                        <td>abc</td>
                        <td>abc</td>
                        <td>ABCDE</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>Data - 1256</td>
                        <td>Data - 1256 Data - 1256 Data - 1256</td>

                        <td>Data - 1256</td>
                        <td>1256</td>
                        <td>125</td>
                        <td>Data - abc</td>
                        <td>abc</td>
                        <td>abc</td>
                        <td>ABCDE</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>Data - 1256</td>
                        <td>Data - 1256 Data - 1256 Data - 1256</td>
                        <td>Data - 1256</td>
                        <td>1256</td>
                        <td>125</td>
                        <td>Data - abc</td>
                        <td>abc</td>
                        <td>abc</td>
                        <td>ABCDE</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>Data - 1256</td>
                        <td>Data - 1256 Data - 1256 Data - 1256</td>
                        <td>Data - 1256</td>
                        <td>1256</td>
                        <td>125</td>
                        <td>Data - abc</td>
                        <td>abc</td>
                        <td>abc</td>
                        <td>ABCDE</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>Data - 1256</td>
                        <td>Data - 1256 Data - 1256 Data - 1256</td>
                        <td>Data - 1256</td>
                        <td>1256</td>
                        <td>125</td>
                        <td>Data - abc</td>
                        <td>abc</td>
                        <td>abc</td>
                        <td>ABCDE</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>Data - 1256</td>
                        <td>Data - 1256 Data - 1256 Data - 1256</td>
                        <td>Data - 1256</td>
                        <td>1256</td>
                        <td>125</td>
                        <td>Data - abc</td>
                        <td>abc</td>
                        <td>abc</td>
                        <td>ABCDE</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>Data - 1256</td>
                        <td>Data - 1256 Data - 1256 Data - 1256</td>
                        <td>Data - 1256</td>
                        <td>1256</td>
                        <td>125</td>
                        <td>Data - abc</td>
                        <td>abc</td>
                        <td>abc</td>
                        <td>ABCDE</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>Data - 1256</td>
                        <td>Data - 1256 Data - 1256 Data - 1256</td>
                        <td>Data - 1256</td>
                        <td>1256</td>
                        <td>125</td>
                        <td>Data - abc</td>
                        <td>abc</td>
                        <td>abc</td>
                        <td>ABCDE</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>Data - 1256</td>
                        <td>Data - 1256 Data - 1256 Data - 1256</td>
                        <td>Data - 1256</td>
                        <td>1256</td>
                        <td>125</td>
                        <td>Data - abc</td>
                        <td>abc</td>
                        <td>abc</td>
                        <td>ABCDE</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>Data - 1256</td>
                        <td>Data - 1256 Data - 1256 Data - 1256</td>
                        <td>Data - 1256</td>
                        <td>1256</td>
                        <td>125</td>
                        <td>Data - abc</td>
                        <td>abc</td>
                        <td>abc</td>
                        <td>ABCDE</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>Data - 1256</td>
                        <td>Data - 1256 Data - 1256 Data - 1256</td>
                        <td>Data - 1256</td>
                        <td>1256</td>
                        <td>125</td>
                        <td>Data - abc</td>
                        <td>abc</td>
                        <td>abc</td>
                        <td>ABCDE</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>Data - 1256</td>
                        <td>Data - 1256 Data - 1256 Data - 1256</td>
                        <td>Data - 1256</td>
                        <td>1256</td>
                        <td>125</td>
                        <td>Data - abc</td>
                        <td>abc</td>
                        <td>abc</td>
                        <td>ABCDE</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>Data - 1256</td>
                        <td>Data - 1256 Data - 1256 Data - 1256</td>
                        <td>Data - 1256</td>
                        <td>1256</td>
                        <td>125</td>
                        <td>Data - abc</td>
                        <td>abc</td>
                        <td>abc</td>
                        <td>ABCDE</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>Data - 1256</td>
                        <td>Data - 1256 Data - 1256 Data - 1256</td>
                        <td>Data - 1256</td>
                        <td>1256</td>
                        <td>125</td>
                        <td>Data - abc</td>
                        <td>abc</td>
                        <td>abc</td>
                        <td>ABCDE</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>Data - 1256</td>

                        <td>Data - 1256 Data - 1256 Data - 1256</td>
                        <td>Data - 1256</td>
                        <td>1256</td>
                        <td>125</td>
                        <td>Data - abc</td>
                        <td>abc</td>
                        <td>abc</td>
                        <td>ABCDE</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>Data - 1256</td>
                        <td>Data - 1256 Data - 1256 Data - 1256</td>
                        <td>Data - 1256</td>
                        <td>1256</td>
                        <td>125</td>
                        <td>Data - abc</td>
                        <td>abc</td>
                        <td>abc</td>
                        <td>ABCDE</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>Data - 1256</td>
                        <td>Data - 1256 Data - 1256 Data - 1256</td>
                        <td>Data - 1256</td>
                        <td>1256</td>
                        <td>125</td>
                        <td>Data - abc</td>
                        <td>abc</td>
                        <td>abc</td>
                        <td>ABCDE</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>Data - 1256</td>
                        <td>Data - 1256 Data - 1256 Data - 1256</td>
                        <td>Data - 1256</td>
                        <td>1256</td>
                        <td>125</td>
                        <td>Data - abc</td>
                        <td>abc</td>
                        <td>abc</td>
                        <td>ABCDE</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>Data - 1256</td>
                        <td>Data - 1256 Data - 1256 Data - 1256</td>
                        <td>Data - 1256</td>
                        <td>1256</td>
                        <td>125</td>
                        <td>Data - abc</td>
                        <td>abc</td>
                        <td>abc</td>
                        <td>ABCDE</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>Data - 1256</td>
                        <td>Data - 1256 Data - 1256 Data - 1256</td>
                        <td>Data - 1256</td>
                        <td>1256</td>
                        <td>125</td>
                        <td>Data - abc</td>
                        <td>abc</td>
                        <td>abc</td>
                        <td>ABCDE</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>Data - 1256</td>
                        <td>Data - 1256 Data - 1256 Data - 1256</td>
                        <td>Data - 1256</td>
                        <td>1256</td>
                        <td>125</td>
                        <td>Data - abc</td>
                        <td>abc</td>
                        <td>abc</td>
                        <td>ABCDE</td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>


</div>

