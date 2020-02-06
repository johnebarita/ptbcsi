<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<?php if (isset($_SESSION['is_logged_id'])):
        redirect(base_url(''));
elseif (isset($_SESSION['user_type'])):?>
    <html lang="en">
    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>404</title>

        <!-- Custom fonts for this template-->
        <link href="<?= base_url(); ?>assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
              rel="stylesheet">

        <!-- Custom styles for this template-->
        <link href="<?= base_url(); ?>assets/css/sb-admin-2.min.css" rel="stylesheet">

    </head>

    <body id="page-top">
    <div id="wrapper">
        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content" style="height: 91vh">
                <div class="container-fluid " style=" padding-top: 30vh;">
                    <!-- 404 Error Text -->
                    <div class="text-center mb-2 mt-5 pd" style="disply:flex;/* vertical-align: middle; */">
                        <div class="error mx-auto" data-text="404">404</div>
                        <p class="lead text-gray-800 mb-5">Page Not Found</p>
                        <p class="text-gray-500 mb-0">It looks like you found a glitch in the matrix...</p>
                        <?php if ($_SESSION['user_type'] == "Admin"): ?>
                            <a href="<?= base_url(); ?>dashboard">← Back to Dashboard</a>
                        <?php else: ?>
                            <a href="<?= base_url(); ?>dtr">← Back to DTR</a>
                        <?php endif; ?>
                    </div>

                </div>
            </div>
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright © Your Website 2019</span>
                    </div>
                </div>
            </footer>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="<?= base_url(); ?>assets/vendor/jquery/jquery.min.js"></script>
    <script src="<?= base_url(); ?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?= base_url(); ?>assets/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?= base_url(); ?>assets/js/sb-admin-2.min.js"></script>

    </body>
    </html>
<?php else:
    redirect(base_url());
endif; ?>