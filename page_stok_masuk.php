<?php
session_start();
include "connection.php";
include 'functions.php';
date_default_timezone_set('Asia/Jakarta');
$tanggal = date("D, j M Y ");
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
                        <div class="col-xl-6 col-lg-6">

                            <?php
@session_start();
    if (isset($_SESSION["info"])):
    ?>

                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <?php //echo $_SESSION["info"];
    echo ($_SESSION["info"] . " klik"); ?>
                                <button type="button" class="btn btn-light" data-dismiss="alert" aria-label="Close">
                                    Disini </button> untuk menutup
                            </div>

                            <?php
unset($_SESSION["info"]);
    endif;

    ?>
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div
                                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Input Pupuk Masuk</h6>

                                </div>
                                <!-- Card Body -->
                                <div class="card-body">

                                    <form method="POST" action="addStokMasuk.php" enctype="multipart/form-data">

                                        <div class="row mb-2">
                                            <!-- Nama Pengirim -->
                                            <label class="col-sm-4 col-form-label">Pengirim</label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control" id="pengirim" name="pengirim"
                                                    required onkeyup="SETis()">
                                                <input type="text" class="form-control" id="idppk" name="idppk" required
                                                    hidden>
                                                <p style="color:red; font-size:12px;" id="username_hint"></p>
                                            </div>
                                        </div>

                                        <div class="row mb-4">
                                            <!-- Nama Pengirim -->
                                            <label class="col-sm-4 col-form-label">Jenis Pupuk</label>
                                            <div class="col-sm-8">
                                                <select class="custom-select" id="jenisPP" name="jenisPP"
                                                    onchange="SETPP()">
                                                    <option selected="true" disabled="disabled">-- pilih jenis pupuk --
                                                    </option>

                                                    <?php
