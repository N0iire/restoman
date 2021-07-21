<!-- header -->
<?php include '../../header.php' ?>


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
                    <?php include '../../component/sidebar_owner.php' ?>
                </aside>
            </div>

            <div class="col-sm-9">
                <!-- start page content -->
                <?php
                if (!isset($_GET['p'])) {
                    require_once 'dashboard.php';
                } else if ($_GET['p'] == 'dashboard') {
                    require_once $_GET['p'] . '.php';
                } else if ($_GET['p'] == 'laporan' || $_REQUEST['p'] == 'laporan') {
                    require_once  $_GET['p'] . '.php';
                } else if ($_GET['p'] == 'pegawai' || $_REQUEST['p'] == 'pegawai') {
                    require_once  $_GET['p'] . '.php';
                } else if ($_GET['p'] == 'menu' || $_REQUEST['p'] == 'menu') {
                    require_once  $_GET['p'] . '.php';
                }
                ?>

            </div>

        </div>

    </div>
    <div class="preloader">
        <div class="box">

        </div>

    </div>

    <!-- end body -->
    <?php include '../../footer.php' ?>