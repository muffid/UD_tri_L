<?php
include 'connection.php';
session_start();

$userName = $_POST["User"];
$passBaru = $_POST["PassBaru"];
$ulangiPass = $_POST["KonPass"];

$passDb = mysqli_query($conn, "SELECT User_Name, Password FROM user WHERE Id=" . $_SESSION['idAdmin']);

foreach ($passDb as $k) {
    $DBpass = $k['Password'];
}

if ($passBaru === $ulangiPass) {

    $simpan = "UPDATE user SET  User_Name='" . $userName . "', Password='" . $passBaru . "' WHERE Id=" . $_SESSION['idAdmin'];

    if (mysqli_query($conn, $simpan)) {

        $_SESSION["ok"] = 'Password berhasil diubah';
        header("Location: page_administrator.php?m=5&n=5");
        exit();
    } else {
        echo "Error: " . $simpan . " " . mysqli_error($conn);
    }
    mysqli_close($conn);

    //ketika pass baru salah diulangi
} else {
    $_SESSION["passTidakSama"] = 'Password tidak sama !';
    header("Location: page_administrator.php?m=5&n=5");
    exit();
}