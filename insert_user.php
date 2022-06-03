<?php
session_start();
include_once 'connection.php';

//echo($namaAdmin.' '.$jabatanAdmin.' '.$idAdmin.' '.$userAdmin.' '.$passAdmin.' '.$picAdmin);

if (isset($_POST['rubahGambar'])) {

    $namaFile = $_FILES['Gambar']['name'];
    $typeFile = $_FILES['Gambar']['type'];
    $sizeFile = $_FILES['Gambar']['size'];
    $errorFile = $_FILES['Gambar']['error'];
    $tmpFile = $_FILES['Gambar']['tmp_name'];

    $idAdmin = $_SESSION['idAdmin'];
    $userName = $_SESSION['UserName'];
    $pass = $_SESSION['pass'];
    $tentangPer = $_POST['TentangPer'];
    $namaPer = $_POST['NamaPer'];
    $namaAdmin = $_POST['Admin'];
    $status = $_SESSION['st'];
    $job = $_POST['status'];
    $alamat = $_POST['Alamat'];
    $noTlp = $_POST['noTelp'];
    $picAdmin = $_SESSION['foto'];

    if ($errorFile === 4) {

        // menyimpan tanpa gambar baru
        $sql = "UPDATE user SET Id='" . $idAdmin . "', Nama='" . $namaAdmin . "', User_Name='" . $userName . "', Password='" . $pass . "', Status='" . $status . "',  Gambar='" . $picAdmin . "', Alamat='" . $alamat . "', Perusahaan='" . $namaPer . "', Job='" . $job . "', Tentang='" . $tentangPer . "', No_telp='" . $noTlp . "'  WHERE Id=" . $idAdmin;
        //disimpan
        if (mysqli_query($conn, $sql)) {

            $sql = "SELECT * FROM user WHERE Id = '$idAdmin'";

            $result = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result) === 1) {
                $row = mysqli_fetch_assoc($result);

                $_SESSION['tentang'] = $row['Tentang'];
                $_SESSION['per'] = $row['Perusahaan'];
                $_SESSION['nama'] = $row['Nama'];
                $_SESSION['job'] = $row['Job'];
                $_SESSION['alamat'] = $row['Alamat'];
                $_SESSION['no_telp'] = $row['No_telp'];
                $_SESSION['foto'] = $row['Gambar'];
                $_SESSION['ok'] = "Profil Berhasil Diubah";
            }

            header("Location: page_administrator.php?m=5&n=5");
            exit();
        } else {
            echo "Error: " . $sql . " " . mysqli_error($conn);
        }

    } else {

        //jika ada file
        $validExt = ['jpg', 'jpeg', 'png'];
        $extFile = strtolower(end(explode('.', $namaFile)));

        if (in_array($extFile, $validExt)) {
            //jika ekstensi valid

            if ($sizeFile < 2000000) {
                //jika ukuran valid
                $namaBaru = uniqid() . '.' . $extFile;
                move_uploaded_file($tmpFile, 'img/' . $namaBaru);

                $sql = "UPDATE user SET Id='" . $idAdmin . "', Nama='" . $namaAdmin . "', User_Name='" . $userName . "', Password='" . $pass . "', Status='" . $status . "',  Gambar='" . $namaBaru . "', Alamat='" . $alamat . "', Perusahaan='" . $namaPer . "', Job='" . $job . "', Tentang='" . $tentangPer . "', No_telp='" . $noTlp . "'  WHERE Id=" . $idAdmin;

                if (mysqli_query($conn, $sql)) {

                    //update session data
                    $sql = "SELECT * FROM user WHERE Id = '$idAdmin'";

                    $result = mysqli_query($conn, $sql);

                    if (mysqli_num_rows($result) === 1) {
                        $row = mysqli_fetch_assoc($result);

                        $_SESSION['tentang'] = $row['Tentang'];
                        $_SESSION['per'] = $row['Perusahaan'];
                        $_SESSION['nama'] = $row['Nama'];
                        $_SESSION['job'] = $row['Job'];
                        $_SESSION['alamat'] = $row['Alamat'];
                        $_SESSION['no_telp'] = $row['No_telp'];
                        $_SESSION['foto'] = $row['Gambar'];
                        $_SESSION['ok'] = "Profil Berhasil Diubah";
                    }
                    header("Location: page_administrator.php?m=5&n=5");

                    exit();
                } else {
                    echo "Error: " . $sql . " " . mysqli_error($conn);
                }

            } else {
                //jika file kebesaran
                $_SESSION['fail'] = "File MAX Size 2MB ";
                header("Location: page_administrator.php?m=5&n=5");
                exit();

            }

        } else {
            //jika ekstensi tidak valid
            $_SESSION['fail'] = "Format File Tidak Valid (Format file harus *.JPG *.JPEG *.PNG)";
            header("Location: page_administrator.php?m=5&n=5");
            exit();
        }
    }
}