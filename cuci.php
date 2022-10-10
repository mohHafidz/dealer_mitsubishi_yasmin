<?php
require 'function.php';

$ket = "Pending Cuci";
$ket2 = "Sedang di Cuci";

$mobil = query("SELECT * FROM data_sementara WHERE ket = '$ket' || ket = '$ket2'");

if(isset($_POST['cari'])){
    $data = $_POST['search'];
    $mobil = mysqli_query($conn, "SELECT * FROM data_sementara WHERE plat like '%$data%' AND ket = '$ket2'" );
}

if(isset($_POST['cari2'])){
    $data = $_POST['search'];
    $mobil = mysqli_query($conn, "SELECT * FROM data_sementara WHERE plat like '%$data%' and ket= '$ket' " );
}   

if (isset($_POST['cuciin'])) {
    if (cuciin($_POST)) {
        echo"
            <script>
                alert('data cuci IN di input');
                document.location.href= 'cuci.php';
            </script>
        ";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <style>
        .merk{
            font-family: verdana, sans-serif;
            font-size: 25px;
            letter-spacing: -0.2pt;
            word-spacing: -1.2pt;
            color: black;
            /* margin-right: 30px; */
        }
        .conten{
            font-family: verdana, sans-serif;
            /* font-size: 12px; */
            letter-spacing: 0.2pt;
            word-spacing: -0.6pt;
        }
        .search2{
            visibility: hidden;
        }
        @media (max-width: 767.98px) { 
            .conten{
            font-family: verdana, sans-serif;
            font-size: 12px;
            letter-spacing: 0.2pt;
            word-spacing: -0.6pt;
            }
            .btn-group a{
            font-family: verdana, sans-serif;
            font-size: 12px;
            letter-spacing: 0.2pt;
            word-spacing: -0.6pt;
            }
            .btn-text{
            font-family: verdana, sans-serif;
            font-size: 14px;
            letter-spacing: 0.2pt;
            word-spacing: -0.6pt; 
            }
            .text span{
            font-family: verdana, sans-serif;
            font-size: 12px;
            letter-spacing: 0.2pt;
            word-spacing: -0.6pt; 
            }
            .title{
            font-family: verdana, sans-serif;
            font-size: 14px;
            letter-spacing: 0.2pt;
            word-spacing: -0.6pt; 
            }
            .search{
                visibility: hidden;
            }
            .search2{
                visibility:inherit;
            }
         }
    </style>

    <title>Dashboard Mitsubishi</title>
    <link rel="shortcut icon" href="img/img remove/red-black.png" type="image/x-icon">

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

<header>
    <nav class="navbar navbar-expand-lg navbar-light bg-primary" style="opacity: 0.9;">
        <div class="container-fluid">
            <img src="img2/red-blak-mits.png" alt="" width="60" height="60" class="d-inline-block align-text-top" style="opacity: 1;">
            <span class="merk">Mitsubishi Yasmin</span>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" style="margin-left: 10%;" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link text-light active" aria-current="page" href="#">On Work</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-light" href="dashboard.php">Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-light" href="antrian.php">An Queue</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-light" href="mobil_selesai.php">Finish Work</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-light" href="tambah2.php">Add Car</a>
                    </li>
                    <li class="nav-item">
                        <form class="d-flex search2" method="POST" role="search">
                            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="search" id="search">
                            <button class="btn btn-outline-success" type="submit" name="cari" id="cari">Work</button>
                            <button class="btn btn-outline-warning " name="cari2" id="cari2">Pending</button>
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>
<br>
<div class="conten">

    <div class="menu container">
        <div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups">
            <div class="btn-group me-2" role="group" aria-label="First group">
                <a href="index.php" class="btn btn-outline-primary">Work Stall
                <span class="badge badge-primary badge-pill" id="workStall"></span>
                </a>
                <a href="final.php" class="btn btn-outline-primary">Final Checker Cek
                <span class="badge badge-primary badge-pill" id="finalChecker"></span>
                </a>
                <a href="" class="btn btn-outline-primary active">Cuci
                <span class="badge badge-primary badge-pill" id="cuci"></span>
                </a>
            </div>
        </div>
    </div>

        <br><br>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <div class="col-5 float-left mt-2">
                <h6 class="m-0 font-weight-bold text-primary title">Cuci</h6>
            </div>
            <div class="col-7 float-right">
                <form class="d-flex search" method="POST" action="">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="search" id="search">
                    <button class="btn btn-outline-success" name="cari" id="cari">Work</button>
                    <button class="btn btn-outline-secondary " name="cari2" id="cari2">Pending</button>
                </form>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Data Kendaraan</th>
                            <th>Status</th>
                            <th>Cuci</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Data Kendaraan</th>
                            <th>Status</th>
                            <th>Cuci</th>
                        </tr>
                    </tfoot>
                    <?php foreach($mobil as $row): ?>
                    <tbody>
                        <tr>
                            <td class="align-middle text-center" width="300px">
                                <span style="font-weight: bold;"><?= $row['antrian'] ?>. </span>
                                <span><?= $row['plat'];?> / <?= $row['mobilmasuk']?> [<?= ($row['estimasi'] === '00:00:00') ? '' : $row['estimasi']; ?>] <?= $row['cuci'] ?> | <?= $row['jenis_service'] ?></span>
                            </td>
                            <td class="align-middle text-center text">
                                <span class="input-group-text data" style="background-color: #fc7f03; color:black;" id="basic-addon1"><?= $row['status_car'] ?></span>
                            </td>
                            <td class="btn-toolbar align-middle text-center">
                                <!-- <span class="input-group-text" style="background-color: #13eb42; " id="basic-addon1"><?= $row['cuciin'] ?></span> -->
                                <form action="" method="post" onclick="return confirm('apakah yakin ingin input cuci in <?= $row['plat'] ?>')">
                                    <input type="hidden" name="id" id="id" value="<?= $row['id'] ?>">
                                    <button class="btn data" id="cuciin" name="cuciin" style="background-color: #13eb42;"><span class="btn-text"><?= $row['cuciin'] ?></span></button>
                                </form>
                                <!-- <span class="input-group-text" style="background-color: #eb1313; color:white; " id="basic-addon1"><?= $row['cuciout'] ?></span> -->
                                <form action="cek2.php" method="post" onclick="return confirm('apakah yakin ingin input cuci out <?= $row['plat'] ?>')">
                                    <input type="hidden" name="id" id="id" value="<?= $row['id'] ?>">
                                    <button class="btn data" id="cuciout" name="cuciout" style="background-color: #eb1313; color:white;"><span class="btn-text"><?= $row['cuciout'] ?></span></button>
                                </form>
                            </td>
                        </tr>
                    </tbody>
                    <?php endforeach; ?>
                </table>
            </div>
        </div>
    </div>

</div>

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/chart-area-demo.js"></script>
    <script src="js/demo/chart-pie-demo.js"></script>

    <script>
    // Function ini dijalankan ketika Halaman ini dibuka pada browser
    $(function(){
    setInterval(ambil_data_ajax,100);//fungsi yang dijalan setiap detik, 1000 = 1 detik
    });
    
    //Fungi ajax untuk Menampilkan Jam dengan mengakses File ajax_timestamp.php
    function ambil_data_ajax() {

    $.ajax({
    url: 'ajax_workStall.php',
    success: function(data) {
    $('#workStall').html(data);
    },
    });

    $.ajax({
    url: 'ajax_finalChecker.php',
    success: function(data) {
    $('#finalChecker').html(data);
    },
    });

    $.ajax({
    url: 'ajax_cuci.php',
    success: function(data) {
    $('#cuci').html(data);
    },
    });

    }
    </script>

</body>

</html>