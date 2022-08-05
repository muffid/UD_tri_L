<?php 

include "connection.php";

$arrData = array (
  array("Jun",0),
  array("jul",0),
  array("Aug",0)
);
$totalPenjualan = 0;  
$totPenj = mysqli_query($conn,"SELECT SUM(Jumlah_Keluar) AS totP FROM stok_keluar WHERE Tanggal LIKE '%2022%' AND ID_PK=2");
foreach($totPenj as $tp){
  $totalPenjualan = $tp['totP'];
}

//jun
$jun = mysqli_query($conn,"SELECT SUM(Jumlah_Masuk) AS totM FROM stok_masuk WHERE Tanggal LIKE '%jun 2022%' AND ID_PK=2");
foreach($jun as $tm){
  $arrData[0][1] = $tm['totM'];
}

//jul
$jul = mysqli_query($conn,"SELECT SUM(Jumlah_Masuk) AS totM FROM stok_masuk WHERE Tanggal LIKE '%jul 2022%' AND ID_PK=2");
foreach($jul as $tm){
  $arrData[1][1] = $tm['totM'];
}

//Agus
$aug = mysqli_query($conn,"SELECT SUM(Jumlah_Masuk) AS totM FROM stok_masuk WHERE Tanggal LIKE '%aug 2022%' AND ID_PK=2");
foreach($aug as $tm){
  $arrData[2][1] = $tm['totM'];
}



$c=$totalPenjualan;
$res = array_fill(0,3,0); 

for ($i = 0; $i <  3; $i++){
    if($c> $arrData[$i][1]){
        $res[$i] = $arrData[$i][1];
        $c = $c - (int)$arrData[$i][1];
    }else{
        $res[$i] = $c;
        break;
    }
}

echo ('Masuk Jun : '.$arrData[0][1].'<br>');
echo ('Masuk Jul : '.$arrData[1][1].'<br>');
echo ('Masuk Aug : '.$arrData[2][1].'<br>');

echo('Real terjual : <br>');

for($i=0; $i<count($res); $i++){
  echo($res[$i].'<br>');
}

echo ('Total Penjualan : '.$totalPenjualan);