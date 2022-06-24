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

<body id="page-top">

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
            <h1 class="h3 mt-5 text-gray-800">Pemasukan</h1>
            <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm mt-4"><i
                class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
          </div>
          <!-- konten -->
          <div class="row">
            <div class="col-xl-12 col-lg-12">
              <div class="card shadow mb-4">

                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Data Pemasukan Biaya</h6>
                </div>

                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table table-bordered" id="tablePengeluaran" width="100%" cellspacing="0">
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
    //jika kelompok
    $sql = mysqli_query($conn, "SELECT * FROM stok_keluar  ORDER BY ID_SK DESC");
    foreach ($sql as $key):
        $idnya = $key['ID_KT'];
        $jns = $key['ID_PK'];
        $hasil = $key['Jumlah_Keluar'] * $key['Harga'];
        ?>

                        <tr>
                          <td> <?=$no;?></td>
                          <td> <?=$key['Tanggal'];?></td>
                          <?php if ($key['ID_KT'] == "0") {?>
                          <td style="color: #fcdb03"> <?=$key['ID_AKT'] . " (Anggota)";?></td>
                          <?php } else {?>
                          <td style="color: black"><?php $kel = mysqli_query($conn, "SELECT * FROM data_kel_tani WHERE ID_KT=" . $idnya);foreach ($kel as $pok) {
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

    endforeach;

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

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>
  <script src="vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

</body>

</html>
<?php } else {
    header("Location: login.php");
    exit();
}?>

<script>
$(document).ready(function() {
  $('#tablePengeluaran').DataTable();
});
</script>