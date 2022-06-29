<!-- =======================================================
  * UI framework bootstrap
  * php programming language
  * System developed by anemos.id web & application developer team
  * contact us +62 812-3342-2006 / +62 878-4686-7493
  * License: https://anemos.id/license/
  * Version control : Github
  ======================================================== -->

<!-- Topbar -->




<nav class="navbar navbar-expand navbar-light bg-white topbar  fixed-top shadow">
  <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
    <div class="sidebar-brand-icon rotate-n-15">
      <img style="width:40px" src="img/logo1.png">
    </div>


    <div class="sidebar-brand-text mx-3"><?php echo ($_SESSION['per']); ?></div>

  </a>

  <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i
      class="fas fa-bars"></i></button>

  <!-- Topbar Navbar -->
  <ul class="navbar-nav ml-auto">


    <!-- Nav Item - Alerts -->
    <li class="sidebar-brand d-flex align-items-center justify-content-center text-gray-600 small">

      <p>
      <div id="txt">
        <?php echo ('<script>
        startTime();

        function startTime() {
          const today = new Date();
          let h = today.getHours();
          let m = today.getMinutes();
          let s = today.getSeconds();
          m = checkTime(m);
          s = checkTime(s);

          let tahun = today.getFullYear();
          let hari = today.getDay();
          let bulan = today.getMonth();
          let tanggal = today.getDate();
          let hariarray = new Array("Minggu,", "Senin,", "Selasa,", "Rabu,", "Kamis,", "Jumat,", "Sabtu,");
          let bulanarray = new Array("Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September",
            "Oktober", "Nopember", "Desember");
          document.getElementById("txt").innerHTML = hariarray[hari] + " " + tanggal + " " + bulanarray[bulan] + " " +
            tahun + ",  " + h + ":" + m + ":" + s;
          setTimeout(startTime, 1000);

          //   document.getElementById("txt").innerHTML = h + ":" + m + ":" + s;
          //   setTimeout(startTime, 1000);
        }

        function checkTime(a) {
          if (a < 10) {
            a = "0" + a
          }; // add zero in front of numbers < 10
          return a;
        }


        </script>'); ?>
      </div>
      </p>
    </li>

    <div class="topbar-divider  d-sm-block"></div>

    <!-- Nav Item - User Information -->
    <li class="nav-item dropdown no-arrow">

      <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown"
        aria-haspopup="true" aria-expanded="false">
        <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo ("Hai, " . $_SESSION['nama']); ?></span>
        <?php $foto = $_SESSION['foto'];?>
        <img class='img-profile rounded-circle' src='img/<?php echo $foto; ?>'>

      </a>
      <!-- Dropdown - User Information -->
      <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
        <a class="dropdown-item" href="page_administrator.php?m=5&n=5">
          <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
          Profile
        </a>
        <a class="dropdown-item" href="page_lap_masalah.php?m=7&n=7">
          <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
          Laporkan Masalah
        </a>
        <div class="dropdown-divider"></div>
        <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
          <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
          Keluar
        </a>
      </div>
    </li>
  </ul>
</nav>

<!-- End of Topbar -->

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Keluar Program ?</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">Jika anda yakin megakhiri program klik "Keluar"</div>
      <div class="modal-footer">
        <button class="btn btn-secondary" type="button" data-dismiss="modal">Tidak</button>
        <a class="btn btn-primary" href="logout.php">Keluar</a>
      </div>
    </div>
  </div>
</div>

<script>

</script>