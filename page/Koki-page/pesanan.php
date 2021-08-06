<div class="col-sm-12" style="margin-top:10px; margin-left: -10px;">
    <!-- start page content -->
    <div class="card shadow-md ">
        <div class="card-header text-white blue-head">
            <h3>Data Pesanan</h3>
        </div>
        <div class="card-body">
            <table id="example" class="table table-borderless">
                <thead>
                    <tr>
                        <th>ID Pesanan</th>
                        <th>Atas Nama </th>
                        <th>Nomor Meja</th>
                        <th style="width: 130px;">Lihat Detail Pesanan</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $data_pesanan = $pesanan->get_all();
                    foreach ($data_pesanan as $data) {
                    ?>
                        <tr>
                            <td><?php echo $data['id_pesanan'] ?></td>
                            <td><?php echo $data['atas_nama'] ?></td>
                            <td><?php echo $data['id_meja'] ?></td>
                            <td>
                                <a href="?id=<?php echo $data['id_pesanan'] ?>">
                                    <button class="btn btn-dark btn-block" data-toggle="modal" data-target="#exampleModalCenter">
                                        Detail Pesanan
                                    </button>
                                </a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
    <!-- Modal POPUP -->
    <div class="container">

        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">

                <div class="modal-content">

                    <div class="modal-header text-white blue-head">
                        <h4 class="modal-title" id="exampleModalLongTitle">Detail Laporan : ../../..</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">
                                <ion-icon name="close-outline" style="font-size: 34px;"></ion-icon>
                            </span>
                        </button>
                    </div>

                    <div class="modal-body">
                        <div class="row">
                            <?php
                            $id = $_GET['id'];
                            $jumlah = 0;
                            $data_detail = $detail_pesanan->view($id);
                            foreach ($data_detail as $data) {
                            ?>
                                <div class="col ml-2">
                                    <p><?php echo $data['nama_menu'] ?></p>
                                </div>
                                <div class="col">
                                    <p><?php echo $data['jumlah'] ?></p>
                                </div>
                            <?php
                                $jumlah = +$data['subtotal'];
                            }
                            ?>
                        </div><br><br>
                        <div class="row">
                            <div class="col ml-2">
                                <h5>Total Harga</h5>
                            </div>
                            <div class="col">
                                <h5><?php echo $jumlah ?></h5>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

</div>