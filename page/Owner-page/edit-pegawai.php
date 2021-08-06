<?php
$data_edit = $user->view($id_for_edit);
?>
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
                                <h3>Form Edit Pegawai</h3>
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
                                <input type="text" class="form-control" id="id_menu" name="id_pegawai" value="<?php echo $data_edit['id_pegawai'] ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="nama_menu">Nama </label>
                                <input type="text" class="form-control" id="nama_menu" name="nama_pegawai" value="<?php echo $data_edit['nama_pegawai'] ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="comment">Password </label>
                                <?php
                                $user->word = $data_edit['password'];
                                $password = $user->decr();
                                ?>
                                <input type="password" name="password" class="form-control" rows="5" value="<?php echo $password; ?>" style="height: 50px;" required>
                            </div>
                        </div>
                        Kategori
                        <select name="kategori" style="margin-top: 10px;" class=" custom-select" required>
                            <option value="">Pilih Kategori</option>
                            <option value="Owner">Owner</option>
                            <option value="Pelayan">Pelayan</option>
                            <option value="Koki">Koki</option>
                            <option value="Kasir">Kasir</option>
                        </select>
                        <br><br><br>
                        <div>
                            <input type="submit" name="edit" value="Edit" class="btn btn-blue">
                            <input type="button" name="Batal" value="Batal" class="btn btn-secondary " onclick="location.href='?p=pegawai';">
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
                <h3>Edit Data Pegawai</h3>
            </div>
            <div class="card-body">
                <table id="example" class="table table-borderless">
                    <thead>
                        <tr>
                            <th>ID Pegawai</th>
                            <th>Nama </th>
                            <th>Password </th>
                            <th>Kategori </th>
                            <th style="width:10px;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <?php
                            $data_pegawai = $user->get_all();
                            $i = 1;
                            foreach ($data_pegawai as $data) {
                            ?>
                                <td><?php echo $data['id_pegawai'] ?></td>
                                <td><?php echo $data['nama_pegawai'] ?></td>
                                <td>
                                    <?php
                                    $user->word = $data['password'];
                                    echo $user->decr();
                                    ?>
                                </td>
                                <td><?php echo $data['kategori_pegawai'] ?></td>
                                <td>
                                    <?php
                                    $user->word = $data['id_pegawai'];
                                    $id = $user->encr();
                                    ?>
                                    <a href="?p=edit-pegawai&e=<?php echo $id ?>">
                                        <button class="btn btn-blue btn-block" style="padding: 5px;">
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