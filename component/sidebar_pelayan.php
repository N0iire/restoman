<div class="navigation">
    <ul>
        <?php
        if (!isset($_GET['p'])) {
            echo '  <li class="list">
            <b></b>
            <b></b>
            <a href="index.php">
                <span class="icon">
                    <ion-icon name="fast-food-outline"></ion-icon>
                </span>
                <span class="title">Semua</span>
            </a>
        </li>
        <li class="list">
            <b></b>
            <b></b>
            <a href="?p=makanan">
                <span class="icon">
                    <ion-icon name="fast-food-outline"></ion-icon>
                </span>
                <span class="title">Makanan</span>
            </a>
        </li>
        <li class="list">
            <b></b>
            <b></b>
            <a href="?p=minuman">
                <span class="icon">
                    <ion-icon name="fast-food-outline"></ion-icon>
                </span>
                <span class="title">Minuman</span>
            </a>
        </li>
 ';
        } else if ($_GET['p'] == 'meja' || $_REQUEST['p'] == 'meja') {
            echo '
            <li class="list active">
            <b></b>
            <b></b>
            <a href="index.php">
                <span class="icon">
                    <ion-icon name="fast-food-outline"></ion-icon>
                </span>
                <span class="title">Pengelolaan Pesanan</span>
            </a>
        </li>
        ';
        }
        ?>


        <!-- isset sidebar pengelolaan pesanan -->



    </ul>
</div>