$data = mysqli_query($conn, "SELECT ID_PK,Jenis_Pupuk,Harga FROM data_pupuk ORDER BY ID_PK DESC");
    foreach ($data as $all) {
        echo (' <option id="' . $all['ID_PK'] . '" value="' . $all['Harga'] . '">' . $all['Jenis_Pupuk'] . '</option>');

    }
    ?>

                                                </select>
                                            </div>
                                        </div>
                                        <div class="row mb-2">
                                            <!-- Nama Pengirim -->

                                            <label class="col-sm-4 col-form-label">Jumlah (karung)</label>
                                            <div class="col-sm-8">
                                                <input type="number" class="form-control" id="jumlah" name="jumlah"
                                                    required onkeyup="SETis()">
                                                <p style="color:red; font-size:12px;" id="username_hint"></p>
                                            </div>
                                        </div>

                                        <div class="row mb-2">
                                            <!-- Nama Pengirim -->
                                            <label class="col-sm-4 col-form-label"> Total Pembelian</label>
                                            <div class="input-group col-sm-8">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="basic-addon1">Rp.</span>
                                                </div>
                                                <input type="text" class="form-control" id="harga" name="harga" required
                                                    onkeyup="countPerKarung()">
                                            </div>
                                        </div>
                                        <div class="row mt-4 ">
                                            <!-- Nama Pengirim -->
                                            <label class="col-sm-4 col-form-label ">Biaya Transport</label>
                                            <div class="input-group col-sm-8">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="basic-addon1">Rp.</span>
                                                </div>
                                                <input type="text" class="form-control" id="transport" name="transport"
                                                    onkeyup="totalKeseluruhan()">
                                            </div>
                                        </div>
                                </div>

                                <div class="row mb-4">
                                    <label class="col-sm-4 col-form-label"> </label>
                                    <div class="col-sm-8">
                                        <button type="submit" class="btn btn-primary" name="tambah"><i
                                                class="far fa-plus-square"></i>
                                            Tambahkan </button>
                                    </div>
                                </div>
                            </div>
                            </form>

                            <!--end of div col-->
                        </div>
                        <div class="col-xl-6 col-lg-6">
                            <div class="card shadow mb-4">
                                <div
                                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Preview</h6>

                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
                                    <div class="row mb-1">
                                        <!-- Nama tanggal -->
                                        <label class="col-sm-4 col-form-label"> Tanggal </label>
                                        <label class="col-sm-5 col-form-label" id="tanggal"><?=": " . ($tanggal)?>
                                        </label>
                                        <p style=" color:red; font-size:12px;" id="username_hint"></p>
                                    </div>
                                    <div class="row mb-1">
                                        <!-- Nama pengirim -->
                                        <label class="col-sm-4 col-form-label">Pengirim</label>
                                        <label class="col-sm-5 col-form-label" id="pengirimPP">:
                                        </label>
                                        <p style=" color:red; font-size:12px;" id="username_hint"></p>
                                    </div>
                                    <div class="row mb-1">
                                        <!-- Jenis Pupuk-->
                                        <label class="col-sm-4 col-form-label">Jenis Pupuk</label>
                                        <label class="col-sm-5 col-form-label" id="pupuk" name="pupuk">:
                                        </label>
                                        <p style=" color:red; font-size:12px;" id="username_hint"></p>
                                    </div>
                                    <div class="row mb-1">
                                        <!-- Jumlah Pupuk Datang -->
                                        <label class="col-sm-4 col-form-label">Jumlah Pupuk</label>
                                        <label class="col-sm-5 col-form-label" id="jumPP">:
                                        </label>
                                        <p style=" color:red; font-size:12px;" id="username_hint"></p>
                                    </div>
                                    <div class="row mb-1">
                                        <!--  Harga Beli-->
                                        <label class="col-sm-4 col-form-label">Harga Total Pembelian</label>
                                        <label class="col-sm-5 col-form-label" id="hargaPP" name="hargaPP"
                                            style="font-weight:bold; color:Black;">: Rp.
                                        </label>
                                        <p style=" color:red; font-size:12px;" id="username_hint"></p>
                                    </div>
                                    <div class="row mb-1">
                                        <!--  Harga Beli-->
                                        <label class="col-sm-4 col-form-label">Harga Beli/ karung</label>
                                        <label class="col-sm-5 col-form-label" id="perkarung" name="perkarung"
                                            style="font-weight:bold; color:green;">: Rp.
                                        </label>
                                        <p style=" color:red; font-size:12px;" id="username_hint"></p>
                                    </div>
                                    <div class="row mb-1">
                                        <!--  transport-->
                                        <label class="col-sm-4 col-form-label">Biaya Transport</label>
                                        <label class="col-sm-5 col-form-label" id="biaya_transport"
                                            name="biaya_transport" style="font-weight:bold; color:BLACK;">: Rp.
                                        </label>
                                        <p style=" color:red; font-size:12px;" id="username_hint"></p>
                                    </div>
                                    <div class="row mb-1">
                                        <!-- Total-->
                                        <label class="col-sm-4 col-form-label">Total Keseluruhan</label>
                                        <label class="col-sm-5 col-form-label" id="keseluruhan" name="keseluruhan"
                                            style="font-weight:bold; color:green;">: Rp.
                                        </label>
                                        <p style=" color:red; font-size:12px;" id="username_hint"></p>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <!---------------->
                    <div class="row">
                        <div class="col-xl-12 col-lg-12">
                            <div class="card shadow mb-4">

                                <div
                                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Data Historis Stok Pupuk Masuk Pada
                                        Bulan
                                        <?= substr($tanggal, 6) ?></h6>

                                </div>

                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-bordered" id="tableMasuk" width="100%"
                                            cellspacing="0">
                                            <thead>
                                                <tr>
                                                    <th scope="col">No</th>
                                                    <th scope="col">Tanggal</th>
                                                    <th scope="col">Pengirim</th>
                                                    <th scope="col">Jenis Pupuk</th>
                                                    <th scope="col">Jumlah Pupuk</th>
                                                    <th scope="col">Total Pembelian</th>
                                                    <th scope="col">Aksi</th>

                                                </tr>
                                            </thead>

                                            <tbody>
                                                <?php
                         $tgl = substr($tanggal, 6);
