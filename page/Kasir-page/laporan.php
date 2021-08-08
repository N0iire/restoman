<div class="col-sm-12" style="margin-top:10px; margin-left: -10px;">
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
                        <th style="width: 130px;">Lihat Detail Pesanan</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $data_pembayaran = $pembayaran->get_all_bayar();
                    $pendapatan = 0;
                    foreach ($data_pembayaran as $data) {
                    ?>
                        <tr>
                            <td><?php echo $data['id_pesanan'] ?></td>
                            <td><?php echo $data['atas_nama'] ?></td>
                            <td><?php echo $data['id_meja'] ?></td>
                            <td><?php echo $data['total_transaksi'] ?></td>
                            <td>
                                <a href="#myModal">
                                    <button class="btn btn-dark btn-block" data-toggle="modal" id="custId" data-id="<?php echo $data['id_pesanan'] ?>" data-target="#myModal">
                                        Detail
                                    </button>
                                </a>
                            </td>
                        </tr>
                    <?php
                        $pendapatan = $pendapatan + $data['total_transaksi'];
                    } ?>
                </tbody>
            </table>
            <br><br>
            <div class="row">
                <div class="col">
                    <a href="#">
                        <button class="btn btn-outline-secondary btn-sm">
                            Cetak Laporan
                        </button>
                    </a>
                </div>
                <div class="col">
                    <p class="text-right mt-auto" style="margin-right: -130px;" for="pendapatan">Total Pendapatan :</p>
                </div>
                <div class="col">
                    <input type="text" value="<?php echo $pendapatan ?>" class="form-control ml-auto" id="pendapatan" name="pendapatan" style="width: 200px; height: 30px;" readonly>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal POPUP -->
<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">

            <div class="modal-header text-white blue-head">
                <div class="title-data">
                </div>

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">
                        <ion-icon name="close-outline" style="font-size: 34px;"></ion-icon>
                    </span>
                </button>
            </div>

            <div class="modal-body">
                <div class="fetched-data"></div>
            </div>

        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('#myModal').on('show.bs.modal', function(e) {
            let id_pesanan = $(e.relatedTarget).attr("data-id");
            //menggunakan fungsi ajax untuk pengambilan data
            $.ajax({
                type: 'post',
                url: 'detail.php',
                data: {
                    rowid: id_pesanan
                },
                success: function(data) {

                    $('.fetched-data').html(data); //menampilkan data ke dalam modal
                }
            });
            $.ajax({
                type: 'post',
                url: 'modaltitle.php',
                data: {
                    rowid: id_pesanan
                },
                success: function(data) {

                    $('.title-data').html(data); //menampilkan data ke dalam modal
                }
            });
        });
    });
</script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>