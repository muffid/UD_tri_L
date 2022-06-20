<?php
include "../connection.php";
include '../functions.php';
if (isset($_POST['key'])) {
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
<?php } else {?>

<!-- Tabel Biaya Lain -->
<?php
$isiBln = $_POST['keyBl'];
    $noBl = 1;
    $totalBl = 0;
//2022-02
    // algoritma ngganti bulan disini
    $tahunBl = substr($isiBln, 0, 4);
    $blnBl = substr($isiBln, 5, 7);
    switch ($blnBl) {
        case '01':
            $blnBl = 'Jan';
            break;
        case '02':
            $blnBl = 'Feb';
            break;
        case '03':
            $blnBl = 'Mar';
            break;
        case '04':
            $blnBl = 'Apr';
            break;
        case '05':
            $blnBl = 'May';
            break;
        case '06':
            $blnBl = 'Jun';
            break;
        case '07':
            $blnBl = 'Jul';
            break;
        case '08':
            $blnBl = 'Aug';
            break;
        case '09':
            $blnBl = 'Sep';
            break;
        case '10':
            $blnBl = 'Oct';
            break;
        case '11':
            $blnBl = 'Nov';
            break;
        case '12':
            $blnBl = 'Dec';
            break;
    }
    $blntahunBl = $blnBl . " " . $tahunBl;
    ?>
<table class="table table-bordered" id="tableBiayalain" width="100%" cellspacing="0">
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

    $sqlbl = mysqli_query($conn, "SELECT * FROM biaya_lain
                  INNER JOIN stok_masuk ON biaya_lain.ID_SM = stok_masuk.ID_SM
                  INNER JOIN data_pupuk ON stok_masuk.ID_PK = data_pupuk.ID_PK WHERE Tanggal LIKE '%" . $blntahunBl . "%' ORDER BY ID_BL DESC");
    foreach ($sqlbl as $keybl): ?>
    <tr>
      <td><?=$noBl;?></td>
      <td><?=$keybl['Tanggal'];?></td>
      <td><?="Transport Pembelian Pupuk " . $keybl['Jenis_Pupuk'];?></td>
      <td><?=rp($keybl['Total']);?></td>
    </tr>
    <?php $noBl++;
    $totalBl = $totalBl + (int) $keybl['Total'];
    endforeach;?>
  <tbody>
    <tr>
      <th colspan="3" class="text-center">TOTAL</th>
      <th><?=rp($totalBl);?></th>
    </tr>
  </tbody>
  </tbody>
</table>
<?php }?>