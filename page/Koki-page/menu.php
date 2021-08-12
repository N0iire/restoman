<?php
$data_kategori = $kategori->get_all();
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
                                <h3>Form Menu</h3>
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
                                <label for="nama_menu">ID Menu</label>
                                <input type="text" class="form-control" id="id_menu" name="id_menu" required>
                            </div>
                        </div>
                        ID Kategori
                        <select name="id_kategori" style="margin-top: 10px;" class=" custom-select" required>
                            <option value="">Pilih Kategori</option>
                            <?php
                            foreach ($data_kategori as $data_k) { ?>
                                <option value="<?php echo $data_k['id_kategori'] ?>"><?php echo $data_k['nama_kategori'] ?></option>
                            <?php
                            }
                            ?>
                        </select><br><br>
                        <div>
                            <div class="form-group">
                                <label for="nama_menu">Nama Menu</label>
                                <input type="text" class="form-control" id="id_menu" name="nama_menu" required>
                            </div>
                            <div class="form-group">
                                <label for="nama_menu">Harga Menu</label>
                                <input type="text" class="form-control" id="nama_menu" name="harga" required>
                            </div>
                            <div class="form-group">
                                <label for="nama_menu">Stok</label>
                                <input type="text" class="form-control" id="nama_menu" name="stok" required>
                            </div>
                            <input type="file" id="myFile" name="gambar">
                            <input type="hidden" name="id_pegawai" value="<?php echo $_SESSION['id'] ?>">
                        </div>
                        <br><br><br>
                        <div>
                            <input type="submit" name="tambah_menu" value="Tambah" class="btn btn-green">
                            <input type="reset" name="reset" value="Reset" class="btn btn-secondary ">
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
                <h3>Data Menu</h3>
            </div>
            <div class="card-body">
                <table id="example" class="table table-borderless table-responsive">
                    <thead>
                        <tr>
                            <th>Gambar</th>
                            <th>ID Menu</th>
                            <th>Kategori</th>
                            <th>Nama Menu</th>
                            <th>harga Menu</th>
                            <th>Stok</th>
                            <th style="width:10px;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $data_menu = $menu->get_all();
                        foreach ($data_menu as $data) {
                        ?>
                            <tr>
                                <td><img src="../../assets/images/<?php echo $data['gambar'] ?>" alt="" style="height: 75px; width: 80px; border-radius: 10px;"></td>
                                <td><?php echo $data['id_menu'] ?></td>
                                <td><?php echo $data['nama_kategori'] ?></td>
                                <td><?php echo $data['nama_menu'] ?></td>
                                <td><?php echo $data['harga_menu'] ?></td>
                                <td><?php echo $data['stok'] ?></td>
                                <td>
                                    <?php
                                    $encrypt->word = $data['id_menu'];
                                    $id = $encrypt->encr();
                                    ?>
                                    <a href="?p=edit-menu&e=<?php echo $id ?>">
                                        <button class="btn btn-blue btn-block" style="padding: 5px;">
                                            <span class="icon">
                                                <ion-icon name="create-outline" style="font-size: 25px;"></ion-icon>
                                            </span>
                                        </button>
                                    </a>

                                    <a href="?d_menu=<?php echo $id ?>" onclick="konfirmasi(event);">
                                        <button class="btn btn-red btn-block" style="padding: 5px; margin-top: 5px">
                                            <span class="icon">
                                                <ion-icon name="trash-outline" style="font-size: 25px;"></ion-icon>
                                            </span>
                                        </button>
                                    </a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>

    </div>
</div>