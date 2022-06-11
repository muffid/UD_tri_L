<?php
include "connection.php";
//echo($_POST['pembayaran']);

session_start();
date_default_timezone_set('Asia/Jakarta');

 $tanggal= date("D, j M Y ");

 

    function idAcak($length = 4) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }