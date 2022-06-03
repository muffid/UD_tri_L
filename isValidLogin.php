<?php
session_start();
include "connection.php";
$user = $_POST['user'];
$pass = $_POST['password'];

//jika belum diisi form nya
if (empty($user)) {
    $_SESSION['info'] = 'masukan user name anda';
    header("Location: login.php");
    exit();
} else {
    if (empty($pass)) {
        $_SESSION['info'] = 'masukan password anda';
        header("Location: login.php");
        exit();
    } else {
        //cocokan dengan database
        $sql = "SELECT * FROM user WHERE User_Name LIKE '$user' AND Password LIKE '$pass'";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) === 1) {
            $row = mysqli_fetch_assoc($result);
            if ($row['User_Name'] === $user && $row['Password'] === $pass) {
                $_SESSION['login'] = 'ok';
                $_SESSION['idAdmin'] = $row['Id'];
                $_SESSION['UserName'] = $row['User_Name'];
                $_SESSION['st'] = $row['Status'];
                $_SESSION['pass'] = $row['Password'];
                $_SESSION['nama'] = $row['Nama'];
                $_SESSION['foto'] = $row['Gambar'];
                $_SESSION['per'] = $row['Perusahaan'];
                $_SESSION['tentang'] = $row['Tentang'];
                $_SESSION['job'] = $row['Job'];
                $_SESSION['alamat'] = $row['Alamat'];
                $_SESSION['no_telp'] = $row['No_telp'];

            }
        } else {
            $_SESSION['info'] = 'login salah, masukan data dengan benar';
            header("Location: login.php");
            exit();
        }
        //jika sudah berhasil login tapi masuk halaman login akan diarahkan ke halaman index
        if (isset($_SESSION['login'])) {
            header("Location:index.php?m=1&n=1");
        } else {
            header("Location: login.php");
            exit();
        }
    }
}