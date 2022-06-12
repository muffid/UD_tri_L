<?php
include "connection.php";
//echo($_POST['pembayaran']);

session_start();
date_default_timezone_set('Asia/Jakarta');

 $tanggal= date("D, j M Y ");
 $iterator=$_POST['iterator'];
 $key=idAcak();
 $transport=$_POST['transport'];


 $idkel=$_POST['idkel'];
 $dibayar=$_POST['bayar'];
 $total=$_POST['notatotal'];
 $hutang=0;
 
 for($i=0; $i<$iterator; $i++){
    
    $idpupuk=$_POST['ID_PK'.$i];
    $jumlah=$_POST['b'.$i];
    $harga=$_POST['h'.$i];

    //simpan ke stok keluar
    $sql = "INSERT INTO stok_keluar (ID_SK,key_transaksi,Tanggal,ID_KT,ID_AKT,ID_PK,Jumlah_Keluar,Harga)
	 VALUES ('','$key','$tanggal','$idkel','','$idpupuk','$jumlah','$harga')";

    if (mysqli_query($conn, $sql)) {

        //----- pengurangan stok pupuk yang dijual------\\

        // diambil dulu stok yang ada 
        $stokNow=0;
        $sqln=mysqli_query($conn,"SELECT Stok FROM data_pupuk WHERE ID_PK=".$idpupuk);
        foreach($sqln as $sqlnval){
            $stokNow=$sqlnval['Stok'];
        }
        $newStok=$stokNow-$jumlah;
        //baru dikurangi sebanyak yang dijual sekaligus mengupdate database
       $updateStok = "UPDATE data_pupuk SET Stok=".$newStok." WHERE ID_PK=".$idpupuk;
        mysqli_query($conn,$updateStok);
      
    } else {
        echo "Error: " . $sql . " " . mysqli_error($conn);
    }

 }

    if($total==$dibayar){
        //jika pembayaran pas maka tidak perlu ada data piutang
        $hutang=0;
    }else{
        $hutang=$total-$dibayar;
        //jika pembayaran ngutang maka disimpan ke tabel piutang
        $saveToPiutang="INSERT INTO piutang (ID_PT,ID_KT,Debit,Kredit,Tanggal)
        VALUES ('','$idkel','','$hutang','$tanggal')";
        mysqli_query($conn,$saveToPiutang);
    }
    
    //simpan ke tabel penjualan
    $saveToPenjualan="INSERT INTO penjualan (ID_PJ,ID_KT,ID_KEY,Tanggal,Total,Dibayar)
    VALUES ('','$idkel','$key','$tanggal','$total','$dibayar')";
    mysqli_query($conn,$saveToPenjualan);

    //simpan biaya transport ke tabel biaya_lain
    if($transport>0){
        $saveToBiayaLain="INSERT INTO biaya_lain (ID_BL,ID_SM,ID_SK,Total)
        VALUES ('','','$key','$transport')";
        mysqli_query($conn,$saveToBiayaLain);
    }

    function idAcak($length = 4) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }