<?php


if ($_POST['rowid']) {
    $id = $_POST['rowid'];
    $jumlah = 0;
    $data_detail = $detail_pesanan->view($id);
    foreach ($data_detail as $data) {
?>
        <div class="row">
            <div class="col ml-2">
                <p><?php echo $data['nama_menu'] ?></p>
            </div>
            <div class="col">
                <p><?php echo $data['jumlah'] ?></p>
            </div>
        </div>
    <?php
        $jumlah = +$data['sub_total'];
    }
    ?>
    <br><br>
    <div class="row">
        <div class="col ml-2">
            <h5>Total Harga</h5>
        </div>
        <div class="col">
            <h5><?php echo $jumlah ?></h5>
        </div>
    </div>
<?php

}
