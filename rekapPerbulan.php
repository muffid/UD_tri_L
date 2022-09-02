<?php
session_start();

$tanggal = date(" M Y ");
if (isset($_SESSION['login'])) {
 include "connection.php";
 include "functions.php";
 
 $hargaJualPerKarung = 0;
 $iterator = 0;
 $totBulanValid = 0;
 $bulanValid = array();
 $totPerBulan = array();
 $nominalPerBulan = array();
 date_default_timezone_set('Asia/Jakarta');
 $tanggal = date("M");
 $arrMonth = ['Jan','Feb','Mar','Apr','Mei','Jun','Jul','Aug','Sep','Okt','Nov','Des'];
 $nominal_pembelian = array();
 $harga_jual = array();
 $sisa = array();
 $keuntungan = array();

 $totalPenjualan = 0;  
 $arrayData = array();
 $arrEnum = array(
    "Jan" => 1,
    "Feb" => 2,
    "Mar" => 3,
    "Apr" => 4,
    "May" => 5,
    "Jun" => 6,
    "Jul" => 7,
    "Aug" => 8,
    "Sep" => 9,
    "Oct" => 10,
    "Nov" => 11,
    "Dec" =>12
 );

 //mencari harga jual per karung
 $jualPerkarung = mysqli_query($conn,"SELECT Harga FROM data_pupuk WHERE ID_PK=2");
 foreach($jualPerkarung as $jpk){
    $hargaJualPerKarung = $jpk['Harga'];
 }

 //mencari total penjualan
 $totPenj = mysqli_query($conn,"SELECT SUM(Jumlah_Keluar) AS totP FROM stok_keluar WHERE Tanggal LIKE '%2022%' AND ID_PK=2");
 foreach($totPenj as $tp){
 $totalPenjualan = $tp['totP'];
 }
 

    $iterator =$arrEnum[$tanggal];
 

 //setelah mencari bulan kebelakang sekarang mencari bulan apa saja yang ada pemasukan pupuk
 for($l = 0; $l<$iterator; $l++){
    $avail = mysqli_query($conn,"SELECT SUM(Jumlah_Masuk) AS totP FROM stok_masuk WHERE Tanggal LIKE '%".$arrMonth[$l]."%' AND ID_PK=2");
    foreach($avail as $a){
        if($a['totP']==""){
        }else{
            //jumlah bulan yang ada pemasukan pupuk
            $totBulanValid++;
            //array berisi nama bulan yang ada pemasukn pupuk
            array_push($bulanValid,$arrMonth[$l]);
            //array berisi total pemasukan pupuk per bulan
            array_push($totPerBulan,$a['totP']);
            //array berisi nominal uang yang keluar per bulan
            $nominal_keluar = mysqli_query($conn,"SELECT SUM(Nominal) AS nom FROM stok_masuk WHERE Tanggal LIKE '%".$arrMonth[$l]."%' AND ID_PK=2");
            foreach($nominal_keluar as $nk){
                array_push($nominalPerBulan,$nk['nom']);
            }
        }
    }
 }


$terjual = array_fill(0,$totBulanValid,0);
$c = $totalPenjualan;
$res = array_fill(0,$totBulanValid,0);
for($m = 0; $m<$totBulanValid; $m++){
    if($c > (int)$totPerBulan[$m]){
        // array_push($terjual,$totPerBulan[$m]);
        $terjual[$m] = $totPerBulan[$m];
        $c = $c - (int)$totPerBulan[$m];

    }else{
        // array_push($terjual,$c);
        $terjual[$m] = $c;
        break;
    }
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
    <title>UD. Tri L | Rekap Perbulan</title>
    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <link href="img/logo1.png" rel="icon">
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
                        <h1 class="h3 mb-3 text-gray-800">Rekap Perbulan</h1>
                        <a href="index.php?m=1&n=1"
                            class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm mb-4"><i
                                class=" far fa-arrow-alt-circle-left text-white-50"></i> Kembali Ke Halaman
                            Dashboard</a>
                    </div>

                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Rekap Pupuk</h6>
                        </div>

                        <div class="mt-4 ml-4  ">
                            <!-- Jenis Pupuk -->

                            <div class="row">
                                <div class="col-lg-6">
                                    <h6 class="m-0 font-weight-bold text-primary">Rekap Pada Bulan
                                        <?php  echo $tanggal ;?></h6>
                                    <p>Jika pupuk sisa, maka penjualan akan dimasukkan pada bulan ini</p>
                                </div>
                                <div class="col-lg-2">

                                    <select class=" custom-select" id="jenisPP">
                                        <option selected="true" disabled="disabled">- pilih pupuk -
                                        </option>
                                        <?php
                                    $pupuk = mysqli_query($conn, "SELECT Jenis_Pupuk From data_pupuk");
                                    foreach ($pupuk as $key) {
                                       $ambil_pupuk = $key['Jenis_Pupuk'];                                  
                                    ?>
                                        <option><?= $ambil_pupuk; ?>
                                        </option><?php }?>
                                    </select>
                                </div>
                                <div class="col-lg-2">
                                    <select class="custom-select" id="select_tahun">
                                        <option selected="true" disabled="disabled">- pilih tahun -
                                        </option>
                                    </select>
                                </div>
                                <div class="col-lg-2">
                                    <button type="button" class="btn btn-info">OK</button>
                                </div>
                            </div>

                        </div>

                        <div class="card-body">

                            <table class="table table-bordered">
                                <thead class=" thead-dark">
                                    <tr>
                                        <th scope="col">Bulan</th>
                                        <th scope="col">Jumlah Pembelian</th>
                                        <th scope="col">Total</th>
                                        <th scope="col">Jumlah Terjual</th>
                                        <th scope="col">Harga Jual /Karung</th>
                                        <th scope="col">Total</th>
                                        <th scope="col">Keuntungan</th>
                                        <th scope="col">Sisa</th>

                                    </tr>

                                </thead>
                                <tbody>
                                    <?php
                                 
                                  for($i = 0; $i < $totBulanValid; $i++){
                                    echo('<tr>');

                                        echo('<td>'.$bulanValid[$i].'</td>');
                                        echo('<td>'.$totPerBulan[$i].'</td>');
                                        echo('<td>'.rp($nominalPerBulan[$i]).'</td>');
                                        echo('<td>'.$terjual[$i].'</td>');
                                        echo('<td>'.rp($hargaJualPerKarung).'</td>');
                                        echo('<td>'.rp(((int)$terjual[$i] * (int)$hargaJualPerKarung)).'</td>');
                                        $totalSales = ((int)$terjual[$i] * (int)$hargaJualPerKarung);
                                        echo('<td>'.rp(($totalSales - (int)$nominalPerBulan[$i])).'</td>');
                                        echo('<td>'.((int)$totPerBulan[$i] - (int)$terjual[$i]).'</td>');
                                    
                                    echo('</tr>');
                                  }
                                  ?>
                                </tbody>

                            </table>

                        </div>
                    </div>

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
    <script>
    var select = document.getElementById('select_tahun');
    var date = new Date();
    var year = date.getFullYear();
    for (var i = year - 5; i <= year + 2; i++) {
        var option = document.createElement('option');
        option.value = option.innerHTML = i;
        if (i === year) option.selected = true;
        select_tahun.appendChild(option);
    }
    </script>

</body>

</html>
<?php } else {
    header("Location: login.php");
    exit();
}?>