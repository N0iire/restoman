<div class="navigation">
    <ul>
        <!-- isset sidebar pengelolaan pesanan -->
        <?php
        if (!isset($_GET['p'])) {
        ?>
            <li class="list">
                <b></b>
                <b></b>
                <a href="index.php">
                    <span class="icon">
                        <ion-icon name="fast-food-outline"></ion-icon>
                    </span>
                    <span class="title">Semua</span>
                </a>
            </li>
            <?php
            foreach ($kategori->get_all() as $data) {
            ?>
                <li class="list">
                    <b></b>
                    <b></b>
                    <a href="?k=<?php echo $data['nama_kategori']; ?>&i=<?php echo $data['id_kategori']; ?>">
                        <span class="icon">
                            <ion-icon name="fast-food-outline"></ion-icon>
                        </span>
                        <span class="title"><?php echo $data['nama_kategori']; ?></span>
                    </a>
                </li>
        <?php
            }

            // isset pengelolaan meja
        } else if ($_GET['p'] == 'meja' || $_REQUEST['p'] == 'meja') {
            echo '
            <li class="list">
            <b></b>
            <b></b>
            <a href="index.php?p=pemesanan">
                <span class="icon">
                    <ion-icon name="fast-food-outline"></ion-icon>
                </span>
                <span class="title">Pengelolaan Pesanan</span>
            </a>
            </li>
            ';
        }
        ?>






    </ul>
</div>