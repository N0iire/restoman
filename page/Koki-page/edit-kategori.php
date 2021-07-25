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
                                <h3>Form Edit Kategori</h3>
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
                                <label for="nama_menu">ID Kategori</label>
                                <input type="text" class="form-control" id="id_menu" name="id_menu" required>
                            </div>
                        </div>
                        <br><br><br>
                        <div>
                            <input type="submit" name="submit" value="Ubah" class="btn btn-blue">
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
                <h3>Edit Data Kategori</h3>
            </div>
            <div class="card-body">
                <table id="example" class="table table-borderless">
                    <thead>
                        <tr>
                            <th>ID Kategori</th>
                            <th>Nama Kategori</th>
                            <th style="width:10px;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>tes</td>
                            <td>
                            <a href="#">
                                <button class="btn btn-dark btn-block">
                                    Pilih
                                </button>
                            </a>
                            </td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>tes</td>
                            <td>
                            <a href="#">
                                <button class="btn btn-dark btn-block">
                                    Pilih
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