<?php
session_start();
include "connection.php";
include 'functions.php';
date_default_timezone_set('Asia/Jakarta');
$tanggal = date("D, j M Y ");
$KEY=$_GET['KEY'];
$BUYER=$_GET['BUYER'];
$dibayar=0;
$totalBelanja=0;
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
  * Version control : Github
  ======================================================== -->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>UD. Tri L | Input Kelompok Tani</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <link href="img/logo1.png" rel="icon">
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

    <style>
        table, th, td {
  border: 1px solid black;
  border-collapse: collapse;
  
}
tr {
  height: 30px;
}

td {
  padding: 10px;
}

th {
  padding: 10px;
}
    </style>

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <div id="content-wrapper" class="d-flex flex-column">

            <div id="content">
             
         
                <div class="container-fluid">
                    <div class="row mt-4 justify-content-center">
                   
                        <div class="col-lg-6">
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                        berhasil menyimpan transaksi
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span></button>
                    </div>
                        <div class="card shadow mb-4">
                                        <div
                                            class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                            <h6 class="m-0 font-weight-bold text-primary">Nota Penjualan</h6>

                                        </div>
                                        <!-- Card Body -->
                                        <div class="card-body">
                                            <div class="row mb-2">
                                                <div class="col-md-8 mb-2"><img src="img/logo1.png" height="50px"><span style="font-size:20px; font-weight:bold;"> UD TRI L</span></div>
                                                
                                            </div><?php
                                            if($BUYER==1){
                                                            $sqlNota=mysqli_query($conn,"SELECT Tanggal,ID_KT,ID_PK,Jumlah_Keluar,Harga FROM stok_keluar WHERE key_transaksi LIKE '".$KEY."'");
                                                        }else{
                                                            $sqlNota=mysqli_query($conn,"SELECT Tanggal,ID_AKT,ID_PK,Jumlah_Keluar,Harga FROM stok_keluar WHERE key_transaksi LIKE '".$KEY."'");
                                                        }?>

                                            <div class="row mb-2 ml-2">
                                                <div class="col-md-7 mb-2">
                                                   <?php 
                                                   if($BUYER==1){

                                                        foreach($sqlNota as $sn){
                                                            $sqlNama=mysqli_query($conn,"SELECT Nama_Kel FROM data_kel_tani WHERE ID_KT=".$sn['ID_KT']);
                                                            foreach($sqlNama as $sna){
                                                                echo('Pembeli : '.$sna['Nama_Kel']);
                                                            break;
                                                        }

                                                        break;
                                                        }

                                                    }else{

                                                        foreach($sqlNota as $sn){
                                                            echo('Pembeli : '.$sn['ID_AKT']);
                                                            break;
                                                        }
                                                    }
                                                    ?>
                                                </div>

                                                <div class="col-md-5 mb-2">
                                                   Tanggal : <?=$tanggal?>
                                                </div>

                                            </div>

                                            <div class="row mb-2">
                                                <table width="100%" style="margin-left:20px; margin-right:20px;">
                                                    <thead>
                                                        <th scope="col">No</th>
                                                        <th scope="col">Pupuk</th>
                                                        <th scope="col">Jml</th>
                                                        <th scope="col">Harga</th>
                                                        <th scope="col">Total</th>
                                                    </thead>
                                                    <tbody>

                                                        <?php 
                                                       
                                                        $no=1;
                                                        foreach($sqlNota as $sn){
                                                           
                                                            echo('<tr><td>'.$no.'</td>');
                                                            $sqlNamaPupuk=mysqli_query($conn,"SELECT Jenis_Pupuk FROM data_pupuk WHERE ID_PK=".$sn['ID_PK']);
                                                            foreach($sqlNamaPupuk as $snp){
                                                                echo('<td>'.$snp['Jenis_Pupuk'].'</td>');
                                                            }
                                                            echo('<td>'.$sn['Jumlah_Keluar'].'</td>');
                                                            echo('<td>'.rp($sn['Harga']).'</td>');
                                                            echo('<td>'.rp($sn['Jumlah_Keluar']*$sn['Harga']).'</td></tr>');
                                                            $totalBelanja=$totalBelanja+($sn['Jumlah_Keluar']*$sn['Harga']);
                                                            $no=$no+1;
                                                        }
                                                        
                                                            for($i=$no; $i<7; $i++){
                                                                echo('<tr><td></td><td></td><td></td><td></td><td></td></tr>');
                                                            }
                                                        
                                                        ?>
                                                       
                                                    </tbody>
                                                </table>
                                            </div>

                                            <div class="row mb-2 ml-2">
                                                <div class="col-md-7 mb-2">
                                                   
                                                </div>

                                                <div class="col-md-5 mb-2 mt-2">
                                                  <?php
                                                  $sqlGetDibayar=mysqli_query($conn,"SELECT Dibayar FROM penjualan WHERE ID_KEY LIKE '".$KEY."'");
                                                  foreach($sqlGetDibayar as $sgd){
                                                    $dibayar=$sgd['Dibayar'];
                                                  }
                                                   echo('Total : '.rp($totalBelanja).'<br>Dibayar : '.rp($dibayar).'<br>');
                                                  if($totalBelanja>=$dibayar){
                                                    //ngutang
                                                    echo('Kekurangan : '.rp($totalBelanja-$dibayar));
                                                  }else{
                                                    echo('Kembalian : '.rp($dibayar-$totalBelanja));
                                                  }
                                                  ?>
                                                </div>

                                            </div>
                                            
                                        
                                        </div>
                            </div>
                        </div>
                          
                   
                    </div>
                    <div class="row  mb-4 justify-content-center">
                        <div class="col-lg-6">
                            <div class="row">
                                <?php $newKey="'".$KEY."'";?>
                                <div class=col-lg-6><a href="page_stok_keluar.php?m=3&n=1"><i class="fas fa-arrow-left"></i> kembali ke hal penjualan</a></div>
                                <div class=col-lg-6 align="right"><a href="" class="btn btn-primary" onclick="toPrint(<?php echo($BUYER.','.$newKey);?>)"><i class="fas fa-print"></i> Cetak Nota</a></div>
                            </div>
                        </div>
                    </div>

                </div>

                 
            </div>



                <?php include "segment/footer.php";?>
        </div>
      
    </div>
    


    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="js/sb-admin-2.min.js"></script>


    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <script src="matauang.js"></script>




    <script>

        $(document).ready(function() {
        $('#tableMasuk').DataTable();
        });

        function toPrint(buyer,key){
            //alert("to print page");
           
            window.open("printNota.php?BUYER="+buyer+"&KEY="+key);
            
        }
  
    </script>


</body>

</html>
<?php } else {
    header("Location: login.php");
    exit();
}
?>