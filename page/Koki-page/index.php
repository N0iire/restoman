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
                    <?php include '../../component/sidebar_koki.php' ?>
                </aside>
            </div>

            <div class="col-sm-9">
                <!-- start page content -->
                <?php
                if (!isset($_GET['p'])) {
                    require_once 'pesanan.php';
                } else if ($_GET['p'] == 'pesanan') {
                    require_once $_GET['p'] . '.php';
                } else if ($_GET['p'] == 'menu' || $_REQUEST['p'] == 'menu') {
                    require_once  $_GET['p'] . '.php';
                } else if ($_GET['p'] == 'edit-menu' || $_REQUEST['p'] == 'edit-menu') {
                    require_once  $_GET['p'] . '.php';
                } else if ($_GET['p'] == 'kategori' || $_REQUEST['p'] == 'kategori') {
                    require_once  $_GET['p'] . '.php';
                } else if ($_GET['p'] == 'edit-kategori' || $_REQUEST['p'] == 'edit-kategori') {
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