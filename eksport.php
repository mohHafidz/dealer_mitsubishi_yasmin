<?php
require 'function.php';

$result = query("SELECT * FROM data_rekap");

// if (hapus_rekap()) {
//   echo" 
//     <script>
//       alert('data rekap telah di hapus');
//       document.location.href= 'rekap.php';
//     </script>
//   ";
// }

date_default_timezone_set('Asia/Jakarta');
$date = new DateTime();
$tgl= $date->format('d-M-Y');

$name = "rekap mobil service ". $tgl ;
$filename = $name.".xls";
ob_end_clean();
header( "Content-type: application/vnd.ms-excel" );
header('Content-Disposition: attachment;filename='.$filename .' ');
header("Pragma: no-cache");
header("Expires: 0");
ob_end_clean();
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Rekap data</title>
  </head>
  <body>

  <br><br><br><br><br>

  <table class="table">
    <thead>
        <tr>
            <th class="text-center" scope="col">No</th>
            <th class="text-center" scope="col">Tanggal</th>
            <th class="text-center" scope="col">Kerusakan</th>
            <th class="text-center" scope="col">Keterangan</th>
            <th class="text-center" scope="col">No. Polisi</th>
            <th class="text-center" scope="col">Nama Pekerja</th>
            <th class="text-center" scope="col">Nama sales advisor</th>
            <th class="text-center" scope="col">Stall</th>
            <th class="text-center" scope="col">Estimasi</th>
            <th class="text-center" scope="col">pengerjaan</th>
            <th class="text-center" scope="col">Waktu Selesai</th>
            <th class="text-center" scope="col">Stall IN</th>
            <th class="text-center" scope="col">Stall OUT</th>
            <th class="text-center" scope="col">Final checker IN</th>
            <th class="text-center" scope="col">Final checker OUT</th>
            <th class="text-center" scope="col">Cuci IN</th>
            <th class="text-center" scope="col">Cuci OUT</th>
        </tr>
    </thead>

    <?php $no=1 ?>
    <?php foreach($result as $row): ?>
    <tbody>
        <tr>
            <th class="text-center" scope="row"><?= $no ?></th>
            <td class="text-center"><?= date('d-m-Y', strtotime($row["tanggal"])); ?></td>
            <td class="text-center"><?= $row['note'] ?></td>
            <td class="text-center"><?= $row['cuci'] ?></td>
            <td class="text-center"><?= $row['plat'] ?></td>
            <td class="text-center"><?= $row['namaPE'] ?></td>
            <td class="text-center"><?= $row['namaSA'] ?></td>
            <td class="text-center"><?= $row['stall'] ?></td>
            <td class="text-center"><?= $row['estimasi'] ?></td>
            <td class="text-center"><?= $row['pengerjaan'] ?></td>
            <td class="text-center"><?= $row['waktu_selesai'] ?></td>
            <td class="text-center"><?= $row['stallin'] ?></td>
            <td class="text-center"><?= $row['stallout'] ?></td>
            <td class="text-center"><?= $row['FCin'] ?></td>
            <td class="text-center"><?= $row['FCout'] ?></td>
            <td class="text-center"><?= $row['cuciin'] ?></td>
            <td class="text-center"><?= $row['cuciout'] ?></td>
        </tr>
    </tbody>
    <?php $no++ ?>
    <?php endforeach; ?>
  </table>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
  </body>
</html>