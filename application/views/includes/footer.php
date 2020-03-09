<?php
/**
 * Created by PhpStorm.
 * User: John Ebarita
 * Date: 1/15/2020
 * Time: 3:12 PM
 */ ?>
</div>
<footer class="sticky-footer bg-white">
    <div class="container my-auto">
        <div class="copyright text-center my-auto">
            <span>Copyright &copy; Team Premium <?= date('Y'); ?></span>
        </div>
    </div>
</footer>
</div>
</div>
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>
<?php include 'modals/logout_modal.php' ?>
<?php include 'scripts.php' ?>
<script>//SEARCH BAR FOR JOBS
    if (window.history.replaceState) {
        window.history.replaceState(null, null, window.location.href);
    }
    $('#search_text_reports').on('input', function () {
        var searchTerm = $(this).val().toUpperCase();
        $('.search').each(function () {
            var jobs = $(this).data('search-term').toUpperCase();
            if (jobs.indexOf(searchTerm) > -1) {
                $(this).show();
            } else {
                $(this).hide();
            }
        });
    });


    var span = document.getElementById('span');

    function time() {
        var d = new Date();
        var s = d.getSeconds();
        var m = d.getMinutes();
        var h = d.getHours();
        span.textContent = h + ":" + m + ":" + s;
    }

    setInterval(time, 1000);

</script>
</body>

</html>
