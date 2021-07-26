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
                        <th>Tanggal Transaksi</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>test</td>
                        <td>Edinburgh</td>
                        <td>61</td>
                        <td>2021/04/25</td>
                        <td>
                            <a href="#">
                                <button class="btn btn-dark btn-block" data-toggle="modal" data-target="#exampleModalCenter">
                                    Detail
                                </button>
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>test</td>
                        <td>Tokyo</td>
                        <td>63</td>
                        <td>2021/07/25</td>
                        <td>
                            <a href="#">
                                <button class="btn btn-dark btn-block" data-toggle="modal" data-target="#exampleModalCenter">
                                    Detail
                                </button>
                            </a>
                        </td>
                    </tr>

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
                    <p class="text-right mt-auto" for="pendapatan">Total Pendapatan Per-Bulan </p>
                </div>
                <div class="col">
                    <input type="text" class="form-control ml-auto" id="pendapatan" name="pendapatan" style="width: 200px; height: 30px;" readonly>
                </div>
            </div>
        </div>
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
                        <div class="col ml-2">
                            <p>Nama Menu</p>
                            <p>Nama Menu</p>
                        </div>
                        <div class="col">
                            <p>Jumlah</p>
                            <p>Jumlah</p>
                        </div>
                    </div><br><br>
                    <div class="row">
                        <div class="col ml-2">
                            <h5>Total Harga</h5>
                        </div>
                        <div class="col">
                            <h5>Rp.999.999</h5>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

</div>