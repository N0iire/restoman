<div class="row">
    <div class="col-sm-12" style="margin-top:10px; margin-left: -10px;">
        <!-- start page content -->
        <div class="card shadow ">
            <div class="card-header text-white blue-head">
                <h3>Data Menu</h3>
            </div>

            <div class="card-body">
                <table id="example" class="table table-borderless">
                    <thead>
                        <tr>
                            <th style="width: 100px;">Gambar</th>
                            <th>ID Menu </th>
                            <th>Nama Menu</th>
                            <th>Kategori Menu</th>
                            <th style="width: 150px;">Konfirmasi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $data_menu = $menu->get_all();
                        foreach ($data_menu as $data) {
                            if ($data['status'] == "N") {
                        ?>
                                <tr>
                                    <td><img src="../../assets/images/<?php echo $data['gambar'] ?>" alt="" style="height: 100px; width: 100px; border-radius: 15px;"></td>
                                    <td><?php echo $data['id_menu'] ?></td>
                                    <td><?php echo $data['nama_menu'] ?></td>
                                    <td><?php echo $data['nama_kategori'] ?></td>
                                    <td>
                                        <?php
                                        $user->word = $data['id_menu'];
                                        $id = $user->encr();
                                        ?>
                                        <a href="?unacc=<?php echo $id ?>" onclick="m10(event)">
                                            <button class="btn btn-red" style="margin-left: 15px; margin-right: 10px;">
                                                <span class="icon">
                                                    <ion-icon name="close-circle-outline" style="font-size: 30px;"></ion-icon>
                                                </span>
                                            </button>
                                        </a>
                                        <a href="?acc=<?php echo $id ?>">
                                            <button class="btn btn-blue" onclick="m09(event)">
                                                <span class="icon">
                                                    <ion-icon name="checkmark-circle-outline" style="font-size: 30px;"></ion-icon>
                                                </span>
                                            </button>
                                        </a>
                                    </td>
                                </tr>
                        <?php }
                        } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>