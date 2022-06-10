<?php
session_start();
include "connection.php";

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

<body id="page-top" onload="delCace()">
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
                                <!-- Card Header - Dropdown -->
                                <div
                                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Input Penjualan Pupuk</h6>

                                </div>
                                <!-- Card Body -->
                                <div class="card-body">

                                    <form method="POST" action="addStokKeluar.php">
                                        <div class="row mb-2">
                                            <!-- Nama Pembeli -->
                                            <label class="col-sm-4 col-form-label"> Pembeli </label>
                                            <div class="col-sm-8">
                                            <select class="custom-select" id="selectcust" onchange="custControl()">
                                                    <option selected="true" disabled="disabled">-- pilih kelompok tani --
                                                    </option>
                                                    <?php
$data = mysqli_query($conn, "SELECT ID_KT,Nama_Kel FROM data_kel_tani ORDER BY ID_KT DESC");
    foreach ($data as $all) {
        echo (' <option id="kel'.$all['ID_KT'].'" value="'. $all['Nama_Kel'] .'">' . $all['Nama_Kel'] . '</option>');
    }
    ?>

                                                </select>
                                                    <input type="text" class="form-control" id="idpupuk" name="idpupuk"
                                                     hidden>
                                                    <input type="text" class="form-control" id="idkel" name="idkel"
                                                     hidden>
                                                <p style="color:red; font-size:12px;" id="username_hint"></p>
                                            </div>
                                        </div>

                                        <div class="row mb-4">
                                            <!-- Nama Pengirim -->
                                            <label class="col-sm-4 col-form-label"> Jenis Pupuk </label>
                                            <div class="col-sm-8">
                                                <select class="custom-select" id="selectpupuk" onchange="pupukControl()">
                                                    <option selected="true" disabled="disabled">-- pilih jenis pupuk --
                                                    </option>
                                                    <?php
