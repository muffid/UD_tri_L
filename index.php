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
    <div id="content-wrapper" class="d-flex flex-column ">

      <!-- Main Content -->
      <div id="content ">

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mt-5">
            <h1 class="h3 mt-5 text-gray-800">Dashboard</h1>
            <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm mt-4"><i -->
            <!-- class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> -->
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
    $tanggal = date("D, j M Y ");

    $blnBl = substr($tanggal, 7, 9);
    switch ($blnBl) {
        case '01':
            $blnBl = 'Jan';
            break;
        case '02':
            $blnBl = 'Feb';
            break;
        case '03':
            $blnBl = 'Mar';
            break;
        case '04':
            $blnBl = 'Apr';
            break;
        case '05':
            $blnBl = 'May';
            break;
        case '06':
            $blnBl = 'Jun';
            break;
        case '07':
            $blnBl = 'Jul';
            break;
        case '08':
            $blnBl = 'Aug';
            break;
        case '09':
            $blnBl = 'Sep';
            break;
        case '10':
            $blnBl = 'Oct';
            break;
        case '11':
            $blnBl = 'Nov';
            break;
        case '12':
            $blnBl = 'Dec';
            break;
    }
    //$blntahunBl = $blnBl . " " . $tahunBl;
    // echo($blnBl);
    // die();
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
                                            <div class="col mr-2">
                                                <div class="text-md font-weight-bold text-' . $colorFix . ' text-uppercase mb-1">
                                                    ' . $det['Jenis_Pupuk'] . '</div>
                                                    <div class="mb-0  text-gray-800">sisa stok </div>
                                                <div class="h5 mb-0 font-weight-bold text-gray-800">' . $det['Stok'] . ' karung</div>
                                            </div>
                                            <div class="col-auto">
                                                <i class="fas fa-warehouse fa-2x text-gray-300"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>');

            $sqlGetSold = mysqli_query($conn, "SELECT SUM(Jumlah_Keluar) AS Total FROM stok_keluar WHERE (ID_PK=" . $key['ID_PK'] . " AND Tanggal LIKE '%" . $blnBl . "%')");
            foreach ($sqlGetSold as $sgs) {
                echo ('<label id="nama' . $no . '" hidden>' . $det['Jenis_Pupuk'] . '</label>');
                echo ('<label id="total' . $no . '" hidden>' . $sgs['Total'] . '</label>');

            }

        }
        $no++;

    }
    echo ('<label id="totppk" hidden>' . ($no - 1) . '</label>');
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
            <div class="col-xl-6 col-lg-7">
              <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Total Penjualan Bulan <?=$blnBl;?></h6>


                </div>
                <!-- Card Body -->
                <div class="card-body">
                  <div>
                    <canvas id="myChart"></canvas>
                  </div>
                </div>
              </div>
            </div>

            <!-- Pie Chart -->
            <div class="col-xl-6 col-lg-5">
              <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Keuangan</h6>

                </div>
                <!-- Card Body -->
                <div class="card-body">
                  <?php
//pengeluaran atau pembelian pupuk
    $sqlPengeluaran = mysqli_query($conn, "SELECT sum(Nominal) as total_pengeluaran  FROM stok_masuk ");
    foreach ($sqlPengeluaran as $keyPengeluaran) {
        $hasilPengeluaran = $keyPengeluaran['total_pengeluaran'];
    }

    //transport
    $sqlTransport = mysqli_query($conn, "SELECT sum(Total) as total_transport FROM biaya_lain ");
    foreach ($sqlTransport as $keyTransport) {
        $hasilTransport = $keyTransport['total_transport'];
    }
    //total pengeluaran
    $totalAll = $hasilTransport + $hasilPengeluaran;

    //penjualan
    $sqlPenjualan = mysqli_query($conn, "SELECT sum(Total) as total_penjualan FROM penjualan ");
    foreach ($sqlPenjualan as $keyPenjualan) {
        $hasilPenjualan = $keyPenjualan['total_penjualan'];
    }
    //total pendapatan
    $totalPendapatan = $hasilPenjualan - $totalAll;

    ?>
                  <h4 class="text-center text-warning">Total Pengeluaran</h4>
                  <h5>Pembelian Pupuk = <?=rp($hasilPengeluaran);?></h5>
                  <h5>Transport = <?=rp($hasilTransport);?></h5>
                  <h5 class="text-success">Total = <?=rp($totalAll);?></h5>
                  <hr>
                  <h4 class="text-center text-info">Total Penjualan</h4>
                  <h5>Pupuk = <?=rp($hasilPenjualan);?></h5>
                  <hr>

                  <?php if ($totalPendapatan < 0) {?>
                  <h4 class="text-center text-danger">Total Pendapatan</h4>
                  <h5 class="text-danger">Non Profit =
                    <?php } else {?>
                    <h4 class="text-center text-success">Total Pendapatan</h4>
                    <h5 class="text-success">Profit = <?php }
    ;?>

                      <?=rp($totalPendapatan);?>
                    </h5>
                </div>
              </div>
            </div>
          </div>



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
  for (let i = 1; i <= totalJenis; i++) {

    namaPupuk[i - 1] = document.getElementById("nama" + i).innerHTML;
    totalSold[i - 1] = document.getElementById("total" + i).innerHTML;
    color[i - 1] = getcolor();

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
        label: 'total penjualan',
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
  </script>
</body>

</html>
<?php } else {
    header("Location: login.php");
    exit();
}?>