<?php
if (isset($_POST['tambah'])) {
    $id_menu = $_POST['id_menu'];
    $pembelian = $_POST['pembelian'];
    $data_menu = $menu->view($id_menu);

    if (!isset($_SESSION['cart'])) $_SESSION['cart'] = [];

    $index = -1;
    $cart = unserialize(serialize($_SESSION['cart']));

    // jika produk sudah ada dalam cart maka pembelian akan diupdate
    for ($i = 0; $i < count($cart); $i++) {
        if ($cart[$i]['id_menu'] == $id_menu) {
            $index = $i;
            $_SESSION['cart'][$i]['pembelian'] += $pembelian;
            break;
        }
    }

    // jika produk belum ada dalam cart
    if ($index == -1) {
        $_SESSION['cart'][] = [
            'id_menu' => $id_menu,
            'nama_menu' => $data_menu['nama_menu'],
            'harga' => $data_menu['harga_menu'],
            'pembelian' => $pembelian
        ];
    }
}
if (isset($_SESSION['cart'])) {
    $cart = unserialize(serialize($_SESSION['cart']));
    $index = 0;
    $no = 1;
    $total = 0;
    $total_bayar = 0;
}
?>
<div class="col-lg-8">
    <div class="row">
        <div class="col-md-9">
            <div class="row pt-1">
                <?php
                $data_m = $menu->get_all();
                foreach ($data_m as $data) {
                    if ($data['status'] == "Y") {
                ?>
                        <div class="col-md-4 mb-1 ">
                            <div class="container ">
                                <div class="harga"><?php echo $data['harga_menu'] ?></div>
                                <div class="menu"><?php echo $data['nama_menu'] ?></div>
                                <img src="../../assets/images/<?php echo $data['gambar'] ?>" alt="ayam bakar" class="image shadow-dreamy">
                                <form method="POST">
                                    <div class="overlay">
                                        <input type="hidden" type="number" name="pembelian" value="1" min="1">
                                        <input type="hidden" value="<?php echo $data['id_menu'] ?>" name="id_menu">
                                        <input type="submit" class="btn-grad shadow" name="tambah" value="Tambah">
                                    </div>
                                </form>
                            </div>
                        </div>
                <?php
                    }
                } ?>

                <!-- CART  -->

                <?php
                if (!empty($_SESSION['cart'])) {

                ?>
                    <div class="col-md-3" style="position: fixed; margin-left:50%;">
                        <div class="card cart" style="border-radius: 15px;">
                            <div class="card-header cart blue-head text-white pl-2 p-1" style="height: 90px;;">
                                <h4>Pesan Baru</h4>
                                <small><?php echo count($cart); ?> pesanan dalam keranjang </small>
                            </div>
                            <div class="card-body">
                                <?php
                                for ($i = 0; $i < count($cart); $i++) {
                                    $total = $_SESSION['cart'][$i]['harga'] * $_SESSION['cart'][$i]['pembelian'];
                                    $total_bayar += $total;
                                ?>
                                    <div class="row">
                                        <div class="col-md-1" style="padding-top:5px; margin-right:5px;">
                                            <a href="?index=<?= $index; ?>"><i class=" bi bi-trash align-self-center" style="font-size:1.5rem;  color:red !important;"></i></a>
                                        </div>
                                        <div class="col-md-6">
                                            <span><b><?php echo $cart[$i]['nama_menu'] ?></b></span><br>
                                            <small>Rp. <?php echo $cart[$i]['harga'] ?></small>
                                        </div>
                                        <div class="col-md-4">
                                            <input class="form-control float-right" style="width: 65px; height: 42px; text-align: center;" value="<?php echo $cart[$i]['pembelian']; ?>" type="number" name="jumlah" min="1" max="<?php echo $cart[$i]['pembelian']; ?>">
                                        </div>
                                    </div>
                                <?php $index++;
                                }
                                // hapus produk dalam cart
                                if (isset($_GET['index'])) {
                                    $cart = unserialize(serialize($_SESSION['cart']));
                                    unset($cart[$_GET['index']]);
                                    $cart = array_values($cart);
                                    $_SESSION['cart'] = $cart;
                                }
                                ?>
                            </div>
                            <div class="card-footer">
                                <form action="" method="POST">
                                    <div class="row mb-1">
                                        <div class="col-md-12 pull-left">
                                            <input class="form-control" type="text" name="pembeli" placeholder="Atasnama Pembeli">
                                        </div>
                                    </div>
                                    <div class="row mb-1">
                                        <div class="col-md-4 float-left">
                                            <small>Total <br>Pelanggan</small>
                                        </div>
                                        <div class="col-sm-3" style="margin-right: 10px;">
                                            <input class="form-control" style="width: 70px; height:37px;" type="number" name="jumlah_pelanggan" required>
                                        </div>


                                        <div class=" col-sm-2 pull-left">
                                            <select name="id_meja" class="form-select" style=" width: 87px; padding-right: 7px;" aria-label="Default select example" required>
                                                <option value="">Meja</option>
                                                <?php
                                                $data_meja = $meja->get_all();
                                                foreach ($data_meja as $data) {
                                                ?>
                                                    <option value="<?php echo $data['id_meja'] ?>"><?php echo $data['id_meja'] ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row mb-1">
                                        <div class="col-md-6 float-left">
                                            <h4>Total :</h4>
                                        </div>
                                        <div class=" col-md-6 text-right">
                                            Rp. <?php echo $total_bayar; ?>
                                        </div>
                                    </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <input type="submit" value="Pesan" name="bayar" class="btn btn-red btn-block">
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>

            </div>
        <?php
                } else {
        ?>

            <div class="col-md-3" style="position: fixed; margin-left:50%;">
                <div class="card cart" style="border-radius: 15px;">
                    <div class="card-header cart blue-head text-white pl-2 p-1" style="height: 90px;;">
                        <h4>Pesan Baru</h4>
                        <small> 0 pesanan dalam keranjang </small>
                    </div>
                    <div class="card-footer">
                        <div class="row mb-1">
                            <div class="col-md-12 pull-left">
                                <input class="form-control" type="text" name="pembeli" placeholder="Atasnama Pembeli">
                            </div>

                        </div>
                        <div class="row mb-1">
                            <div class="col-md-4 float-left">
                                <small>Total <br>Pelanggan</small>
                            </div>
                            <div class="col-sm-3" style="margin-right: 10px;">
                                <input class="form-control" style="width: 70px; height:37px;" type="number" name="pembeli">
                            </div>


                            <div class=" col-sm-2 pull-left">
                                <select class="form-select" style=" width: 87px; padding-right: 7px;" aria-label="Default select example" required>
                                    <option value="">Meja</option>
                                    <?php
                                    $data_meja = $meja->get_all();
                                    foreach ($data_meja as $data) {
                                    ?>
                                        <option value="<?php echo $data['id_meja'] ?>"><?php echo $data['id_meja'] ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="row mb-1">
                            <div class="col-md-6 float-left">
                                <h4>Total :</h4>
                            </div>
                            <div class=" col-md-6 text-right">
                                Rp. 0
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <input type="submit" value="Pesan" name="bayar" onclick="inputMenu();" class="btn btn-red btn-block">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php
                }
        ?>

        </div>
    </div>
</div>