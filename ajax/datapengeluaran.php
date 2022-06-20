<?php
include '../connection.php';
include '../functions.php';
$bulan = $_GET['bulan'];
//var_dump($bulan);
?>

<!-- <link href="../vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet"> -->
<table class="table table-bordered" id="tablePengeluaran" width="100%" cellspacing="0">
    <thead>
        <tr>
            <th scope="col">No</th>
            <th scope="col">Tanggal</th>
            <th scope="col">Keperluan</th>
            <th scope="col">Nominal</th>
        </tr>
    </thead>
    <tbody>

        <?php
if (isset($bulan)) {
    # code...
} else {

}
$no = 1;
$sql = mysqli_query($conn, "SELECT * FROM stok_masuk  INNER JOIN data_pupuk ON stok_masuk.ID_PK = data_pupuk.ID_PK WHERE Tanggal LIKE '%" . $bulan . "%' ORDER BY ID_SM DESC");
foreach ($sql as $key): ?>
        <tr>
            <td> <?=$no;?></td>
            <td> <?=$key['Tanggal'];?></td>
            <td> <?="Pembelian Pupuk " . $key['Jenis_Pupuk'];?></td>
            <td> <?=rp($key['Nominal']);?></td>
        </tr>

        <?php $no++;
endforeach;?>
    <tbody>
        <?php
$total = mysqli_query($conn, "SELECT sum(Nominal) AS tot FROM stok_masuk WHERE Tanggal LIKE '%" . $bulan . "%'");
foreach ($total as $key) {
    $totalnya = $key['tot'];
}
?>
        <tr>
            <th colspan="3" class="text-center">Total</th>
            <th colspan="1"><?=rp($totalnya);?></th>
        </tr>
    </tbody>
    </tbody>
</table>