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
                                <h3>Tambah Kategori</h3>
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
                                <input type="text" class="form-control" id="id_menu" name="id_kategori" required>
                            </div>
                            <div class="form-group">
                                <label for="nama_menu">Nama Kategori</label>
                                <input type="text" class="form-control" id="id_menu" name="nama_kategori" required>
                            </div>
                        </div>
                        <br><br><br>
                        <div>
                            <input type="submit" name="tambah_kategori" value="Tambah" class="btn btn-blue">
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
                <h3>Data Kategori</h3>
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
                        <?php
                        $data_kategori = $kategori->get_all();
                        foreach ($data_kategori as $data) {
                        ?>
                            <tr>
                                <?php
                                $encrypt->word = $data['id_kategori'];
                                $id = $encrypt->encr();
                                ?>
                                <td><?php echo $data['id_kategori'] ?></td>
                                <td><?php echo $data['nama_kategori'] ?></td>
                                <td>
                                    <a href="?p=edit-kategori&e=<?php echo $id ?>">
                                        <button class="btn btn-blue btn-block" style="padding: 5px;">
                                            <span class="icon">
                                                <ion-icon name="create-outline" style="font-size: 25px;"></ion-icon>
                                            </span>
                                        </button>
                                    </a>
                                    <a href="?d_kategori=<?php echo $id ?>">
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