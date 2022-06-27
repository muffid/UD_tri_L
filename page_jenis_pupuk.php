<?php
session_start();
include "connection.php";
include "functions.php";
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
            <h1 class="h3 mb-3 text-gray-800">Master Pupuk</h1>


          </div>

          <!-- Konten -->

          <div class="row">


            <div class="col-xl-8 col-lg-6">
              <!-- Alert -->
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
                  <h6 class="m-0 font-weight-bold text-primary">Input Jenis Pupuk</h6>

                </div>
                <!-- Card Body -->
                <div class="card-body">

                  <form method="POST" action="addPupuk.php">
                    <!-- Nama Pupuk -->
                    <div class="row mb-3">
                      <label class="col-sm-3 col-form-label"> Nama Pupuk : </label>
                      <div class="col-sm-8">
                        <input type="text" class="form-control" id="namapupuk" name="namapupuk" required>
                        <p style="color:red; font-size:12px;" id="username_hint"></p>
                      </div>
                    </div>

                    <!-- Harga Pupuk -->


                    <div class="row mb-3">
                      <label class="col-sm-3 col-form-label"> </label>
                      <div class="col-sm-8">
                        <button type="submit" class="btn btn-primary" name="tambah"><i class="far fa-plus-square"></i>
                          Tambahkan </button>
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
                  <h6 class="m-0 font-weight-bold text-primary">Data Pupuk</h6>

                </div>
                <!-- Card Body -->
                <div class="card-body">

                  <!--tabel -->
                  <div class="table-responsive">
                    <table class="table" id="dataTable" width="100%" cellspacing="0">
                      <thead>
                        <tr>
                          <th scope="col">No</th>
                          <th scope="col">Pupuk</th>
                          <th scope="col">Harga jual / Karung</th>
                          <th scope="col">Jumlah Stok</th>
                          <th scope="col">Aksi</th>

                        </tr>
                      </thead>

                      <tbody>
                        <?php
$no = 1;
    $data = mysqli_query($conn, "SELECT * FROM data_pupuk ORDER BY ID_PK DESC");
    foreach ($data as $all) {
        echo ('<tr><td>' . $no . '</td>');
        echo ('<td>' . $all['Jenis_Pupuk'] . '</td>');
        echo ('<td>' . rp($all['Harga']) . '</td>');
        echo ('<td>' . $all['Stok'] . ' karung </td>');
        echo ('<td>
                                                <a href="" class="btn btn-primary" data-toggle="modal" data-target="#modalSubscriptionForm');
        echo ($all['ID_PK'] . '">Edit</a>
                                                <a href="" class="btn btn-danger" data-toggle="modal" data-target="#exampleModalCenter');
        echo ($all['ID_PK'] . '">Hapus Pupuk</a></td></tr>
                                              ');
        $no++;
        ?></tr>
                        <!-- modal edit-->
                        <div class="modal fade" id="modalSubscriptionForm<?=$all['ID_PK'];?>" tabindex="-1"
                          role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                          <div class="modal-dialog" role="document">
                            <div class="modal-content">
                              <div class="modal-header text-center">
                                <h4 class="modal-title w-100">Edit Pupuk</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <div class="modal-body mx-3">
                                <div class="md-form mb-2">
                                  <form method="POST" action="editPupuk.php?id=<?=$all['ID_PK'];?>">
                                    <!--<i class="fas fa-user prefix grey-text"></i> -->
                                    <label data-error="wrong" data-success="right" for="form3">Jenis Pupuk</label>
                                    <input type="text" id="editnamapupuk<?=$all['ID_PK']?>"
                                      name="editnamapupuk<?=$all['ID_PK']?>" class="form-control validate"
                                      value="<?=$all['Jenis_Pupuk']?>">

                                </div>

                                <div class="md-form mb-2">
                                  <!--<i class="fas fa-envelope prefix grey-text"></i>-->
                                  <label data-error="wrong" data-success="right" for="form2">Harga / Karung</label>
                                  <input type="text" id="edithargapupuk<?=$all['ID_PK']?>"
                                    name="edithargapupuk<?=$all['ID_PK']?>" class="form-control validate"
                                    value="<?=$all['Harga']?>" onkeyup="convertRP(<?=$all['ID_PK']?>)">

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
                        <div class="modal fade" id="exampleModalCenter<?=$all['ID_PK'];?>" tabindex="-1" role="dialog"
                          aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                          <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLongTitle">Hapus
                                  Data Pupuk</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <div class="modal-body">
                                <center>
                                  <h3 class="text-danger">PERINGATAN!</h3>Menghapus
                                  data mungkin akan
                                  menyebabkan beberapa data tidak singkron. Pastikan
                                  data yang akan dihapus adalah
                                  data yang sudah tidak terpakai. <strong class="text-danger">Anda yakin
                                    akan
                                    menghapus ?</strong>
                                </center>
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <a href="deletePupuk.php?id=<?=$all['ID_PK'];?>" class="btn btn-danger">Ya, Hapus</a>
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
  function convertRP(index) {

    var price = document.getElementById("edithargapupuk" + index).value;
    document.getElementById("edithargapupuk" + index).value = toRp(price, "Rp. ");
    //alert(price);

  }


  function toRp(angka, prefix) {
    var number_string = angka.replace(/[^,\d]/g, "").toString(),
      split = number_string.split(","),
      sisa = split[0].length % 3,
      rupiah = split[0].substr(0, sisa),
      ribuan = split[0].substr(sisa).match(/\d{3}/gi);


    if (ribuan) {
      separator = sisa ? "." : "";
      rupiah += separator + ribuan.join(".");
    }

    rupiah = split[1] != undefined ? rupiah + "," + split[1] : rupiah;
    return prefix == undefined ? rupiah : rupiah ? "Rp. " + rupiah : "";
  }
  </script>

</body>

</html>
<?php } else {
    header("Location: login.php");
    exit();
}?>