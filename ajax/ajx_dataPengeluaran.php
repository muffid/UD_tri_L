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
$TotalBlByDate=0;
$sqlGetAll=mysqli_query($conn,"SELECT * FROM biaya_lain WHERE Tanggal LIKE '%".$blntahunBl."%'");
foreach($sqlGetAll as $sga){
  if($sga['ID_SM']==0){
    //jika dari penjualan
    $sqlGetPj=mysqli_query($conn,"SELECT ID_KT, ID_AKT,ID_KEY,Tanggal FROM penjualan WHERE ID_PJ=".$sga['ID_PJ']);
    foreach($sqlGetPj as $sgp){
     
      if($sgp['ID_AKT']=='0'){
         //jika kelompok
         $sqlGetNamaKel=mysqli_query($conn,"SELECT Nama_Kel FROM data_kel_tani WHERE ID_KT=".$sgp['ID_KT']);
         foreach($sqlGetNamaKel as $sgnk){
          echo ('<tr><td>'.$noBl.'</td>');
          echo ('<td>'.$sgp["Tanggal"].'</td>');
          echo('<td> Transport Penjualan Ke '.$sgnk['Nama_Kel'].'</td>');
          echo('<td>'.$sga['Total'].'</td></tr>');

          $TotalBlByDate+=(int)$sga['Total'];
         }
      }else{
        //jika anggota
        echo ('<tr><td>'.$noBl.'</td>');
        echo ('<td>'.$sgp["Tanggal"].'</td>');
        echo('<td> Transport Penjualan Ke '.$sgp['ID_AKT'].'</td>');
        echo('<td>'.$sga['Total'].'</td></tr>');

        $TotalBlByDate+=(int)$sga['Total'];

      }
    }
  }else{
    //jika pemasukan stok
    $sqlGetPema=mysqli_query($conn,"SELECT Tanggal,ID_PK,Nominal FROM stok_masuk WHERE ID_SM=".$sga['ID_SM']);
    foreach($sqlGetPema as $sgpm){
      $sqlNamaPupuk=mysqli_query($conn,"SELECT Jenis_Pupuk FROM data_pupuk WHERE ID_PK=".$sgpm['ID_PK']);
      foreach($sqlNamaPupuk as $snpk){
        echo('<tr><td>'.$noBl.'</td>');
        echo('<td>'.$sgpm['Tanggal'].'</td>');
        echo('<td> Transport pembelian Pupuk '.$snpk['Jenis_Pupuk'].'</td>');
        echo('<td>'.$sga['Total'].'</td></tr>');

        $TotalBlByDate+=(int)$sga['Total'];
      }
    }

  }
  $noBl++;
}
?>
  <tbody>
    <tr>
      <th colspan="3" class="text-center">TOTAL</th>
      <th><?=rp($TotalBlByDate);?></th>
    </tr>
  </tbody>
  </tbody>
</table>
<?php }?>