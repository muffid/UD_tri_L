<?php 
    include "connection.php";

    $deleteID=$_GET['id'];


    $sql = "DELETE FROM data_pupuk WHERE ID_PK =".$deleteID;
if (mysqli_query($conn, $sql)) {
    session_start();
    $_SESSION["info"] = 'Data pupuk berhasil dihapus';
   header("Location: page_jenis_pupuk.php?m=4&n=4");
   exit();
} else {
   echo "Error: " . $sql . "
" . mysqli_error($conn);
}
?>