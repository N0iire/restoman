<!-- header -->
<?php
session_start();
include '../../header.php';

if ($_SESSION['login'] && $_SESSION['kategori_p'] == "koki") {

    include_once("../../model/db_config.php");
    include_once("../../function/SSL.php");
    include_once("../../controller/KategoriController.php");
    include_once("../../controller/MenuController.php");
    include_once("../../controller/UserController.php");
    include_once("../../controller/PesananController.php");
    include_once("../../controller/DetailPesananController.php");

    $encrypt = new SSL();
    $kategori = new Kategori();
    $menu = new Menu();
    $user = new User();
    $pesanan = new Pesanan();
    $detail_pesanan = new Detail_pesanan();

    if (isset($_GET['e'])) {
        $encrypt->word = $_GET['e'];
        $id_for_edit = $encrypt->decr();
    }

    if (isset($_POST['tambah_kategori'])) {
        if ($kategori->store()) {
            header("location: index.php?p=kategori&msg=store-success");
        } else {
            header("location: index.php?p=kategori&msg=store-failed");
        }
    }

    if (isset($_POST['edit_kategori'])) {
        $id_kategori = $kategori->db->escape_string($_POST['id_kategori']);
        $nama_kategori = $kategori->db->escape_string($_POST['nama_kategori']);

        $encrypt->word = $id_kategori;
        $id = $encrypt->encr();
        if ($kategori->update($id_for_edit)) {
            header("location: index.php?p=edit-kategori&e=" . $id . "&msg=edit-success");
            // If Success Sweet Alert Here
        } else {
            // If Failed Sweet Alert Here
            header("location: index.php?p=edit-kategori&msg=edit-fail");
        }
    }

    if (isset($_GET['d_kategori'])) {
        $encrypt->word = $_GET['d_kategori'];
        $id_for_delete = $encrypt->decr();
        if ($kategori->destroy($id_for_delete)) {
            header("location: index.php?p=kategori&msg=delete-success");
            // If Success Sweet Alert Here
        } else {
            header("location: index.php?p=kategori&msg=delete-failed");
        }
    }

    if (isset($_POST['tambah_menu'])) {
        if ($menu->store()) {
            header("location: index.php?p=menu&msg=store-success");
        } else {
            header("location: index.php?p=menu&msg=store-fail");
        }
    }

    if (isset($_POST['edit_menu'])) {

        $encrypt->word = $_POST['id_menu'];
        $id = $encrypt->encr();
        if ($menu->update($id_for_edit)) {
            header("location: index.php?p=edit-menu&e=" . $id . "&msg=edit-success");
            // If Success Sweet Alert Here
        } else {
            // If Failed Sweet Alert Here
        }
    }


    if (isset($_GET['d_menu'])) {
        $encrypt->word = $_GET['d_menu'];
        $id_for_delete = $encrypt->decr();
        if ($menu->destroy($id_for_delete)) {
            header("location: index.php?p=menu&msg=delete-success");
            // If Success Sweet Alert Here
        } else {
            header("location: index.php?p=menu&msg=delete-failed");
        }
    }
    if (isset($_GET['r'])) {
        if ($_GET['r'] == "logout") {
            $user->logout();
            header("location: ../../index.php?msg=logout-success");
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
                } else if ($_GET['p'] == 'backuprestore' || $_REQUEST['p'] == 'backuprestore') {
                    require_once  $_GET['p'] . '.php';
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