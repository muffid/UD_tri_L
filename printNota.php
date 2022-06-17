<?php
require __DIR__.'/vendor/autoload.php';
	use Spipu\Html2Pdf\Html2Pdf;
	$html2pdf = new Html2Pdf('P','A6','en', true, 'UTF-8', array(2, 2, 2, 2), false);
	$html2pdf->pdf->SetDisplayMode('fullpage');
session_start();
include 'connection.php';

$BUYER=$_GET['BUYER'];
$pembeli="";
$tanggal="";
$KEY=$_GET['KEY'];

if (isset($_SESSION['login']) ) {

	if($BUYER==1){
		$sqlNota=mysqli_query($conn,"SELECT Tanggal,ID_KT FROM stok_keluar WHERE key_transaksi LIKE '".$KEY."'");
		foreach($sqlNota as $sn){
			$tanggal=$sn['Tanggal'];
			$sqlNamaKel=mysqli_query($conn,"SELECT Nama_Kel FROM data_kel_tani WHERE ID_KT=".$sn['ID_KT']);
			foreach($sqlNamaKel as $snk){
				$pembeli=$snk['Nama_Kel'];
				break;
			}
			
			break;
		}
	}else{
		$sqlNota=mysqli_query($conn,"SELECT Tanggal,ID_AKT FROM stok_keluar WHERE key_transaksi LIKE '".$KEY."'");
		foreach($sqlNota as $sn){
			$pembeli=$sn['ID_AKT'];
			$tanggal=$sn['Tanggal'];
			break;
		}
	}

$content = '

<style>

table, th, td {
	border: 1px solid;
	border-collapse: collapse;
	border-color: #96D4D4;
  }

th,td{
	padding:5px;
	text-align:center;
	
}
th{
	background-color: #c4eafc;
	height:10px;
}
td{
	height: 7px;
}
</style>

<table style="width:100%">
<tr>
<td colspan="2" style="width:100%; padding:10px;"><span style="font-size:20px; color:green; font-weight:bold;">NOTA PENJUALAN UD TRI L</span></td>
</tr>
<tr>
<td colspan="2" style="width:100%; padding:5px;"><span style="font-size:12px;">Alamat: Dampit Kab Malang Telp : 0857875604545 email:udtril@gmail.com</span></td>
</tr>
<tr>
<td style="width:60%;">Pembeli : '.$pembeli.'</td>

<td style="width:40%;">'.$tanggal.'</td>
</tr>
</table>
<table style="width:100%">
<tr>
  <th style="width:10%">No</th>
  <th style="width:25%">Pupuk</th>
  <th style="width:15%">Jumlah</th>
  <th style="width:20%">Harga</th>
  <th style="width:30%">Total</th>
</tr>
';

$contentNo="";
$no=1;
	$sqlNota=mysqli_query($conn,"SELECT ID_PK,Jumlah_Keluar,Harga FROM stok_keluar WHERE key_transaksi LIKE '".$KEY."'");
	foreach($sqlNota as $sn){
		
		$contentNo=$contentNo.'<tr><td>'.$no.'</td>';
		$sqlNamaPupuk=mysqli_query($conn,"SELECT Jenis_Pupuk FROM data_pupuk WHERE ID_PK=".$sn['ID_PK']);
		foreach ($sqlNamaPupuk as $snk) {
			$contentPPK='<td>'.$snk['Jenis_Pupuk'].'</td>';
			$contentNo=$contentNo.$contentPPK;
		}
		$contentNo=$contentNo.'<td>'.$sn['Jumlah_Keluar'].'</td><td>'.minusRP($sn['Harga']).'</td><td>'.minusRp((int)$sn['Jumlah_Keluar']*(int)$sn['Harga']).'</td></tr>';
		
		$no++;
	}
$contentRow="";
for($i=$no; $i<7; $i++){
	$contentRow=$contentRow.'<tr><td></td><td></td><td></td><td></td><td></td></tr>';
}

$contentPayment="";

$sqlPayment=mysqli_query($conn,"SELECT Total,Dibayar FROM penjualan WHERE ID_KEY LIKE '".$KEY."'");
foreach($sqlPayment as $sp){
	$contentPayment=$contentPayment.'<tr><td colspan="4" style="text-align:center;background-color: #cbfcc4 ;"><strong>Total</strong></td>
	<td>'.rp($sp['Total']).'</td></tr><tr><td colspan="4" style="text-align:center;"><strong>Dibayar</strong></td>
	<td>'.rp($sp['Dibayar']).'</td></tr>';
	
	if((int)$sp['Total']<=(int)$sp['Dibayar']){
		$contentPayment=$contentPayment.'<tr><td  colspan="4" style="text-align:center;background-color: #fbfcc4;"><strong>Kembalian</strong></td>
		<td>'.rp((int)$sp['Dibayar']-(int)$sp['Total']).'</td></tr>';
	}else{
		$contentPayment=$contentPayment.'<tr><td  colspan="4" style="text-align:center; background-color: #fbfcc4;"><strong>Kekurangan</strong></td>
		<td>'.rp((int)$sp['Total']-(int)$sp['Dibayar']).'</td></tr>';
	}
}
$contentb='

</table> 
';


 ob_end_clean();
	$html2pdf->writeHTML($content.$contentNo.$contentRow.$contentPayment.$contentb);
	$html2pdf->output();

	}else{
     header("Location: login.php");
     exit();
}

$no=1;

function rp($angka)
{

    $hasil_rupiah = "Rp. " . number_format($angka, 0, ',', '.');
    return $hasil_rupiah;

}
function minusRp($angka)
{

    $hasil_rupiah =number_format($angka, 0, ',', '.');
    return $hasil_rupiah;

}

function rpnull($angka1)
{

    $hasil_rupiah1 = number_format($angka1, 0, ',', '.');
    return $hasil_rupiah1;

}

?>
