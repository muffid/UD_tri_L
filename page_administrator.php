<?php
session_start();
if (isset($_SESSION['login'])) {
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
                        <h1 class="h3 mb-3 text-gray-800">Administrator</h1>
                    </div>
                    <?php if (isset($_SESSION["ok"])): ?>
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong><?php echo $_SESSION["ok"]; ?></strong>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span></button>
                    </div>
                    <?php unset($_SESSION["ok"]);endif;?>

                    <?php if (isset($_SESSION["fail"])): ?>
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <?php echo $_SESSION["fail"]; ?>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                    </div>
                    <?php unset($_SESSION["fail"]);endif;?>

                    <?php if (isset($_SESSION["passTidakSama"])) {?>
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <?php echo $_SESSION["passTidakSama"]; ?>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                    </div>
                    <?php unset($_SESSION["passTidakSama"]);}?>

                    <?php if (isset($_SESSION["passSalah"])) {?>
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <?php echo $_SESSION["passSalah"]; ?>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                    </div>
                    <?php unset($_SESSION["passSalah"]);}?>

                    <!-- Konten -->
                    <div class="row">
                        <!-- profile -->
                        <div class="col-lg-3 mb-4">
                            <div class="card bg-light text-white shadow">
                                <div class="card-body">
                                    <center>
                                        <a>
                                            <?php $foto = $_SESSION['foto'];?>
                                            <img class='img-profile rounded-circle w-50 mt-3'
                                                src='img/<?php echo $foto; ?>'>

                                        </a>
                                        <div class="text-black-50 small mt-2"><?php echo ($_SESSION['job']); ?></div>
                                        <div class="text-m font-weight-bold text-dark text-uppercase mb-1 mt-1">
                                            <?php echo ($_SESSION['nama']); ?></div>
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
                                                aria-selected="false">Edit Profil</a>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                            <a class="nav-link" id="ganti-Pass-tab" data-toggle="pill"
                                                href="#ganti-Pass" role="tab" aria-controls="ganti-Pass"
                                                aria-selected="false">Ganti Username & Password</a>
                                        </li>
                                    </ul>
                                </div>
                                <div class=" card-body">
                                    <div class="tab-content" id="pills-tabContent">
                                        <div class="tab-pane fade show active" id="profil" role="tabpanel"
                                            aria-labelledby="profil-tab">
                                            <h5 class="font-weight-bold text-primary text-center">Profil Lengkap</h5>
                                            <hr class="sidebar-heading">
                                            <h6 class="font-weight-bold text-primary">Tentang
                                                <?php echo ($_SESSION['per']); ?></h6>
                                            <P class="mt-2 mb-3"><?php echo ($_SESSION['tentang']); ?></p>
                                            <h6 class="font-weight-bold text-primary mt-4">Profil Detail
                                            </h6>
                                            <div class="row">
                                                <div class="col-lg-3">
                                                    <P>Nama Perusahaan</p>
                                                </div>
                                                <div class="col-lg-4 ">: <?php echo ($_SESSION['per']); ?></div>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-3">
                                                    <P>Nama Adminstrator</p>
                                                </div>
                                                <div class="col-lg-4 ">: <?php echo ($_SESSION['nama']); ?></div>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-3">
                                                    <P>Status</p>
                                                </div>
                                                <div class="col-lg-4 ">: <?php echo ($_SESSION['job']); ?></div>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-3">
                                                    <P>Alamat</p>
                                                </div>
                                                <div class="col-lg-9 ">: <?php echo ($_SESSION['alamat']); ?></div>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-3">
                                                    <P>No Telp</p>
                                                </div>
                                                <div class="col-lg-4 ">: <?php echo ($_SESSION['no_telp']); ?></div>
                                            </div>
                                        </div>

                                        <div class="tab-pane fade" id="edit-profile" role="tabpanel"
                                            aria-labelledby="edit-profile-tab">

                                            <h5 class="font-weight-bold text-primary text-center">Edit Profil</h5>
                                            <hr class="sidebar-heading">
                                            <script>
                                            //matikan tombol
                                            window.onload = disbld;

                                            function disbld() {
                                                document.getElementById("rubahGambar").disabled = true;
                                            }

                                            function enbld() {
                                                document.getElementById("rubahGambar").disabled = false;
                                            }
                                            //untuk menampilkan gambar sebelum di upload
                                            function PreviewImage() {
                                                var oFReader = new FileReader();
                                                oFReader.readAsDataURL(document.getElementById("Gambar").files[0]);
                                                oFReader.onload = function(oFREvent) {
                                                    document.getElementById("uploadPreview").src = oFREvent.target
                                                        .result;
                                                    document.getElementById("rubahGambar").disabled = false;
                                                };
                                            };
                                            //hapus gambar
                                            function hapus() {
                                                document.getElementById("tmptgmbr").innerHTML =
                                                    ' <img class="rounded-circle" id="uploadPreview" style="height: 100px;">';
                                                document.getElementById("tmptSRC").innerHTML =
                                                    '<br><input class="btn btn-outline-info btn-sm" id="Gambar" type="file" name="Gambar" class="form-control " onchange="PreviewImage();">';
                                                document.getElementById("rubahGambar").disabled = true;

                                            }
                                            </script>

                                            <form method="POST" action="insert_user.php" enctype="multipart/form-data">
                                                <input name="gambarLama" value="<?=$_SESSION['foto'];?>" hidden>
                                                <input name="idadmin" value="<?=$_SESSION['id'];?>" hidden>
                                                <div class="row mb-6">
                                                    <label for="Gambar" class="col-md-4 col-lg-3 col-form-label">Foto
                                                        Profil</label>

                                                    <div class="col-md-6 col-lg-6">
                                                        <div class="row " id="tmptgmbr">
                                                            <img class="rounded-circle" id="uploadPreview"
                                                                style="width: 30%; height: 30%;">
                                                        </div>
                                                        <div class="row">
                                                            <div class="col col-sm-10" id="tmptSRC">
                                                                <br><input class="btn btn-outline-info btn-sm"
                                                                    id="Gambar" type="file" name="Gambar"
                                                                    class="form-control " onchange="PreviewImage();">
                                                            </div>

                                                            <div class="col col-md-2">
                                                                <br><button type="button" class="btn btn-danger"
                                                                    onclick="hapus()">Hapus</button><br><br>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row mb-6">
                                                    <label for="TentangPer"
                                                        class="col-md-4 col-lg-3 col-form-label">Tentang
                                                        Perusahaan</label>
                                                    <div class="col-md-8 col-lg-9">
                                                        <textarea name="TentangPer" id="TentangPer"
                                                            style="height: 100px" class="form-control"
                                                            onkeypress="enbld()"><?php echo ($_SESSION['tentang']); ?></textarea>
                                                        <br>
                                                    </div>
                                                </div>
                                                <div class="row mb-6">
                                                    <label for="NamaPer" class="col-md-4 col-lg-3 col-form-label">Nama
                                                        Perusahaan</label>
                                                    <div class="col-md-8 col-lg-9">
                                                        <input name="NamaPer" type="text" class="form-control"
                                                            id="NamaPer" value="<?php echo ($_SESSION['per']); ?>"
                                                            onkeypress="enbld()">
                                                        <br>
                                                    </div>
                                                </div>
                                                <div class="row mb-6">
                                                    <label for="Admin" class="col-md-4 col-lg-3 col-form-label">Nama
                                                        Administrator</label>
                                                    <div class="col-md-8 col-lg-9">
                                                        <input name="Admin" type="text" class="form-control" id="Admin"
                                                            value="<?php echo ($_SESSION['nama']); ?>"
                                                            onkeypress="enbld()">
                                                        <br>
                                                    </div>
                                                </div>
                                                <div class="row mb-6">
                                                    <label for="status"
                                                        class="col-md-4 col-lg-3 col-form-label">Status</label>
                                                    <div class="col-md-8 col-lg-9">
                                                        <input name="status" type="text" class="form-control"
                                                            id="status" value="<?php echo ($_SESSION['job']); ?>"
                                                            onkeypress="enbld()">
                                                        <br>
                                                    </div>
                                                </div>
                                                <div class="row mb-6">
                                                    <label for="Alamat"
                                                        class="col-md-4 col-lg-3 col-form-label">Alamat</label>
                                                    <div class="col-md-8 col-lg-9">
                                                        <textarea name="Alamat" id="Alamat" style="height: 100px"
                                                            class="form-control"
                                                            onkeypress="enbld()"><?php echo ($_SESSION['alamat']); ?></textarea>
                                                        <br>
                                                    </div>
                                                </div>

                                                <div class="row mb-6">
                                                    <label for="noTelp" class="col-md-4 col-lg-3 col-form-label">No
                                                        Telp</label>
                                                    <div class="col-md-8 col-lg-9">
                                                        <input name="noTelp" type="text" class="form-control"
                                                            id="noTelp" value="<?php echo ($_SESSION['no_telp']); ?>"
                                                            onkeypress="enbld()">
                                                        <br>


                                                        <button id="rubahGambar" type="submit" name="rubahGambar"
                                                            class="btn btn-primary">Simpan Perubahan</button>
                                                    </div>
                                                </div>
                                            </form><!-- End Profile Edit Form -->
                                        </div>

                                        <!-- ganti usrname & password -->
                                        <div class="tab-pane fade" id="ganti-Pass" role="tabpanel"
                                            aria-labelledby="ganti-Pass-tab">
                                            <h5 class="font-weight-bold text-primary text-center">Ganti Username &
                                                Password
                                            </h5>
                                            <hr class="sidebar-heading">
                                            <form method="POST" action="update_akun.php" enctype="multipart/form-data">
                                                <div class="row mb-6">
                                                    <label for="User"
                                                        class="col-md-4 col-lg-3 col-form-label">Username</label>
                                                    <div class="col-md-8 col-lg-9">
                                                        <input name="User" type="text" class="form-control" id="User"
                                                            value="<?php echo ($_SESSION['UserName']); ?>"
                                                            onkeypress="enbld()"> <br>
                                                    </div>
                                                </div>
                                                <div class="row mb-6">
                                                    <label for="PassBaru"
                                                        class="col-md-4 col-lg-3 col-form-label">Password Baru</label>
                                                    <div class="col-md-8 col-lg-9">
                                                        <input name="PassBaru" type="password" class="form-control"
                                                            id="PassBaru" value="" onkeypress="enbld()"> <br>
                                                    </div>
                                                </div>
                                                <div class="row mb-6">
                                                    <label for="KonPass"
                                                        class="col-md-4 col-lg-3 col-form-label">Konfrimasi
                                                        Password</label>
                                                    <div class="col-md-8 col-lg-9">
                                                        <input name="KonPass" type="password" class="form-control"
                                                            id="KonPass" value="" onkeypress="enbld()">
                                                        <br>
                                                        <button id="ubahPass" type="submit" name="ubahPass"
                                                            class="btn btn-primary">Simpan Perubahan</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.container-fluid -->

            </div>
            <?php include "segment/footer.php";?>
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
<?php } else {
    header("Location: login.php");
    exit();
}?>