<!-- header -->
<?php include '../../header.php' ?>

<style>
    .col-md-4 {
        padding-right: 4px;
    }
</style>

<body style="background: #fff;">
    <div class="row">
        <div class="col-sm-12">
            <!-- navbar -->
            <header>
                <?php include '../../component/navbar.php' ?>

            </header>
        </div>

        <div class="row" style="margin-top: 90px;">
            <div class="col-sm-3">
                <!-- sidebar -->
                <aside>
                    <?php include '../../component/sidebar_pelayan.php' ?>
                </aside>
            </div>


            <!-- start page content -->
            <?php
            if (!isset($_GET['p'])) {
                require_once 'pemesanan.php';
            } else if ($_GET['p'] == 'pemesanan') {
                require_once $_GET['p'] . '.php';
            } else if ($_GET['p'] == 'laporan' || $_REQUEST['p'] == 'laporan') {
                require_once  $_GET['p'] . '.php';
            }
            ?>

        </div>

    </div>
    <!-- preloader -->
    <div class="preloader">
        <div class="box">
        </div>
    </div>

    <!-- end body -->
    <?php include '../../footer.php' ?>