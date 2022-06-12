<?php
function rp($angka)
{

    $hasil_rupiah = "Rp. " . number_format($angka, 0, ',', '.');
    return $hasil_rupiah;

}
function rpnull($angka1)
{

    $hasil_rupiah1 = number_format($angka1, 0, ',', '.');
    return $hasil_rupiah1;

}