<div class="row" style="margin-top: 10px; margin-left: -20px;">
    <!-- left card -->
    <div class="col-sm-4">
        <!-- start page content -->
        <div class="card shadow ">
            <div class="card-header text-white bg-primary ">
                <thead class="thead-dark">
                    <tr>
                        <th>
                            <center>
                                <h3>Form Pegawai</h3>
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
                                <label for="nama_menu">Id Pegawai</label>
                                <input type="text" class="form-control" id="id_menu" name="id_menu" required>
                            </div>
                            <div class="form-group">
                                <label for="nama_menu">Nama </label>
                                <input type="text" class="form-control" id="nama_menu" name="nama_menu" required>
                            </div>
                            <div class="form-group">
                                <label for="comment">Password </label>
                                <textarea name="deskripsi" class="form-control" rows="5" id="comment" style="height: 50px;"></textarea>
                            </div>
                        </div>
                        Kategori
                        <select name="kategori" style="margin-top: 10px;" class=" custom-select" required>
                            <option value="">Pilih Pegawai</option>
                        </select>
                        <br><br><br>
                        <div>
                            <input type="submit" name="submit" value="Tambah" class="btn btn-primary">
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
            <div class="card-header text-white bg-primary ">
                <h3>Data Pegawai</h3>
            </div>
            <div class="card-body">
                <table id="example" class="table table-borderless">
                    <thead>
                        <tr>
                            <th>ID Pegawai</th>
                            <th>Nama </th>
                            <th>Password </th>
                            <th>Kategori </th>
                            <th>Aksi</th>
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
                                    <button class="btn btn-success btn-block">
                                        Edit
                                    </button>
                                </a>
                                <a href="#">
                                    <button class="btn btn-danger btn-block">
                                        Hapus
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
                                    <button class="btn btn-success btn-block">
                                        Edit
                                    </button>
                                </a>
                                <a href="#">
                                    <button class="btn btn-danger btn-block">
                                        Hapus
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