<?php
session_start();
include "connection.php";
include "functions.php";

date_default_timezone_set('Asia/Jakarta');
$tanggal= date("D, j M Y ");

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
</head>

<body id="page-top" onload="initBuyer()">
    <!-- Page Wrapper -->
    <div id="wrapper">
        <!-- include sidebar -->
        
        <?php include "segment/sidebar.php";?>
        <!-- end include sidebar -->
        

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">
            <!-- Main Content -->
            <div id="content">
                <?php include "segment/header.php";?>
                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <!-- Page Heading -->
                    <hr class="sidebar-divider my-0 mt-5 mb-5">
                    <div class="d-sm-flex align-items-center justify-content-between ">
                       
                        <h1 class="h3 mb-3 text-gray-800">Stok Pupuk Keluar</h1>
                       

                    </div>

                    <!-- Konten -->
                    <div class="row">

                        <!-- Area Chart -->



                        <div class="col-xl-6 col-lg-6">

                            <?php
@session_start();
    if (isset($_SESSION["info"])) {
       echo($_SESSION["info"]);
    unset($_SESSION["info"]);
    }

    ?>
                            <div class="card shadow mb-4">
                           
                                <div
                                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary"><i class="fas fa-cart-plus"></i> Input Penjualan Pupuk</h6>

                                </div>
                        
                                <div class="card-body">

                                <div class="row mb-2 mt-3">
                                            <!-- Jenis Pembeli -->
                                            <label class="col-sm-4 col-form-label"> Jenis Pembeli  </label>
                                            <div class="col-sm-8">
                                                <div class="custom-control custom-radio custom-control-inline" onclick="kelompokCtrl()">
                                                    <input type="radio" id="customRadioInline1" name="customRadioInline1" class="custom-control-input" checked>
                                                    <label class="custom-control-label" for="customRadioInline1">Kelompok</label>
                                                </div>
                                                <div class="custom-control custom-radio custom-control-inline" onclick="anggotaCtrl()">
                                                    <input type="radio" id="customRadioInline2" name="customRadioInline1" class="custom-control-input">
                                                    <label class="custom-control-label" for="customRadioInline2">Anggota</label>
                                                </div>                                           
                                            </div>
                                        </div>

                                      
                                        <div class="row mb-2" id="divKel">
                                            <!-- Nama Pembeli -->
                                            <label class="col-sm-4 col-form-label"> Nama Kelompok </label>
                                            <div class="col-sm-8">
                                            <select class="custom-select" id="selectcust" onclick="custControl()">
                                                    <option selected="true" disabled="disabled">-- pilih kelompok tani --
                                                    </option>
                                                    <?php
$data = mysqli_query($conn, "SELECT ID_KT,Nama_Kel FROM data_kel_tani ORDER BY ID_KT DESC");
    foreach ($data as $all) {
        echo (' <option id="kel'.$all['ID_KT'].'" value="'. $all['Nama_Kel'] .'">' . $all['Nama_Kel'] . '</option>');
    }
    ?>
                                                </select>
                                                   
                                                <p style="color:red; font-size:12px;" id="username_hint"></p>
                                            </div>
                                        </div>

                                        
                                        <div class="row mb-4" id="divAng">
                                            <!-- Nama Pembeli -->
                                            <label class="col-sm-4 col-form-label"> Nama Anggota </label>
                                            <div class="col-sm-8">
                                            <input type="text" class="form-control" id="anggota" name="anggota" onkeyup="setNamaAnggota()" required>
                                            </div>
                                        </div>


                                        <div class="row mb-4">
                                            <!-- Nama Pengirim -->
                                            <label class="col-sm-4 col-form-label"> Jenis Pupuk </label>
                                            <div class="col-sm-8">
                                                <select class="custom-select" id="selectpupuk" name="selectpupuk" onchange="pupukControl()" required>
                                                    <option selected="true" disabled="disabled">-- pilih jenis pupuk --
                                                    </option>
                                                    <?php
