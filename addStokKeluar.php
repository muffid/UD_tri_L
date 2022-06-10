<?php
include "connection.php";
//echo($_POST['pembayaran']);

session_start();
date_default_timezone_set('Asia/Jakarta');

$tanggal= date("D, j M Y ");
$idppk=$_POST['idpupuk'];
$idkel=$_POST['idkel'];
$jmlppk=$_POST['jumlah'];
$harga=$_POST['harga'];
$total=$_POST['totaluang'];
$ket=$_POST['pembayaran'];

$stokAvail=0;

echo($idkel);

$data = mysqli_query($conn, "SELECT Stok FROM data_pupuk WHERE ID_PK =".$idppk." ORDER BY ID_PK DESC");
    foreach ($data as $all) {
        $stokAvail=$all['Stok'];
        if($jmlppk>$all['Stok']){
            $_SESSION["info"] = '<div class="alert alert-danger alert-dismissible fade show" role="alert">Stok tidak
            mencukupi. Gagal disimpan, klik
            <button type="button" class="btn btn-light" data-dismiss="alert" aria-label="Close">
                Disini </button> untuk menutup
        </div>
';
            header("Location: page_stok_keluar.php?m=3&n=1");
            exit();
        }else{
            
            $sql = "INSERT INTO stok_keluar (ID_SK,Tanggal,ID_KT,ID_AKT,ID_PK,Jumlah_Keluar,Harga,Nominal,Ket)
            VALUES ('','$tanggal','$idkel','','$idppk','$jmlppk','$harga','$total','$ket')";

            if (mysqli_query($conn, $sql)) {
                session_start();
                $stokNow=$stokAvail-$jmlppk;
                mysqli_query($conn,"UPDATE data_pupuk SET Stok='".$stokNow."' WHERE ID_PK=".$idppk);
                $_SESSION["info"] = '<div class="alert alert-success alert-dismissible fade show" role="alert">berhasil disimpan, klik
                <button type="button" class="btn btn-light" data-dismiss="alert" aria-label="Close">
                    Disini </button> untuk menutup
            </div>';
                header("Location: page_stok_keluar.php?m=3&n=1");
                exit();
            } else {
                echo "Error: " . $sql . "
                " . mysqli_error($conn);
            }
        }
    }
