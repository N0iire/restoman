<!-- header -->
<?php
session_start();
include '../../header.php';



if ($_SESSION['login'] && $_SESSION['kategori_p'] == "kasir") {
    //Masih Tahap Revisi
    include_once('../../model/db_config.php');
    include_once('../../controller/PembayaranController.php');
    include_once('../../controller/MejaController.php');
    include_once('../../controller/PesananController.php');
    include_once('../../controller/UserController.php');
    include_once('../../controller/DetailPesananController.php');
    include('../../function/SSL.php');

    $pembayaran = new Pembayaran();
    $user = new User();
    $detail_pesanan = new Detail_pesanan();
    $meja = new Meja();
    $pesanan = new Pesanan();

    //Pilih clicked

    //Logout
    if (isset($_GET['r'])) {
        if ($_GET['r'] == "logout") {
            $user->logout();
            header("location: ../../index.php?msg=logout-success");
        }
    }

    // Checkout
    if ($_POST['bayar']) {
        if ($pembayaran->store()) {
            $pesanan->statusY($_POST['id_pesanan']);
            $meja->statusY($_POST['id_meja']);
            header("location: index.php?msg=pembayaran-success");
        } else {
            header("location: index.php?msg=pembayaran-failed");
        }
    }
} else {
    header("location: ../../index.php?msg=login-auth");
}
?>

<body style="background: #fff;">
    <?php
    include '../../sweetalert.php';
    if (!isset($_GET['msg'])) {
    } else if ($_GET['msg'] == 'store-success') {
        echo '<script>berhasilTambah();</script>';
    } else if ($_GET['msg'] == 'store-fail') {
        echo '<script>gagalTambah();</script>';
    } else if ($_GET['msg'] == 'edit-success') {
        echo '<script>berhasilUbah();</script>';
    } else if ($_GET['msg'] == 'edit-fail') {
        echo '<script>gagalUbah();</script>';
    } else if ($_GET['msg'] == 'delete-success') {
        echo '<script>berhasilHapus();</script>';
    } else if ($_GET['msg'] == 'delete-failed') {
        echo '<script>gagalHapus();</script';
    } else if ($_GET['msg'] == 'login-success') {
        echo '<script>sukses();</script';
    }
    ?>
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