$data = mysqli_query($conn, "SELECT ID_PK,Jenis_Pupuk,Harga,Stok FROM data_pupuk ORDER BY ID_PK DESC");
    foreach ($data as $all) {
        echo (' <option class="ppk'.$all['Stok'].'" id="'.$all['ID_PK'].'" value="'. $all['Harga'] .'">' . $all['Jenis_Pupuk'] . '</option>');
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
                                                    value="50000" required>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-check form-check-inline mt-2">
                                                    <input class="form-check-input" type="checkbox" id="checkprice"
                                                        value="option1" onclick="priceControl()" checked>
                                                    <label class="form-check-label" for="checkprice">harga
                                                        normal</label>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="row mb-2">
                                            <!-- Nama Pengirim -->
                                            <label class="col-sm-4 col-form-label"> Jumlah (karung) </label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control" id="jumlah" name="jumlah"
                                                    required onkeyup="setJumlah()">
                                                <p style="color:red; font-size:12px;" id="username_hint"></p>
                                            </div>
                                        </div>
                                        <div class="row mb-2">
                                            <!-- Nama Pengirim -->
                                            <label class="col-sm-4 col-form-label"> Total </label>
                                            <div class="col-sm-5">
                                                <input type="text" class="form-control" id="totaluang" name="totaluang"
                                                    required readonly>
                                               
                                            </div>
                                            <div class="col-sm-3 mt-1">
                                               
                                               <button type="button" class="btn btn-outline-primary btn-sm" onclick="doTotal()">hitung total</buton>
                                            </div>
                                        </div>
                                        <div class="row mb-4">
                                            <label class="col-sm-4 col-form-label"> Pembayaran </label>
                                            <div class="custom-control custom-radio custom-control-inline mt-2 ml-2">
                                                <input type="radio" id="customRadioInline1" name="pembayaran" value="tunai"
                                                    class="custom-control-input" onclick="tunaiControl()" checked="checked">
                                                <label class="custom-control-label" for="customRadioInline1">
                                                    Tunai</label>
                                            </div>
                                            <div class="custom-control custom-radio custom-control-inline mt-2">
                                                <input type="radio" id="customRadioInline2" name="pembayaran" value="hutang"
                                                    class="custom-control-input" onclick="hutangControl()">
                                                <label class="custom-control-label"
                                                    for="customRadioInline2">Hutang</label>
                                            </div>

                                        </div>

                                        
                                        <div class="row mb-4">
                                            <!-- Nama Pengirim -->
                                            
                                            <div class="col-sm-4">
                                               
                                            </div>
                                            <div class="col-sm-6">
                                                <button type="submit" id="btnOK" class="btn btn-primary">simpan transaksi</button>
                                            </div>
                                        </div>

                                </div>
                               



                            </div>


                        </div>
                        </form>
                        <!--end of div col-->

                        <div class="col-xl-6 col-lg-6">

                            <div class="card shadow mb-4">

                                <div
                                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Summary</h6>

                                </div>
                                <!-- Card Body -->
                                <div class="card-body">

                                 
                                <div class="row">
                                        <!-- Nama Pengirim -->
                                        <label class="col-sm-12 col-form-label" style="font-size:12px; color:green">Sebelum melakukan transaksi harap teliti kembali
                                            data yang akan diinput. Pastikan semua data yang dimasukan benar dan valid.
                                        </label>

                                    </div>
                                    <div class="row mb-1">
                                        <!-- Nama Pengirim -->
                                        <label class="col-sm-12 col-form-label" style="font-size:12px; color:green">==============================================================
                                        </label>

                                    </div>

                                <div class="row mb-1">
                                        <!-- Nama Pengirim -->
                                        <label class="col-sm-4 col-form-label">Tanggal</label>

                                        <label class="col-sm-5 col-form-label" id="tanggal"><?php echo(": ".$tanggal)?> </label>
                                    </div>

                                <div class="row mb-1">
                                        <!-- Nama Pengirim -->
                                        <label class="col-sm-4 col-form-label">Pembeli</label>

                                        <label class="col-sm-5 col-form-label" id="pembeli"> </label>
                                    </div>

                                <div class="row mb-1">
                                        <!-- Nama Pengirim -->
                                        <label class="col-sm-4 col-form-label"> Jenis Pupuk </label>

                                        <label class="col-sm-5 col-form-label" id="jenis"> </label>
                                    </div>

                                    <div class="row mb-1">
                                        <!-- Nama Pengirim -->
                                        <label class="col-sm-4 col-form-label"> Stok tersedia</label>

                                        <label class="col-sm-5 col-form-label" id="stok"
                                        style="font-size:15px; font-weight:bold; color:green"> </label>
                                    </div>

                                    <div class="row mb-1">
                                        <!-- Nama Pengirim -->
                                        <label class="col-sm-4 col-form-label"> Harga/karung</label>

                                        <label class="col-sm-5 col-form-label" id="perkarung"
                                            > </label>
                                    </div>

                                    <div class="row mb-1">
                                        <!-- Nama Pengirim -->
                                        <label class="col-sm-4 col-form-label"> Jumlah Karung</label>

                                        <label class="col-sm-5 col-form-label" id="jumlahkarung"
                                            > </label>
                                    </div>

                                   

                                    <div class="row mb-1">
                                        <!-- Nama Pengirim -->
                                        <label class="col-sm-4 col-form-label">Total</label>

                                        <label class="col-sm-5 col-form-label" id="total"
                                            style="font-size:15px; font-weight:bold; color:green"> </label>
                                    </div>

                                    <div class="row mb-1">
                                        <!-- Nama Pengirim -->
                                        <label class="col-sm-4 col-form-label">Pembayaran</label>

                                        <label class="col-sm-5 col-form-label" id="pembayaran"
                                            style="font-size:15px; font-weight:bold; color:green"> </label>
                                    </div>

                                </div>
                            </div>

                            

                        </div>

                            
                        

                    </div>

                    <div class="row">
                        <div class="col-xl-12 col-lg-12">
                            <div class="card shadow mb-4">
                            <div
                                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Data transaksi penjualan</h6>

                                </div>

                                <div class="card-body">
                                    <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                            <thead>
                                                <tr>
                                                    <th scope="col">No</th>
                                                    <th scope="col">Tanggal</th>
                                                    <th scope="col">Pembeli</th>
                                                    <th scope="col">Jenis Pupuk</th>
                                                    <th scope="col">Jumlah Pupuk</th>
                                                    <th scope="col">Harga per Karung</th>
                                                    <th scope="col">Total Pembelian</th>
                                                    <th scope="col">Pembayaran</th>
                                                    <th scope="col">Aksi</th>
                                                    <!-- <th scope="col">Aksi</th> -->

                                                </tr>
                                            </thead>

                                            <tbody>
                                                <?php
$no = 1;
    $data = mysqli_query($conn, "SELECT * FROM stok_keluar ORDER BY ID_SK DESC");
    foreach ($data as $all) {
        echo ('<tr><td>' . $no . '</td>');
        echo ('<td>' . $all['Tanggal'] . '</td>');

            $nkel=mysqli_query($conn,"SELECT Nama_Kel FROM data_kel_tani WHERE ID_KT=".$all['ID_KT']);
            foreach($nkel as $keykel){
                echo ('<td>' . $keykel['Nama_Kel'] . '</td>');
            }

            $npuk=mysqli_query($conn,"SELECT Jenis_Pupuk FROM data_pupuk WHERE ID_PK=".$all['ID_PK']);
            foreach($npuk as $keypuk){
                echo ('<td>' . $keypuk['Jenis_Pupuk'] . '</td>');
            }

        
        echo ('<td>' . $all['Jumlah_Keluar'] . ' karung</td>');
        
        echo ('<td>' . $all['Harga'] . '</td>');
        echo ('<td>' . $all['Nominal'] . '</td>');
        echo ('<td>' . $all['Ket'] . '</td>');
        echo ('<td><a href="" class="btn btn-outline-danger" data-toggle="modal" data-target="#exampleModalCenter');
        echo ($all['ID_SK'] . '">Batalkan</a></td></tr>
                                              ');

        $no++;
        ?></tr>
                                              
                                                <!-- Modal delete -->
                                                <div class="modal fade" id="exampleModalCenter<?=$all['ID_SK'];?>"
                                                    tabindex="-1" role="dialog"
                                                    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLongTitle">Batalkan
                                                                    Transkasi
                                                                </h5>
                                                                <button type="button" class="close" data-dismiss="modal"
                                                                    aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <center><h5 style="color:red">WARNING!</h5> membatalkan transaksi berarti mengembalikan
                                                                jumlah stok pupuk yang telah terjual dan menarik kembali uang pembayaran. Anda yakin akan
                                                                    membatalkan transaksi ?</center>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary"
                                                                    data-dismiss="modal">Close</button>
                                                                <a href="cancelStokKeluar.php?id=<?=$all['ID_SK'];?>&n=<?=$all['Jumlah_Keluar'];?>&m=<?=$all['ID_PK'];?>"
                                                                    class="btn btn-danger">Ya, Batalkan</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- end Modal delete -->
                                                <?php }?>

                                            </tbody>
                                        </table>
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
    <script src="js/demo/datatables-demo.js"></script>

    <script>

    var price = 0;
    function pupukControl() {
        //
        var e = document.getElementById("selectpupuk");
        price = e.value;
        document.getElementById("harga").value = price;
        document.getElementById("harga").readOnly = true;
        document.getElementById("checkprice").checked = true;
        
        document.getElementById("perkarung").innerHTML=': '+price;

        var idterpilih=e.options[e.selectedIndex].id;
        var classterpilih=document.getElementById(idterpilih).className;
        document.getElementById("stok").innerHTML=": "+classterpilih.replace("ppk","");
        document.getElementById("idpupuk").value=idterpilih;

    }

    function priceControl() {
        if (document.getElementById("checkprice").checked == false) {
            document.getElementById("harga").readOnly = false;
            document.getElementById("harga").value = "";
            document.getElementById("perkarung").innerHTML='';
        } else {
            document.getElementById("harga").readOnly = true;
            document.getElementById("harga").value = price;
            document.getElementById("perkarung").innerHTML=': '+price;
        }
    }

    function custControl(){
        var selcus = document.getElementById("selectcust");
        var text= selcus.options[selcus.selectedIndex].text;
        var idcus= selcus.options[selcus.selectedIndex].id;
        document.getElementById("pembeli").innerHTML=': '+text;
        document.getElementById("idkel").value=idcus.replace("kel","");
    }
    

    document.getElementsByName("harga")[0].addEventListener('change', setPrice);
    function setPrice(){
        document.getElementById("perkarung").innerHTML=': '+this.value;
    }

    
    function setJumlah(){
       
        var val= document.getElementById("jumlah").value;
        document.getElementById("jumlahkarung").innerHTML=': '+val;
        document.getElementById("totaluang").value='';
    }

    function tunaiControl(){
        document.getElementById("pembayaran").innerHTML=': Tunai';
    }

    function hutangControl(){
        document.getElementById("pembayaran").innerHTML=': Hutang';
    }

    function doTotal(){
       
        var a=document.getElementById("jumlah").value;
        var b=document.getElementById("harga").value;

        document.getElementById("totaluang").value=a*b;
        document.getElementById("total").innerHTML=': '+a*b;

        var selc = document.getElementById("selectpupuk");
        var idselc = selc.options[selc.selectedIndex].id;
        var stokNow = document.getElementById(idselc).className;

        if(parseInt(stokNow)<parseInt(a)){
            //alert()
            document.getElementById("btnOK").disabled=true;
        }else{
            document.getElementById("btnOK").disabled=false;
        }
    }

    function delCace() {
        document.getElementById("harga").value = "";
        document.getElementById("btnOK").disabled =true;
        document.getElementById("pembayaran").innerHTML=': Tunai'; 

    }
    </script>

</body>

</html>
<?php } else {
    header("Location: login.php");
    exit();
}?>