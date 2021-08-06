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
                                    <h3>Form Edit Meja</h3>
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
                                    <label for="id_meja">Id Meja</label>
                                    <input type="text" class="form-control" id="id_meja" name="id_meja" required>
                                </div>
                            </div>
                            <br><br><br><br>
                            <div>
                                <input type="submit" name="tambah_meja" value="Ubah" class="btn btn-blue">
                                <input type="reset" name="Batal" value="Batal" class="btn btn-secondary ">
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
                    <h3>Edit Data Meja</h3>
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
                                <?php
                                $data_meja = $meja->get_all();
                                $i = 1;
                                foreach ($data_meja as $data) {
                                ?>
                                    <td><?php echo $data['id_meja'] ?></td>
                                    <td><?php echo $data['total_pelanggan'] ?></td>
                                    <td>
                                        <?php
                                        $encrypt->word = $data['id_meja'];
                                        $id = $encrypt->encr();
                                        ?>
                                        <a href="?p=edit-meja&e=<?php echo $id ?>">
                                        <button class="btn btn-dark btn-block" data-toggle="modal" data-target="#exampleModalCenter">
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
</div>