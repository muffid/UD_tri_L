<?php
session_start();
<<<<<<< Updated upstream
if (isset($_SESSION['login'])) {
    ?>
=======

include "connnection.php";

if(isset($_SESSION['login'])){
?>
>>>>>>> Stashed changes
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
                        <h1 class="h3 mb-3 text-gray-800">Stok Pupuk Masuk</h1>

                    </div>

                    <!-- Konten -->


                    <div class="row">

<!-- Area Chart -->



<div class="col-xl-6 col-lg-6">

            <?php
                @session_start();
                if(isset($_SESSION["info"])){
                ?>

                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <?php //echo $_SESSION["info"];
                    echo ($_SESSION["info"]." klik");?>
                    <button type="button" class="btn btn-light" data-dismiss="alert"
                        aria-label="Close"> Disini </button> untuk menutup
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

            <form method="POST" action="addKelompok.php" enctype="multipart/form-data">
                
                <div class="row mb-2">
                    <!-- Nama Pengirim -->
                    <label class="col-sm-4 col-form-label"> Pengirim : </label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="pengirim" name="pengirim"
                            required>
                        <p style="color:red; font-size:12px;" id="username_hint"></p>
                    </div>   
                </div>

                <div class="row mb-4">
                    <!-- Nama Pengirim -->
                    <label class="col-sm-4 col-form-label"> Jenis Pupuk : </label>
                    <div class="col-sm-8">
                        <select class="custom-select">
                            <option value="1">One</option>
                            <option value="2">Two</option>
                            <option value="3">Three</option>
                        </select>
                    </div>   
                </div>

                <div class="row mb-2">
                    <!-- Nama Pengirim -->
                    <label class="col-sm-4 col-form-label"> Jumlah (karung) : </label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="jumlah" name="jumlah"
                            required>
                        <p style="color:red; font-size:12px;" id="username_hint"></p>
                    </div>   
                </div>
                


                </div>
            </form>
            


        </div>
        
        
    </div><!--end of div col-->

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

</body>

</html>
<?php } else {
    header("Location: login.php");
    exit();
}?>