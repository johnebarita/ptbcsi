<?php
/**
 * Created by PhpStorm.
 * User: John Ebarita
 * Date: 1/15/2020
 * Time: 2:59 PM
 */ ?>
<!-- Bootstrap core JavaScript-->
<script src="<?= base_url(); ?>assets/vendor/jquery/jquery.min.js"></script>
<script src="<?= base_url(); ?>assets/vendor/jquery/jquery.floatThead.min.js"></script>
<script src="<?= base_url(); ?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="<?= base_url(); ?>assets/vendor/jquery-easing/jquery.easing.min.js"></script>
<script src="<?= base_url(); ?>assets/js/sb-admin-2.min.js"></script>
<script src="<?= base_url(); ?>assets/vendor/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url(); ?>assets/vendor/datatables/dataTables.bootstrap4.min.js"></script>
<script src="<?= base_url(); ?>assets/vendor/chart.js/Chart.min.js"></script>
<script src="<?= base_url(); ?>assets/js/demo/datatables-demo.js"></script>
<script src="<?= base_url(); ?>assets/js/demo/chart-area-demo.js"></script>
<script src="<?= base_url(); ?>assets/js/demo/chart-pie-demo.js"></script>
<script src="<?= base_url(); ?>assets/js/demo/chart-bar-demo.js"></script>
<script src="<?= base_url(); ?>assets/toastr/toastr.min.js"></script>
<!--<script src="assets/js/jquery.fixedheadertable.min.js"></script>-->
<script type="text/javascript">

    window.onload = function () {
        $("#prod-list").floatThead({
            scrollContainer: function ($table) {
                return $('#wages-table-container');
            }
        });
    }
    $(document).ready(function () {
        $('[data-toggle="tooltip"]').tooltip();
    });
    toastr.options = {
        preventDuplicate: true,
        positionClass: 'toast-bottom-center',
        showDuration: 300,
        hideDuration: 1000,
        timeOut: 5000,
        extendedTimeOut: 1000,
        closeButton: true,
        progressBar: true,
    };
</script>
