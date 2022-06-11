// untuk form
var rupiah1 = document.getElementById("harga");
rupiah1.addEventListener("keyup", function(e) {
  rupiah1.value = convertRupiah(this.value);
});
rupiah1.addEventListener('keydown', function(event) {
  return isNumberKey(event);
});
/* Fungsi formatRupiah Form*/
function convertRupiah(angka, prefix) {
  var number_string = angka.replace(/[^,\d]/g, "").toString(),
    split  = number_string.split(","),
    sisa   = split[0].length % 3,
    rupiah = split[0].substr(0, sisa),
    ribuan = split[0].substr(sisa).match(/\d{3}/gi);
 
  if (ribuan) {
    separator = sisa ? "." : "";
    rupiah += separator + ribuan.join(".");
  } 
  rupiah = split[1] != undefined ? rupiah + "," + split[1] : rupiah;
  return prefix == undefined ? rupiah : rupiah ? prefix + rupiah : "";
}
