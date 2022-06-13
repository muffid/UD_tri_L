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
                                    <h6 class="m-0 font-weight-bold text-primary">Input Penjualan Pupuk</h6>

                                </div>
                        
                                <div class="card-body">

                                <div class="row mb-2">
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
                                                   
                                                <p style="color:red; font-size:12px;" id="username_hint"></p>
                                            </div>
                                        </div>

                                        
                                        <div class="row mb-4" id="divAng">
                                            <!-- Nama Pembeli -->
                                            <label class="col-sm-4 col-form-label"> Nama Anggota </label>
                                            <div class="col-sm-8">
                                            <input type="text" class="form-control" id="anggota" name="anggota" onkeyup="setNamaAnggota()">
                                            </div>
                                        </div>


                                        <div class="row mb-4">
                                            <!-- Nama Pengirim -->
                                            <label class="col-sm-4 col-form-label"> Jenis Pupuk </label>
                                            <div class="col-sm-8">
                                                <select class="custom-select" id="selectpupuk" name="selectpupuk" onchange="pupukControl()" >
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
                                                     required>
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
                                                    required)>
                                                <p style="color:red; font-size:12px;" id="username_hint"></p>
                                            </div>
                                        </div>
                                       
                                        <div class="row mb-4">
                                            <!-- Nama Pengirim -->
                                            
                                            <div class="col-sm-4">
                                               
                                            </div>
                                            <div class="col-sm-6">
                                                <button type="button" id="btnOK" class="btn btn-primary" onclick="addFields()">tambahkan</button>
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
                                    <h6 class="m-0 font-weight-bold text-primary">Nota Penjualan</h6>

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

                                <form method="POST" action="addStokKeluar.php">
                                <div class="row">
                               
                                            <!-- Nama Pengirim -->
                                            <div class="col-lg-6">
                                           
                                           <p id="notakeltani">Kepada Yth. Kelompok Tani Barokah</p>
                                            </div>
                                           
                                            <div class="col-lg-6" align="right">
                                            Senin 12 Januari 2022    
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

                           
                                <div class="row mb-3">
                                            <!-- Nama Pengirim -->
                                            <label class="col-sm-7 col-form-label">  <button type="button" class="btn btn-danger btn-sm" onclick="decName()">batalkan item terakhir</button> </label>
                                            
                                </div>

                                <div class="row mb-3">
                                            <!-- Nama Pengirim -->
                                            <label class="col-sm-4 col-form-label"> Total Belanja </label>
                                            <div class="col-sm-5">
                                                <input type="text" class="form-control" id="notatotal" name="notatotal"
                                                    required readonly>
                                                    <input type="text" class="form-control" id="iterator" name="iterator"
                                                    required readonly hidden>
                                                    <input type="text" class="form-control" id="idpupuk" name="idpupuk"
                                                     hidden>
                                                    <input type="text" class="form-control" id="idkel" name="idkel" hidden>
                                                     <input type=text id="buyer" name="buyer" readonly required hidden>
                                                     <input type=text id="namaanggota" name="namaanggota" hidden>
                                               
                                            </div>
                                            <div class="col-sm-3 mt-1">
                                                <button type="button" class="btn btn-success btn-sm" onclick="hitungTotal()">hitung total</button>
                                            </div>
                                </div>
                                <div class="row" id="row">
                                            <!-- Nama Pengirim -->
                                            <label class="col-sm-4 col-form-label">Dibayar</label>
                                            <div class="col-sm-5">
                                                <input type="text" class="form-control" id="bayar" name="bayar">
                                               
                                            </div>
                                            
                                </div>

                                <div class="row mt-3 mb-3" id="row">
                                            <!-- Nama Pengirim -->
                                            <label class="col-sm-4 col-form-label">Biaya Transport</label>
                                            <div class="col-sm-5">
                                                <input type="text" class="form-control" id="transport" name="transport">
                                               
                                            </div>

                                            <div class="col-sm-3">
                                                <button type="submit" class="btn btn-primary btn-sm">simpan</button>
                                            </div>
                                       
                                </div>

                                </div>
                            </div>
                            </form>
                            

                        </div>

                            
                        <!-- nambah tabel ndel kene tambahi div siji maneh ndek ngisor e -->

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

    var name=0;

    function setNamaAnggota(){
        var valNama=document.getElementById("anggota").value;
        document.getElementById("namaanggota").value=valNama;
    }

    function pupukControl(){
        var e = document.getElementById("selectpupuk");
        price = e.value;
        document.getElementById("harga").value = price;
        document.getElementById("harga").readOnly = true;
        document.getElementById("checkprice").checked = true;

        var idpupuk=e.options[e.selectedIndex].id;
        document.getElementById("idpupuk").value=idpupuk.replace("ppk","");
    }

    function custControl(){
        var e = document.getElementById("selectcust");
        var idkeltani=e.options[e.selectedIndex].id;
        document.getElementById("idkel").value=idkeltani.replace("kel","");
    }
        
    function priceControl() {
        if (document.getElementById("checkprice").checked == false) {
            document.getElementById("harga").readOnly = false;
            document.getElementById("harga").value = "";
            
        } else {
            document.getElementById("harga").readOnly = true;
            document.getElementById("harga").value = price;
            
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

         var harga=document.getElementById("harga").value;
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
                inputh.value=harga;
                nodeTDh.appendChild(inputh);

         const nodeTDt = document.createElement("td");
         var inputt = document.createElement("input");
                inputt.type = "text";
                inputt.id="t"+name;
                inputt.name = "t"+name;
                inputt.size="7";
                inputt.style="border:0;outline:0";
                inputt.value=parseInt(harga)*parseInt(jumlah);
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
                totalResult=totalResult+(parseInt(document.getElementById("t"+i).value));
            }
            document.getElementById("notatotal").value=totalResult;
        }

        function anggotaCtrl(){
            document.getElementById("divKel").hidden=true;
            document.getElementById("divAng").hidden=false;
            document.getElementById("buyer").value="1";
        }

        function kelompokCtrl(){
            document.getElementById("divKel").hidden=false;
            document.getElementById("divAng").hidden=true;
            document.getElementById("buyer").value="2";

        }

        function initBuyer(){
            document.getElementById("divKel").hidden=false;
            document.getElementById("divAng").hidden=true;
            document.getElementById("buyer").value="2";
        }

    </script>


</body>

</html>
<?php } else {
    header("Location: login.php");
    exit();
}?>