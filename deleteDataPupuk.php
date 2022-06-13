<?php
include 'connection.php';
// echo $_GET['id'];

$deleteID = $_GET['id'];

$cancel = mysqli_query($conn, "SELECT ID_PK,Jumlah_Masuk FROM stok_masuk Where ID_SM =" . $deleteID);
foreach ($cancel as $key) {
    $ambil = $key['Jumlah_Masuk'];
    $idpk = $key['ID_PK'];
}

$jmlstok = mysqli_query($conn, "SELECT * FROM data_pupuk Where ID_PK=" . $idpk);
foreach ($jmlstok as $nilai) {
    $totalstok = $nilai['Stok'];
}
$kurang = $totalstok - $ambil;
$perbarui = "UPDATE data_pupuk SET Stok='" . $kurang . "' WHERE ID_PK=" . $idpk;
mysqli_query($conn, $perbarui);

$biaya = "DELETE FROM biaya_lain WHERE ID_BL =" . $deleteID;
mysqli_query($conn, $biaya);
$sql = "DELETE FROM stok_masuk WHERE ID_SM =" . $deleteID;
if (mysqli_query($conn, $sql)) {
    session_start();
    $_SESSION["info"] = 'Data Stok Pupuk Masuk berhasil dibatalkan';
    header("Location: page_stok_masuk.php?m=2&n=1");
    exit();
} else {
    echo "Error: " . $sql . "
" . mysqli_error($conn);
}