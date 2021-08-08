<div class="row">
    <!-- cart left -->
    <div class="col-md-3" style="position: fixed; margin-top:10px; ">
        <div class="card cart" style="border-radius: 15px;">
            <div class="card-header cart blue-head text-white pl-2 p-1" style="height: 90px;">
                <h3 style="margin-top: 15px;">Checkout</h3>
            </div>
            <?php
            if (isset($_GET['i'])) {
                $total = 0;
                $id = $_GET['i'];
                $data_checkout = $detail_pesanan->detail($id);
            ?>
                <div class="card-body">
                    <div class="row">
                        <?php
                        $total = 0;
                        foreach ($data_checkout as $data) {
                        ?>
                            <div class="col-md-1" style="padding-top:5px; margin-right:5px;">
                                <a href=""><i class="bi bi-trash align-self-center" style="font-size:1.5rem;  color:red !important;"></i></a>
                            </div>
                            <div class="col-md-6">
                                <span><b><?php echo $data['nama_menu'] ?></b></span><br>
                                <small>
                                    <?php echo $data['harga_menu'] ?>
                                </small>
                            </div>
                            <div class="col-md-4">
                                <input class="form-control float-right" style="width: 60px; height:37px; margin-top:7px; text-align: center;" value="<?php echo $data['jumlah'] ?>" type="number" name="jumlah" min="1" max="" readonly>
                            </div>
                        <?php
                            $atas_nama = $data['atas_nama'];
                            $jml_pl = $data['jml_pelanggan'];
                            $id_meja = $data['id_meja'];
                            $total = $total + $data['sub_total'];
                        }
                        ?>
                    </div>

                </div>
                <div class="card-footer">
                    <div class="row mb-1">
                        <div class="col-md-12 pull-left" style="margin-left: 30px;">
                            <span>Atas Nama : <?php echo $atas_nama ?></span>
                        </div>

                    </div>
                    <div class="row mb-1">
                        <div class="col-md-5 float-left">
                            <small>Total <br>Pelanggan </small>

                        </div>
                        <div class="col-md-2" style="margin-top:10px; margin-left: -40px;">
                            <small>: <?php echo $jml_pl ?></small>
                        </div>
                        <div class="col-sm-5 float-right" style="margin-left: 40px; margin-top:10px;">
                            <span>Meja : <?php echo $id_meja ?></span>
                        </div>
                    </div>
                    <form action="" method="POST">
                        <div class="row mb-1">
                            <!-- baris total -->
                            <div class="col-md-6 float-left mb-2">
                                <h4>Total : </h4>
                            </div>
                            <div class="col-md-1 text-center">
                                <label>Rp.</label>
                            </div>
                            <div class=" col-md-5 text-right" style="margin-top: -10px;">
                                <input type="number" class="form-control" name="total_transaksi" id="total" value="<?php echo $total ?>" readonly="true">
                            </div>

                            <!-- baris bayar -->
                            <div class="col-md-6 float-left mb-2">
                                <h4>Bayar :</h4>
                            </div>
                            <div class="col-md-1 text-center">
                                <label>Rp.</label>
                            </div>
                            <div class=" col-md-5 text-right" style="margin-top: -10px;">
                                <input type="number" class="form-control" value="" name="bayar" id="bayar" oninput="hitungKembali()" required>
                            </div>

                            <!-- baris kembali -->
                            <div class="col-md-6 float-left">
                                <h4>Kembali : </h4>
                            </div>
                            <div class="col-md-1 text-center">
                                <label>Rp.</label>
                            </div>
                            <div class=" col-md-5 text-right" style="margin-top: -10px;">
                                <input type="number" value="" class="form-control" name="kembalian" id="kembali" disabled required>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <input type="hidden" name="id_pesanan" value="<?php echo $id ?>">
                                <input type="hidden" name="id_pegawai" value="<?php echo $_SESSION['id'] ?>">
                                <input type="hidden" name="id_meja" value="<?php echo $id_meja ?>">
                                <input type="submit" value="Bayar" name="bayar" onclick="inputcart();" class="btn btn-red btn-block">
                            </div>
                        </div>
                    </form>
                    <script>
                        function hitungKembali() {
                            var x = document.getElementById("bayar").value;
                            var y = document.getElementById("total").value;
                            document.getElementById("kembali").value = x - y;
                        }
                    </script>
                </div>
            <?php
            } else { ?>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-1" style="padding-top:5px; margin-right:5px;">

                        </div>
                        <div class="col-md-6">

                        </div>
                        <div class="col-md-4">

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
            <?php
            } ?>
        </div>
    </div>
    <!-- tables right -->
    <div class="col-md-8" style="margin-top:10px; margin-left:33%;">
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
                            <th>ID Meja</th>
                            <th>Total Transaksi</th>
                            <th style="width: 100px;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <?php
                            $data_pesanan = $pesanan->get_pesanan();
                            $i = 1;
                            $jumlah = 0;
                            foreach ($data_pesanan as $data) {
                            ?>
                                <td><?php echo $data['id_pesanan'] ?></td>
                                <td><?php echo $data['atas_nama'] ?></td>
                                <td><?php echo $data['id_meja'] ?></td>
                                <td><?php echo $data['total'] ?></td>
                                <td>
                                    <a href="index.php?i=<?php echo $data['id_pesanan'] ?>">
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