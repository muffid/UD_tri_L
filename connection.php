
  <?php

$sname= "localhost";
$unmae= "root";
$password = "";

$db_name = "pupuk_tri";

// $conn = mysqli_connect($sname, $unmae, $password, $db_name);

// $sname= "srv27";
// $unmae= "u2968544_jual_decal";
// $password = "db54321jualDecal";

// $db_name = "u2968544_jual_decal";

$conn = mysqli_connect($sname, $unmae, $password, $db_name);

if (!$conn) {
	echo "Connection failed!";
}
