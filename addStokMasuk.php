<?php
include "connection.php";

$namapeng = $_POST['pengirim'];
$idppk = $_POST['idppk'];

$jumlah = $_POST['jumlah'];
$total = $_POST['harga'];

date_default_timezone_set('Asia/Jakarta');
$tanggal= date("D, j M Y ");


$sql = "INSERT INTO stok_masuk (ID_SM,Tanggal,ID_PK,Nama_Pengirim,Jumlah_Masuk,Nominal)
	 VALUES ('','$tanggal','$idppk','$namapeng','$jumlah','$total')";
     
if (mysqli_query($conn, $sql)) {
    session_start();

    $_SESSION["info"] = 'Stok berhasil ditambah';
    header("Location: page_stok_masuk.php?m=2&n=1");
    //echo("berasil jeh");
    exit();
} else {
    echo "Error: " . $sql . "
" . mysqli_error($conn);
}