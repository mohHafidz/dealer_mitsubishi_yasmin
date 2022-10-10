<?php
// date_default_timezone_set('Asia/Jakarta');//Menyesuaikan waktu dengan tempat kita tinggal
// echo $timestamp = date('l d-m-y, H:i:s');//Menampilkan Jam Sekarang
require 'function.php';

$mobil_dikerja = mysqli_query($conn,'SELECT * FROM data_sementara');
$jumlah_dikerja = mysqli_num_rows($mobil_dikerja);
echo $jumlah_dikerja;

?>