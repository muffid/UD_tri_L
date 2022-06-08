<?php
include "connection.php";
echo($_POST['pembayaran']);

$namapemb = $_POST['selectcust'];
 $idppk = $_POST['idppk'];

$jumlah = $_POST['jumlah'];
$total = $_POST['harga'];

date_default_timezone_set('Asia/Jakarta');
$tanggal= date("D, j M Y ");


$sql = "INSERT INTO stok_keluar (ID_SK,Tanggal,ID_PK,Nama_Pengirim,Jumlah_Masuk,Nominal)
	 VALUES ('','$tanggal','$idppk','$namapeng','$jumlah','$total')";
     
if (mysqli_query($conn, $sql)) {
    session_start();
    //$_SESSION["info"] = 'Data kelompok tani  berhasil ditambah';
    //header("Location: page_kel_tani.php?m=4&n=2");
    echo("berasil jeh");
    exit();
} else {
    echo "Error: " . $sql . "
" . mysqli_error($conn);
}