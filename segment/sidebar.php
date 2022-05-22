   <!-- Sidebar -->
   <?php 


?>
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




       <div class="sidebar-heading">
           Interface (Diluar Sistem)
       </div>

       <!-- Nav Item - Pages Collapse Menu -->
       <li class="nav-item">
           <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true"
               aria-controls="collapseTwo">
               <i class="fas fa-fw fa-cog"></i>
               <span>Components</span>
           </a>
           <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
               <div class="bg-white py-2 collapse-inner rounded">
                   <h6 class="collapse-header">Custom Components:</h6>
                   <a class="collapse-item" href="buttons.html">Buttons</a>
                   <a class="collapse-item" href="cards.html">Cards</a>
               </div>
           </div>
       </li>

       <!-- Nav Item - Utilities Collapse Menu -->
       <li class="nav-item">
           <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
               aria-expanded="true" aria-controls="collapseUtilities">
               <i class="fas fa-fw fa-wrench"></i>
               <span>Utilities</span>
           </a>
           <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
               data-parent="#accordionSidebar">
               <div class="bg-white py-2 collapse-inner rounded">
                   <h6 class="collapse-header">Custom Utilities:</h6>
                   <a class="collapse-item" href="utilities-color.html">Colors</a>
                   <a class="collapse-item" href="utilities-border.html">Borders</a>
                   <a class="collapse-item" href="utilities-animation.html">Animations</a>
                   <a class="collapse-item" href="utilities-other.html">Other</a>
               </div>
           </div>
       </li>

       <!-- Divider -->
       <hr class="sidebar-divider">

       <!-- Heading -->
       <div class="sidebar-heading">
           Addons
       </div>

       <!-- Nav Item - Pages Collapse Menu -->
       <li class="nav-item">
           <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
               aria-expanded="true" aria-controls="collapsePages">
               <i class="fas fa-fw fa-folder"></i>
               <span>Pages</span>
           </a>
           <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
               <div class="bg-white py-2 collapse-inner rounded">
                   <h6 class="collapse-header">Login Screens:</h6>
                   <a class="collapse-item" href="login.html">Login</a>
                   <a class="collapse-item" href="register.html">Register</a>
                   <a class="collapse-item" href="forgot-password.html">Forgot Password</a>
                   <div class="collapse-divider"></div>
                   <h6 class="collapse-header">Other Pages:</h6>
                   <a class="collapse-item" href="404.html">404 Page</a>
                   <a class="collapse-item" href="blank.php">Blank Page</a>
               </div>
           </div>
       </li>

       <!-- Nav Item - Charts -->
       <li class="nav-item">
           <a class="nav-link" href="charts.html">
               <i class="fas fa-fw fa-chart-area"></i>
               <span>Charts</span></a>
       </li>

       <!-- Nav Item - Tables -->
       <li class="nav-item">
           <a class="nav-link" href="tables.html">
               <i class="fas fa-fw fa-table"></i>
               <span>Tables</span></a>
       </li>



       <!-- Divider -->
       <hr class="sidebar-divider d-none d-md-block">

   </ul>


   <!-- End of Sidebar -->