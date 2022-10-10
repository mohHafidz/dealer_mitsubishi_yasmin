<?php
require 'function.php';
$ket = "Pending Cuci";
$ket2 = "Sedang di Cuci";
$cuci = mysqli_query($conn,"SELECT * FROM data_sementara WHERE ket = '$ket' || ket = '$ket2'");
$jumlah_antri = mysqli_num_rows($cuci);
echo $jumlah_antri;

?>