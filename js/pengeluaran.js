// ambil elemne 
var bulan = document.getElementById('bulan');
var tbPeng = document.getElementById('TB_peng');

bulan.addEventListener('change', function () {
    var isiBulan = document.getElementById('bulan').value;
var tahun = isiBulan.substring(0, 4);
var bln = isiBulan.substring(5, 7);
// alert(bulan);
switch (bln) {
    case '01':
        bln = 'Jan';
        break;
    case '02':
        bln = 'Feb';
        break;
    case '03':
        bln = 'Mar';
        break;
    case '04':
        bln = 'Apr';
        break;
    case '05':
        bln = 'May';
        break;
    case '06':
        bln = 'Jun';
        break;
    case '07':
        bln = 'Jul';
        break;
    case '08':
        bln = 'Aug';
        break;
    case '09':
        bln = 'Sep';
        break;
    case '10':
        bln = 'Oct';
        break;
    case '11':
        bln = 'Nov';
        break;
    case '12':
        bln = 'Dec';
        break;
}
    //buat ajax
    var xhr = new XMLHttpRequest();
// cek kesiapan ajax
    xhr.onreadystatechange = function () {
        if (xhr.readyState == 4 && xhr.status == 200) {
            tbPeng.innerHTML = xhr.responseText;
    }
    }
    //eksekusi ajax
    xhr.open('GET', 'ajax/datapengeluaran.php?bulan=' + bln+' '+tahun, true);
    xhr.send();
});




