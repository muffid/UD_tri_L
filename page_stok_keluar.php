<?php
session_start();
include "connection.php";
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
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div
                                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Input Kelompok Tani</h6>

                                </div>
                                <!-- Card Body -->
                                <div class="card-body">

                                    <form method="POST" action="addStokKeluar.php" enctype="multipart/form-data">

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
                                                    required hidden>
                                                <p style="color:red; font-size:12px;" id="username_hint"></p>
                                            </div>
                                        </div>

                                        <div class="row mb-4">
                                            <!-- Nama Pengirim -->
                                            <label class="col-sm-4 col-form-label"> Jenis Pupuk </label>
                                            <div class="col-sm-8">
                                                <select class="custom-select" id="selectpupuk" onclick="pupukControl()">
                                                    <option selected="true" disabled="disabled">-- pilih jenis pupuk --
                                                    </option>
                                                    <?php
$data = mysqli_query($conn, "SELECT ID_PK,Jenis_Pupuk,Harga FROM data_pupuk ORDER BY ID_PK DESC");
    foreach ($data as $all) {
        echo (' <option id="'.$all['ID_PK'].'" value="'. $all['Harga'] .'">' . $all['Jenis_Pupuk'] . '</option>');
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
                                                    required>
                                                <p style="color:red; font-size:12px;" id="username_hint"></p>
                                            </div>
                                        </div>
                                        <div class="row mb-4">
                                            <label class="col-sm-4 col-form-label"> Pembayaran </label>
                                            <div class="custom-control custom-radio custom-control-inline mt-2 ml-2">
                                                <input type="radio" id="customRadioInline1" name="pembayaran" value="tunai"
                                                    class="custom-control-input">
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
                                                <button type="submit" class="btn btn-primary">simpan transaksi</button>
                                            </div>
                                        </div>

                                </div>
                                </form>



                            </div>


                        </div>
                        <!--end of div col-->

                        <div class="col-xl-6 col-lg-6">

                            <div class="card shadow mb-4">

                                <div
                                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Summary</h6>

                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
                                    RINGKASAN
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

    <script>

    var price = 0;
    function pupukControl() {
        var e = document.getElementById("selectpupuk");
        price = e.value;
        document.getElementById("harga").value = price;
        document.getElementById("harga").readOnly = true;
        document.getElementById("checkprice").checked = true;

        var sel = document.getElementById("selectpupuk");
            var text= sel.options[sel.selectedIndex].id;
            document.getElementById("idpupuk").value=text;
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

    function delCace() {
        document.getElementById("harga").value = "";
    }
    </script>

</body>

</html>
<?php } else {
    header("Location: login.php");
    exit();
}?>