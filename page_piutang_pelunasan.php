<?php

session_start();
include "functions.php";
include "connection.php";

if (isset($_SESSION['login'])) {
    if (isset($_GET['cust'])) {

        $nama = "";
        $jumlahPiutang = 0;
        $jumlahTerbayar = 0;
        $piutangAktif = 0;
        $querryPiutang = "";

        $key = "";
        $buyer = 0;

        if ((int) $_GET['cust']) {
            //kelompok
            $sqlgetNama = mysqli_query($conn, "select Nama_Kel from data_kel_tani where ID_KT=" . $_GET['cust']);
            foreach ($sqlgetNama as $sgn) {
                $nama = $sgn['Nama_Kel'];
            }
            $sqlgetKredit = mysqli_query($conn, "select Kredit from piutang where ID_KT=" . $_GET['cust']);
            foreach ($sqlgetKredit as $sgk) {
                $jumlahPiutang += $sgk['Kredit'];
            }
            $sqlgetDebit = mysqli_query($conn, "select Debit from piutang where ID_KT=" . $_GET['cust']);
            foreach ($sqlgetDebit as $sgd) {
                $jumlahTerbayar += $sgd['Debit'];
            }

            $piutangAktif = $jumlahPiutang - $jumlahTerbayar;
            $querryPiutang = "select * from piutang where ID_KT=" . $_GET['cust'];
            $buyer = 1;

        } else {

            //anggota
            $nama = $_GET['cust'];

            $sqlgetKredit = mysqli_query($conn, "select Kredit from piutang where ID_AKT LIKE '" . $_GET['cust'] . "'");
            foreach ($sqlgetKredit as $sgk) {
                $jumlahPiutang += $sgk['Kredit'];
            }
            $sqlgetDebit = mysqli_query($conn, "select Debit from piutang where ID_AKT LIKE '" . $_GET['cust'] . "'");
            foreach ($sqlgetDebit as $sgd) {
                $jumlahTerbayar += $sgd['Debit'];
            }

            $piutangAktif = $jumlahPiutang - $jumlahTerbayar;
            $querryPiutang = "select * from piutang where ID_AKT LIKE '" . $nama . "'";
            $buyer = 2;

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

======================================================== -->

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>UD. Tri L | Piutang</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link
    href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
    rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">
  <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
  <link href="img/logo1.png" rel="icon">
  <?php
// header
        include "segment/header.php";
        //    end Header
        ?>

</head>

<body id="page-top" onload="checkPiutang()">

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
            <h1 class="h3 mb-3 text-gray-800">Pelunasan</h1>
            <a href="page_piutang.php?m=10&n=10"
              class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm mt-4"><i
                class="far fa-arrow-alt-circle-left  text-white-50"></i> Kembali Ke Halaman Piutang</a>

          </div>
          <!-- konten -->

          <?php
@session_start();
        if (isset($_SESSION["info"])) {
            ?>

          <div class="alert alert-success alert-dismissible fade show" role="alert">
            <?php //echo $_SESSION["info"];
            echo ($_SESSION["info"] . " klik"); ?>
            <button type="button" class="btn btn-light" data-dismiss="alert" aria-label="Close">
              Disini </button> untuk menutup
          </div>

          <?php
unset($_SESSION["info"]);
        }

        ?>
          <div class="row">



            <div class="col-xl-6 col-lg-6">
              <div class="card shadow mb-4">

                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Data Piutang </h6>
                </div>

                <div class="card-body">

                  <div class="row mb-2">
                    <label class="col-sm-4 col-form-label"> Nama </label>
                    <label class="col-sm-8 col-form-label" id="nama"><?=$nama;?></label>
                  </div>

                  <div class="row mb-2">
                    <label class="col-sm-4 col-form-label"> Jumlah Piutang</label>
                    <label class="col-sm-8 col-form-label" id="jmlputang"><?=rp($jumlahPiutang);?></label>
                  </div>

                  <div class="row mb-2">
                    <label class="col-sm-4 col-form-label"> Jumlah Terbayar </label>
                    <label class="col-sm-8 col-form-label" id="jmlterbayar"><?=rp($jumlahTerbayar);?></label>
                  </div>

                  <div class="row mb-2">
                    <label class="col-sm-4 col-form-label"> Piutang Aktif </label>
                    <label class="col-sm-8 col-form-label" id="piutangaktif"
                      style="font-weight:bold; color:green; font-size:20px;"><?=rp($piutangAktif);?></label>
                  </div>



                </div>
              </div>
            </div>


            <div class="col-xl-6 col-lg-6">
              <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Form Pelunasan</h6>
                </div>
                <div class="card-body">
                  <div class="row mb-2">

                    <label class="col-sm-4 col-form-label"> Nominal </label>
                    <div class="col-sm-8">
                      <form method="POST" action="pelunasan.php?id=<?=$_GET['cust'];?>">
                        <input type="text" class="form-control" id="bayar" name="bayar" onkeyup="convertRP()">
                    </div>
                  </div>

                  <div class="row mb-2">
                    <label class="col-sm-4 col-form-label"> </label>
                    <div class="col-sm-8">
                      <button type="submit" id="btnpelunasan" class="btn btn-primary btn-sm">bayar</button>
                    </div>
                    </form>
                  </div>
                </div>

              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-xl-12 col-lg-12">
              <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Tabel Record Hutang <?=$nama;?> </h6>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table table-bordered" id="tablePiuAnggota" width="100%" cellspacing="0">
                      <thead>
                        <tr>
                          <th scope="col">No</th>
                          <th scope="col">Tanggal</th>

                          <th scope="col">Debit</th>
                          <th scope="col">Kredit</th>
                          <th scope="col">Nota Hutang</th>

                        </tr>
                      </thead>
                      <tbody>
                        <?php
$noA = 1;
        $totalHutangA = 0;
        $totalDibayarA = 0;
        $sqlData = mysqli_query($conn, $querryPiutang);
        foreach ($sqlData as $sd) {
            echo ('<tr><td>' . $noA . '</td>');
            echo ('<td>' . $sd["Tanggal"] . '</td>');
            $key = "'" . $sd['ID_KEY'] . "'";
            echo ('<td>' . rp($sd["Debit"]) . '</td>');
            echo ('<td>' . rp($sd["Kredit"]) . '</td>');
            if ((int) $sd['Kredit'] > 0) {
                echo ('<td><a href="" onclick="toPrintPage(' . $key . ',' . $buyer . ')">lihat</a></td></tr>');
            } else {
                echo ('<td>-</td>');
            }

            $noA++;
            $totalHutangA += (int) $sd['Kredit'];
            $totalDibayarA += (int) $sd['Debit'];

        }

        ?>
                      </tbody>
                    </table>
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
  <!-- End of Page Wrapper -->

  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
  <script src="js/sb-admin-2.min.js"></script>
  <script src="vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

</body>

</html>

<?php } else {
        header("Location: login.php");
        exit();
    }} else {
    header("Location: login.php");
    exit();
}?>

<script>
$(document).ready(function() {
  $('#tablePengeluaran').DataTable();
});

function toPrintPage(key, buyer) {
  window.open("printNota.php?KEY=" + key + "&BUYER=" + buyer);
}

function convertRP() {

  var num = document.getElementById("bayar").value;
  document.getElementById("bayar").value = toRp(num, "Rp. ");


}

function checkPiutang() {
  var piutang = document.getElementById("piutangaktif").innerHTML;
  var piutangNum = piutang.replace("Rp. ", "").replace(".", "");
  if (piutangNum > 0) {
    document.getElementById("btnpelunasan").disabled = false;
  } else {
    document.getElementById("btnpelunasan").disabled = true;
  }
}


function toRp(angka, prefix) {
  var number_string = angka.replace(/[^,\d]/g, "").toString(),
    split = number_string.split(","),
    sisa = split[0].length % 3,
    rupiah = split[0].substr(0, sisa),
    ribuan = split[0].substr(sisa).match(/\d{3}/gi);


  if (ribuan) {
    separator = sisa ? "." : "";
    rupiah += separator + ribuan.join(".");
  }

  rupiah = split[1] != undefined ? rupiah + "," + split[1] : rupiah;
  return prefix == undefined ? rupiah : rupiah ? "Rp. " + rupiah : "";
}
</script>