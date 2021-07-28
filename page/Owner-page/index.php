<!-- header -->
<?php
session_start();

include '../../header.php';

if ($_SESSION['login'] && $_SESSION['kategori_p'] == "owner") {
    include_once('../../model/db_config.php');
    include_once('../../controller/MenuController.php');
    include_once('../../controller/UserController.php');

    $user = new User();
    $menu = new Menu();

    if (isset($_POST['store'])) {
        $id_pegawai = $user->db->escape_string($_POST['id_pegawai']);
        $nama_pegawai = $user->db->escape_string($_POST['nama_pegawai']);
        $password   = $user->db->escape_string($_POST['password']);
        $kategori = $user->db->escape_string($_POST['kategori']);
        if ($user->store($id_pegawai, $nama_pegawai, $password, $kategori)) {
            header("location: index.php?p=pegawai&msg=store-success");
            // If Success Sweet Alert Here
        } else {
            // If Failed Sweet Alert Here
        }
    }

    if (isset($_GET['e'])) {
        $user->word = $_GET['e'];
        $id_for_edit = $user->decr();
    }

    if (isset($_POST['edit'])) {
        $id_pegawai = $user->db->escape_string($_POST['id_pegawai']);
        $nama_pegawai = $user->db->escape_string($_POST['nama_pegawai']);
        $user->word = $user->db->escape_string($_POST['password']);
        $password   = $user->encr();
        $kategori = $user->db->escape_string($_POST['kategori']);

        $user->word = $id_pegawai;
        $id = $user->encr();
        if ($user->update($id_for_edit)) {
            header("location: index.php?p=edit-pegawai&e=" . $id . "&msg=edit-success");
            // If Success Sweet Alert Here
        } else {
            // If Failed Sweet Alert Here
        }
    }

    if (isset($_GET['d'])) {
        $user->word = $_GET['d'];
        $id_for_delete = $user->decr();
        if ($user->destroy($id_for_delete)) {
            header("location: index.php?p=pegawai&msg=delete-success");
            // If Success Sweet Alert Here
        } else {
            // If Failed Sweet Alert Here
        }
    }

    if (isset($_GET['unacc'])) {
        $user->word = $_GET['unacc'];
        $id_for_delete = $user->decr();
        if ($menu->destroy($id_for_delete)) {
            header("location: index.php?p=menu&msg=unacc-success");
            // If Success Sweet Alert Here
        } else {
            header("location: index.php?p=menu&msg=unacc-failed");
        }
    }

    if (isset($_GET['acc'])) {
        $user->word = $_GET['acc'];
        $id_for_acc = $user->decr();
        if ($menu->acc($id_for_acc)) {
            header("location: index.php?p=menu&msg=acc-success");
        } else {
            header("location: index.php?p=menu&msg=acc-failed");
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
                } else if ($_GET['p'] == 'edit-pegawai' || $_REQUEST['p'] == 'edit-pegawai') {
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