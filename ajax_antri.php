<?php
// date_default_timezone_set('Asia/Jakarta');//Menyesuaikan waktu dengan tempat kita tinggal
// echo $timestamp = date('l d-m-y, H:i:s');//Menampilkan Jam Sekarang
require 'function.php';
$mobil_antri = mysqli_query($conn,'SELECT * FROM antri');
$jumlah_antri = mysqli_num_rows($mobil_antri);
echo $jumlah_antri;

?>