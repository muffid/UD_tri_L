<?php 
include "connection.php";

$namappk=$_POST['namapupuk'];
$hargappk=$_POST['hargapupuk'];

$sql = "INSERT INTO data_pupuk (ID_PK,Jenis_Pupuk,Harga)
	 VALUES ('','$namappk','$hargappk')";
	 if (mysqli_query($conn, $sql)) {
		 session_start();
		 $_SESSION["info"] = 'ok';
		header("Location: page_jenis_pupuk.php?m=4&n=4");
		exit();
	 } else {
		echo "Error: " . $sql . "
" . mysqli_error($conn);
	 }
?>