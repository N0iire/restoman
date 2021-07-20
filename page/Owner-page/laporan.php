<!-- header -->
<?php include '../../header.php' ?>

<body style="background: #fff;">
    <div class="row">
        <div class="col-sm-12">
            <!-- navbar -->
            <header>
                <?php include '../../component/navbar.php' ?>

            </header>
        </div>
        <div class="row" style="margin-top: 90px;">
            <div class="col-sm-3">
                <!-- sidebar -->
                <aside>
                    <?php include '../../component/sidebar_owner.php' ?>
                </aside>
            </div>

            <div class="col-sm-9">

                <div class="row">
                    <div class="col-sm-12" style="margin-top:10px; margin-left: -10px;">
                        <!-- start page content -->
                        <div class="card shadow ">
                            <div class="card-header text-white bg-primary">
                                <h3>Data Laporan</h3>
                            </div>

                            <div class="card-body">
                                <table id="example" class="table table-bordered table-hover">
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
                                            <td>Tiger Nixon</td>
                                            <td>System Architect</td>
                                            <td>Edinburgh</td>
                                            <td>61</td>
                                            <td>2011/04/25</td>
                                            <td>
                                                <a href="#">
                                                    <button class="btn btn-dark btn-block">
                                                        Detail
                                                    </button>
                                                </a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Garrett Winters</td>
                                            <td>Accountant</td>
                                            <td>Tokyo</td>
                                            <td>63</td>
                                            <td>2011/07/25</td>
                                            <td>
                                                <a href="#">
                                                    <button class="btn btn-dark btn-block">
                                                        Detail
                                                    </button>
                                                </a>
                                            </td>
                                        </tr>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </div>

        <!-- end body -->
        <?php include '../../footer.php' ?>