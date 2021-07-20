<!-- header -->
<?php include '../../header.php' ?>

<body>
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
                    <div class="col-sm-12" style="margin-top:40px; margin-left: -30px;">
                        <!-- start page content -->
                        <div class="card shadow ">
                            <div class="card-header text-white bg-primary">
                                <h3>Data Menu</h3>
                            </div>

                            <div class="card-body">
                                <table id="example" class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>Gambar</th>
                                            <th>ID Menu </th>
                                            <th>Nama Menu</th>
                                            <th>Kategori Menu</th>
                                            <th>Konfirmasi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Tiger Nixon</td>
                                            <td>System Architect</td>
                                            <td>Edinburgh</td>
                                            <td>61</td>
                                            <td>
                                                <a href="#">
                                                    <button class="btn btn-danger ">
                                                        Tolak
                                                    </button>
                                                </a>
                                                <a href="#">
                                                    <button class="btn btn-success">
                                                        Terima
                                                    </button>
                                                </a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Garrett Winters</td>
                                            <td>Accountant</td>
                                            <td>Tokyo</td>
                                            <td>63</td>
                                            <td>
                                                <a href="#">
                                                    <button class="btn btn-danger ">
                                                        Tolak
                                                    </button>
                                                </a>
                                                <a href="#">
                                                    <button class="btn btn-success">
                                                        Terima
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