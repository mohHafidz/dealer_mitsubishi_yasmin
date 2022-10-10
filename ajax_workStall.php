<?php
require 'function.php';
$ket = "Pending Masuk Stall";
$ket2 = "Pengerjaan Mekanik";
$workStall = mysqli_query($conn,"SELECT * FROM data_sementara WHERE ket = '$ket' || ket = '$ket2'");
$jumlah_antri = mysqli_num_rows($workStall);
echo $jumlah_antri;

?>