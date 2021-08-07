<!-- header -->
<?php
session_start();
include '../../header.php';

if ($_SESSION['login'] && $_SESSION['kategori_p'] == "pelayan") {
    include_once('../../model/db_config.php');
    include_once('../../controller/MejaController.php');
    include_once('../../controller/KategoriController.php');
    include_once('../../controller/UserController.php');
    include_once('../../controller/MenuController.php');
    include_once('../../controller/PesananController.php');
    include_once('../../controller/DetailPesananController.php');
    include('../../function/SSL.php');

    $meja = new Meja();
    $menu = new Menu();
    $encrypt = new SSL();
    $user = new User();
    $pesanan = new Pesanan();
    $detail_pesanan = new Detail_pesanan();
    $kategori = new Kategori();

    //Tambah Meja
    if (isset($_POST['tambah_meja'])) {

        $id_meja = $meja->db->escape_string($_POST['id_meja']);

        $tambah = $meja->store($id_meja);
        if ($tambah) {
            header("location: index.php?p=meja&msg=store-success");
        } else {
            header("location: index.php?p=meja&msg=store-failed");
        }
    }

    //Get id meja
    if (isset($_GET['e'])) {
        $encrypt->word = $_GET['e'];
        $id_for_edit = $encrypt->decr();
    }

    if (isset($_POST['edit_meja'])) {
        $id_meja = $meja->db->escape_string($_POST['id_meja']);

        $meja->word = $id_meja;
        $id = $encrypt->encr();
        if ($meja->update($id_for_edit)) {
            header("location: index.php?p=edit-meja&e=" . $id . "&msg=edit-success");
            // If Success Sweet Alert Here
        } else {
            // If Failed Sweet Alert Here
        }
    }


    //tampil kategori di sidebar
    if (isset($_GET['k'], $_GET['i'])) {

        foreach ($kategori->get_all() as $data) {
            if ($_GET['k'] == $data['nama_kategori']) {
                $id_kategori = $_GET['i'];
                $data_menu = $menu->categorize($id_kategori);
            }
        }
    } else {
        $data_menu = $menu->get_all();
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

    if (isset($_POST['bayar'])) {
        $cart = unserialize(serialize($_SESSION['cart']));
        $total_item = 0;
        $total_bayar = 0;
        $id_kasir = $_SESSION['id'];
        for ($i = 0; $i < count($cart); $i++) {
            $total_item += $cart[$i]['pembelian'];
            $total_bayar += $cart[$i]['pembelian'] * $cart[$i]['harga'];
        }
        $store_pesanan = $pesanan->store();
        $meja->anggota($_POST['id_meja']);
        $meja->status($_POST['id_meja']);
        if ($store_pesanan) {
            $sql = "SELECT id_pesanan FROM pesanan ORDER BY id_pesanan DESC LIMIT 1";
            $query = $detail_pesanan->db->query($sql);
            $dataQuery = $query->fetch_assoc();
            for ($i = 0; $i < count($cart); $i++) {
                $id_menu = $cart[$i]['id_menu'];
                $pembelian = $cart[$i]['pembelian'];
                $id_pesanan = $dataQuery['id_pesanan'];
                $subtotal = $pembelian * $cart[$i]['harga'];
                $data_transaksi = $detail_pesanan->store($id_pesanan, $id_menu, $pembelian, $subtotal);
            }
            unset($_SESSION['cart']);
            header("location:?msg=pemesanan_berhasil");
        } else {
            header("location:?msg=pemesanan_gagal");
        }
    }

    if (isset($_GET['index'])) {
        header('Location: index.php');
    }

    //Logout
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

<style>
    .col-md-4 {
        padding-right: 4px;
    }
</style>

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
            } else if ($_GET['p'] == 'edit-meja' || $_REQUEST['p'] == 'edit-meja') {
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