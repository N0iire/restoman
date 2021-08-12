<?php
if (isset($_GET['d_backup'])) {
    $backup->destroy($_GET['d_backup']);
}
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
                                <h3>Backup</h3>
                            </center>
                        </th>
                    </tr>
                </thead>
            </div>
            <div class="card-body">
                <tbody>
                    <?php if (isset($_GET['backup'])) {
                        $edit_backup = $backup->view_backup($_GET['backup']);
                    ?>
                        <form method="POST" enctype="multipart/form-data">
                            <div>
                                <div class="form-group">
                                    <label for="id_meja">Nama Backup</label>
                                    <input type="text" class="form-control" id="id_meja" name="nama_backup" value="<?php echo $edit_backup['name'] ?>" readonly>
                                    <input type="hidden" class="form-control" id="id_meja" name="id" value="<?php echo $edit_backup['id'] ?>">
                                </div>
                            </div>
                            <br><br><br><br>
                            <div class=row>
                                <div class="col">
                                    <input type="submit" name="backup" value="Backup" class="btn btn-green btn-block">
                                </div>
                                <div class="col">
                                    <input type="submit" name="restore" value="Restore" class="btn btn-grey btn-block">
                                </div>

                            </div>
                        </form>
                    <?php } else { ?>
                        <form method="POST" enctype="multipart/form-data">
                            <div>
                                <div class="form-group">
                                    <label for="id_meja">Nama Backup</label>
                                    <input type="text" class="form-control" id="id_meja" name="id_meja" value="<?php  ?>" readonly>
                                </div>
                            </div>
                            <br><br><br><br>
                            <div class=row>
                                <div class="col">
                                    <input type="submit" name="backup" value="Backup" class="btn btn-green btn-block">
                                </div>
                                <div class="col">
                                    <input type="button" name="Batal" value="Restore" class="btn btn-grey btn-block" onclick="location.href='?p=';" />
                                </div>

                            </div>
                        </form>
                    <?php } ?>
                </tbody>
            </div>
        </div>
    </div>

    <!-- right card -->
    <div class="col-sm-8" style="width: 100px;">
        <!-- start page content -->
        <div class="card shadow ">
            <div class="card-header text-white blue-head ">
                <h3>Data Backup</h3>
            </div>
            <div class="card-body">
                <table id="example" class="table table-borderless">
                    <thead>
                        <tr>
                            <th>ID Backup</th>
                            <th>Nama Backup </th>
                            <th style="width:10px;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <?php
                            $data_backup = $backup->get_backup();
                            foreach ($data_backup as $data) {
                            ?>
                                <td><?php echo $data['id'] ?></td>
                                <td><?php echo $data['name'] ?></td>
                                <td>
                                    <a href="?p=backuprestore&backup=<?php echo $data['id'] ?>">
                                        <button class="btn btn-grey btn-block">
                                            Pilih
                                        </button>
                                    </a>
                                    <a href="?p=backuprestore&d_backup=<?php echo $data['id'] ?>" onclick="konfirmasi(event)">
                                        <button class="btn btn-red btn-block" style="padding: 5px; margin-top: 5px">
                                            <span class="icon">
                                                <ion-icon name="trash-outline" style="font-size: 25px;"></ion-icon>
                                            </span>
                                        </button>
                                    </a>
                                </td>
                        </tr>
                    <?php
                            }
                    ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>