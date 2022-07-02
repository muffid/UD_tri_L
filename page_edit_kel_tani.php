<?php
session_start();
include 'connection.php';
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

  <title>UD. Tri L | Edit Kelompok Tani</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link
    href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
    rel="stylesheet">
  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.css" rel="stylesheet">
  <link href="css/sb-admin-2.min.css" rel="stylesheet">
  <link href="img/logo1.png" rel="icon">
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

          <hr class="sidebar-divider my-0 mt-5 mb-5">
          <div class="d-sm-flex align-items-center justify-content-between ">
            <h1 class="h3 mb-3 text-gray-800">Edit Data Kelompok Tani</h1>

            <a href="page_kel_tani.php?m=4&n=2"
              class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm mb-4 "><i
                class="far fa-arrow-alt-circle-left  text-white-50"></i> Kembali Ke Halaman Kelompok Tani</a>

          </div>

          <?php if (isset($_SESSION["ok"])): ?>
          <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong><?php echo $_SESSION["ok"]; ?></strong> | Kembali ke Halaman <a class="btn btn-success"
              href="page_kel_tani.php?m=4&n=2">Kelompok Tani</a>
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

          <!-- Konten -->
          <div class="row">
            <!-- profile -->

            <!-- End Col  profil-->
            <div class="col-lg-8 mb-2">
              <div class="card shadow mb-2">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">

                  <h6 class="font-weight-bold text-primary text-center">Form Edit</h6>

                </div>
                <div class=" card-body">
                  <h5 class="font-weight-bold text-primary text-center">Edit Data Kelompok Tani</h5>
                  <hr class="sidebar-heading">
                  <script>
                  //matikan tombol
                  window.onload = disbld;

                  function disbld() {
                    document.getElementById("fungsitombol").disabled = true;
                  }

                  function enbld() {
                    document.getElementById("fungsitombol").disabled = false;
                  }
                  //untuk menampilkan gambar sebelum di upload
                  function PreviewImage() {
                    var oFReader = new FileReader();
                    oFReader.readAsDataURL(document.getElementById("pics").files[0]);
                    oFReader.onload = function(oFREvent) {
                      document.getElementById("pic").src = oFREvent.target.result;
                      document.getElementById("pic").style.height = '200px';
                      document.getElementById("fungsitombol").disabled = false;
                    };
                  };
                  //hapus gambar
                  function hapus() {
                    document.getElementById("pic").src = '';
                    document.getElementById("pic").style.height = '0px';
                    //     '<img class=" float-right mt-1" id="pic" style="height: 200px;">';
                    document.getElementById("pics").value = '';

                  }
                  </script>

                  <?php
$dataTani = mysqli_query($conn, " SELECT * FROM data_kel_tani WHERE ID_KT=" . $_GET['id']);
    foreach ($dataTani as $key) {
        $idkel = $key['ID_KT'];
        $foto = $key['Foto'];
        $namaKel = $key['Nama_Kel'];
        $namaKet = $key['Nama_Ketua'];
        $nik = $key['NIK'];
        $no = $key['Telp'];
        $alamat = $key['Alamat'];
    }
    ?>
                  <form method="POST" action="editKelTani.php" enctype="multipart/form-data">
                    <input name="gambarLama" value="<?=$_SESSION['foto'];?>" hidden>
                    <input name="idadmin" value="<?=$_SESSION['id'];?>" hidden>
                    <input name="idkel" id="idkel" value="<?=$idkel;?>" hidden>
                    <input name="foto" id="foto" value="<?=$foto;?>" hidden>
                    <div class="row mb-6">
                      <label for="Gambar" class="col-md-4 col-lg-3 col-form-label">Foto
                        KTP</label>

                      <div class="col-md-6 col-lg-6">

                        <img class="mb-2 float-right " id="pic">

                        <div class="input-group mb-3">
                          <input type="file" id="pics" name="pics" class="form-control btn btn-outline-primary btn-sm "
                            onchange="PreviewImage();">
                          <div class="input-group-append">
                            <button class="btn btn-danger btn-sm" type="button" onclick="hapus();">Hapus </button>
                          </div>
                        </div>

                      </div>
                    </div>
                    <div class="row mb-6">
                      <label for="NamaKel" class="col-md-4 col-lg-3 col-form-label">Nama
                        Kelompok</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="NamaKel" type="text" class="form-control" id="NamaKel" value="<?=$namaKel;?>"
                          onkeypress="enbld()">
                        <br>
                      </div>
                    </div>
                    <div class="row mb-6">
                      <label for="NamaKet" class="col-md-4 col-lg-3 col-form-label">Ketua
                        Kelompok</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="NamaKet" type="text" class="form-control" id="NamaKet" value="<?=$namaKet;?>"
                          onkeypress="enbld()">
                        <br>
                      </div>
                    </div>
                    <div class="row mb-6">
                      <label for="Telp" class="col-md-4 col-lg-3 col-form-label">Telpon</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="Telp" type="text" class="form-control" id="Telp" value="<?=$no;?>"
                          onkeypress="enbld()">
                        <br>
                      </div>
                    </div>
                    <div class="row mb-6">
                      <label for="nik" class="col-md-4 col-lg-3 col-form-label">NIK</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="nik" type="text" class="form-control" id="nik" value="<?=$nik;?>"
                          onkeypress="enbld()">
                        <br>
                      </div>
                    </div>
                    <div class="row mb-6">
                      <label for="Alamat" class="col-md-4 col-lg-3 col-form-label">Alamat</label>
                      <div class="col-md-8 col-lg-9">
                        <textarea name="Alamat" id="Alamat" style="height: 100px" class="form-control"
                          onkeypress="enbld()"><?=$alamat;?></textarea>
                        <br>
                        <button id="fungsitombol" type="submit" name="fungsitombol" class="btn btn-primary">Simpan
                          Perubahan</button>
                      </div>
                    </div>
                  </form><!-- End Profile Edit Form -->
                </div>
              </div>
            </div>

            <div class="col-lg-4 mb-4">
              <div class="card bg-light text-white shadow">
                <div class="card-body">
                  <center>
                    <div class="text-m font-weight-bold text-dark text-uppercase mb-1 ">
                      Kelompok Tani : <?=$namaKel;?></div>
                    <a>
                      <img class=" float-lg-none " style="height :180px" src="img/<?=$foto;?>">

                    </a><br>
                    <div class="text-m font-weight-bold text-dark text-uppercase mt-2 mb-0 ">
                      <?=$nik;?></div>
                    <div class="text-black-50 large"><?=$namaKet;?></div>
                  </center>
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