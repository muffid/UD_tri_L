<?php 

include "connection.php";
$key=$_POST['key'];
$no=1;
$output="";
$total=0;

// algoritma ngganti bulan disini

$getData=mysqli_query($conn,"SELECT Tanggal,ID_PK,Jumlah_Masuk,Nominal FROM stok_masuk WHERE Tanggal LIKE '%".$key."%'");
foreach($getData as $gd){
    $output.='<tr><td>'.$no.'</td><td>'.$gd['Tanggal'].'</td><td>'.$gd['Jumlah_Masuk'].'</td><td>'.$gd['Nominal'].'</td></tr>';
    $total=$total+(int)$gd['Nominal'];
    $no++;
}
$output.='<tr><td colspan="3" class="text-center">TOTAL</td><td>'.$total.'</td></tr>';
echo ($output);

?>