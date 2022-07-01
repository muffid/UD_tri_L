<?php
include "connection.php";

$namappk = $_POST['namapupuk'];

$sql = "INSERT INTO data_pupuk (ID_PK,Jenis_Pupuk,Stok,Harga,Status)
	 VALUES ('','$namappk',0,0,0)";
if (mysqli_query($conn, $sql)) {
    session_start();
    $_SESSION["info"] = 'Data pupuk berhasil ditambah';
    header("Location: page_jenis_pupuk.php?m=4&n=4");
    exit();
} else {
    echo "Error: " . $sql . "
" . mysqli_error($conn);
}