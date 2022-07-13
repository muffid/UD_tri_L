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

  <title>UD. Tri L | Pemasukan</title>

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

<body id="page-top" onload="initDateBL()">

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
          <hr class="sidebar-divider my-0 mt-5 mb-5">
          <div class="d-sm-flex align-items-center justify-content-between ">
            <h1 class="h3 mb-3 text-gray-800">Pemasukan</h1>


          </div>
          <!-- konten -->
          <div class="row">
            <div class="col-xl-12 col-lg-12">
              <div class="card shadow mb-4">

                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Data Pemasukan Biaya</h6>
                </div>

                <div class="card-body">
                  <div class="row mb-3">
                    <label class="m-0 ml-2 mr-2 col-form-label">Bulan</label>
                    <input id="blnbl" type="month" onchange="bulanBL()">
                  </div>
                  <div class="table-responsive">
                    <table class="table table-bordered" id="tabelPemasukan" width="100%" cellspacing="0">
                      <thead>
                        <tr>
                          <th scope="col">No</th>
                          <th scope="col">Tanggal</th>
                          <th scope="col">Kelompok/ Anggota</th>
                          <th scope="col">Jenis Pupuk</th>
                          <th scope="col">Jumlah Pupuk</th>
                          <th scope="col">Total</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
$no = 1;
    $total = 0;
    if (isset($_GET['BTBL'])) {
        $sql = mysqli_query($conn, "SELECT * FROM stok_keluar WHERE Tanggal LIKE '%" . $_GET['BTBL'] . "%' ORDER BY ID_SK DESC");
    } else {
        $sql = mysqli_query($conn, "SELECT * FROM stok_keluar  ORDER BY ID_SK DESC");
    }
    foreach ($sql as $key):
        $idnya = $key['ID_KT'];
        $jns = $key['ID_PK'];
        $hasil = $key['Jumlah_Keluar'] * $key['Harga'];
        ?>

                        <?php if ($key['ID_KT'] == "0") {?>
                        <!-- //jika Anggota -->
                        <tr style="background-color: #f5f3f2">
                          <?php } else {?>
                          <!-- //jika Kelompok -->
                        <tr>
                          <?php }
        ;?>
                          <td> <?=$no;?></td>
                          <td> <?=$key['Tanggal'];?></td>
                          <?php if ($key['ID_KT'] == "0") {?>
                          <!-- //jika Anggota -->
                          <td style="background-color: #f5f3f2"> <?=$key['ID_AKT'] . " (Anggota)";?></td>
                          <?php } else {?>
                          <!-- //jika Kelompok -->
                          <td><?php $kel = mysqli_query($conn, "SELECT * FROM data_kel_tani WHERE ID_KT=" . $idnya);foreach ($kel as $pok) {
            $ambil1 = $pok['Nama_Kel'];
        }?> <?="Kelompok " . $ambil1;?></td>
                          <?php }
        ;?>
                          <td><?php $jenis = mysqli_query($conn, "SELECT * FROM data_pupuk WHERE ID_PK=" . $jns);foreach ($jenis as $nis) {
            $ambil2 = $nis['Jenis_Pupuk'];
        }?> <?=$ambil2;?></td>
                          <td> <?=$key['Jumlah_Keluar'];?></td>
                          <td> <?=rp($hasil);?></td>
                        </tr>
                        <?php
    $no++;
        $total = $total + (int) $hasil;
    endforeach;
    ?>

                        <tr>
                          <th><text style="display:none;"><?=$no++;?></text></th>
                          <th></th>
                          <th></th>
                          <th></th>
                          <th class="text-center">TOTAL</th>
                          <th><?=rp($total);?></th>
                        </tr>

                      </tbody>
                      <!-- <tfoot>

                      </tfoot> -->
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
                                Total Pemasukan</div>

                              <div class="mb-0  text-gray-800">total</div>
                              <?php
