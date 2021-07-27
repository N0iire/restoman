<!-- header -->
<?php 
    session_start();
    include '../../header.php'; 
    
    
    
    if ($_SESSION['login'] && $_SESSION['kategori_p'] == "pelayan") {
        include_once('../../model/db_config.php');
        include_once('../../controller/MejaController.php');
        include_once('../../controller/UserController.php');
        include('../../function/SSL.php');

        $meja = new Meja();
        $encrypt = new SSL();
        $user = new User();

        //Tambah Meja
        if (isset($_POST['Tambah'])) {
        
            $id_meja = $meja->db->escape_string($_POST['id_meja']);

            $tambah = $meja->store($id_meja);
            if ($tambah) {
                header("location: index.php?p=meja&?msg=store_success");
            } else {
                header("location: index.php?p=meja&?msg=store_failed");
            }
        }

        //Hapus Meja 
        if (isset($_GET['d'])) {
            $encrypt->word = $_GET['d'];
            $id_meja = $encrypt->decr();
            if ($meja->destroy($id_meja)) {
                header("location: index.php?p=meja&msg=delete-success");
                // If Success Sweet Alert Here
            } else {
                // If Failed Sweet Alert Here
            }
        }
        
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
                <?php include '../../component/navbar_pelayan.php' ?>

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
            } else if ($_GET['p'] == 'meja' || $_REQUEST['p'] == 'meja') {
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