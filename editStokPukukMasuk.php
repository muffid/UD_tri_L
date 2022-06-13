<?php
include 'connection.php';
echo $idpp = $_GET['id'];
echo $namaPengpp = $_POST['editnamapeng'];
echo $jenispp = $_POST['jenisPPE'];
echo $jumlahpp = $_POST['editjumlahpupuk'];
echo $hargapp = htmlspecialchars(str_replace(".", "", $_POST['Mohargapp']));
die();
$setidpk = mysqli_query($conn, "SELECT ID_PK FROM data_pupuk where Jenis_Pupuk=" . $jenispp);
foreach ($setidpk as $key) {
    $idPK = $key['ID_PK'];
}
$sql = "UPDATE stok_masuk SET ID_PK='" . $idPK . "', Nama_Pengirim='" . $namaPengpp . "' , Jumlah_Masuk='" . $jumlahpp . "' , Nominal='" . $hargapp . "' WHERE ID_SM=" . $idpp;
if (mysqli_query($conn, $sql)) {
    session_start();
    $_SESSION["info"] = 'Data Stok Pupuk Masuk berhasil diubah';
    header("Location: page_stok_masuk.php?m=2&n=1");
    exit();
} else {
    echo "Error: " . $sql . "
" . mysqli_error($conn);
}