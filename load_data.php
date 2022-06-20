<?php
include "connection.php";
$idSM=$_POST['key'];

$getData=mysqli_query($conn,"SELECT Tanggal,ID_PK,Nominal FROM stok_masuk WHERE ID_SM=".$idSM);
$output="";
$no=1;
foreach($getData as $gd){
    $output.='<tr><td>'.$no.'</td><td>'.$gd['Tanggal'].'</td><td>'.$gd['ID_PK'].'</td><td>'.$gd['Nominal'].'</td></tr>';
    $no++;
}
echo($output);
?>