<?php
include "../connection.php";
include '../functions.php';
$key = $_POST['key'];
$no = 1;

$total = 0;
//2022-02
// algoritma ngganti bulan disini
$tahun = substr($key, 0, 4);
$bln = substr($key, 5, 7);
switch ($bln) {
    case '01':
        $bln = 'Jan';
        break;
    case '02':
        $bln = 'Feb';
        break;
    case '03':
        $bln = 'Mar';
        break;
    case '04':
        $bln = 'Apr';
        break;
    case '05':
        $bln = 'May';
        break;
    case '06':
        $bln = 'Jun';
        break;
    case '07':
        $bln = 'Jul';
        break;
    case '08':
        $bln = 'Aug';
        break;
    case '09':
        $bln = 'Sep';
        break;
    case '10':
        $bln = 'Oct';
        break;
    case '11':
        $bln = 'Nov';
        break;
    case '12':
        $bln = 'Dec';
        break;
}
$blntahun = $bln . " " . $tahun;
?>
<table class="table table-bordered" id="tablePengeluaran" width="100%" cellspacing="0">
  <thead>
    <tr>
      <th scope="col">No</th>
      <th scope="col">Tanggal</th>
      <th scope="col">Pembelian</th>
      <th scope="col">Jumlah</th>
      <th scope="col">Nominal</th>
    </tr>
  </thead>

  <tbody id="contents">
    <?php
$no = 1;
$total = 0;
$getData = mysqli_query($conn, "SELECT *FROM stok_masuk
                        INNER JOIN data_pupuk ON stok_masuk.ID_PK = data_pupuk.ID_PK WHERE Tanggal LIKE '%" . $blntahun . "%' ORDER BY ID_SM DESC");
foreach ($getData as $gd): ?>
    <tr>
      <td><?=$no;?></td>
      <td><?=$gd['Tanggal'];?></td>
      <td><?="Pupuk " . $gd['Jenis_Pupuk'];?></td>
      <td><?=$gd['Jumlah_Masuk'] . " Karung";?></td>
      <td><?=rp($gd['Nominal']);?></td>
    </tr>
    <?php $no++;
$total = $total + (int) $gd['Nominal'];
endforeach;?>
  <tbody>
    <tr>
      <th colspan="4" class="text-center">TOTAL</th>
      <th><?=rp($total);?></th>
    </tr>
  </tbody>
  </tbody>
</table>