$no = 1;
    $data = mysqli_query($conn, "SELECT * FROM stok_masuk
    INNER JOIN data_pupuk ON stok_masuk.ID_PK = data_pupuk.ID_PK  ORDER BY ID_SM DESC
    ");
    foreach ($data as $all):
        echo ('<tr><td>' . $no . '</td>');
        echo ('<td>' . $all['Tanggal'] . '</td>');
        echo ('<td>' . $all['Nama_Pengirim'] . '</td>');
        echo ('<td>' . $all['Jenis_Pupuk'] . '</td>');
        echo ('<td>' . $all['Jumlah_Masuk'] . ' karung</td>');
        echo ('<td>' . rp($all["Nominal"]) . '</td>');
        echo ('<td> <center><a href="" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#exampleModalCenter');

        echo ($all['ID_SM'] . '">Batalkan</a></td></center></tr>');
        ?>

                                                <?php $no++;
        ?></tr>


                                                <!-- Modal delete -->
                                                <div class="modal fade" id="exampleModalCenter<?=$all['ID_SM'];?>"
                                                    tabindex="-1" role="dialog"
                                                    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered modal-lg"
                                                        role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLongTitle">
                                                                    Batalkan
                                                                    Stok Pupuk Masuk</h5>
                                                                <button type="button" class="close" data-dismiss="modal"
                                                                    aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <center>
                                                                    <h3 class="text-danger">PERINGATAN!</h3>
                                                                    Membatalkan/ menghapus data pupuk masuk mungkin akan
                                                                    menyebabkan beberapa data tidak singkron.
                                                                    Pastikan
                                                                    data pupuk masuk yang akan dihapus adalah
                                                                    data yang <strong>belum dilakukan penjualan
                                                                    </strong> pada kelompok tani/ Anggota sama
                                                                    sekali. <strong class="text-danger">Anda
                                                                        yakin
                                                                        akan
                                                                        menghapus ?</strong>
                                                                </center>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary"
                                                                    data-dismiss="modal">Kembali</button>
                                                                <a href="deleteDataPupuk.php?id=<?=$all['ID_SM'];?>"
                                                                    class="btn btn-danger">Ya,
                                                                    Batalkan</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- end Modal delete -->
                                                <?php endforeach;?>

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!---------------->

                    </div>
                </div>



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

    <!-- mata uang -->
    <script src="matauang.js"></script>

    <script>
    $(document).ready(function() {
        $('#tableMasuk').DataTable();
    });

    function SETis() {
        var inpeng = document.getElementById("pengirim").value;
        document.getElementById("pengirimPP").innerHTML = ': ' + inpeng;

        var inputJumPP = document.getElementById("jumlah").value;
        document.getElementById("jumPP").innerHTML = ': ' + inputJumPP;
    }

    function SETPP() {
        var sel = document.getElementById("jenisPP");
        var id = sel.options[sel.selectedIndex].id;
        var text = sel.options[sel.selectedIndex].text;
        document.getElementById("pupuk").innerHTML = ": " + text;
        document.getElementById("idppk").value = id;
    }

    function countPerKarung() {

        var text = toRp(document.getElementById("harga").value);
        document.getElementById("harga").value = text;

        var totalNoDot = document.getElementById("harga").value.split('.').join("");
        var totalNoRp = totalNoDot.replace(": Rp. ", "");
        var totalInt = Math.round(parseInt(totalNoRp) / parseInt(document.getElementById("jumlah").value));

        document.getElementById("perkarung").innerHTML = ": Rp. " + toRp(totalInt.toString());
        document.getElementById("hargaPP").innerHTML = ": Rp. " + toRp(totalNoRp);
    }

    function totalKeseluruhan() {
        var texttran = toRp(document.getElementById("transport").value);
        document.getElementById("transport").value = texttran;
        document.getElementById("biaya_transport").innerHTML = ": Rp. " + texttran;

        var transNoDot = document.getElementById("transport").value.split('.').join("");
        var transNoRp = transNoDot.replace(": Rp. ", "");
        var hargaNoDot = document.getElementById("harga").value.split('.').join("");
        var hargaNoRp = hargaNoDot.replace(": Rp. ", "");
        // var totalkes = 30 + 20;
        var totalkes = Math.round(parseInt(transNoRp) + Math.round(parseInt(hargaNoRp)));
        document.getElementById("keseluruhan").innerHTML = ": Rp. " + toRp(totalkes.toString());
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
}
?>