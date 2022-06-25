<?php
include "connection.php";

$editIDpupuk=$_GET['id'];

$editnamapupuk=$_POST['editnamapupuk'.$editIDpupuk];
$edithargapupuk=$_POST['edithargapupuk'.$editIDpupuk];
$hargaFix=str_replace(".","",str_replace("Rp. ","",$edithargapupuk));



//echo($editnamapupuk.$edithargapupuk.$editIDpupuk);
$sql = "UPDATE data_pupuk SET Jenis_Pupuk='".$editnamapupuk."',Harga='".$hargaFix."' WHERE ID_PK=".$editIDpupuk;
if (mysqli_query($conn, $sql)) {
    session_start();
    $_SESSION["info"] = 'Data pupuk berhasil diubah';
    header("Location: page_jenis_pupuk.php?m=4&n=4");
    exit();
} else {
    echo "Error: " . $sql . "
" . mysqli_error($conn);
}

function rp($angka)
{

    $hasil_rupiah = "Rp. " . number_format($angka, 0, ',', '.');
    return $hasil_rupiah;

}
function rpnull($angka1)
{

    $hasil_rupiah1 = number_format($angka1, 0, ',', '.');
    return $hasil_rupiah1;

}

?>