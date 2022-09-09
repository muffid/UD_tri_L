<?php
include "connection.php";
include "functions.php";
session_start();
if (isset($_SESSION['login'])) {
    if (!isset($_GET['m'])) {
        header("Location: index.php?m=1&n=1");
    }

    ?>
<!DOCTYPE html>
<html lang="en">
<!-- =======================================================
  * UI framework bootstrap
  * php programming language
  * System developed by anemos.id web & application developer team
  * contact us +62 812-3342-2006 / +62 878-4686-7493
  * License: https://anemos.id/license/
  * Version control : Github
  ======================================================== -->

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>UD.Tri L | Dashboard</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <link href="img/logo1.png" rel="icon">

    <style>
    .badge {
        position: absolute;
        top: -35px;
        /*right: -150px; */
        font-size: 12px;
        padding: 5px;
        font-weight: normal;
    }

    #info {
        background-color: #F0F8FF;
        color: #FFFFFF;
        display: inline;
        white-space: pre-wrap;
        line-height: 24px;
        font-size: 14px;
        padding: 5px;


    }
    </style>

</head>

<body id="page-top">
    <!-- Page Wrapper -->
    <div id="wrapper">
        <!-- include sidebar -->
        <?php include "segment/sidebar.php";?>
        <!-- end include sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column ">

            <!-- Main Content -->
            <div id="content ">
                <?php
// header
    include "segment/header.php";
    //    end Header
    ?>

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <hr class="sidebar-divider my-0 mt-5 mb-5">
                    <div class="d-sm-flex align-items-center justify-content-between ">
                        <h1 class="h3 mb-3 text-gray-800">Dashboard</h1>

                    </div>

                    <!-- Content Row -->
                    <div class="row">
                        <?php
