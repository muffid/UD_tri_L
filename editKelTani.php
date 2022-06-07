<?php
session_start();
include_once 'connection.php';

//echo($namaAdmin.' '.$jabatanAdmin.' '.$idAdmin.' '.$userAdmin.' '.$passAdmin.' '.$picAdmin);

if (isset($_POST['fungsitombol'])) {

    $namaFile = $_FILES['pics']['name'];
    $typeFile = $_FILES['pics']['type'];
    $sizeFile = $_FILES['pics']['size'];
    $errorFile = $_FILES['pics']['error'];
    $tmpFile = $_FILES['pics']['tmp_name'];

    $idkel = $_POST['idkel'];
    $foto = $_POST['pics'];
    $namaKel = $_POST['NamaKel'];
    $namaKet = $_POST['NamaKet'];
    $nik = $_POST['nik'];
    $no = $_POST['Telp'];
    $alamat = $_POST['Alamat'];

    if ($errorFile === 4) {

        // menyimpan tanpa gambar baru
        $sql = "UPDATE data_kel_tani SET ID_KT='" . $idkel . "', NIK='" . $nik . "', Nama_Kel='" . $namaKel . "', Nama_Ketua='" . $namaKet . "', Alamat='" . $alamat . "', Telp='" . $no . "'  WHERE ID_KT=" . $idkel;
        //disimpan
        if (mysqli_query($conn, $sql)) {

            $sql = "SELECT * FROM data_kel_tani WHERE ID_KT = '$idkel'";
            $result = mysqli_query($conn, $sql);
            if (mysqli_num_rows($result) === 1) {
                $row = mysqli_fetch_assoc($result);
                $_SESSION['ok'] = "Data Berhasil Diubah";
            }

            header("Location: page_edit_kel_tani.php?m=4&n=2&id=$idkel");
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

                $sql = "UPDATE data_kel_tani SET ID_KT='" . $idkel . "', NIK='" . $nik . "', Nama_Kel='" . $namaKel . "', Nama_Ketua='" . $namaKet . "', Alamat='" . $alamat . "', Telp='" . $no . "', Foto='" . $namaBaru . "'  WHERE ID_KT=" . $idkel;
                //disimpan
                if (mysqli_query($conn, $sql)) {

                    //update session data
                    $sql = "SELECT * FROM data_kel_tani WHERE ID_KT = '$idkel'";
                    $result = mysqli_query($conn, $sql);

                    if (mysqli_num_rows($result) === 1) {
                        $row = mysqli_fetch_assoc($result);
                        $_SESSION['ok'] = "Data Berhasil Diubah";
                    }
                    header("Location: page_edit_kel_tani.php?m=4&n=2&id=$idkel");

                    exit();
                } else {
                    echo "Error: " . $sql . " " . mysqli_error($conn);
                }

            } else {
                //jika file kebesaran
                $_SESSION['fail'] = "File MAX Size 2MB ";
                header("Location: page_edit_kel_tani.php?m=4&n=2&id=$idkel");
                exit();

            }

        } else {
            //jika ekstensi tidak valid
            $_SESSION['fail'] = "Format File Tidak Valid (Format file harus *.JPG *.JPEG *.PNG)";
            header("Location: page_edit_kel_tani.php?m=4&n=2&id=$idkel");
            exit();
        }
    }
}