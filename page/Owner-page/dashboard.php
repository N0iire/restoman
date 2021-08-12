<style>
    .card {
        text-decoration: none;
        transition: color 0.2s linear;
        -webkit-transition: color 0.2s linear;
        -moz-transition: color 0.2s linear;
    }

    .card:hover {
        background: rgb(86, 204, 242);
        background: #585e59 !important;
        color: #fff !important;
    }

    .icon-pencil:hover {
        color: #fff !important;
    }
</style>


<div class="container-fluid">
    <section id="minimal-statistics">
        <div class="row">
            <div class="col-12 mt-2 mb-1">
                <h4 class="text-uppercase">
                    Selamat Datang, Owner
                </h4>

            </div>
        </div>
        <div class="row">

            <?php $data_pendapatan = $pembayaran->get_sum(); ?>
            <!-- large card -->
            <div class="row">
                <div class="col-xl-6 col-md-12">
                    <div class="card">
                        <div class="card-content">
                            <div class="card-body cleartfix">
                                <div class="media align-items-stretch">
                                    <div class="align-self-center">
                                        <h1 class="teks mr-2" style="color: #18ab6b;">Rp.<?php echo $data_pendapatan['pendapatan'] ?></h1>
                                    </div>
                                    <div class="media-body text-right mr-1">
                                        <h4>Total <br>Pendapatan</h4>

                                    </div>
                                    <div class="align-self-center">
                                        <ion-icon name="cash-outline" style="color: #18ab6b; font-size: 50px; margin-left: 10px;"></ion-icon>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-6 col-md-12">
                    <div class="card">
                        <div class="card-content">
                            <div class="card-body cleartfix">
                                <div class="media align-items-stretch">
                                    <div class="align-self-center">
                                        <h1 class="mr-2" style="color: #1abd91;"><?php echo $data_pendapatan['jml_transaksi'] ?></h1>
                                    </div>
                                    <div class=" media-body text-right mr-2">
                                        <h4>Jumlah <br> Transaksi</h4>
                                    </div>
                                    <div class="align-self-center">
                                        <i class="icon-wallet success font-large-2"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <?php $data_pengunjung = $pesanan->get_sum(); ?>
            <!-- small card -->

            <div class="col-xl-3 col-sm-6 col-12">
                <div class="card">
                    <div class="card-content">
                        <div class="card-body">
                            <div class="media d-flex">
                                <div class="media-body text-left">
                                    <h3 class="primary"><?php echo $data_pengunjung['jml_pelanggan'] ?></h3>
                                    <span>Jumlah <br> Pengunjung</span>
                                </div>
                                <div class="align-self-center">
                                    <ion-icon name="people-outline" style="color: #1ebdbd; font-size: 50px; margin-left: 10px;"></ion-icon>
                                </div>
                            </div>
                            <div class="progress mt-1 mb-0" style="height: 7px;">
                                <div class="progress-bar bg-primary" role="progressbar" style="width: 10%" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <?php $data_pegawai = $user->get_count(); ?>
            <div class="col-xl-3 col-sm-6 col-12">
                <div class="card">
                    <div class="card-content">
                        <div class="card-body">
                            <div class="media d-flex">
                                <div class="media-body text-left">
                                    <h3 class="warning">
                                        <?php echo $data_pegawai['jmlpegawai'] ?>
                                    </h3>
                                    <span>Jumlah <br>Pegawai</span>
                                </div>
                                <div class="align-self-center">
                                    <i class="icon-user warning font-large-2 float-right"></i>
                                </div>
                            </div>
                            <div class="progress mt-1 mb-0" style="height: 7px;">
                                <div class="progress-bar bg-warning" role="progressbar" style="width: 30%" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <?php $data_menu = $menu->get_count(); ?>
            <div class="col-xl-3 col-sm-6 col-12">
                <div class="card">
                    <div class="card-content">
                        <div class="card-body">
                            <div class="media d-flex">
                                <div class="media-body text-left">
                                    <h3 class="success"><?php echo $data_menu['jmlmenu'] ?></h3>
                                    <span>Jumlah <br> Menu</span>
                                </div>
                                <div class="align-self-center">
                                    <ion-icon name="fast-food-outline" style="color: #1abd91; font-size: 50px; margin-left: 10px;"></ion-icon>
                                </div>
                            </div>
                            <div class="progress mt-1 mb-0" style="height: 7px;">
                                <div class="progress-bar bg-success" role="progressbar" style="width: 15%" aria-valuenow="15" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <?php $data_menu2 = $menu->get_count2(); ?>
            <div class="col-xl-3 col-sm-6 col-12">
                <div class="card">
                    <div class="card-content">
                        <div class="card-body">
                            <div class="media d-flex">
                                <div class="media-body text-left">
                                    <h3 class="danger"><?php echo $data_menu2['jmlmenu'] ?></h3>
                                    <span>Konfirmasi <br> Menu</span>
                                </div>
                                <div class="align-self-center">
                                    <ion-icon name="checkmark-done-outline" style="color: #a12755; font-size: 50px; margin-left: 10px;"></ion-icon>
                                </div>
                            </div>
                            <div class="progress mt-1 mb-0" style="height: 7px;">
                                <div class="progress-bar bg-danger" role="progressbar" style="width: 0%" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

    </section>
</div>