function getColor()
    {
        $numcolor = rand(1, 4);
        switch ($numcolor) {
            case 1:
                $colorPick = 'primary';
                break;
            case 2:
                $colorPick = 'success';
                break;
            case 3:
                $colorPick = 'warning';
                break;
            case 4:
                $colorPick = 'danger';
                break;
        }
        return $colorPick;
    }

    date_default_timezone_set('Asia/Jakarta');
    $tanggal = date(" M Y ");

    function checkStok($stokNow)
    {
        $standard = 50;
        if ($stokNow == 0) {
            return '<span class="badge badge-danger">stok sudah habis</span>';
        } else if ($stokNow <= $standard) {
            return '<span class="badge badge-warning">stok menipis</span>';
        } else {
            return '';
        }
    }

    $no = 1;

    $data = mysqli_query($conn, "SELECT ID_PK FROM data_pupuk");
    foreach ($data as $key) {

        $detail = mysqli_query($conn, "SELECT * FROM data_pupuk WHERE ID_PK=" . $key['ID_PK']);
        foreach ($detail as $det) {
            $colorFix = getColor();
            echo ('<div class="col-xl-4 col-md-6 mb-4">
                                <div class="card border-left-' . $colorFix . ' shadow h-100 py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col-md-7">
                                                <div class="text-md font-weight-bold text-' . $colorFix . '  mb-1">
                                                    ' . $det['Jenis_Pupuk'] . '</div>
                                                    <div class="mb-0  text-gray-800">sisa stok </div>
                                                <div class="h5 mb-0 font-weight-bold text-gray-800">' . $det['Stok'] . ' karung</div>
                                            </div>
                                            <div class="col-md-5">
                                            <img src="img/warehouse.png" class="img-fluid" alt="Responsive image" width="50%" height="50%">' . checkStok($det['Stok']) . '
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>');

            $sqlGetSold = mysqli_query($conn, "SELECT SUM(Jumlah_Keluar) AS Total FROM stok_keluar WHERE (ID_PK=" . $key['ID_PK'] . " AND Tanggal LIKE '%" . $tanggal . "%')");
            foreach ($sqlGetSold as $sgs) {
                echo ('<label id="nama' . $no . '" hidden>' . $det['Jenis_Pupuk'] . '</label>');
                echo ('<label id="total' . $no . '" hidden>' . $sgs['Total'] . '</label>');

            }

            $sqlGetMasuk = mysqli_query($conn, "SELECT SUM(Jumlah_Masuk) AS totM FROM stok_masuk WHERE (ID_PK=" . $key['ID_PK'] . " AND Tanggal LIKE '%" . $tanggal . "%')");
            foreach ($sqlGetMasuk as $sgm) {
                echo ('<label id="masuk' . $no . '" hidden>' . $sgm['totM'] . '</label>');
            }

        }
        $no++;

    }
    echo ('<label id="totppk" hidden>' . ($no - 1) . '</label>');

    $totAng = 0;
    $totKel = 0;
    $sqlGetTotAnggotaz = mysqli_query($conn, "SELECT SUM(Total) AS tot FROM penjualan WHERE (ID_AKT NOT LIKE '0' AND Tanggal LIKE '%" . $tanggal . "%')");
    foreach($sqlGetTotAnggotaz as $z){
      $totAng = (int)$z['tot'];
      echo('<label id="totanggota" hidden>'.$totAng.'</label>');
    }

    $sqlGetTotKelompok = mysqli_query($conn, "SELECT SUM(Total) AS tots FROM penjualan WHERE (ID_AKT LIKE '0' AND Tanggal LIKE '%" . $tanggal . "%')");
    foreach ($sqlGetTotKelompok as $sgtk) {
        $totKel = $sgtk['tots'];
        echo ('<label id="totkelompok" hidden >' . $sgtk['tots'] . '</label>');
    }
    ?>
                        <!-- Earnings (Monthly) Card Example -->
                        <!-- <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Earnings (Monthly)</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">$40,000</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> -->

                        <!-- Earnings (Monthly) Card Example -->
                        <!-- <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                Earnings (Annual)</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">$215,000</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> -->

                        <!-- Earnings (Monthly) Card Example -->
                        <!-- <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-info shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Tasks
                                            </div>
                                            <div class="row no-gutters align-items-center">
                                                <div class="col-auto">
                                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">50%</div>
                                                </div>
                                                <div class="col">
                                                    <div class="progress progress-sm mr-2">
                                                        <div class="progress-bar bg-info" role="progressbar"
                                                            style="width: 50%" aria-valuenow="50" aria-valuemin="0"
                                                            aria-valuemax="100"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> -->

                        <!-- Pending Requests Card Example -->
                        <!-- <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-warning shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                                Pending Requests</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">18</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-comments fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> -->

                    </div>

                    <!-- Content Row -->

                    <div class="row">

                        <!-- Area Chart -->
                        <div class="col-xl-4 col-lg-7">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div
                                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Penjualan Pupuk Bulan <?=$tanggal;?>
                                    </h6>


                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
                                    <div>
                                        <canvas id="myChart" height="225"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Pie Chart -->
                        <div class="col-xl-4 col-lg-5">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div
                                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Pemasukan Bulan <?=$tanggal;?></h6>

                                </div>
                                <!-- Card Body -->
                                <div class="card-body">

                                    <div class="row">
                                        <canvas id="yourChart" height="150"></canvas>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12 mt-4">
                                            <p class="text-center font-weight-bold text-secondary">Total :
                                                <?=rp($totAng + $totKel);?></p>
                                        </div>
                                    </div>


                                </div>
                            </div>
                        </div>

                        <div class="col-xl-4 col-lg-5">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div
                                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Pembelian Pupuk Bulan <?=$tanggal;?>
                                    </h6>

                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
                                    <canvas id="ourChart" height="223"></canvas>
                                </div>
                            </div>
                        </div>


                        <div class="col-xl-12 col-lg-12">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div
                                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Neraca Keuangan</h6>

                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
                                    <?php

    //sisa stok
    $sqlGetSisa=mysqli_query($conn,"SELECT SUM(Stok) AS sisa FROM data_pupuk");
    $sisa=0;
    foreach($sqlGetSisa as $sgs){
      $sisa=$sgs['sisa'];
    }
//pengeluaran atau pembelian pupuk
    $sqlPengeluaran = mysqli_query($conn, "SELECT sum(Nominal) as total_pengeluaran  FROM stok_masuk ");
    foreach ($sqlPengeluaran as $keyPengeluaran) {
        $hasilPengeluaran = $keyPengeluaran['total_pengeluaran'];
    }

    //pembelian pupuk bulanan
    $sqlGetPembPupukBulanan = mysqli_query($conn,"SELECT SUM(Nominal) as totpupukbulanan FROM stok_masuk WHERE Tanggal LIKE '%".$tanggal."%'");
    $totPembBulanan=0;
    foreach($sqlGetPembPupukBulanan as $sgppb){
      $totPembBulanan=$sgppb['totpupukbulanan'];
    } 

    
    //transport
    $sqlTransport = mysqli_query($conn, "SELECT sum(Total) as total_transport FROM biaya_lain ");
    foreach ($sqlTransport as $keyTransport) {
        $hasilTransport = $keyTransport['total_transport'];
    }

    //transport bulanan
    $sqlGetTransBulan = mysqli_query($conn,"SELECT SUM(Total) as totbulanan FROM biaya_lain WHERE Tanggal LIKE '%".$tanggal."%'");
    $totTransBulanan=0;
    foreach($sqlGetTransBulan as $sgtb){
      $totTransBulanan=$sgtb['totbulanan'];
    }

    //total pengeluaran
    $totalAll = $hasilTransport + $hasilPengeluaran;
    //total pengluaran bulanan
    $totPengluaranBulanan = $totPembBulanan + $totTransBulanan;

    //penjualan
    $sqlPenjualan = mysqli_query($conn, "SELECT sum(Total) as total_penjualan FROM penjualan ");
    foreach ($sqlPenjualan as $keyPenjualan) {
        $hasilPenjualan = $keyPenjualan['total_penjualan'];
    }
    
    //pennjualan bulanan
    $totPenjBul=0;
    $sqlPenjualanBulanan = mysqli_query($conn, "SELECT sum(Total) as total_penjualan FROM penjualan WHERE Tanggal LIKE '%".$tanggal."%'");
    foreach ($sqlPenjualanBulanan as $spenjB) {
        $totPenjBul = $spenjB['total_penjualan'];
    }
    
    //total pendapatan
    $totalPendapatan = $hasilPenjualan - $totalAll;

    //piutang
    $sqlHutang = mysqli_query($conn, "SELECT SUM(Kredit) as total_hutang FROM piutang ");
    foreach ($sqlHutang as $keyPiutang) {
        $hasilPiutang = $keyPiutang['total_hutang'];
    }

    $sqlDibayar = mysqli_query($conn, "SELECT SUM(Debit) as total_bayar FROM piutang ");
    foreach ($sqlDibayar as $keyPiutang) {
        $hasilDibayar = $keyPiutang['total_bayar'];
    }
//kas real
    $kas = $totalPendapatan - $hasilPiutang;
    ?>
                                    <div class="row">

                                        <div class="col-xl-6 col-md-6 mb-2">
                                            <div class="card border-left-primary shadow h-100 py-2">
                                                <div class="card-body d-flex">
                                                    <div class="row no-gutters align-items-center">
                                                        <div class="col-md-9">
                                                            <div class="ml-4 h4 mb-2 font-weight-bold text-gray-800">
                                                                TOTAL PENGELUARAN
                                                            </div>

                                                            <div class="ml-4 mb-2 text-muted"><span
                                                                    style="font-size:14px;">
                                                                    pada bulan <?=$tanggal;?>.</span>
                                                            </div>

                                                            <div class="ml-4 h4 mb-2 font-weight-bold text-success">
                                                                <?=rp($totPengluaranBulanan);?> <br>
                                                                <!-- <div class="h6 mb-0 mt-4 text-dark" id="info"> Total bulan ini :
                                  <?//=rp($totPengluaranBulanan);?></div> -->
                                                            </div>

                                                            <h6 class="mt-4 ml-4">ke Halaman
                                                                <a rel="nofollow" href="page_pengeluaran.php?m=8&n=8">
                                                                    Pengeluaran <i class="fas fa-arrow-right"></i> </a>
                                                        </div>
                                                        <div class="col-md-3"><img src="img/money-bag.png" width="50%">
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="row">
                                                <div class="col-xl-12 col-md-6 mb-4">
                                                    <div class="card border-left-primary shadow h-100 py-2">
                                                        <div class="card-body">
                                                            <div class="row">
                                                                <div class="col-auto ml-4">
                                                                    <div class="text-md font-weight-bold mb-2">
                                                                        Total Biaya Transport</div><span
                                                                        style="font-size:14px;">
                                                                        pada bulan <?=$tanggal;?>.</span>

                                                                    <div class="h5 mb-0 mt-2 text-success">
                                                                        <?=rp($totTransBulanan);?></div>
                                                                    <br>
                                                                    <!-- <div class="h6 mb-0 mt-0 text-dark" id="info"> Total bulan ini :
                                    <?//=rp($totTransBulanan);?></div> -->
                                                                </div>
                                                                <div class="col-md-4 ml-4">
                                                                    <img src="img/delivery-truck.png" width="35%">
                                                                </div>


                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-xl-12 col-md-6 mb-4">
                                                    <div class="card border-left-primary shadow h-100 py-2">
                                                        <div class="card-body">
                                                            <div class="row">
                                                                <div class="col-auto ml-4">
                                                                    <div class="text-md font-weight-bold  mb-2">
                                                                        Total Pembelian Pupuk</div><span
                                                                        style="font-size:14px;">
                                                                        pada bulan <?=$tanggal;?>.</span>

                                                                    <div class="h5 mb-0 mt-2 text-success">
                                                                        <?=rp($totPembBulanan);?></div>
                                                                    <br>
                                                                    <!-- <div class="h6 mb-0 mt-0 text-dark" id="info"> Total bulan ini :
                                    <?//=rp($totPembBulanan);?></div> -->
                                                                </div>
                                                                <div class="col-md-4 ml-4">
                                                                    <img src="img/purchase.png" width="35%">
                                                                </div>


                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">

                                        <div class="col-xl-6 col-md-6 mb-2">
                                            <div class="card border-left-primary shadow h-100 py-2">
                                                <div class="card-body">
                                                    <div class="row no-gutters align-items-center">
                                                        <div class="col-md-10">
                                                            <div class="ml-4 h4 mb-2 font-weight-bold text-gray-800">
                                                                TOTAL PEMASUKAN</div>
                                                            <div class="mb-0  ml-4 mb-2 text-muted">pada bulan
                                                                <?=$tanggal;?>.</div>
                                                            <div
                                                                class="h3 mb-0 ml-4 mb-0 font-weight-bold text-success">
                                                                <?=rp($totPenjBul);?>
                                                                <br>
                                                                <!-- <div class="h6 mb-2 mt-4 text-dark" id="info"> Total bulan ini : <?//=rp($totPenjBul);?>
                                </div> -->
                                                            </div>
                                                        </div>
                                                        <!-- <div class="col-md-2 ml-6">
                              <img src="img/duwit.png" width="100%">
                            </div> -->

                                                    </div>

                                                    <h6 class="mt-4 ml-4">untuk melihat total aktual ke Halaman
                                                        <a rel="nofollow" href="page_pemasukan.php?m=9&n=9">
                                                            Pemasukan <i class="fas fa-arrow-right"></i></a>
                                                    </h6>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="col-xl-6 col-md-6 mb-2">
                                            <div class="card border-left-primary shadow h-100 py-2">
                                                <div class="card-body">
                                                    <div class="row no-gutters align-items-center">
                                                        <div class="col-md-10">
                                                            <div class="ml-4 h4 mb-2 font-weight-bold text-gray-800">
                                                                PROFIT PUPUK</div>
                                                            <div class="mb-0  ml-4 mb-2 text-muted">Profit dapat
                                                                dilihat melali menu <br><a rel="nofollow"
                                                                    href="rekapPerbulan.php?m=11&n=11">
                                                                    Rekap Perbulan <i
                                                                        class="fas fa-arrow-right"></i></a>
                                                            </div>
                                                            <!-- <div
                                                                class="h3 mb-0 ml-4 mb-0 font-weight-bold text-success">
                                                                <?//=rp($hasilPenjualan - $hasilPengeluaran - $hasilTransport);?>
                                                                <br>
                                                                <div class="h6 mb-4 mt-4 text-dark" id="info"> NET
                                                                    Profit :
                                                                    <?//=rp($hasilPenjualan - $hasilPengeluaran - $hasilTransport);?>
                                                                </div>
                                                            </div><br> -->
                                                            <div class="mb-0  ml-4 text-dark" style="font-size:14px;">
                                                                Masih ada <span
                                                                    style="font-size:18px; font-weight:bold;background-color: #F0F8FF;padding:5px;"><?=$sisa;?></span>
                                                                Karung Pupuk semua jenis yang
                                                                belum terjual.</div>
                                                        </div>
                                                        <!-- <div class="col-md-2 ml-6">
                              <img src="img/duwit.png" width="100%">
                            </div> -->

                                                    </div>


                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <hr>

                                    <div class="row">

                                        <div class="col-xl-12 col-md-6 mb-2">
                                            <div class="card border-left-primary shadow h-100 py-2">
                                                <div class="card-body">
                                                    <div class="h4 mb-4 font-weight-bold text-gray-800">
                                                        HUTANG PIUTANG</div>
                                                    <div class="row">
                                                        <div class="col-md-10">
                                                            <div class="table-responsive">
                                                                <table class="">
                                                                    <thead>
                                                                        <!-- <th scope="col">Total Hutang</th>
                                    <th scope="col">Telah Dibayar</th> -->
                                                                        <th scope="col">Hutang Aktif</th>
                                                                    </thead>
                                                                    <tbody>
                                                                        <tr>
                                                                            <!-- <td style="font-weight:bold;"><?//=rp((int) $hasilPiutang);?></td>
                                      <td style="font-weight:bold;"><?//=rp((int) $hasilDibayar);?></td> -->
                                                                            <td style="font-weight:bold;">
                                                                                <?=rp((int) $hasilPiutang - (int) $hasilDibayar);?>
                                                                            </td>
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-2 mt-4"><img src="img/money.png" width="40%">
                                                        </div>
                                                    </div>
                                                    <h6>ke Halaman
                                                        <a rel="nofollow" href="page_piutang.php?m=10&n=10">
                                                            Piutang <i class="fas fa-arrow-right"></i></a>
                                                    </h6>

                                                </div>
                                            </div>
                                        </div>

                                    </div>


                                    <!--
                  <?php if ($totalPendapatan < 0) {?>
                  <h4 class="text-center text-danger">Total Pendapatan</h4>
                  <h5 class="text-danger">Status Non Profit =
                    <?php } else {?>
                    <h4 class="text-center text-success">Total Pendapatan</h4>
                    <h5 class="text-success">Status Profit = <?php }
    ;?>
                      <?=rp($totalPendapatan);?>
                    </h5>
                    <hr>
                    <h4 class="text-center text-warning">Total Piutang</h4>
                    <h5>Piutang = <?=rp($hasilPiutang);?></h5>
                    <hr>
                    <?php if ($kas < 0) {;?>
                    <h4 class="text-center text-danger">Kas Saat Ini</h4>
                    <h4 class="text-danger"><?=rp($kas);?></h4>
                    <?php } else {;?>
                    <h4 class="text-center text-warning">Kas Saat Ini</h4>
                    <h4 class="text-success"><?=rp($kas);?></h4>
                    <?php }
    ;?>

                </div>
              </div>
            </div>
          </div> -->



                                </div>
                                <!-- /.container-fluid -->

                            </div>
                            <!-- End of Main Content -->
                            <!-- footer -->
                            <?php include "segment/footer.php";?>
                            <!-- end footer -->
                        </div>
                        <!-- End of Content Wrapper -->


                    </div>
                    <!-- End of Page Wrapper -->

                    <!-- Bootstrap core JavaScript-->
                    <script src="vendor/jquery/jquery.min.js"></script>
                    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

                    <!-- Core plugin JavaScript-->
                    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

                    <!-- Custom scripts for all pages-->
                    <script src="js/sb-admin-2.min.js"></script>

                    <!-- Page level plugins -->
                    <script src="vendor/chart.js/Chart.min.js"></script>

                    <!-- Page level custom scripts -->
                    <!-- <script src="js/demo/chart-area-demo.js"></script>
    <script src="js/demo/chart-pie-demo.js"></script> -->

                    <script>
                    function getcolor() {
                        var prefix = 'rgba(';
                        var suffix = ')';
                        var colorCode = "";
                        for (let i = 0; i < 3; i++) {
                            colorCode += Math.floor((Math.random() * 255) + 1) + ",";
                            if (i === 2) {
                                colorCode += Math.floor((Math.random() * 255) + 1);
                            }
                        }

                        return prefix + colorCode + suffix;
                    }

                    console.log(getcolor());

                    var totalJenis = document.getElementById('totppk').innerHTML;
                    const namaPupuk = [];
                    const totalSold = [];
                    const color = [];
                    const colorxx = [];
                    const totalMasuk = [];
                    for (let i = 1; i <= totalJenis; i++) {

                        namaPupuk[i - 1] = document.getElementById("nama" + i).innerHTML;
                        totalSold[i - 1] = document.getElementById("total" + i).innerHTML;
                        totalMasuk[i - 1] = document.getElementById("masuk" + i).innerHTML;
                        color[i - 1] = getcolor();
                        colorxx[i - 1] = getcolor();

                    }

                    //membuat warna random
                    // rgba(255,99,132,1)

                    //console.log(getColor());

                    var ctx = document.getElementById("myChart").getContext('2d');
                    var myChart = new Chart(ctx, {
                        type: 'bar',
                        data: {
                            labels: namaPupuk,
                            datasets: [{
                                label: "penjualan",
                                data: totalSold,
                                backgroundColor: color,
                                //borderColor: 'rgba(45,123,78,99)',
                                //borderWidth: 23
                            }]
                        },
                        options: {
                            scales: {

                                yAxes: [{
                                    ticks: {
                                        beginAtZero: true
                                    }
                                }]
                            }
                        }
                    });

                    var ctx = document.getElementById("ourChart").getContext('2d');
                    var myChart = new Chart(ctx, {
                        type: 'bar',
                        data: {
                            labels: namaPupuk,
                            datasets: [{
                                label: "pembelian",
                                data: totalMasuk,
                                backgroundColor: colorxx,
                                //borderColor: 'rgba(45,123,78,99)',
                                //borderWidth: 23
                            }]
                        },
                        options: {
                            scales: {

                                yAxes: [{
                                    ticks: {
                                        beginAtZero: true
                                    }
                                }]
                            }
                        }
                    });


                    var tota = parseInt(document.getElementById("totanggota").innerHTML);
                    var totk = parseInt(document.getElementById("totkelompok").innerHTML);
                    var colora = getcolor();
                    var colork = getcolor();

                    var ctx = document.getElementById("yourChart").getContext('2d');

                    var myPie = new Chart(ctx, {
                        type: 'pie',
                        data: {
                            labels: ["Anggota", "Kelompok"],
                            datasets: [{
                                backgroundColor: [getcolor(), getcolor()],
                                data: [tota, totk]
                            }],
                        },
                        options: {
                            title: {
                                display: true,
                                fontStyle: 'bold',
                                fontSize: 20
                            },
                            tooltips: {
                                callbacks: {
                                    // this callback is used to create the tooltip label
                                    label: function(tooltipItem, data) {
                                        // get the data label and data value to display
                                        // convert the data value to local string so it uses a comma seperated number
                                        var dataLabel = data.labels[tooltipItem.index];
                                        var value = ': ' + data.datasets[tooltipItem.datasetIndex].data[
                                                tooltipItem.index]
                                            .toLocaleString();

                                        // make this isn't a multi-line label (e.g. [["label 1 - line 1, "line 2, ], [etc...]])
                                        if (Chart.helpers.isArray(dataLabel)) {
                                            // show value on first line of multiline label
                                            // need to clone because we are changing the value
                                            dataLabel = dataLabel.slice();
                                            dataLabel[0] += value;
                                        } else {
                                            dataLabel += value;
                                        }

                                        // return the text to display on the tooltip
                                        return "Hasil Penjualan Ke " + dataLabel;
                                    }
                                }
                            }
                        }
                    });
                    </script>
</body>

</html>
<?php } else {
    header("Location: login.php");
    exit();
}?>