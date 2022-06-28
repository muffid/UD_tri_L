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

  <!-- Custom styles for this page -->
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
            <h1 id="hu" class="h3 pp text-gray-800">Input Kelompok Tani</h1>

          </div>

          <!-- Konten -->

          <div class="row">

            <!-- Area Chart -->
            <div class="col-xl-12 col-lg-12">

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
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Input Kelompok Tani</h6>

                </div>
                <!-- Card Body -->
                <div class="card-body">

                  <form method="POST" action="addKelompok.php" enctype="multipart/form-data">

                    <div class="row mb-2">
                      <!-- Nama Kelompok -->
                      <label for="namakel" class="col-sm-2 col-form-label"> Nama Kelompok :
                      </label>
                      <div class="col-sm-4">
                        <input type="text" class="form-control" id="namakel" name="namakel" required>
                        <p style="color:red; font-size:12px;" id="username_hint"></p>
                      </div>
                      <!-- Ketua Kelompok -->
                      <label for="ketuakel" class="col-sm-2 col-form-label"> Ketua Kelompok :
                      </label>
                      <div class="col-sm-4">
                        <input type="text" class="form-control" id="ketuakel" name="ketuakel" required>
                        <p style="color:red; font-size:12px;" id="username_hint"></p>
                      </div>

                    </div>



                    <div class="row mb-2">

                      <!-- Alamat -->

                      <label for="telp" class="col-sm-2 col-form-label"> Telepon : </label>
                      <div class="col-sm-4">
                        <input type="number" class="form-control" id="telp" name="telp" required>
                        <p style="color:red; font-size:12px;" id="username_hint"></p>
                      </div>

                      <!-- NIK -->
                      <label for="nik" class="col-sm-2 col-form-label"> NIK : </label>
                      <div class="col-sm-4">
                        <input type="number" class="form-control" id="nik" name="nik" required>
                        <p style="color:red; font-size:12px;" id="username_hint"></p>
                      </div>

                    </div>


                    <!-- Telp -->


                    <!-- IMAGE-->
                    <div class="row mb-2">
                      <label for="alamat" class="col-sm-2 col-form-label"> Alamat : </label>
                      <div class="col-sm-4">
                        <textarea class="form-control" style="height: 100px" id="alamat" name="alamat"
                          required></textarea>
                        <p style="color:red; font-size:12px;" id="username_hint"></p>
                      </div>

                      <label class="col-sm-2 col-form-label"> Foto KTP : </label>

                      <div class="col-sm-4">

                        <div class="input-group mb-3">
                          <input type="file" id="pics" name="pics" class="form-control btn btn-outline-primary btn-sm "
                            onchange="PreviewImage();">
                          <div class="input-group-append">
                            <button class="btn btn-danger btn-sm" type="button" id="button-addon2"
                              onclick="hapus();">Hapus </button>
                          </div>
                        </div>
                        <img class=" float-right mt-1" id="pic">
                        <div class="float-right mt-2">
                          <button type="submit" class="btn btn-primary" name="tambah"><i class="far fa-plus-square"></i>
                            Tambahkan </button>
                        </div>
                      </div>

                    </div>

                  </form>
                </div>
              </div>
            </div>
            <!-- Pie Chart -->
            <div class="col-xl-12 col-lg-10">
              <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Data Kelompok Tani</h6>

                </div>
                <!-- Card Body -->
                <div class="card-body">
                  <!--tabel -->
                  <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                      <thead>
                        <tr>
                          <th scope="col">No</th>
                          <th scope="col">NIK</th>
                          <th scope="col">Kelompok Tani</th>
                          <th scope="col">Nama Ketua</th>
                          <th scope="col">Alamat</th>
                          <th scope="col">Telp</th>
                          <th scope="col">Foto</th>
                          <th scope="col">Aksi</th>
                        </tr>
                      </thead>

                      <tbody>
                        <?php
