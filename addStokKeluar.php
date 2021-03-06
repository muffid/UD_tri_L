<?php
include "connection.php";
include "functions.php";

session_start();
date_default_timezone_set('Asia/Jakarta');

$tanggal = date("D, j M Y ");
$iterator = $_POST['iterator'];
$key = idAcak();
$transport = str_replace(".", "", str_replace("Rp. ", "", $_POST['transport']));
$jenisBuyer = $_POST['buyer'];
$dibayar = str_replace(".", "", str_replace("Rp. ", "", $_POST['bayar']));
$dibayartoDB = str_replace(".", "", str_replace("Rp. ", "", $_POST['bayar']));
$total = str_replace(".", "", str_replace("Rp. ", "", $_POST['notatotal']));

if ((int) $dibayar > (int) $total) {
    $dibayar = $total;
} else {
    $dibayar = str_replace(".", "", str_replace("Rp. ", "", $_POST['bayar']));
}

$hutang = 0;
$PJ = "";

if ($jenisBuyer == 1) {
    $idkel = $_POST['namaanggota'];
} else {
    $idkel = $_POST['idkel'];
}

for ($i = 0; $i < $iterator; $i++) {

    $idpupuk = $_POST['ID_PK' . $i];
    $jumlah = $_POST['b' . $i];
    $harga = str_replace(".", "", str_replace("Rp. ", "", $_POST['h' . $i]));

    if ($jenisBuyer == 1) {
        //jika anggota
        $sql = "INSERT INTO stok_keluar (ID_SK,key_transaksi,Tanggal,ID_KT,ID_AKT,ID_PK,Jumlah_Keluar,Harga)
        VALUES ('','$key','$tanggal','','$idkel','$idpupuk','$jumlah','$harga')";
        mysqli_query($conn, $sql);
    } else {
        //jika kelompok
        $sql = "INSERT INTO stok_keluar (ID_SK,key_transaksi,Tanggal,ID_KT,ID_AKT,ID_PK,Jumlah_Keluar,Harga)
        VALUES ('','$key','$tanggal','$idkel','','$idpupuk','$jumlah','$harga')";
        mysqli_query($conn, $sql);
    }

    //----- pengurangan stok pupuk yang dijual------\\

    // diambil dulu stok yang ada
    $stokNow = 0;
    $sqln = mysqli_query($conn, "SELECT Stok FROM data_pupuk WHERE ID_PK=" . $idpupuk);
    foreach ($sqln as $sqlnval) {
        $stokNow = $sqlnval['Stok'];
    }
    $newStok = $stokNow - $jumlah;
    //baru dikurangi sebanyak yang dijual sekaligus mengupdate database
    $updateStok = "UPDATE data_pupuk SET Stok=" . $newStok . " WHERE ID_PK=" . $idpupuk;
    mysqli_query($conn, $updateStok);

}

//simpan ke tabel penjualan
//jika anggota
if ($jenisBuyer == 1) {
    $saveToPenjualan = "INSERT INTO penjualan (ID_PJ,ID_KT,ID_AKT,ID_KEY,Tanggal,Total,Dibayar)
        VALUES ('',0,'$idkel','$key','$tanggal','$total','$dibayartoDB')";
    mysqli_query($conn, $saveToPenjualan);
} else {
    $saveToPenjualan = "INSERT INTO penjualan (ID_PJ,ID_KT,ID_AKT,ID_KEY,Tanggal,Total,Dibayar)
        VALUES ('','$idkel','0','$key','$tanggal','$total','$dibayartoDB')";
    mysqli_query($conn, $saveToPenjualan);
}

if ($total == $dibayar) {
    //jika pembayaran pas maka tidak perlu ada data piutang
    $hutang = 0;

} else {
    $hutang = $total - $dibayar;
    //jika pembayaran ngutang maka disimpan ke tabel piutang

    //jika anggota
    if ($jenisBuyer == 1) {
        $saveToPiutang = "INSERT INTO piutang (ID_PT,ID_KT,ID_AKT,ID_KEY,Debit,Kredit,Tanggal)
            VALUES ('','','$idkel','$key','','$hutang','$tanggal')";
        mysqli_query($conn, $saveToPiutang);
    } else {
        //jika kelompok
        $saveToPiutang = "INSERT INTO piutang (ID_PT,ID_KT,ID_AKT,ID_KEY,Debit,Kredit,Tanggal)
            VALUES ('','$idkel','','$key','','$hutang','$tanggal')";
        mysqli_query($conn, $saveToPiutang);
    }

}

//simpan biaya transport ke tabel biaya_lain
if ($transport > 0) {
    //mengambil ID_PJ sebagai referensi foreign key
    $getPJ = mysqli_query($conn, "SELECT ID_PJ FROM penjualan WHERE ID_KEY LIKE '" . $key . "'");
    foreach ($getPJ as $g) {
        $idPJ = $g['ID_PJ'];
    }
    //baru disimpan ke biaya lain
    $saveToBiayaLain = "INSERT INTO biaya_lain (ID_BL,Tanggal,ID_SM,ID_PJ,Total)
        VALUES ('','$tanggal','','$idPJ','$transport')";
    mysqli_query($conn, $saveToBiayaLain);
}

if ($jenisBuyer == 1) {
    header("Location: page_after_sales.php?BUYER=2&KEY=" . $key);
    exit();
} else {
    header("Location: page_after_sales.php?BUYER=1&KEY=" . $key);
    exit();
}

function idAcak($length = 5)
{
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}