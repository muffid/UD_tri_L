<?php 

//cancel :
// 1. hapus penjualan by KEY
// 2. hapus stok keluar by KEY
// 3. tambahkan stok pupuk sejumlah yang dihapus
// 4. hapus hutang by KEY
// 5. hapus biaya lain by KEY

    include "connection.php";

    $key=$_GET['key'];


    

    //kembalikan jmumlah pupuk yang keluar 
    $sqlGetItem="SELECT ID_PK,Jumlah_Keluar FROM stok_keluar WHERE key_transaksi LIKE '".$key."'";
    $item=mysqli_query($conn,$sqlGetItem);
    foreach($item as $i){
        $idPK=$i['ID_PK'];
        $jmlPK=$i['Jumlah_Keluar'];
        $jmlPKNow=0;

        //mencari stok sekarang
        $stok=mysqli_query($conn,"SELECT Stok FROM data_pupuk WHERE ID_PK=".$i['ID_PK']);
        foreach($stok as $s){
            $jmlPKNow=(int)$s['Stok'];
        }

        //tambahkan
        mysqli_query($conn,"UPDATE data_pupuk SET Stok=".($jmlPK+$jmlPKNow)." WHERE ID_PK=".$idPK);

    }

    //hapus dari stok keluar
    mysqli_query($conn,"DELETE FROM stok_keluar WHERE key_transaksi LIKE '".$key."'");

    //hapus piutang
    mysqli_query($conn,"DELETE FROM piutang WHERE ID_KEY LIKE '".$key."'");

    //hapus biaya lain
    $idPJ=mysqli_query($conn,"SELECT ID_PJ FROM penjualan WHERE ID_KEY LIKE '".$key."'");
    $ID_PJ=0;
    foreach($idPJ as $ip){
        $ID_PJ=$ip['ID_PJ'];
    }

    mysqli_query($conn,"DELETE FROM biaya_lain WHERE ID_PJ=".$ID_PJ);

    
    //hapus dari penjualan
    $delPenjualan = "DELETE FROM penjualan WHERE ID_KEY LIKE '".$key."'";
    mysqli_query($conn,$delPenjualan);
    
    header("Location: page_stok_keluar.php?m=3&n=1");
    exit();

?>