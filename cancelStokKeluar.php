<?php 
    include "connection.php";

    $deleteID=$_GET['id'];
    $stokToRestore=$_GET['n'];
    $idToRestore=$_GET['m'];


    $sql = "DELETE FROM stok_keluar WHERE ID_SK =".$deleteID;
if (mysqli_query($conn, $sql)) {

    $data = mysqli_query($conn, "SELECT Stok FROM data_pupuk WHERE ID_PK=".$idToRestore." ORDER BY ID_PK DESC");
    foreach ($data as $all) {
        $stokAvail=$all['Stok'];
        $newStok=$stokAvail+$stokToRestore;
        mysqli_query($conn,"UPDATE data_pupuk SET Stok=".$newStok." WHERE ID_PK=".$idToRestore);
    }
    session_start();
    $_SESSION["info"] = '<div class="alert alert-success alert-dismissible fade show" role="alert">berhasil dibatalkan, klik
    <button type="button" class="btn btn-light" data-dismiss="alert" aria-label="Close">
        Disini </button> untuk menutup
</div>';
   header("Location: page_stok_keluar.php?m=3&n=1");
   exit();
} else {
   echo "Error: " . $sql . "
" . mysqli_error($conn);
}
?>