$data = mysqli_query($conn, "SELECT ID_PK,Jenis_Pupuk,Harga,Stok FROM data_pupuk ORDER BY ID_PK DESC");
    foreach ($data as $all) {
        echo (' <option class="'.$all['Stok'].'" id="ppk'.$all['ID_PK'].'" value="'. $all['Harga'] .'">' . $all['Jenis_Pupuk'] . '</option>');
    }
    ?>

                                                </select>
                                            </div>
                                        </div>




                                        <div class="row mb-4">
                                            <!-- Nama Pengirim -->
                                            <label class="col-sm-4 col-form-label"> Harga </label>
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control" id="harga" name="harga" readonly
                                                     required onkeyup="priceManualControl()">
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-check form-check-inline mt-2">
                                                    <input class="form-check-input" type="checkbox" id="checkprice"
                                                        value="option1" checked onclick="priceControl()">
                                                    <label class="form-check-label" for="checkprice">harga
                                                        normal</label>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="row mb-2">
                                            <!-- Nama Pengirim -->
                                            <label class="col-sm-4 col-form-label"> Jumlah (karung) </label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control" id="jumlah" name="jumlah" onkeyup="stokAvailCheck()"
                                                    required)>
                                                <p style="color:green; font-size:12px;" id="stok_hint"></p>
                                            </div>
                                        </div>
                                       
                                        <div class="row mb-4">
                                            <!-- Nama Pengirim -->
                                            
                                            <div class="col-sm-4">
                                               
                                            </div>
                                            <div class="col-sm-6">
                                                <button type="button" id="btnOK" class="btn btn-primary btn-sm" onclick="addFields()"><i class="fas fa-plus-square"></i> tambahkan</button>
                                            </div>
                                        </div>

                                </div>

                            </div>


                        </div>
                        <!-- </form> -->
                        <!--end of div col-->

                        <div class="col-xl-6 col-lg-6">

                            <div class="card shadow mb-4">

                                <div
                                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary"><i class="fas fa-file"></i> Nota Penjualan</h6>

                                </div>
                                <!-- Card Body -->
                                <div class="card-body">

                                <div class="row mb-2">
                                            <!-- Nama Pengirim -->
                                            <div class="col-lg-4">
                                            <img src="img/logo1.png" width="30%">
                                            </div>
                                           
                                            <div class="col-sm-8">
                                              
                                            </div>
                                </div>

                                <form method="POST" action="addStokKeluar.php" onsubmit="return confirm('Pastikan data yang akan disimpan telah benar. Klik Ok jika anda yakin, klik cancel jika ingin meneliti kembali');">
                                <div class="row">
  
                                            <div class="col-lg-12"  align="right">
                                                <div class="text-xs font-weight-bold text-secondary text-uppercase mb-1">
                                            <span id ="notanama">Nama Pembeli : _______________________</span><br>
                                            <span id="waktunota"></span>
                                            <span id="tanggalnota"></span> 
                                                </div>
                                            </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12">
                                        ==================================================
                                    </div>
                                </div>

                                <table class="table table-bordered">
                                    <thead>
                                        <th>Qty</th>
                                        <th>Pupuk</th>
                                        <th>Harga</th>
                                        <th>Total</th>
                                        
                                    </thead>
                                    <tbody id="container">
                                       
                                    </tbody>
                                </table>

                           
                                <div class="row mb-2">
                                            <!-- Nama Pengirim -->
                                            <label class="col-sm-7 col-form-label">  <button type="button" class="btn btn-danger btn-sm" onclick="decName()"><i class="fas fa-undo-alt"></i></button> </label>
                                            
                                </div>

                                <div class="row mb-2">
                                            <!-- Nama Pengirim -->
                                            <label class="col-sm-4 col-form-label"> Total Belanja </label>
                                            <div class="col-sm-5">
                                                <input type="text" class="form-control" id="notatotal" name="notatotal"
                                                    required readonly>
                                                    <input type="text" class="form-control" id="iterator" name="iterator"
                                                    required readonly hidden>
                                                    <input type="text" class="form-control" id="idpupuk" name="idpupuk"
                                                     hidden>
                                                    <input type="text" class="form-control" id="idkel" name="idkel" required hidden>
                                                     <input type=text id="buyer" name="buyer" readonly required hidden>
                                                     <input type=text id="namaanggota" name="namaanggota"  required hidden>
                                               
                                            </div>
                                            <div class="col-sm-3 mt-1">
                                                <button type="button" class="btn btn-success btn-sm" onclick="hitungTotal()"><i class="fas fa-coins"></i> totalkan</button>
                                            </div>
                                </div>
                                <div class="row" id="row">
                                            <!-- Nama Pengirim -->
                                            <label class="col-sm-4 col-form-label">Dibayar</label>
                                            <div class="input-group col-sm-5">
                                           
                                                <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-addon1">Rp.</span>
                                                </div>
                                                <input type="text" class="form-control" id="bayar" name="bayar" onkeyup="dibayarCtrl()">
                                               
                                            </div>
                                            
                                </div>

                                <div class="row mt-2 mb-2" id="row">
                                            <!-- Nama Pengirim -->
                                            <label class="col-sm-4 col-form-label">Biaya Transport</label>
                                            <div class="input-group col-sm-5">
                                            <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-addon1">Rp.</span>
                                                </div>
                                                <input type="text" class="form-control" id="transport" name="transport" onkeyup="transportCtrl()">
                                               
                                            </div>

                                            <div class="col-sm-3">
                                                <button type="submit" class="btn btn-primary btn-sm"><i class="fas fa-save"></i> simpan</button>
                                            </div>
                                       
                                </div>

                                </div> 
                                <!-- end of cardbody -->
                            </div>
                            <!-- end of card shadow -->
                            </form>
                        </div>
                        <!-- end of col -->
                    </div>
                    <!-- end of row -->

                    <div class="row">
                        <div class="col col-lg-12">
                            <div class="card shadow mb-4">
                                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary"> <i class="fas fa-user"></i> Data Penjualan Pupuk - Anggota</h6>    
                                </div>

                                <div class="card-body">
                                    <div class="row mb-2">
                                        <div class="col col-lg-12">
                                            <div class="table-responsive">
                                                <table class="table table-bordered" id="tableAng" width="100%" cellspacing="0">
                                                    <thead>
                                                        <tr>
                                                            <th scope="col">No</th>
                                                            <th scope="col">Tanggal</th>
                                                            <th scope="col">Anggota</th>
                                                            <th scope="col">Lihat Item</th>
                                                            <th scope="col">Total</th>
                                                            <th scope="col">Dibayar</th>
                                                            <th scope="col">Aksi</th>
                                                         </tr>
                                                    </thead>
                                                    <tbody>
                                                    <?php
                                                       $nopen=1;
                                                       $sqlPenj=mysqli_query($conn,"SELECT ID_PJ,ID_AKT,ID_KEY,Tanggal,Total,Dibayar FROM penjualan WHERE ID_KT LIKE '0' ORDER BY ID_PJ DESC");
                                                       foreach($sqlPenj as $sp){
                                                            echo("<tr>");
                                                            echo("<td>".$nopen."</td>");
                                                            echo("<td>".$sp['Tanggal']."</td>");
                                                            echo("<td>".$sp['ID_AKT']."</td>");
                                                            echo('<td><center><a href="" data-toggle="modal" data-target="#viewItem'.$sp['ID_PJ'].'"><i class="fas fa-eye" data-toggle="tooltip" data-placement="top" title="Lihat Item Penjualan"> </i> lihat item</center> </a></td>');
                                                            echo("<td>".rp($sp['Total'])."</td>");
                                                            echo("<td>".rp($sp['Dibayar'])."</td>");
                                                            $newKey="'".$sp['ID_KEY']."'";
                                                           
                                                            echo('<td><center><a href=""  data-toggle="modal" data-target="#delItem'.$sp['ID_PJ'].'" class="btn btn-outline-warning btn-sm"><i class="fas fa-trash-alt"></i></a>  <a href="" class="btn btn-outline-primary btn-sm" onclick="toPrintPage('.$newKey.')"><i class="fas fa-print"></i></a></center></td>');
                                                            echo("</tr>");
                                                            ?>
                                                            
                                                        <div class="modal fade" id="viewItem<?=$sp['ID_PJ'];?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                                    <div class="modal-dialog modal-lg" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                Data Item Penjualan Anggota : <?php echo($sp['ID_AKT'].'<br>Tanggal : '.$sp['Tanggal']); ?>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                    <div class="container">
                                                                        <div class="row mb-2">
                                                                            <div class="col-sm">
                                                                                Item
                                                                            </div>
                                                                            <div class="col-sm">
                                                                                Qty
                                                                            </div>
                                                                            <div class="col-sm">
                                                                                Harga / Karung
                                                                            </div>
                                                                            <div class="col-sm">
                                                                               Total
                                                                            </div>
                                                                        </div>
                                                                        <!-- here for looop -->
                                                                        <?php 
                                                                            $getItem=mysqli_query($conn,"SELECT ID_PK,Jumlah_Keluar,Harga FROM stok_keluar WHERE key_transaksi LIKE '".$sp['ID_KEY']."'");
                                                                            foreach($getItem as $gi){
                                                                                $nameppk="";
                                                                                $getPupukName=mysqli_query($conn,"SELECT Jenis_Pupuk FROM data_pupuk WHERE ID_PK =".$gi['ID_PK']);
                                                                                foreach($getPupukName as $gpn){
                                                                                    $nameppk=$gpn['Jenis_Pupuk'];
                                                                                }
                                                                                echo(' <div class="row">
                                                                                <div class="col-sm">'
                                                                                    .$nameppk.'
                                                                                </div>
                                                                                <div class="col-sm">'
                                                                                    .$gi['Jumlah_Keluar'].'
                                                                                </div>
                                                                                <div class="col-sm">'
                                                                                    .$gi['Harga'].'  
                                                                                </div>
                                                                                <div class="col-sm">'
                                                                                   .(int)$gi['Jumlah_Keluar']*(int)$gi['Harga'].'
                                                                                </div>
                                                                            </div>');
                                                                            }
                                                                        ?>
                                                                       
                                                                        <!-- end of loop -->
                                                                    </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary mr-2"
                                                                    data-dismiss="modal">Close </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="modal fade" id="delItem<?=$sp['ID_PJ'];?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                Hapus Anggota : <?php echo($sp['ID_AKT'].'<br>Tanggal : '.$sp['Tanggal']); ?>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                    <div class="container"><center>
                                                                    <h3 class="text-danger">PERINGATAN!</h3>
                                                                    Membatalkan/ menghapus data mungkin akan
                                                                    menyebabkan beberapa data tidak singkron.
                                                                    Pastikan
                                                                    data yang akan dihapus adalah
                                                                    data yang sudah tidak terpakai. <strong
                                                                        class="text-danger">Anda
                                                                        yakin
                                                                        akan
                                                                        menghapus ?</strong>
                                                                </center>
                                                                    </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                    data-dismiss="modal">kembali</button>
                                                                <a href="cancelStokKeluar.php?key=<?=$sp['ID_KEY'];?>"
                                                                    class="btn btn-danger">Ya, Hapus</a>
                                                              
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                            <?php
                                                            $nopen++;
                                                       }
                                                    ?>


                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col col-lg-12">
                            <div class="card shadow mb-4">
                                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary"><i class="fas fa-user-friends"></i> Data Penjualan Pupuk - Kelompok</h6>    
                                </div>

                                <div class="card-body">
                                    <div class="row mb-2">
                                        <div class="col col-lg-12">
                                            <div class="table-responsive">
                                                <table class="table table-bordered" id="tableKel" width="100%" cellspacing="0">
                                                    <thead>
                                                        <tr>
                                                            <th scope="col">No</th>
                                                            <th scope="col">Tanggal</th>
                                                            <th scope="col">Kelompok</th>
                                                            <th scope="col">Lihat Item</th>
                                                            <th scope="col">Total</th>
                                                            <th scope="col">Dibayar</th>
                                                            <th scope="col">Aksi</th>
                                                         </tr>
                                                    </thead>
                                                    <tbody>
                                                    <?php
                                                       $nopen=1;
                                                       $sqlPenj=mysqli_query($conn,"SELECT ID_PJ,ID_KT,ID_KEY,Tanggal,Total,Dibayar FROM penjualan WHERE ID_AKT LIKE '0' ORDER BY ID_PJ DESC");
                                                       foreach($sqlPenj as $sp){
                                                            echo("<tr>");
                                                            echo("<td>".$nopen."</td>");
                                                            echo("<td>".$sp['Tanggal']."</td>");
                                                            $namakelompok="";
                                                            $sqlNamaKel=mysqli_query($conn,"SELECT Nama_Kel FROM data_kel_tani WHERE ID_KT=".$sp['ID_KT']);
                                                            foreach($sqlNamaKel as $snk){
                                                                $namakelompok=$snk['Nama_Kel'];
                                                                echo("<td>".$namakelompok."</td>");
                                                            }
                                                            echo('<td><center><a href="" data-toggle="modal" data-target="#viewItemK'.$sp['ID_PJ'].'"><i class="fas fa-eye" data-toggle="tooltip" data-placement="top" title="Lihat Item Penjualan"></i> lihat item</center>  </i></a></td>');
                                                            echo("<td>".rp($sp['Total'])."</td>");
                                                            echo("<td>".rp($sp['Dibayar'])."</td>");
                                                            $newBuyer="'1'";
                                                            $newKeyAng="'".$sp['ID_KEY']."'";
                                                            echo('<td><center><a href=""  data-toggle="modal" data-target="#delItemK'.$sp['ID_PJ'].'" class="btn btn-outline-warning btn-sm"><i class="fas fa-trash-alt"></i></a> <a href="" class="btn btn-outline-primary btn-sm" onclick="toPrintPage('.$newKeyAng.','.$newBuyer.')"><i class="fas fa-print"></i></a></center></td>');
                                                            echo("</tr>");
                                                            ?>
                                                            
                                                            <div class="modal fade" id="viewItemK<?=$sp['ID_PJ'];?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                                    <div class="modal-dialog modal-lg" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                Data Item Penjualan Kelompok : 
                                                                <?php echo($namakelompok.'<br>Tanggal : '.$sp['Tanggal']); ?>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                    <div class="container">
                                                                        <div class="row mb-2">
                                                                            <div class="col-sm">
                                                                                Item
                                                                            </div>
                                                                            <div class="col-sm">
                                                                                Qty
                                                                            </div>
                                                                            <div class="col-sm">
                                                                                Harga / Karung
                                                                            </div>
                                                                            <div class="col-sm">
                                                                               Total
                                                                            </div>
                                                                        </div>
                                                                        <!-- here for looop -->
                                                                        <?php 
                                                                            $getItem=mysqli_query($conn,"SELECT ID_PK,Jumlah_Keluar,Harga FROM stok_keluar WHERE key_transaksi LIKE '".$sp['ID_KEY']."'");
                                                                            foreach($getItem as $gi){
                                                                                $nameppk="";
                                                                                $getPupukName=mysqli_query($conn,"SELECT Jenis_Pupuk FROM data_pupuk WHERE ID_PK =".$gi['ID_PK']);
                                                                                foreach($getPupukName as $gpn){
                                                                                    $nameppk=$gpn['Jenis_Pupuk'];
                                                                                }
                                                                                echo(' <div class="row">
                                                                                <div class="col-sm">'
                                                                                    .$nameppk.'
                                                                                </div>
                                                                                <div class="col-sm">'
                                                                                    .$gi['Jumlah_Keluar'].'
                                                                                </div>
                                                                                <div class="col-sm">'
                                                                                    .$gi['Harga'].'  
                                                                                </div>
                                                                                <div class="col-sm">'
                                                                                   .(int)$gi['Jumlah_Keluar']*(int)$gi['Harga'].'
                                                                                </div>
                                                                            </div>');
                                                                            }
                                                                        ?>
                                                                       
                                                                        <!-- end of loop -->
                                                                    </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary mr-2"
                                                                    data-dismiss="modal">Close </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>


                                                
                                                <div class="modal fade" id="delItemK<?=$sp['ID_PJ'];?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                Hapus Transaski
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                    <div class="container"><center>
                                                                    <h3 class="text-danger">PERINGATAN!</h3>
                                                                    Membatalkan/ menghapus data mungkin akan
                                                                    menyebabkan beberapa data tidak singkron.
                                                                    Pastikan
                                                                    data yang akan dihapus adalah
                                                                    data yang sudah tidak terpakai. <strong
                                                                        class="text-danger">Anda
                                                                        yakin
                                                                        akan
                                                                        menghapus ?</strong>
                                                                </center>
                                                                    </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                    data-dismiss="modal">kembali</button>
                                                                <a href="cancelStokKeluar.php?key=<?=$sp['ID_KEY'];?>"
                                                                    class="btn btn-danger">Ya, Hapus</a>
                                                              
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                            <?php
                                                            $nopen++;
                                                       }
                                                    ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    </div>        

                </div>
                
                <!-- /.container-fluid -->
                <?php include "segment/footer.php";?>
            </div>
            <!-- End of Main Content -->

            <!-- footer -->

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

    <!-- Page level custom scripts -->
    

    <script>

    $(document).ready(function() {
        $('#tableAng').DataTable();
    });

    $(document).ready(function() {
        $('#tableKel').DataTable();
    });

    function dibayarCtrl(){
        var dibayar=document.getElementById("bayar").value.split('.').join("");
        var dibayarNoRp=dibayar.replace("Rp. ","");

        document.getElementById("bayar").value=toRp(dibayarNoRp);
    }

    function transportCtrl(){
        var dibayar=document.getElementById("transport").value.split('.').join("");
        var dibayarNoRp=dibayar.replace("Rp. ","");

        document.getElementById("transport").value=toRp(dibayarNoRp);
    }

    function stokAvailCheck(){
        var e = document.getElementById("selectpupuk");
        var stokpupuk=e.options[e.selectedIndex].className;
        var inputJml=document.getElementById("jumlah").value;

      

        if(parseInt(stokpupuk)<parseInt(inputJml)){
            alert("Jumlah yang dibeli melebihi stok yang tersedia");
            document.getElementById("btnOK").disabled=true;
        }else{
            document.getElementById("btnOK").disabled=false;
        }
        if(parseInt(stokpupuk)==0){
            alert("Stok pupuk Kosong (0)");
            document.getElementById("btnOK").disabled=true;
        }
    }

    var name=0;

    function setNamaAnggota(){
        var valNama=document.getElementById("anggota").value;
        document.getElementById("namaanggota").value=valNama;
        document.getElementById("notanama").innerHTML="Nama Pembeli : "+valNama;
    }

    function pupukControl(){
        var e = document.getElementById("selectpupuk");
        price = e.value;
        document.getElementById("harga").value = toRp(price,"Rp. ");
        document.getElementById("harga").readOnly = true;
        document.getElementById("checkprice").checked = true;

        var idpupuk=e.options[e.selectedIndex].id;
        var stokpupuk=e.options[e.selectedIndex].className;

        if (parseInt(stokpupuk)<=0){
            document.getElementById("stok_hint").innerHTML="Stok Habis TIDAK DAPAT MELAKUKAN TRANSAKSI";
            document.getElementById("btnOK").disabled=true;
        }else{
            document.getElementById("stok_hint").innerHTML="Stok Tersedia : "+stokpupuk+" Karung";
        }
       
        document.getElementById("idpupuk").value=idpupuk.replace("ppk","");
    }

    function custControl(){
        var e = document.getElementById("selectcust");
        var idkeltani=e.options[e.selectedIndex].id;
        var namekeltani=e.options[e.selectedIndex].value;
        document.getElementById("idkel").value=idkeltani.replace("kel","");
        document.getElementById("notanama").innerHTML="Nama Pembeli : "+namekeltani;
        
    }

    function priceManualControl(){
        var dibayar=document.getElementById("harga").value.split('.').join("");
        var dibayarNoRp=dibayar.replace("Rp. ","");

        document.getElementById("harga").value=toRp(dibayarNoRp,"Rp. ");
    }
        
    function priceControl() {

        if (document.getElementById("checkprice").checked == false) {
            document.getElementById("harga").readOnly = false;
            document.getElementById("harga").value = "";
            
        } else {
            document.getElementById("harga").readOnly = true;
            document.getElementById("harga").value = toRp(price,"Rp. ");
            
        }
    }

      
        function decName(){

            var tbody = document.getElementById("container");
            if(name>0){
                if (tbody.hasChildNodes()) {
                    tbody.removeChild(tbody.lastElementChild);
                    name--;
                }else{

                }       
            }
            hitungTotal();

        }
        

        function addFields(){
         var selPupuk=document.getElementById("selectpupuk");
         var pupuk=selPupuk.options[selPupuk.selectedIndex].text;

         var harga=document.getElementById("harga").value.split('.').join("");
         var hargaNoRp=harga.replace("Rp ","");
         var jumlah=document.getElementById("jumlah").value;

         const nodeTR = document.createElement("tr");

         const nodeTDb = document.createElement("td");
         var inputb = document.createElement("input");
                inputb.type = "text";
                inputb.id="b"+name;
                inputb.name = "b"+name;
                inputb.size="2";
                inputb.style="border:0;outline:0";
                inputb.value=jumlah;
                nodeTDb.appendChild(inputb);

         const nodeTDn = document.createElement("td");
         var inputn = document.createElement("input");
                inputn.type = "text";
                inputn.id="n"+name;
                inputn.name = "n"+name;
                inputn.size="15";
                inputn.style="border:0;outline:0";
                inputn.value=pupuk;
                nodeTDn.appendChild(inputn);

         const nodeTDh = document.createElement("td");
         var inputh = document.createElement("input");
                inputh.type = "text";
                inputh.id="h"+name;
                inputh.name = "h"+name;
                inputh.size="7";
                inputh.style="border:0;outline:0";
                inputh.value=toRp(hargaNoRp,"Rp. ");
                nodeTDh.appendChild(inputh);

         const nodeTDt = document.createElement("td");
         var inputt = document.createElement("input");
                inputt.type = "text";
                inputt.id="t"+name;
                inputt.name = "t"+name;
                inputt.size="12";
                inputt.style="border:0;outline:0";
                inputt.value=toRp((parseInt(hargaNoRp)*parseInt(jumlah)).toString(),"Rp");
                nodeTDt.appendChild(inputt);

       
         var inputID = document.createElement("input");
                inputID.type = "hidden";
                inputID.id="ID_PK"+name;
                inputID.name = "ID_PK"+name;
                inputID.size="7";
                inputID.style="border:0;outline:0";
                inputID.value=document.getElementById("idpupuk").value;
                

         nodeTR.appendChild(nodeTDb);
         nodeTR.appendChild(nodeTDn);
         nodeTR.appendChild(nodeTDh);
         nodeTR.appendChild(nodeTDt);

        
      
         var tbody = document.getElementById("container");
         tbody.appendChild(nodeTR);
         name++;

         document.getElementById("iterator").value=name;

         var row = document.getElementById("row");
         row.appendChild(inputID);

         
        }

        function hitungTotal(){
            var totalResult=0;
            for(let i=0; i<name; i++){
                var text=document.getElementById("t"+i).value.split('.').join("");
                var noRp=text.replace("Rp ","");
                
                totalResult=totalResult+(parseInt(noRp));
            }

            document.getElementById("notatotal").value=toRp(totalResult.toString(),"Rp. ");
        }

        function anggotaCtrl(){
            document.getElementById("namaanggota").required=true;
            document.getElementById("idkel").required=false;
            document.getElementById("divKel").hidden=true;
            document.getElementById("divAng").hidden=false;
            document.getElementById("buyer").value="1";
            document.getElementById("notanama").innerHTML="Nama Pembeli : __________________";

            
        }

        function kelompokCtrl(){
            document.getElementById("namaanggota").required=false;
         
            document.getElementById("idkel").required=true;
            document.getElementById("divKel").hidden=false;
            document.getElementById("divAng").hidden=true;
            document.getElementById("buyer").value="2";
            document.getElementById("anggota").value="";
            document.getElementById("notanama").innerHTML="Nama Pembeli : __________________"

        }

        function initBuyer(){
            document.getElementById("divKel").hidden=false;
            document.getElementById("divAng").hidden=true;
            document.getElementById("buyer").value="2";

            
          
            var p = document.getElementById('tanggalnota');
            let today = new Date().toISOString().slice(0, 10);
            document.getElementById("waktunota").innerHTML="Tanggal : "+today;

            function time() {
            var d = new Date();
            var s = d.getSeconds();
            var m = d.getMinutes();
            var h = d.getHours();
            p.textContent = "Pukul : "+
                ("0" + h).substr(-2) + ":" + ("0" + m).substr(-2) + ":" + ("0" + s).substr(-2);
            }

            setInterval(time, 1000);
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

        function toPrintPage(key,buyer){
            window.open("printNota.php?KEY="+key+"&BUYER="+buyer);
        }

    </script>


</body>

</html>
<?php } else {
    header("Location: login.php");
    exit();
}?>