$toatalPemasukan = mysqli_query($conn, "SELECT sum(Total) as totalPemasukan FROM penjualan");
    foreach ($toatalPemasukan as $tp) {
        $toatalPemasukannya = $tp['totalPemasukan'];
    }

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
    $piutangAktif = $hasilPiutang - $hasilDibayar;
    $kas = $toatalPemasukannya - $piutangAktif;
    ?>
                              <div class="h5 mb-0 font-weight-bold text-gray-800"><?=rp($toatalPemasukannya);?></div>
                            </div>
                            <div class="col-auto">
                              <i class="fas fa-coins fa-2x text-success"></i>
                            </div>
                            <div class="mt-3 text-muted" style="font-size: 0.875em;">total pemasukan adalah total dari
                              semua
                              penjualan
                              pupuk (termasuk piutang yang
                              belum dilunasi)</div>
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
                                Total Piutang Aktif</div>
                              <div class="mb-0  text-gray-800">total</div>

                              <div class="h5 mb-0 font-weight-bold text-gray-800">
                                <?=rp($piutangAktif);?></div>
                            </div>
                            <div class="col-auto">
                              <i class="fas fa-coins fa-2x text-warning"></i>
                            </div>
                            <div class="mt-3 text-muted" style="font-size: 0.875em;">total piutang aktif adalah hutang
                              yang belum dilunasi</div>
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
                                Total Pemasukan Aktual</div>
                              <div class="mb-0  text-gray-800">total</div>
                              <div class="h5 mb-0 font-weight-bold text-gray-800"><?=rp($kas);?>
                              </div>
                            </div>
                            <div class="col-auto">
                              <i class="fas fa-money-bill-wave fa-2x text-primary"></i>
                            </div>
                            <div class="mt-3 text-muted" style="font-size: 0.875em;">total pemasukan adalah total kas
                              yang Real dari (total pemasukan - total piutang aktif)</div>
                          </div>
                        </div>
                      </div>
                    </div>

                  </div>


                  <?php

    if (isset($_GET['BTBL'])) {
        $sqlPengeluaran = mysqli_query($conn, "SELECT sum(Nominal) as total_pengeluaran  FROM stok_masuk WHERE Tanggal LIKE '%" . $_GET['BTBL'] . "%' ");
    } else {
        $sqlPengeluaran = mysqli_query($conn, "SELECT sum(Nominal) as total_pengeluaran  FROM stok_masuk");
    }

    foreach ($sqlPengeluaran as $keyPengeluaran) {
        $hasilPengeluaran = $keyPengeluaran['total_pengeluaran'];
    }?>

                  <div class="row">
                    <div class="col-xl-12 ">
                      <div class="card border-left-primary shadow h-100 py-2">
                        <div class="card-body">
                          <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                              <div class="text-md font-weight-bold text-primary text-uppercase mb-1">
                                Profit Pupuk/ Kas</div>
                              <div class="mb-0  text-gray-800">total</div>
                              <div class="h5 mb-0 font-weight-bold text-gray-800">
                                <?=rp($total - $hasilPengeluaran);?>
                              </div>
                              <div class="mt-3 text-muted" style="font-size: 0.875em;">penghasilan bersih dari penjualan
                                dikurangi pembelian pupuk / bulan (jika di set bulannya)</div>
                            </div>
                            <div class="col-auto">
                              <div class="col-md-3"><img src="img/money-bag.png" width="50%"></div>
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
          <!-- End Konten -->
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
  $('#tabelPemasukan').DataTable({
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
</script>

<script>
function bulanBL() {
  var isibulanbl = document.getElementById("blnbl").value;
  //alert(isibulan);
  // //2022-02
  // // algoritma ngganti bulan disini
  if (isibulanbl == "") {
    //alert('null');
    location.replace("page_pemasukan.php?m=9&n=9");
  } else {
    // location.replace("page_pengeluaran.php?m=8&n=8&BTBL=" + isibulanbl);
    //alert('not null');

    var tahunbl = isibulanbl.substring(0, 4);
    var bulannyabl = isibulanbl.substring(5, 7);
    switch (bulannyabl) {
      case '01':
        bulannyabl = 'Jan';
        break;
      case '02':
        bulannyabl = 'Feb';
        break;
      case '03':
        bulannyabl = 'Mar';
        break;
      case '04':
        bulannyabl = 'Apr';
        break;
      case '05':
        bulannyabl = 'May';
        break;
      case '06':
        bulannyabl = 'Jun';
        break;
      case '07':
        bulannyabl = 'Jul';
        break;
      case '08':
        bulannyabl = 'Aug';
        break;
      case '09':
        bulannyabl = 'Sep';
        break;
      case '10':
        bulannyabl = 'Oct';
        break;
      case '11':
        bulannyabl = 'Nov';
        break;
      case '12':
        bulannyabl = 'Dec';
        break;
    }
    $blntahunbl = bulannyabl + " " + tahunbl;
    location.replace("page_pemasukan.php?m=9&n=9&n=8&BTBL=" + $blntahunbl);
  }
}



function initDateBL() {
  var url_stringbl = window.location.href; //window.location.href
  var urlbl = new URL(url_stringbl);

  // bulan biaya lainnya penjualan
  var BTBL = urlbl.searchParams.get("BTBL");
  if (typeof BTBL === 'undefined' || BTBL === null) {

  } else {

    var bulanbl = BTBL.substring(0, 3);
    var tahunbl = BTBL.substring(4, 8);
    var bulanfixbl = "";
    //alert(bulan+"-"+tahun);
    switch (bulanbl) {
      case "Jan":
        bulanfixbl = "01";
        break;
      case "Feb":
        bulanfixbl = "02";
        break;
      case "Mar":
        bulanfixbl = "03";
        break;
      case "Apr":
        bulanfixbl = "04";
        break;
      case "May":
        bulanfixbl = "05";
        break;
      case "Jun":
        bulanfixbl = "06";
        break;
      case "Jul":
        bulanfixbl = "07";
        break;
      case "Aug":
        bulanfixbl = "08";
        break;
      case "Sep":
        bulanfixbl = "09";
        break;
      case "Oct":
        bulanfixbl = "10";
        break;
      case "Nov":
        bulanfixbl = "11";
        break;
      case "Dec":
        bulanfixbl = "12";
        break;
    }

    document.getElementById("blnbl").value = tahunbl + "-" + bulanfixbl;
  }


}
</script>