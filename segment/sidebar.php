<!-- =======================================================
  * UI framework bootstrap
  * php programming language
  * System developed by anemos.id web & application developer team
  * contact us +62 812-3342-2006 / +62 878-4686-7493
  * License: https://anemos.id/license/
  * Version control : Github
  ======================================================== -->
<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion mt-5 " id="accordionSidebar">
    <!-- Divider -->
    <hr class="sidebar-divider my-0 mt-4">

    <!-- Nav Item - Dashboard -->
    <li
        <?php if ($_GET['m'] == 1 && $_GET['n'] == 1) {echo "class='nav-item active'";} else {echo "class='nav-item'";}?>>
        <a class="nav-link" href="index.php?m=1&n=1">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>

        <hr class=" sidebar-divider">
        <!-- Menu Stok Pupuk -->
        <div class="sidebar-heading">
            Transaksi Pupuk
        </div>
        <!-- Nav Item - Pages Collapse Menu  -->
    <li
        <?php if ($_GET['m'] == 2 && $_GET['n'] == 1) {echo "class='nav-item active'";} else {echo "class='nav-item'";}?>>
        <a class="nav-link" href="page_stok_masuk.php?m=2&n=1">
            <i class=" fas fa-fw fa-truck-moving"></i>
            <span>Stok Pupuk Masuk</span></a>
    </li>
    <li
        <?php if ($_GET['m'] == 3 && $_GET['n'] == 1) {echo "class='nav-item active'";} else {echo "class='nav-item'";}?>>
        <a class="nav-link" href="page_stok_keluar.php?m=3&n=1">
            <i class="fas fa-fw  fa-shopping-bag"></i>
            <span>Penjualan Pupuk</span></a>
    </li>
    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Keuangan-->
    <div class="sidebar-heading">
        Keuangan
    </div>
    <!-- Nav Item - Pages Collapse Menu -->
    <li
        <?php if ($_GET['m'] == 8 && $_GET['n'] == 8) {echo "class='nav-item active'";} else {echo "class='nav-item'";}?>>
        <a class="nav-link" href="page_pengeluaran.php?m=8&n=8">
            <i class="fas fa-money-bill-wave"></i>
            <span>Pengeluaran</span></a>
    </li>
    <li
        <?php if ($_GET['m'] == 9 && $_GET['n'] == 9) {echo "class='nav-item active'";} else {echo "class='nav-item'";}?>>
        <a class="nav-link" href="page_pemasukan.php?m=9&n=9">
            <i class="fas fa-money-bill-alt"></i>
            <span>Pemasukan</span></a>
    </li>
    <li
        <?php if ($_GET['m'] == 10 && $_GET['n'] == 10) {echo "class='nav-item active'";} else {echo "class='nav-item'";}?>>
        <a class="nav-link" href="page_piutang.php?m=10&n=10">
            <i class="fas fa-money-check"></i>
            <span>Piutang</span></a>
    </li>
    <li
        <?php if ($_GET['m'] == 11 && $_GET['n'] == 11) {echo "class='nav-item active'";} else {echo "class='nav-item'";}?>>
        <a class="nav-link" href="rekapPerbulan.php?m=11&n=11">
            <i class="fas fa-file-alt"></i>
            <span class="ml-2">Rekap Perbulan</span></a>
    </li>
    <!-- Heading -->
    <hr class=" sidebar-divider">

    <!-- Seting Data -->
    <div class="sidebar-heading">
        Setting Data
    </div>
    <!-- Nav Item - Pages Collapse Menu -->
    <li <?php if ($_GET['m'] == 4) {echo "class='nav-item active'";} else {echo "class='nav-item'";}?>>
        <a class='nav-link' href="#" data-toggle="collapse" data-target="#settingPage" aria-expanded="true"
            aria-controls="settingPage">
            <i class="fas fa-fw fa-database"></i>
            <span>Master Data</span>
        </a>

        <div id="settingPage"
            <?php if ($_GET['m'] == 4) {echo "class='collapse show'";} else {echo "class='collapse'";}?>
            aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Input Data:</h6>
                <a <?php if ($_GET['m'] == 4 && $_GET['n'] == 2) {echo "class='collapse-item active'";} else {echo "class='collapse-item'";}?>
                    href="page_kel_tani.php?m=4&n=2">Kelompok Tani</a>
                <a <?php if ($_GET['m'] == 4 && $_GET['n'] == 3) {echo "class='collapse-item active'";} else {echo "class='collapse-item'";}?>
                    href="blank.php?m=4&n=3">Anggota</a>
                <a <?php if ($_GET['m'] == 4 && $_GET['n'] == 4) {echo "class='collapse-item active'";} else {echo "class='collapse-item'";}?>
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
    <li
        <?php if ($_GET['m'] == 5 && $_GET['n'] == 5) {echo "class='nav-item active'";} else {echo "class='nav-item'";}?>>
        <a class="nav-link" href="page_administrator.php?m=5&n=5">
            <i class="fas fa-fw fa-user"></i>
            <span>Administrator</span></a>
    </li>
    <li
        <?php if ($_GET['m'] == 7 && $_GET['n'] == 7) {echo "class='nav-item active'";} else {echo "class='nav-item'";}?>>
        <a class="nav-link" href="page_lap_masalah.php?m=7&n=7">
            <i class="fas fa-cogs fa-flag"></i>
            <span>Laporkan Masalah</span></a>
    </li>
    <!-- Heading -->
    <hr class="sidebar-heading">
    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

</ul>


<!-- End of Sidebar -->