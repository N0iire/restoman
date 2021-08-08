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
                        if ($data['status_pembayaran'] == "N") {
                    ?>
                            <tr>
                                <td><?php echo $data['id_pesanan'] ?></td>
                                <td><?php echo $data['atas_nama'] ?></td>
                                <td><?php echo $data['id_meja'] ?></td>
                                <td>
                                    <a href="#myModal">
                                        <button class="btn btn-dark btn-block" data-toggle="modal" id="custId" data-id="<?php echo $data['id_pesanan'] ?>" data-target="#myModal">
                                            Detail Pesanan
                                        </button>
                                    </a>
                                </td>
                            </tr>
                    <?php }
                    } ?>
                </tbody>
            </table>
        </div>
    </div>

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
</div>
<script>

</script>