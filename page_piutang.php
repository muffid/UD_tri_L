<?php
session_start();
include "connection.php";
include "functions.php";
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

  <title>UD. Tri L | Piutang</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <link type="text/css" rel="stylesheet" href="vendor/datatables/jquery.dataTables.min.css"/>
    <link type="text/css" rel="stylesheet" href="vendor/datatables/buttons.dataTables.min.css"/>
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

  <script src="vendor/datatables/jquery-3.5.1.js"></script>
  <script src="vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="vendor/datatables/dataTables.buttons.min.js"></script>
  <script src="vendor/datatables/jszip.min.js"></script>
  <script src="vendor/datatables/buttons.html5.min.js"></script>
  <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>





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
            <h1 class="h3 mt-5 text-gray-800">Pengeluaran</h1>

          </div>
          <!-- konten -->
          <div class="row">
            <div class="col-xl-12 col-lg-12">
              <div class="card shadow mb-4">

                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Data Pengeluaran Biaya</h6>
                </div>

                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table table-bordered" id="tablePengeluaran" width="100%" cellspacing="0">
                      <thead>
                        <tr>
                          <th scope="col">No</th>
                          <th scope="col">Tanggal</th>
                          <th scope="col">Kelompok</th>
                          <th scope="col">Debit</th>
                          <th scope="col">Kredit</th>

                        </tr>
                      </thead>
                      <tbody>
                        <?php
$no = 1;
    $totalHutang = 0;
    $totalDibayar = 0;
    $sqlData = mysqli_query($conn, "select * from piutang where ID_AKT LIKE ''");
    foreach ($sqlData as $sd) {
        echo ('<tr><td>' . $no . '</td>');
        echo ('<td>' . $sd["Tanggal"] . '</td>');
        $sqlNamaKel = mysqli_query($conn, "select nama_kel from data_kel_tani where ID_KT=" . $sd['ID_KT']);
        foreach ($sqlNamaKel as $snk) {
            echo ('<td><a href="page_piutang_pelunasan.php?m=10&n=10&cust=' . $sd["ID_KT"] . '">' . $snk['nama_kel'] . '</a></td>');
        }
        echo ('<td>' . rp($sd["Debit"]) . '</td>');
        echo ('<td>' . rp($sd["Kredit"]) . '</td></tr>');

        $no++;
        $totalHutang += (int) $sd['Kredit'];
        $totalDibayar += (int) $sd['Debit'];

    }

    ?>
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
                                Total Hutang Kelompok</div>
                              <div class="mb-0  text-gray-800">total</div>
                              <div class="h5 mb-0 font-weight-bold text-gray-800"><?=rp($totalHutang)?></div>
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
                                Telah Dibayar</div>
                              <div class="mb-0  text-gray-800">total</div>
                              <div class="h5 mb-0 font-weight-bold text-gray-800"><?=rp($totalDibayar)?></div>
                            </div>
                            <div class="col-auto">
                              <i class="fas fa-money-bill-alt fa-2x text-warning"></i>
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
                                Piutang Aktif</div>
                              <div class="mb-0  text-gray-800">total</div>
                              <div class="h5 mb-0 font-weight-bold text-gray-800"><?=rp($totalHutang - $totalDibayar)?>
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


          <div class="row">
            <div class="col-xl-12 col-lg-12">
              <div class="card shadow mb-4">

                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Data Pengeluaran Biaya</h6>
                </div>

                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table table-bordered" id="tablePiuAnggota" width="100%" cellspacing="0">
                      <thead>
                        <tr>
                          <th scope="col">No</th>
                          <th scope="col">Tanggal</th>
                          <th scope="col">Kelompok</th>
                          <th scope="col">Debit</th>
                          <th scope="col">Kredit</th>

                        </tr>
                      </thead>
                      <tbody>
                        <?php
$noA = 1;
    $totalHutangA = 0;
    $totalDibayarA = 0;
    $sqlData = mysqli_query($conn, "select * from piutang where ID_KT=0");
    foreach ($sqlData as $sd) {
        echo ('<tr><td>' . $noA . '</td>');
        echo ('<td>' . $sd["Tanggal"] . '</td>');
        echo ('<td><a href="page_piutang_pelunasan.php?m=10&n=10&cust=' . $sd['ID_AKT'] . '">' . $sd['ID_AKT'] . '</a></td>');
        echo ('<td>' . rp($sd["Debit"]) . '</td>');
        echo ('<td>' . rp($sd["Kredit"]) . '</td></tr>');

        $noA++;
        $totalHutangA += (int) $sd['Kredit'];
        $totalDibayarA += (int) $sd['Debit'];

    }

    ?>
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
                                Total Hutang Anggota</div>
                              <div class="mb-0  text-gray-800">total</div>
                              <div class="h5 mb-0 font-weight-bold text-gray-800"><?=rp($totalHutangA)?></div>
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
                                Telah Dibayar</div>
                              <div class="mb-0  text-gray-800">total</div>
                              <div class="h5 mb-0 font-weight-bold text-gray-800"><?=rp($totalDibayarA)?></div>
                            </div>
                            <div class="col-auto">
                              <i class="fas fa-money-bill-alt fa-2x text-warning"></i>
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
                                Piutang Aktif</div>
                              <div class="mb-0  text-gray-800">total</div>
                              <div class="h5 mb-0 font-weight-bold text-gray-800">
                                <?=rp($totalHutangA - $totalDibayarA)?></div>
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

          <!-- End Konten -->
        </div>
      </div>
      <!-- End of Main Content -->

      <!-- footer -->
      <?php include "segment/footer.php";?>
      <!-- end footer -->

    </div>
    <!-- End of Content Wrapper -->

    <!-- Bootstrap core JavaScript-->
    <!-- <script src="vendor/jquery/jquery.min.js"></script> -->
    


</body>

</html>
<?php } else {
    header("Location: login.php");
    exit();
}?>

<script>
$(document).ready(function() {
  $('#tablePengeluaran').DataTable({

    "lengthMenu": [10],
    dom: 'Bfrtip',
    buttons: [{
      extend: 'excelHtml5',
      autoFilter: true,
      sheetName: 'Exported data'
    }]
  });

  $('#tablePiuAnggota').DataTable({

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