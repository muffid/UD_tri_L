<?php
session_start();
if(isset($_SESSION['login'])){
?>
<!DOCTYPE html>
<html lang="en">
<!-- =======================================================
  * UI framework bootstrap 
  * php programming language 
  * System developed by anemos.id web & application developer tema
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
    <link href="css/sb-admin-2.css" rel="stylesheet">
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
</head>

<body id="page-top">
    <!-- Page Wrapper -->
    <div id="wrapper">
        <!-- include sidebar -->
        <?php include "segment/sidebar.php"; ?>
        <!-- end include sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">
            <!-- Main Content -->
            <div id="content">
                <?php include "segment/header.php"; ?>
                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <!-- Page Heading -->
                    <hr class="sidebar-divider my-0 mt-5 mb-5">
                    <div class="d-sm-flex align-items-center justify-content-between ">
                        <h1 class="h3 mb-3 text-gray-800">Administrator</h1>

                    </div>

                    <!-- Konten -->
                    <div class="row">
                        <!-- profile -->
                        <div class="col-lg-3 mb-4">
                            <div class="card bg-success text-white shadow">
                                <div class="card-body">
                                    <center>
                                        <a>
                                            <?php $foto = $_SESSION['foto']; ?>
                                            <img class='img-profile rounded-circle w-50 mt-3'
                                                src='img/<?php echo $foto; ?>'>

                                        </a>
                                        <div class="text-white-50 small mt-2">Pemilik Sistem</div>
                                        <div class="text-m font-weight-bold text-Light text-uppercase mb-1 mt-1">
                                            <?php echo ($_SESSION['nama']);?></div>
                                    </center>
                                </div>
                            </div>
                        </div>
                        <!-- End Profile -->

                        <!-- Edit Profile -->
                        <div class="col-xl-9 col-lg-12">
                            <div class="card shadow mb-4">
                                <div
                                    class="card-header py-0 d-flex flex-row align-items-center justify-content-between">

                                    <nav>
                                        <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                            <a class="nav-link active" id="nav-home-tab" data-toggle="tab"
                                                href="#nav-home" role="tab" aria-controls="nav-home"
                                                aria-selected="true">Home</a>
                                            <a class="nav-link" id="nav-profile-tab" data-toggle="tab"
                                                href="#nav-profile" role="tab" aria-controls="nav-profile"
                                                aria-selected="false">Profile</a>
                                            <a class="nav-link" id="nav-contact-tab" data-toggle="tab"
                                                href="#nav-contact" role="tab" aria-controls="nav-contact"
                                                aria-selected="false">Contact</a>
                                        </div>
                                    </nav>


                                </div>
                                <div class="card-body">
                                    <div class="tab-content" id="nav-tabContent">
                                        <div class="tab-pane fade show active" id="nav-home" role="tabpanel"
                                            aria-labelledby="nav-home-tab">haloooo</div>
                                        <div class="tab-pane fade" id="nav-profile" role="tabpanel"
                                            aria-labelledby="nav-profile-tab">iki kenek</div>
                                        <div class="tab-pane fade" id="nav-contact" role="tabpanel"
                                            aria-labelledby="nav-contact-tab"> mboh kah</div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <!-- End Profile -->

                    </div>
                </div>
            </div>
            <!-- /.container-fluid -->
            <?php include"segment/footer.php"; ?>
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
<?php }else{
     header("Location: login.php");
     exit();
}?>