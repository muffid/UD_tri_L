   <!-- Sidebar -->
   <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion mt-5 " id="accordionSidebar">
       <!-- Divider -->
       <hr class="sidebar-divider my-0 mt-4">

       <!-- Nav Item - Dashboard -->
       <li <?php if($_GET['m']==1 && $_GET['n']==1){echo "class='nav-item active'";}else{echo "class='nav-item'";} ?>>
           <a class="nav-link" href="index.php?m=1&n=1">
               <i class="fas fa-fw fa-tachometer-alt"></i>
               <span>Dashboard</span></a>

           <hr class=" sidebar-divider">
           <!-- Menu Stok Pupuk -->
           <div class="sidebar-heading">
               Stok Pupuk
           </div>
           <!-- Nav Item - Pages Collapse Menu  -->
       <li <?php if($_GET['m']==2 && $_GET['n']==1){echo "class='nav-item active'";}else{echo "class='nav-item'";} ?>>
           <a class="nav-link" href="page_stok_masuk.php?m=2&n=1">
               <i class=" fas fa-fw fa-tachometer-alt"></i>
               <span>Stok Masuk</span></a>
       </li>
       <li <?php if($_GET['m']==3 && $_GET['n']==1){echo "class='nav-item active'";}else{echo "class='nav-item'";} ?>>
           <a class="nav-link" href="page_stok_keluar.php?m=3&n=1">
               <i class="fas fa-fw fa-chart-area"></i>
               <span>Stok Keluar</span></a>
       </li>
       <!-- Divider -->
       <hr class="sidebar-divider">

       <div class="sidebar-heading">
           Setting Data
       </div>
       <!-- Nav Item - Pages Collapse Menu -->
       <li <?php if($_GET['m']==4){echo "class='nav-item active'";}else{echo "class='nav-item'";} ?>>
           <a class='nav-link' href="#" data-toggle="collapse" data-target="#settingPage" aria-expanded="true"
               aria-controls="settingPage">
               <i class="fas fa-fw fa-cog"></i>
               <span>Masukkan Data</span>
           </a>

           <div id="settingPage" <?php if($_GET['m']==4){echo "class='collapse show'";}else{echo "class='collapse'";} ?>
               aria-labelledby="headingPages" data-parent="#accordionSidebar">
               <div class="bg-white py-2 collapse-inner rounded">
                   <h6 class="collapse-header">Input Data:</h6>
                   <a <?php if($_GET['m']==4 && $_GET['n']==2){echo "class='collapse-item active'";}else{echo "class='collapse-item'";} ?>
                       href="page_kel_tani.php?m=4&n=2">Kelompok Tani</a>
                   <a <?php if($_GET['m']==4 && $_GET['n']==3){echo "class='collapse-item active'";}else{echo "class='collapse-item'";} ?>
                       href="blank.php?m=4&n=3">Anggota</a>
                   <a <?php if($_GET['m']==4 && $_GET['n']==4){echo "class='collapse-item active'";}else{echo "class='collapse-item'";} ?>
                       href="page_jenis_pupuk.php?m=4&n=4">Pupuk</a>
               </div>
           </div>
       </li>

       <hr class=" sidebar-divider">
       <!-- Menu Administrator -->
       <div class="sidebar-heading">
           Halaman
       </div>
       <!-- Nav Item - Pages Collapse Menu -->
       <li <?php if($_GET['m']==5 && $_GET['n']==5){echo "class='nav-item active'";}else{echo "class='nav-item'";} ?>>
           <a class="nav-link" href="page_administrator.php?m=5&n=5">
               <i class="fas fa-fw fa-tachometer-alt"></i>
               <span>Administrator</span></a>
       </li>
       <li <?php if($_GET['m']==6 && $_GET['n']==6){echo "class='nav-item active'";}else{echo "class='nav-item'";} ?>>
           <a class="nav-link" href="page_akun.php?m=6&n=6">
               <i class="fas fa-fw fa-chart-area"></i>
               <span>Akun</span></a>
       </li>
       <li <?php if($_GET['m']==7 && $_GET['n']==7){echo "class='nav-item active'";}else{echo "class='nav-item'";} ?>>
           <a class="nav-link" href="page_lap_masalah.php?m=7&n=7">
               <i class="fas fa-fw fa-chart-area"></i>
               <span>Laporkan Masalah</span></a>
       </li>
       <!-- Heading -->
       <hr class="sidebar-heading">
       <!-- Divider -->
       <hr class="sidebar-divider d-none d-md-block">

   </ul>


   <!-- End of Sidebar -->