<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>


    <?php
    include_once('../../model/db_config.php');
    include_once('../../controller/DetailPesananController.php');
    $detail_pesanan = new Detail_pesanan();

    $id_pesanan = 1;
    $jumlah = 0;
    $data_detail = $detail_pesanan->view($id_pesanan);


    foreach ($data_detail as $data) {
    ?>
        <div class="row">
            <div class="col ml-2">
                <p><?php echo $data['nama_menu'] ?></p>
                tets
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
    ?>
</body>

</html>