<?php
include "connection.php";

$namapeng = $_POST['pengirim'];
$idppk = $_POST['idppk'];
$trans = htmlspecialchars(str_replace(".", "", $_POST['transport']));
$jumlah = $_POST['jumlah'];
$total = htmlspecialchars(str_replace(".", "", $_POST['harga']));

date_default_timezone_set('Asia/Jakarta');
$tanggal = date("D, j M Y ");

//inset stok masuk
$sql = "INSERT INTO stok_masuk (ID_SM,Tanggal,ID_PK,Nama_Pengirim,Jumlah_Masuk,Nominal,Status)
	 VALUES ('','$tanggal','$idppk','$namapeng','$jumlah','$total','')";

if (mysqli_query($conn, $sql)) {
    session_start();
    $slc = mysqli_query($conn, "SELECT ID_SM FROM stok_masuk ORDER BY ID_SM DESC LIMIT 1");
    foreach ($slc as $idslc) {
        $idstpp = $idslc['ID_SM'];
    }
    //input biaya lain jika transport > 0
    if($trans>0){
    $tran = "INSERT INTO biaya_lain (ID_BL, Tanggal, ID_SM, ID_PJ, Total) VALUES ('','$tanggal','$idstpp','','$trans')";
    mysqli_query($conn, $tran);
    }

//    tamabh stok
    $sqlDP = mysqli_query($conn, "SELECT SUM(Jumlah_Masuk) AS total_stok From stok_masuk where ID_PK=" . $idppk);
    foreach ($sqlDP as $key) {
        $dat = $key['total_stok'];
    }

    //mengisi total pupuk masuk & merubah perawan / gak perawan
    $aqlPupuk = mysqli_query($conn, "SELECT * FROM data_pupuk WHERE ID_PK=" . $idppk);
    foreach ($aqlPupuk as $keyPupuk) {
        $jumPupuk = $keyPupuk['Stok'];
    }

    //update stok
    if ($jumPupuk == 0) {
        $total = "UPDATE data_pupuk SET Stok='" . $jumlah . "', Status=1 WHERE  ID_PK=" . $idppk;
        mysqli_query($conn, $total);
        $_SESSION["info"] = 'Stok berhasil ditambah ';
        header("Location: page_stok_masuk.php?m=2&n=1");
        //echo("berasil jeh");
    } else {
        $jumPupukBaru = $jumPupuk + $jumlah;
        $total = "UPDATE data_pupuk SET Stok='" . $jumPupukBaru . "' WHERE  ID_PK=" . $idppk;
        mysqli_query($conn, $total);
        $_SESSION["info"] = 'Stok berhasil ditambah ';
        header("Location: page_stok_masuk.php?m=2&n=1");

    }

    exit();
} else {
    echo "Error: " . $sql . "
" . mysqli_error($conn);
}