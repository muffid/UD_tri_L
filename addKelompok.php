<?php 
include "connection.php";
$namakel=$_POST['namakel'];
$ketuakel=$_POST['ketuakel'];
$nik=$_POST['nik'];
$alamat=$_POST['alamat'];
$telp=$_POST['telp'];
//$pics=$_POST['pics'];


function upload(){
	global $gagal;	

	$namaFile = $_FILES['pics']['name'];
	$ukuranGambar = $_FILES['pics']['size'];
	$error = $_FILES['pics']['error'];
	$tmpName = $_FILES['pics']['tmp_name'];

	//cek gambar ada/ tidak
	// if ($error === 4) {
	// 			$gagal = "Gambar Format salh";
	// 			return false;
	// }

	//cek ekstensi gambar
	$ekstensiGambarValid = ['jpg','jpeg','png'];
	$eksGambarSatu = explode('.',$namaFile);
	$eksGambar = strtolower(end($eksGambarSatu));

	if (!in_array($eksGambar, $ekstensiGambarValid)) {
		if(empty($_FILES['pics']['name'])){

		}else{
		$gagal = "Gambar yang diinput harus berformat (.jpg .jpeg .png)";
        echo($gagal);
	
				return false;}
		
	}

	//cek ukuran file
	if ($ukuranGambar > 2400000) {
				$gagal = "Gambar Tidak Boleh Melebihi Dari 2MB";
                echo($gagal);
				return false;
	}

$namaFileBaru = uniqid();
$namaFileBaru .= ".";
$namaFileBaru .= $eksGambar;

move_uploaded_file($tmpName, 'img/'.$namaFileBaru);

return $namaFileBaru;
}

$gambar = upload();

$sql = "INSERT INTO data_kel_tani (ID_KT,NIK,Nama_Kel,Nama_Ketua,Alamat,Telp,Foto)
	 VALUES ('','$namakel','$ketuakel','$nik','$alamat','$telp','$gambar')";
	 if (mysqli_query($conn, $sql)) {
		 session_start();
		 $_SESSION["info"] = 'Data kelompok tani  berhasil ditambah';
		header("Location: page_kel_tani.php?m=4&n=2");
		exit();
	 } else {
		echo "Error: " . $sql . "
" . mysqli_error($conn);
	 }
?>