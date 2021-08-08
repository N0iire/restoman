<?php
include_once('../../model/db_config.php');
include_once('../../controller/PesananController.php');
$pesanan = new Pesanan();
if ($_POST['rowid']) {
    $id_pesanan = $_POST['rowid'];
    $data_pesanan = $pesanan->view($id_pesanan);
    foreach ($data_pesanan as $data) {
?>
        <h4 class="modal-title" id="exampleModalLongTitle">Detail Pesanan Meja : <?php echo $data['id_meja'] ?></h4>
<?php
    }
}
?>