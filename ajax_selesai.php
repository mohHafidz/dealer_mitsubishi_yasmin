<?php
require 'function.php';
date_default_timezone_set('Asia/Jakarta');
    $date = new DateTime();
    $tgl= $date->format('Y-m-d');

$mobil_selesai = mysqli_query($conn,"SELECT * FROM data_rekap WHERE tanggal = '$tgl'");
$jumlah_selesai = mysqli_num_rows($mobil_selesai);
echo $jumlah_selesai;
?>