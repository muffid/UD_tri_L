<?php
session_start();
include 'connection.php';
include 'functions.php';
if (isset($_SESSION['login'])) {
    ?>
<!DOCTYPE html>
<html lang="en">
<!-- =======================================================
  * UI framework bootstrap
  * php programming language
  * System developed by anemos.id web & application developer team
  * contact us +62 812-3342-2006 / +62 878-4686-7493
  * License: https://anemos.id/license/
  ======================================================== -->

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>UD. Tri L | Pengeluaran</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link
    href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
    rel="stylesheet">
  <link href="css/sb-admin-2.min.css" rel="stylesheet">
  <link type="text/css" rel="stylesheet" href="vendor/datatables/jquery.dataTables.min.css" />
  <link type="text/css" rel="stylesheet" href="vendor/datatables/buttons.dataTables.min.css" />
  <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
  <script src="vendor/datatables/jquery-3.5.1.js"></script>
  <script src="vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="vendor/datatables/dataTables.buttons.min.js"></script>
  <script src="vendor/datatables/jszip.min.js"></script>
  <script src="vendor/datatables/buttons.html5.min.js"></script>
  <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
  <script src="js/sb-admin-2.min.js"></script>


  <link href="img/logo1.png" rel="icon">
  <?php
// header
    include "segment/header.php";
    //    end Header
    ?>

</head>

<body id="page-top" onload="initDate()">

  <!-- Page Wrapper -->
  <div id="wrapper">
    <!-- include sidebar -->
    <?php include "segment/sidebar.php";?>
    <!-- end include sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mt-5">
            <h1 class="h3 mt-5 text-gray-800">Pengeluaran</h1>

          </div>
          <!-- Tabel Biaya Pembelian Pupuk -->
          <div class="row">
            <div class="col-xl-12 col-lg-12">
              <div class="card shadow mb-4">

                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Data Pengeluaran Biaya Pembelian Pupuk
                  </h6>
                </div>

                <div class="card-body">
                  <div class="row mb-3">
                    <label class="m-0 ml-2 mr-2 col-form-label">Bulan</label>
                    <input id="bln" type="month" onchange="bulan('bln','BT')">
                  </div>

                  <div class="table-responsive" id="TB_peng">
                    <table class="table table-bordered" id="tablePengeluaran" width="100%" cellspacing="0">
                      <thead>
                        <tr>
                          <th scope="col">No</th>
                          <th scope="col">Tanggal</th>
                          <th scope="col">Pembelian</th>
                          <th scope="col">Jumlah</th>
                          <th scope="col">Nominal</th>
                        </tr>
                      </thead>

                      <tbody id="contents">
                        <?php
$no = 1;
    $total = 0;
    $getData = "";
    if (isset($_GET['BT'])) {
        $sqlgetData = "SELECT *FROM stok_masuk
        INNER JOIN data_pupuk ON stok_masuk.ID_PK = data_pupuk.ID_PK WHERE Tanggal LIKE '%" . $_GET['BT'] . "%' ORDER BY ID_SM DESC";

    } else {
        $sqlgetData = "SELECT *FROM stok_masuk INNER JOIN data_pupuk ON stok_masuk.ID_PK = data_pupuk.ID_PK ORDER BY ID_SM DESC";
    }
    $getData = mysqli_query($conn, $sqlgetData);
    foreach ($getData as $gd): ?>
                        <tr>
                          <td><?=$no;?></td>
                          <td><?=$gd['Tanggal'];?></td>
                          <td><?="Pupuk " . $gd['Jenis_Pupuk'];?></td>
                          <td><?=$gd['Jumlah_Masuk'] . " Karung";?></td>
                          <td><?=rp($gd['Nominal']);?></td>
                        </tr> <?php $no++;
    $total = $total + (int) $gd['Nominal'];
    endforeach;?>
                      <tbody>
                        <tr>
                          <th colspan="4" class="text-center">TOTAL</th>
                          <th><?=rp($total);?></th>
                        </tr>
                      </tbody>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- End Tabel Biaya Pembelian Pupuk -->
          <!-- Tabel Biaya Lain -->
          <div class="row">
            <div class="col-xl-12 col-lg-12">
              <div class="card shadow mb-4">

                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Data Pengeluaran Biaya Transport
                  </h6>
                </div>

                <div class="card-body">
                  <div class="row mb-3">
                    <label class="m-0 ml-2 mr-2 col-form-label">Bulan</label>
                    <input id="blnbl" type="month" onchange="bulan('blnbl','BTA')">
                  </div>
                  <div class="table-responsive">
                    <table class="table table-bordered" id="tableBiayalain" width="100%" cellspacing="0">
                      <thead>
                        <tr>
                          <th scope="col">No</th>
                          <th scope="col">Tanggal</th>
                          <th scope="col">Keperluan</th>
                          <th scope="col">Nominal</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
$nobl = 1;
    $getDataBL = "";
    $totalbl = 0;
    if (isset($_GET['BTA'])) {
        $sqlbl = mysqli_query($conn, "SELECT * FROM biaya_lain WHERE Tanggal LIKE '%" . $_GET['BTA'] . "%' ORDER BY ID_BL DESC");
    } else {
        $sqlbl = mysqli_query($conn, "SELECT * FROM biaya_lain ORDER BY ID_BL DESC");
    }
    foreach ($sqlbl as $key): ?>
                        <?php if ($key['ID_SM'] == 0): ?>
                        <tr style="background-color: #f5f3f2">
                          <?php else: ?>
                        <tr>
                          <?php endif;?>
                          <td><?=$nobl;?></td>
                          <td><?=$key['Tanggal'];?></td>
                          <?php

    if ($key['ID_SM'] == 0) {?>
                          <?php $sqljual = mysqli_query($conn, "SELECT * FROM penjualan WHERE ID_PJ=" . $key['ID_PJ']);
        foreach ($sqljual as $keyjual) {
            $keyjual['ID_KT'];
        }
        ;?>
                          <?php if ($keyjual['ID_KT'] == 0) {;?>
                          <td> <?="Transport Pengiriman Pupuk ke " . $keyjual['ID_AKT'] . " (anggota)";?> </td>
                          <?php } else {;?>
                          <?php $kel = mysqli_query($conn, "SELECT * FROM data_kel_tani WHERE ID_KT=" . $keyjual['ID_KT']);
            foreach ($kel as $keykel) {
                $keykel['Nama_Kel'];
            }
            ?>
                          <td> <?="Transport Pengiriman Pupuk ke kelompok tani " . $keykel['Nama_Kel'];?> </td>
                          <?php }
        ;?>

                          <?php } else {;?>
                          <?php $sqlpp = mysqli_query($conn, "SELECT * FROM stok_masuk
                                      INNER JOIN data_pupuk ON stok_masuk.ID_PK = data_pupuk.ID_PK WHERE ID_SM=" . $key['ID_SM']);
        foreach ($sqlpp as $keypp): ?>
                          <td>
                            <?="Transport Pembelian Pupuk  " . $keypp['Jenis_Pupuk'] . " dari " . $keypp['Nama_Pengirim'];?>
                          </td>
                          <?php endforeach;?>

                          <?php }
    ;?>
                          <td> <?=rp($key['Total']);?> </td>
                          <?php ?>
                        </tr>
                        <?php $nobl++;
    $totalbl = $totalbl + (int) $key['Total'];endforeach;?>

                      <tbody>
                        <tr>
                          <th colspan="3" class="text-center">TOTAL</th>
                          <th><?=rp($totalbl);?></th>
                        </tr>
                      </tbody>
                      </tbody>
                    </table>
                  </div>
                </div>


                <div class="card-footer">
                  <div class="row">
                    <div class="col-xl-4 col-md-6 mb-4">
                      <div class="card border-left-success shadow h-100 py-2">
                        <div class="card-body">
                          <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                              <div class="text-md font-weight-bold text-success text-uppercase mb-1">
                                Total Pengeluaran Biaya Pembelian Pupuk</div>
                              <div class="mb-0  text-gray-800">total</div>
                              <?php
$toatalBeliPupuk = mysqli_query($conn, "SELECT sum(Nominal) as totalnya FROM stok_masuk");
    foreach ($toatalBeliPupuk as $tbp) {
        $totalnya = $tbp['totalnya'];
    }
    ;?>
                              <div class="h5 mb-0 font-weight-bold text-gray-800"><?=rp($totalnya)?></div>
                            </div>
                            <div class="col-auto">
                              <i class="fas fa-coins fa-2x text-success"></i>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>

                    <div class="col-xl-4 col-md-6 mb-4">
                      <div class="card border-left-warning shadow h-100 py-2">
                        <div class="card-body">
                          <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                              <div class="text-md font-weight-bold text-warning text-uppercase mb-1">
                                Total Pengeluaran Biaya Transport</div>
                              <div class="mb-0  text-gray-800">total</div>
                              <?php
$toatalTransport = mysqli_query($conn, "SELECT sum(Total) as totalnyatrans FROM biaya_lain");
    foreach ($toatalTransport as $tt) {
        $totalnyaTrans = $tt['totalnyatrans'];
    }
    ;?>
                              <div class="h5 mb-0 font-weight-bold text-gray-800"><?=rp($totalnyaTrans)?></div>
                            </div>
                            <div class="col-auto">
                              <i class="fas fa-coins fa-2x text-warning"></i>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>

                    <div class="col-xl-4 col-md-6 mb-4">
                      <div class="card border-left-primary shadow h-100 py-2">
                        <div class="card-body">
                          <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                              <div class="text-md font-weight-bold text-primary text-uppercase mb-1">
                                Total Keseluruhan Pengeluaran UD. Tri L</div>
                              <div class="mb-0  text-gray-800">total</div>
                              <div class="h5 mb-0 font-weight-bold text-gray-800"><?=rp($totalnya + $totalnyaTrans)?>
                              </div>
                            </div>
                            <div class="col-auto">
                              <i class="fas fa-money-bill-wave fa-2x text-primary"></i>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

              </div>
            </div>
          </div>

          <!-- End Tabel Biaya Lainnya -->
        </div>
      </div>
      <!-- End of Main Content -->

      <!-- footer -->
      <?php include "segment/footer.php";?>
      <!-- end footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>

</body>

</html>
<?php } else {
    header("Location: login.php");
    exit();
}?>

<script>
$(document).ready(function() {
  $('#tablePengeluaran').DataTable({
    searching: false,
    "lengthMenu": [10],
    dom: 'Bfrtip',
    buttons: [{
      extend: 'excelHtml5',
      autoFilter: true,
      sheetName: 'Exported data'
    }]
  });

  $('#tableBiayalain').DataTable({
    searching: false,
    "lengthMenu": [10],
    dom: 'Bfrtip',
    buttons: [{
      extend: 'excelHtml5',
      autoFilter: true,
      sheetName: 'Exported data'
    }]
  });
});


function bulan(idElement, urlParam) {
  var isibulan = document.getElementById(idElement).value;

  if (isibulan == "") {

    location.replace("page_pengeluaran.php?m=8&n=8");

  } else {

    location.replace("page_pengeluaran.php?m=8&n=8" + "&" + urlParam + "=" + convertToBulan(isibulan));

  }
}


function convertToBulan(param) {
  var tahun = param.substring(0, 4);
  var bulannya = param.substring(5, 7);
  switch (bulannya) {
    case '01':
      bulannya = 'Jan';
      break;
    case '02':
      bulannya = 'Feb';
      break;
    case '03':
      bulannya = 'Mar';
      break;
    case '04':
      bulannya = 'Apr';
      break;
    case '05':
      bulannya = 'May';
      break;
    case '06':
      bulannya = 'Jun';
      break;
    case '07':
      bulannya = 'Jul';
      break;
    case '08':
      bulannya = 'Aug';
      break;
    case '09':
      bulannya = 'Sep';
      break;
    case '10':
      bulannya = 'Oct';
      break;
    case '11':
      bulannya = 'Nov';
      break;
    case '12':
      bulannya = 'Dec';
      break;
  }
  blntahun = bulannya + " " + tahun;
  return blntahun;

}

function doSelect(param) {

  var bulan = param.substring(0, 3);
  var tahun = param.substring(4, 8);
  var bulanfix = "";

  //alert(bulan+"-"+tahun);
  switch (bulan) {
    case "Jan":
      bulanfix = "01";
      break;
    case "Feb":
      bulanfix = "02";
      break;
    case "Mar":
      bulanfix = "03";
      break;
    case "Apr":
      bulanfix = "04";
      break;
    case "May":
      bulanfix = "05";
      break;
    case "Jun":
      bulanfix = "06";
      break;
    case "Jul":
      bulanfix = "07";
      break;
    case "Aug":
      bulanfix = "08";
      break;
    case "Sep":
      bulanfix = "09";
      break;
    case "Oct":
      bulanfix = "10";
      break;
    case "Nov":
      bulanfix = "11";
      break;
    case "Dec":
      bulanfix = "12";
      break;
  }
  return tahun + "-" + bulanfix;
}

function initDate() {
  var url_string = window.location.href; //window.location.href
  var url = new URL(url_string);
  var BT = url.searchParams.get("BT");
  var BTA = url.searchParams.get("BTA");

  if (typeof BT === 'undefined' || BT === null) {

  } else {
    document.getElementById("bln").value = doSelect(BT);
    //alert(doSelect(BT));
  }

  if (typeof BTA === 'undefined' || BTA === null) {

  } else {
    document.getElementById("blnbl").value = doSelect(BTA);
  }

}
</script>