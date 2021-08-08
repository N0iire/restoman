<?php
include_once('../../model/db_config.php');
include_once('../../controller/PembayaranController.php');
$pembayaran = new Pembayaran();
if ($_POST['rowid']) {
    $id_pesanan = $_POST['rowid'];
    $data_pembayaran = $pembayaran->view($id_pesanan);
    foreach ($data_pembayaran as $data) {
?>
        <h4 class="modal-title" id="exampleModalLongTitle">Detail Laporan : <?php echo $data['tgl'] ?>/ <?php echo $data['bln'] ?>/ <?php echo $data['thn'] ?></h4>
<?php
    }
}
