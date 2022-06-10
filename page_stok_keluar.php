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

                                    <!-- <form method="POST" action="addStokKeluar.php"> -->
                                        <div class="row mb-2">
                                            <!-- Nama Pembeli -->
                                            <label class="col-sm-4 col-form-label"> Pembeli </label>
                                            <div class="col-sm-8">
                                            <select class="custom-select" id="selectcust">
                                                    <option selected="true" disabled="disabled">-- pilih kelompok tani --
                                                    </option>
                                                    <?php
$data = mysqli_query($conn, "SELECT ID_KT,Nama_Kel FROM data_kel_tani ORDER BY ID_KT DESC");
    foreach ($data as $all) {
        echo (' <option id="'.$all['ID_KT'].'" value="'. $all['Nama_Kel'] .'">' . $all['Nama_Kel'] . '</option>');
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
                                                <select class="custom-select" id="selectpupuk" onchange="pupukControl()" >
                                                    <option selected="true" disabled="disabled">-- pilih jenis pupuk --
                                                    </option>
                                                    <?php
$data = mysqli_query($conn, "SELECT ID_PK,Jenis_Pupuk,Harga,Stok FROM data_pupuk ORDER BY ID_PK DESC");
    foreach ($data as $all) {
        echo (' <option class="'.$all['Stok'].'" id="'.$all['ID_PK'].'" value="'. $all['Harga'] .'">' . $all['Jenis_Pupuk'] . '</option>');
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
                                               
                                               <button type="button" class="btn btn-outline-primary btn-sm">hitung total</buton>
                                            </div>
                                        </div>
                                        <div class="row mb-4">
                                            <label class="col-sm-4 col-form-label"> Pembayaran </label>
                                            <div class="custom-control custom-radio custom-control-inline mt-2 ml-2">
                                                <input type="radio" id="customRadioInline1" name="pembayaran" value="tunai"
                                                    class="custom-control-input" checked="checked">
                                                <label class="custom-control-label" for="customRadioInline1">
                                                    Tunai</label>
                                            </div>
                                            <div class="custom-control custom-radio custom-control-inline mt-2">
                                                <input type="radio" id="customRadioInline2" name="pembayaran" value="hutang"
                                                    class="custom-control-input">
                                                <label class="custom-control-label"
                                                    for="customRadioInline2">Hutang</label>
                                            </div>

                                        </div>

                                        
                                        <div class="row mb-4">
                                            <!-- Nama Pengirim -->
                                            
                                            <div class="col-sm-4">
                                               
                                            </div>
                                            <div class="col-sm-6">
                                                <button type="button" id="btnOK" class="btn btn-primary" onclick="addFields()">simpan transaksi</button>
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
                                    <h6 class="m-0 font-weight-bold text-primary">Summary</h6>

                                </div>
                                <!-- Card Body -->
                                <div class="card-body">

                                <table class="table table-bordered">
                                    <thead>
                                        <th>jml</th>
                                        <th>nama</th>
                                        <th>Harga</th>
                                        <th>Total</th>
                                        
                                    </thead>
                                    <tbody id="container">
                                        <tr>
                                            <td><input type="text" name="banyak" size="2" style="border:0;outline:0" value="10" readonly></td>
                                            <td><input type="text" name="barang" size="15" style="border:0;outline:0" value="UREA" readonly></td>
                                            <td><input type="text"  name="harga" size="7" style="border:0;outline:0" value="50000" readonly></td>
                                            <td><input type="text" name="total"  size="7" style="border:0;outline:0" value="500000" readonly></td>
                                           
                                        </tr>
                                    </tbody>
                                </table>
                               
                                </div>
                            </div>

                            

                        </div>

                            
                        

                    </div>

                    <div class="row">
                        <div class="col-xl-12 col-lg-12">
                            <div class="card shadow mb-4">
                            <div
                                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Data Pupuk</h6>

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
        echo ('<td>' . $all['ID_KT'] . '</td>');
        echo ('<td>' . $all['ID_PK'] . '</td>');
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
                                                                <h5 class="modal-title" id="exampleModalLongTitle">Hapus
                                                                    Data Pupuk</h5>
                                                                <button type="button" class="close" data-dismiss="modal"
                                                                    aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <center>WARNING!<br> menghapus data mungkin akan
                                                                    menyebabkan beberapa data tidak singkon. Pastikan
                                                                    data yang akan dihapus adalah
                                                                    data yang sudah tidak terpakai. Anda yakin akan
                                                                    menghapus ?</center>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary"
                                                                    data-dismiss="modal">Close</button>
                                                                <a href="cancelStokKeluar.php?id=<?=$all['ID_SK'];?>&n=<?=$all['Jumlah_Keluar'];?>&m=<?=$all['ID_PK'];?>"
                                                                    class="btn btn-danger">Ya, Hapus</a>
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

    function pupukControl(){
        var e = document.getElementById("selectpupuk");
        price = e.value;
        document.getElementById("harga").value = price;
        document.getElementById("harga").readOnly = true;
        document.getElementById("checkprice").checked = true;
    }
        
    function priceControl() {
        if (document.getElementById("checkprice").checked == false) {
            document.getElementById("harga").readOnly = false;
            document.getElementById("harga").value = "";
            document.getElementById("perkarung").innerHTML = '';
        } else {
            document.getElementById("harga").readOnly = true;
            document.getElementById("harga").value = price;
            document.getElementById("perkarung").innerHTML = ': ' + price;
        }
    }

        var name;
        function addFields(){

            name++;
         
      
         var selPupuk=document.getElementById("selectpupuk");
         var pupuk=selPupuk.options[selPupuk.selectedIndex].text;
         var harga=document.getElementById("harga").value;
         var jumlah=document.getElementById("jumlah").value;

         const nodeTR = document.createElement("tr");

         const nodeTDb = document.createElement("td");
         var inputb = document.createElement("input");
                inputb.type = "text";
                inputb.name = "b";
                inputb.size="2";
                inputb.style="border:0;outline:0";
                inputb.value=jumlah;
                nodeTDb.appendChild(inputb);

         const nodeTDn = document.createElement("td");
         var inputn = document.createElement("input");
                inputn.type = "text";
                inputn.name = "n";
                inputn.size="15";
                inputn.style="border:0;outline:0";
                inputn.value=pupuk;
                nodeTDn.appendChild(inputn);

         const nodeTDh = document.createElement("td");
         var inputh = document.createElement("input");
                inputh.type = "text";
                inputh.name = "h";
                inputh.size="7";
                inputh.style="border:0;outline:0";
                inputh.value=harga;
                nodeTDh.appendChild(inputh);

         const nodeTDt = document.createElement("td");
         var inputt = document.createElement("input");
                inputt.type = "text";
                inputt.name = "t";
                inputt.size="7";
                inputt.style="border:0;outline:0";
                inputt.value="500000";
                nodeTDt.appendChild(inputt);

         nodeTR.appendChild(nodeTDb);
         nodeTR.appendChild(nodeTDn);
         nodeTR.appendChild(nodeTDh);
         nodeTR.appendChild(nodeTDt);
      
         var tbody = document.getElementById("container");
         tbody.appendChild(nodeTR);
        }
    </script>


</body>

</html>
<?php } else {
    header("Location: login.php");
    exit();
}?>