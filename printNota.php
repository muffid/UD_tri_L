<?php
require __DIR__.'/vendor/autoload.php';
	use Spipu\Html2Pdf\Html2Pdf;
	$html2pdf = new Html2Pdf('L','A6','en', true, 'UTF-8', array(2, 2, 2, 2), false);
	$html2pdf->pdf->SetDisplayMode('fullpage');
session_start();
include 'connection.php';
if (isset($_SESSION['login']) ) {


$content = 'hello freakin world!!'.$_GET['KEY'];


 ob_end_clean();
	$html2pdf->writeHTML($content);
	$html2pdf->output();

	}else{
     header("Location: login.php");
     exit();
}

?>
