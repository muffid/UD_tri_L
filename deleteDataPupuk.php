<?php
include 'connection.php';
// echo $_GET['id'];

$deleteID = $_GET['id'];
$sql = "DELETE FROM stok_masuk WHERE ID_SM =" . $deleteID;
if (mysqli_query($conn, $sql)) {
    session_start();
    $_SESSION["info"] = 'Data pupuk berhasil dihapus';
    header("Location: page_stok_masuk.php?m=2&n=1");
    exit();
} else {
    echo "Error: " . $sql . "
" . mysqli_error($conn);
}