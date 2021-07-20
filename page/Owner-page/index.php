<!-- header -->
<?php include '../../header.php' ?>

<body style="background: #fff;">
    <div class="row">
        <div class="col-sm-12">
            <!-- navbar -->
            <header>
                <?php include '../../component/navbar.php' ?>

            </header>
        </div>
        <div class="row" style="margin-top: 90px;">
            <div class="col-sm-3">
                <!-- sidebar -->
                <aside>
                    <?php include '../../component/sidebar_owner.php' ?>
                </aside>
            </div>

            <div class="col-sm-9">
                <!-- start page content -->
                <?php include 'dashboard.php' ?>
            </div>
        </div>
    </div>


    <!-- end body -->
    <?php include '../../footer.php' ?>