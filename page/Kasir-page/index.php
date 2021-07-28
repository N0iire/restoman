<!-- header -->
<?php 
    session_start();
    include '../../header.php'; 
    
    
    
    if ($_SESSION['login'] && $_SESSION['kategori_p'] == "kasir") {
        //Masih Tahap Revisi
        include_once('../../model/db_config.php');
        include_once('../../controller/PembayaranController.php');
        include_once('../../controller/UserController.php');
        include('../../function/SSL.php');

        $pembayaran = new Pembayaran();
        $user = new User();

        //Pilih clicked
        
        //Logout
        if (isset($_GET['r'])) {
            if ($_GET['r'] == "logout") {
                $user->logout();
                header("location: ../../index.php?msg=logout-success");
            }
        }

    }else {
        header("location: ../../index.php?msg=login-auth");
    } 
?>

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
                    <?php include '../../component/sidebar_kasir.php' ?>
                </aside>
            </div>

            <div class="col-sm-9">
                <!-- start page content -->
                <?php
                if (!isset($_GET['p'])) {
                    require_once 'pembayaran.php';
                } else if ($_GET['p'] == 'pembayaran') {
                    require_once $_GET['p'] . '.php';
                } else if ($_GET['p'] == 'laporan' || $_REQUEST['p'] == 'laporan') {
                    require_once  $_GET['p'] . '.php';
                }
                ?>

            </div>
        </div>

    </div>
    <!-- preloader -->
    <div class="preloader">
        <div class="box">
        </div>
    </div>

    <!-- end body -->
    <?php include '../../footer.php' ?>

    </div>