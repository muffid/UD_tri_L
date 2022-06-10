<?php
include "connection.php";

$namapeng = $_POST['pengirim'];
$idppk = $_POST['idppk'];

$jumlah = $_POST['jumlah'];
$total = $_POST['harga'];

date_default_timezone_set('Asia/Jakarta');
$tanggal = date("D, j M Y ");

$sql = "INSERT INTO stok_masuk (ID_SM,Tanggal,ID_PK,Nama_Pengirim,Jumlah_Masuk,Nominal)
	 VALUES ('','$tanggal','$idppk','$namapeng','$jumlah','$total')";

if (mysqli_query($conn, $sql)) {
    session_start();
//    tamabh stok
    $sqlDP = mysqli_query($conn, "SELECT SUM(Jumlah_Masuk) AS total_stok From stok_masuk where ID_PK=" . $idppk);
    foreach ($sqlDP as $key) {
        $dat = $key['total_stok'];
    }

    $total = "UPDATE data_pupuk SET Stok='" . $dat . "' WHERE  ID_PK=" . $idppk;
    mysqli_query($conn, $total);
    $_SESSION["info"] = 'Stok berhasil ditambah ';
    header("Location: page_stok_masuk.php?m=2&n=1");
    //echo("berasil jeh");

    exit();
} else {
    echo "Error: " . $sql . "
" . mysqli_error($conn);
}