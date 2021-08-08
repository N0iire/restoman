  <div class="navigation" id="sidebar">
      <ul>
          <li class="list">
              <b></b>
              <b></b>
              <a href="index.php">
                  <span class="icon">
                      <ion-icon name="home-outline"></ion-icon>
                  </span>
                  <span class="title">Dashboard</span>
              </a>
          </li>
          <li class="list">
              <b></b>
              <b></b>
              <a href="?p=laporan">
                  <span class="icon">
                      <ion-icon name="receipt-outline"></ion-icon>
                  </span>
                  <span class="title">Laporan</span>
              </a>
          </li>
          <li class="list ">
              <b></b>
              <b></b>
              <a href="?p=pegawai">
                  <span class="icon">
                      <ion-icon name="people-outline"></ion-icon>
                  </span>
                  <span class="title">Pegawai</span>
              </a>
          </li>
          <li class="list ">
              <b></b>
              <b></b>
              <a href="index.php?p=menu">
                  <span class="icon">
                      <ion-icon name="fast-food-outline"></ion-icon>
                  </span>
                  <span class="title">Menu</span>
              </a>
          </li>
      </ul>
  </div>
  <script>
      $(window).on("load", function() {
          $(".loader").fadeOut("slow");
      });
  </script>