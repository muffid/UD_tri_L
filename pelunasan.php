<?php 
session_start();
include "connection.php";
include "functions.php";
date_default_timezone_set('Asia/Jakarta');
$tanggal= date("D, j M Y ");

function idAcak($length =5) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}

$key=idAcak();
$nominal=str_replace(".","",str_replace("Rp. ","",$_POST['bayar']));
$cust=$_GET['id'];

if((int)$cust){
    //jika kelompok
    mysqli_query($conn,"INSERT INTO piutang (ID_PT,ID_KT,ID_AKT,ID_KEY,Debit,Kredit,Tanggal) VALUES ('','$cust','','$key','$nominal','0','$tanggal')");
}else{
    //jika anggota
    mysqli_query($conn,"INSERT INTO piutang (ID_PT,ID_KT,ID_AKT,ID_KEY,Debit,Kredit,Tanggal) VALUES ('','','$cust','$key','$nominal','0','$tanggal')");
}
$_SESSION['info']="transaksi selesai dilakukan, ";
header("Location:page_piutang_pelunasan.php?m=10&n=10&cust=".$cust);
exit();
?>