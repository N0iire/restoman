<div class="col-md-9">

    <div class="row" style="margin-top: 10px; margin-left: -20px;">
        <!-- left card -->
        <div class="col-sm-4">
            <!-- start page content -->
            <div class="card shadow ">
                <div class="card-header text-white blue-head ">
                    <thead class="thead-dark">
                        <tr>
                            <th>
                                <center>
                                    <h3>Tambah Meja</h3>
                                </center>
                            </th>
                        </tr>
                    </thead>
                </div>
                <div class="card-body">
                    <tbody>
                        <form method="POST" enctype="multipart/form-data">
                            <div>
                                <div class="form-group">
                                    <label for="nama_menu">Id Meja</label>
                                    <input type="text" class="form-control" id="id_menu" name="id_menu" required>
                                </div>
                            </div>
                            <br><br><br><br>
                            <div>
                                <input type="submit" name="submit" value="Tambah" class="btn btn-blue">
                                <input type="submit" name="submit" value="Batal" class="btn btn-secondary ">
                            </div>
                        </form>
                    </tbody>
                </div>
            </div>
        </div>

        <!-- right card -->
        <div class="col-sm-8" style="width: 100px;">
            <!-- start page content -->
            <div class="card shadow ">
                <div class="card-header text-white blue-head ">
                    <h3>Data Meja</h3>
                </div>
                <div class="card-body">
                    <table id="example" class="table table-borderless">
                        <thead>
                            <tr>
                                <th>ID Meja</th>
                                <th>Total Pelanggan </th>
                                <th style="width:10px;">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>8 Orang</td>
                                <td>
                                    <a href="#">
                                        <button class="btn btn-blue btn-block" style="padding: 5px;">
                                            <span class="icon">
                                                <ion-icon name="create-outline" style="font-size: 25px;"></ion-icon>
                                            </span>
                                        </button>
                                    </a>
                                    <a href="#">
                                        <button class="btn btn-red btn-block" style="padding: 5px; margin-top: 5px">
                                            <span class="icon">
                                                <ion-icon name="trash-outline" style="font-size: 25px;"></ion-icon>
                                            </span>
                                        </button>
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>5 Orang</td>
                                <td>
                                    <a href="#">
                                        <button class="btn btn-blue btn-block" style="padding: 5px;">
                                            <span class="icon">
                                                <ion-icon name="create-outline" style="font-size: 25px;"></ion-icon>
                                            </span>
                                        </button>
                                    </a>
                                    <a href="#">
                                        <button class="btn btn-red btn-block" style="padding: 5px; margin-top: 5px">
                                            <span class="icon">
                                                <ion-icon name="trash-outline" style="font-size: 25px;"></ion-icon>
                                            </span>
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