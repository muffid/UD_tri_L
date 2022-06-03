<?php 
include "connection.php";

$editnamapupuk=$_POST['editnamapupuk'];
$edithargapupuk=$_POST['edithargapupuk'];
$editIDpupuk=$_GET['id'];

//echo($editnamapupuk.$edithargapupuk.$editIDpupuk);
$sql = "UPDATE data_pupuk SET Jenis_Pupuk='".$editnamapupuk."',Harga='".$edithargapupuk."' WHERE ID_PK=".$editIDpupuk;
if (mysqli_query($conn, $sql)) {
    session_start();
    $_SESSION["info"] = 'Data pupuk berhasil diubah';
   header("Location: page_jenis_pupuk.php?m=4&n=4");
   exit();
} else {
   echo "Error: " . $sql . "
" . mysqli_error($conn);
}


?>