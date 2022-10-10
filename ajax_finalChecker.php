<?php
require 'function.php';
$ket = "Pending Final Checker";
$ket2 = "Pengecekan Final Checker";
$final_checker = mysqli_query($conn,"SELECT * FROM data_sementara WHERE ket = '$ket' || ket = '$ket2'");
$jumlah_antri = mysqli_num_rows($final_checker);
echo $jumlah_antri;

?>