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

    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <!-- Custom styles for this page -->
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
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
                        <h1 class="h3 mb-3 text-gray-800">Master Pupuk</h1>

                    </div>

                    <!-- Konten -->

                    <div class="row">

                        <!-- Area Chart -->
                        <div class="col-xl-8 col-lg-6">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div
                                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Input Jenis Pupuk</h6>

                                </div>
                                <!-- Card Body -->
                                <div class="card-body">

                                    <form>
                                        <!-- Nama Pupuk -->
                                        <div class="row mb-3">
                                            <label class="col-sm-3 col-form-label"> Nama Pupuk : </label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control" id="namapupuk" name="namapupuk"
                                                    required>
                                                <p style="color:red; font-size:12px;" id="username_hint"></p>
                                            </div>
                                        </div>

                                        <!-- Harga Pupuk -->
                                        <div class="row mb-3">
                                            <label class="col-sm-3 col-form-label"> Harga Pupuk : </label>
                                            <div class="col-sm-8">
                                                <input type="number" class="form-control" id="namapupuk"
                                                    name="namapupuk" required placeholder="harga pupuk per Kg">
                                                <p style="color:red; font-size:12px;" id="username_hint"></p>
                                            </div>
                                        </div>


                                        <div class="row mb-3">
                                            <label class="col-sm-3 col-form-label"> </label>
                                            <div class="col-sm-8">
                                                <button type="submit" class="btn btn-primary" name="tambah"><i
                                                        class="far fa-plus-square"></i> Tambahkan </button>
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
                                <div
                                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
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
                                                    <th scope="col">Harga/Kg</th>
                                                    <th scope="col">Aksi</th>

                                                </tr>
                                            </thead>

                                            <tbody>
                                                <tr>
                                                    <td>1</td>
                                                    <td>UREA XSP-90</td>
                                                    <td>50000</td>
                                                    <td><button class="btn btn-primary">edit</button> </td>

                                                </tr>
                                                <tr>
                                                    <td>2</td>
                                                    <td>PHONSKA F-77</td>
                                                    <td>100000</td>
                                                    <td><button class="btn btn-primary">edit</button> </td>

                                                </tr>

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

    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/datatables-demo.js"></script>

</body>

</html>
<?php }else{
     header("Location: login.php");
     exit();
}?>