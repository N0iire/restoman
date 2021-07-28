<div class="row">

    <!-- cart left -->
    <div class="col-md-3" style="position: fixed; margin-top:10px; ">
        <div class="card cart" style="border-radius: 15px;">
            <div class="card-header cart blue-head text-white pl-2 p-1" style="height: 90px;">
                <h3 style="margin-top: 15px;">Checkout</h3>

            </div>
            <div class="card-body">


                <div class="row">
                    <div class="col-md-1" style="padding-top:5px; margin-right:5px;">
                        <a href=""><i class="bi bi-trash align-self-center" style="font-size:1.5rem;  color:red !important;"></i></a>
                    </div>
                    <div class="col-md-6">
                        <span><b>ayam bakar</b></span><br>
                        <small>Rp. 26.000</small>
                    </div>
                    <div class="col-md-4">
                        <input class="form-control float-right" style="width: 60px; height:37px; margin-top:7px; text-align: center;" value="1" type="number" name="jumlah" min="1" max="">
                    </div>
                </div>

            </div>
            <div class="card-footer">
                <div class="row mb-1">
                    <div class="col-md-12 pull-left" style="margin-left: 30px;">
                        <span>Atas Nama :</span>
                    </div>

                </div>
                <div class="row mb-1">
                    <div class="col-md-5 float-left">
                        <small>Total <br>Pelanggan </small>

                    </div>
                    <div class="col-md-2" style="margin-top:10px; margin-left: -40px;">
                        <small>: </small>
                    </div>
                    <div class="col-sm-5 float-right" style="margin-left: 40px; margin-top:10px;">
                        <span>Meja :</span>
                    </div>
                </div>
                <div class="row mb-1">
                    <div class="col-md-6 float-left">
                        <h4>Total :</h4>
                    </div>
                    <div class=" col-md-6 text-right">
                        Rp. 0
                    </div>
                    <div class="col-md-6 float-left">
                        <h4>Bayar :</h4>
                    </div>
                    <div class=" col-md-6 text-right">
                        Rp. 0
                    </div>
                    <div class="col-md-6 float-left">
                        <h4>Kembali :</h4>
                    </div>
                    <div class=" col-md-6 text-right">
                        Rp. 0
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <input type="submit" value="Bayar" name="bayar" onclick="inputcart();" class="btn btn-red btn-block">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- tables right -->
    <div class="col-md-8" style="margin-top:10px; margin-left:33%;">
        <!-- start page content -->
        <div class="card shadow-md ">
            <div class="card-header text-white blue-head">
                <h3>Data Laporan</h3>
            </div>

            <div class="card-body">
                <table id="example" class="table table-borderless">
                    <thead>
                        <tr>
                            <th>ID Pesanan</th>
                            <th>Atas Nama </th>
                            <th>ID Meja</th>
                            <th>Total Transaksi</th>
                            <th style="width: 100px;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <?php
                                $data_bayar = $pembayaran->get_all_bayar();
                                $i = 1;
                                foreach ($data_bayar as $data) {
                                ?>
                                    <td><?php echo $data['id_pesanan'] ?></td>
                                    <td><?php echo $data['atas_nama'] ?></td>
                                    <td><?php echo $data['id_meja'] ?></td>
                                    <td><?php echo $data['total_transaksi']?></td>
                                    <td>
                                        <a href="index.php<?php echo $id?>">
                                            <button class="btn btn-blue btn-block">
                                                Pilih
                                            </button>
                                        </a>
                                    </td>
                        </tr>
                            <?php
                                $i++;
                                }
                                ?> 
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>