$no = 1;
    $data = mysqli_query($conn, "SELECT * FROM data_kel_tani ORDER BY ID_KT DESC");
    foreach ($data as $all) {
        echo ('<tr><td>' . $no . '</td>');
        echo ('<td>' . $all['NIK'] . '</td>');
        echo ('<td>' . $all['Nama_Kel'] . '</td>');
        echo ('<td>' . $all['Nama_Ketua'] . '</td>');
        echo ('<td>' . $all['Alamat'] . '</td>');

        echo ('<td>' . $all['Telp'] . '</td>');
        echo ('<td><a href="" data-toggle="modal" data-target="#viewFoto');
        echo ($all['ID_KT'] . '"><center><i class="fas fa-eye" data-toggle="tooltip" data-placement="top" title="Lihat Foto"></i> </center>  </i></a></td>');

        //echo('<td><img src="img/'.$all['Foto'].'" width="50%"></td>');

        echo ('<td><center><a href=page_edit_kel_tani.php?m=4&n=2&id=');
        echo ($all['ID_KT'] . '><span class="btn-icon-split text-warning"
                                                    data-toggle="tooltip" data-placement="top" title="Edit Data"><i
                                                        class="fas fa-edit"></i></span></a>
                                                <text> | </text><a href="" data-toggle="modal" data-target="#exampleModalCenter');
        echo ($all['ID_KT'] . '"><span class="btn-icon-split text-danger" data-toggle="tooltip" data-placement="left"
                                                        title="Hapus Data"><i class="fas fa-trash"></i></span></a></td>
                                                </center>
                                                </tr>');
        $no++;
        ?></tr>

                        <!-- modal edit-->
                        <div class="modal fade" id="modalSubscriptionForm<?=$all['ID_KT'];?>" tabindex="-1"
                          role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                          <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                              <div class="modal-header text-center">
                                <h4 class="modal-title w-100">Edit Pupuk</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <div class="modal-body mx-3">
                                <div class="md-form mb-2">
                                  <form method="POST" action="editPupuk.php?id=<?=$all['ID_KT'];?>">
                                    <!--<i class="fas fa-user prefix grey-text"></i> -->
                                    <input type="text" id="editnamapupuk" name="editnamapupuk"
                                      class="form-control validate" value="<?=$all['Jenis_Pupuk']?>">
                                    <label data-error="wrong" data-success="right" for="form3">Jenis Pupuk</label>
                                </div>

                                <div class="md-form mb-2">
                                  <!--<i class="fas fa-envelope prefix grey-text"></i>-->
                                  <input type="number" id="edithargapupuk" name="edithargapupuk"
                                    class="form-control validate" value="<?=$all['Harga']?>">
                                  <label data-error="wrong" data-success="right" for="form2">Harga / Kg</label>
                                </div>

                              </div>
                              <div class="modal-footer d-flex justify-content-center">
                                <button type="submit" class="btn btn-primary">Simpan
                                  perubahan <i class="fas fa-paper-plane-o ml-1"></i></button>
                                </form>
                              </div>
                            </div>
                          </div>
                        </div>
                        <!-- end modal edit-->

                        <!-- Modal delete -->
                        <div class="modal fade" id="exampleModalCenter<?=$all['ID_KT'];?>" tabindex="-1" role="dialog"
                          aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                          <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLongTitle">Hapus
                                  Data Kelompok Tani</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <div class="modal-body">
                                <center>
                                  <h3 class="text-danger">PERINGATAN!</h3>
                                  Menghapus data mungkin akan
                                  menyebabkan beberapa data tidak singkron. Pastikan
                                  data yang akan dihapus adalah
                                  data yang sudah tidak terpakai. <strong class="text-danger">Anda yakin
                                    akan
                                    menghapus ?</strong>
                                </center>
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</button>
                                <a href="deleteKelTani.php?id=<?=$all['ID_KT'];?>" class="btn btn-danger">Ya, Hapus</a>
                              </div>
                            </div>
                          </div>
                        </div>
                        <!-- end Modal delete -->

                        <!-- Modal view -->
                        <?php
$gambar = mysqli_query($conn, "SELECT * FROM data_kel_tani WHERE ID_KT =" . $all['ID_KT']);
        foreach ($gambar as $key) {
            $nama = $key['Nama_Ketua'];
            $foto = $key['Foto'];

        }
        ?>
                        <div class="modal fade" id="viewFoto<?=$all['ID_KT'];?>" tabindex="-1" role="dialog"
                          aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                          <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLongTitle">Foto
                                  KTP <?=$nama;?></h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <div class="modal-body">
                                <center>KTP<br>
                                  <img style="height: 200px " src="img/<?php echo $foto; ?>" alt="">

                                </center>
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-secondary mr-2" data-dismiss="modal">Close
                                </button>
                              </div>
                            </div>
                          </div>
                        </div>
                        <!-- end Modal view -->
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
  // menggambil gambar dari library
  function PreviewImage() {
    var oFReader = new FileReader();
    oFReader.readAsDataURL(document.getElementById("pics").files[0]);
    oFReader.onload = function(oFREvent) {
      document.getElementById("pic").src = oFREvent.target.result;
      document.getElementById("pic").style.height = '200px';

      // document.getElementById("rubahGambar").disabled=false;

      // document.getElementById("tmptgmbr").innerHTML =
      //'<img class=" float-right mt-1" id="pic" >';
    };
  };

  function hapus() {

    document.getElementById("pic").src = '';
    document.getElementById("pic").style.height = '0px';
    //     '<img class=" float-right mt-1" id="pic" style="height: 200px;">';
    document.getElementById("pics").value = '';

    //     '<input class="custom-file-input" id="pics" type="file" name="pics" onchange="PreviewImage();"></div>'

  }
  </script>

</body>

</html>
<?php } else {
    header("Location: login.php");
    exit();
}?>