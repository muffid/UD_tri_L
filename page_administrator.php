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
                        <!-- End Col  profil-->
                        <div class="col-lg-9 mb-2">
                            <div class="card shadow mb-2">
                                <div
                                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <ul class="nav nav-pills mb-1" id="pills-tab" role="tablist">
                                        <li class="nav-item" role="presentation">
                                            <a class="nav-link active" id="profil-tab" data-toggle="pill" href="#profil"
                                                role="tab" aria-controls="profil" aria-selected="true">Profil</a>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                            <a class="nav-link" id="edit-profile-tab" data-toggle="pill"
                                                href="#edit-profile" role="tab" aria-controls="edit-profile"
                                                aria-selected="false">Edit Profile</a>
                                        </li>
                                    </ul>
                                </div>
                                <div class=" card-body">
                                    <div class="tab-content" id="pills-tabContent">
                                        <div class="tab-pane fade show active" id="profil" role="tabpanel"
                                            aria-labelledby="profil-tab">
                                            <h6 class="font-weight-bold text-primary">Tentang
                                                <?php echo ($_SESSION['per']); ?></h6>
                                            <P class="mt-2 mb-3"><?php echo ($_SESSION['tentang']);?></p>
                                            <h6 class="font-weight-bold text-primary mt-4">Profil Detail
                                                <?php echo ($_SESSION['nama']); ?></h6>
                                            <div class="row">
                                                <div class="col-lg-3">
                                                    <P>Nama Perusahaan</p>
                                                </div>
                                                <div class="col-lg-4 ">: <?php echo ($_SESSION['per']);?></div>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-3">
                                                    <P>Adminstrator</p>
                                                </div>
                                                <div class="col-lg-4 ">: <?php echo ($_SESSION['nama']);?></div>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-3">
                                                    <P>Status</p>
                                                </div>
                                                <div class="col-lg-4 ">: <?php echo ($_SESSION['job']);?></div>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-3">
                                                    <P>Alamat</p>
                                                </div>
                                                <div class="col-lg-4 ">: <?php echo ($_SESSION['alamat']);?></div>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-3">
                                                    <P>No Telp</p>
                                                </div>
                                                <div class="col-lg-4 ">: <?php echo ($_SESSION['no_telp']);?></div>
                                            </div>
                                        </div>

                                        <div class="tab-pane fade" id="edit-profile" role="tabpanel"
                                            aria-labelledby="edit-profile-tab">
                                            <h6 class="font-weight-bold text-primary">Edit Prpfil</h6>

                                        </div>


                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.container-fluid -->

            </div>
            <?php include"segment/footer.php"; ?>
        </div>

    </div>
    <!-- End of Page Wrapper -->
    </div>
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