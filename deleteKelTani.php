<?php
include "connection.php";
//echo $_GET['id'];
$deleteID = $_GET['id'];
$sql = "DELETE FROM data_kel_tani WHERE ID_KT =" . $deleteID;
if (mysqli_query($conn, $sql)) {
    session_start();
    $_SESSION["info"] = 'Data kelompok tani berhasil dihapus';
    header("Location: page_kel_tani.php?m=4&n=2");
    exit();
} else {
    echo "Error: " . $sql . "
" . mysqli_error($conn);
}