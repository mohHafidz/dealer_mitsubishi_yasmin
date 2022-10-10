<?php
require 'function.php';

$ket = "Pending Masuk Stall";
$ket2 = "Pengerjaan Mekanik";

$mobil = query("SELECT * FROM data_sementara WHERE ket = '$ket' || ket = '$ket2'");

if(isset($_POST['cari'])){
    $data = $_POST['search'];
    $mobil = mysqli_query($conn, "SELECT * FROM data_sementara WHERE plat like '%$data%' and ket= '$ket2' " );
}

if(isset($_POST['cari2'])){
    $data = $_POST['search'];
    $mobil = mysqli_query($conn, "SELECT * FROM data_sementara WHERE plat like '%$data%' and ket= '$ket' " );
}

if (isset($_POST['submit'])) {
    if (editPE($_POST)) {
      header('location: index.php');
    }else{
      mysqli_error($conn);
    }
  }

  if (isset($_POST['stallin'])) {
    if(cek_daftarMekanik($_POST['id'])){
      if (StallIn($_POST)) {
          echo"
              <script>
                  alert('Data stall IN di input');
                  document.location.href= 'index.php';
              </script>
          ";
      }
    }else {
      echo"
              <script>
                  alert('Data mekanik belum di input');
                  document.location.href= 'index.php';
              </script>
          ";
    }
  }

  if (isset($_POST['stallout'])) {
    if (Stallout($_POST)) {
        echo"
            <script>
                alert('data stall OUT di input');
                document.location.href= 'index.php';
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
            font-size: 12px;
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
                    <li>
                    <form class="d-flex search2" method="POST" action="">
                        <input class="form-control me-2 " type="search" placeholder="Search" aria-label="Search" name="search" id="search">
                        <button class="btn btn-outline-success " name="cari" id="cari">Work</button>
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
                <a href="" class="btn btn-outline-primary active">Work Stall
                <span class="badge badge-primary badge-pill" id="workStall"></span>
                </a>
                <a href="final.php" class="btn btn-outline-primary">Final Checker Cek
                <span class="badge badge-primary badge-pill" id="finalChecker"></span>
                </a>
                <a href="cuci.php" class="btn btn-outline-primary">Cuci
                <span class="badge badge-primary badge-pill" id="cuci"></span>
                </a>
            </div>
        </div>
    </div>

        <br><br>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <div class="col-4 float-left mt-2">
                <h6 class="m-0 font-weight-bold text-primary title">Work Stall</h6>
            </div>
            <div class="col-7 float-right">
                <form class="d-flex search" method="POST" action="">
                    <input class="form-control me-2 " type="search" placeholder="Search" aria-label="Search" name="search" id="search">
                    <button class="btn btn-outline-success " name="cari" id="cari">Work</button>
                    <button class="btn btn-outline-secondary " name="cari2" id="cari2">Pending</button>
                </form>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable">
                    <thead>
                        <tr>
                            <th>Data Kendaraan</th>
                            <th>Status</th>
                            <th>Service Advisor</th>
                            <th>Mekanik</th>
                            <th>Stall</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Data Kendaraan</th>
                            <th>Status</th>
                            <th>Service Advisor</th>
                            <th>Mekanik</th>
                            <th>Stall</th>
                        </tr>
                    </tfoot>
                    <?php foreach($mobil as $row): ?>
                    <tbody>
                        <tr>
                            <td class="align-middle text-center data" width="300px">
                                <button id="view1" class="btn btn-group-sm" data-toggle="modal" data-target="#note" data-note="<?= $row['note'] ?>">
                                    <span style="font-weight: bolder;"><?= $row['antrian'] ?>. </span>
                                    <span><?= $row['plat'];?> / <?= $row['mobilmasuk']?> [<?= ($row['estimasi'] === '00:00:00') ? '' : $row['estimasi']; ?>] <?= $row['cuci'] ?> | <?= $row['jenis_service'] ?></span>
                                </button>
                            </td>
                            <td class="align-middle text-center text">
                                <span class="input-group-text text-center " style="background-color: #fc7f03; color:black;" id="basic-addon1"><?= $row['status_car'] ?></span>
                            </td>
                            <td class="align-middle text-center text">
                                <form action="edit.php" method="post">
                                    <input type="hidden" name="id" id="id" value="<?= $row['id'] ?>">
                                    <button class="btn" style="background-color: #fc7f03; color:black;"><span class="btn-text"><?= $row['namaSA'] ?></span></button>
                                </form>
                            </td>
                            <td class="align-middle text-center">
                                    <button id="view" class="btn btn-warning btn-lg" data-toggle="modal" data-target="#logoutModal" name="view"
                                    data-id="<?= $row['id'] ?>"
                                    ><span class="btn-text"><?= ($row['namaPE'] == '') ? 'Nama Mekanik' : $row['namaPE']; ?></span></button>
                            </td>
                            <td class="btn-toolbar align-middle">
                                <form action="" method="post" onclick="return confirm('apakah yakin ingin input stall in <?= $row['plat'] ?>')">
                                    <input type="hidden" name="id" id="id" value="<?= $row['id'] ?>">
                                    <button class="btn" id="stallin" name="stallin" style="background-color: #13eb42;"><span class="btn-text"> <?= $row['stallin'] ?></span></button>
                                </form>
                                <!-- <span class="input-group-text" style="background-color: #eb1313; color:white; " id="basic-addon1"><?= $row['stallout'] ?></span> -->
                                <form action="" method="post" onclick="return confirm('apakah yakin ingin input stall out <?= $row['plat'] ?>')">
                                    <input type="hidden" name="id" id="id" value="<?= $row['id'] ?>">
                                    <button class="btn" id="stallout" name="stallout" style="background-color: #eb1313; color:white;"><span class="btn-text"><?= $row['stallout'] ?></span></button>
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

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Input Mekanik<span id="plat"></span></h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body table-responsive">
                    <table class="table table-bordered no-margin">
                        <tbody>
                            <form action="" method="post">
                                <input type="hidden" id="id1" name="id">
                                <tr>
                                    <th style="width:35%; height:10%">Nama Mekanik</th>
                                    <td>
                                        <select name="namaPE" id="namaPE" class="form-control" required>
                                            <option><small class="form-text text-muted">Please insert nama mekanik</small></option>
                                            <option value="Agus Azahra Alpian">Agus Azahra Alpian</option>
                                            <option value="Alga Pranata Putra">Alga Pranata Putra</option>
                                            <option value="Andri Nurahman">Andri Nurahman</option>
                                            <option value="Ariswanto">Ariswanto</option>
                                            <option value="Asep Sehudin">Asep Sehudin</option>
                                            <option value="Heru prayitno">Heru prayitno</option>
                                            <option value="Ikbal Maulana">Ikbal Maulana</option>
                                            <option value="Mohamad Farham">Mohamad Farham</option>
                                            <option value="Muhammad Abdul Ajiz Fatkhurisko">Muhammad Abdul Ajiz Fatkhurisko</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <th style="width:35%; height:10%">Stall</th>
                                    <td>
                                        <select name="stall" id="stall" class="form-control">
                                            <option><small class="form-text text-muted">Please insert stall</small></option>
                                            <option value="non stall">non stall</option>
                                            <option value="stall 1">stall 1</option>
                                            <option value="stall 2">stall 2</option>
                                            <option value="stall 3">stall 3</option>
                                            <option value="stall 4">stall 4</option>
                                            <option value="stall 5">stall 5</option>
                                            <option value="stall 6">stall 6</option>
                                            <option value="stall 7">stall 7</option>
                                            <option value="stall 8">stall 8</option>
                                            <option value="stall 9">stall 9</option>
                                            <option value="stall 10">stall 10</option>
                                        </select>
                                    </td>
                                </tr>
                                    <button class="btn btn-outline-primary" name="submit" id="submit">submit</button>
                            </form>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- note -->
    <div class="modal fade" id="note" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Note Kerusakan</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <table class="table table-bordered no-margin">
                        <tbody>
                            <tr>
                                <td><textarea class="form-control" aria-label="With textarea" disabled id="noteKerusakan" name="note"></textarea></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">ok</button>
                </div>
            </div>
        </div>
    </div>

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

    $(document).ready(function(){
        $(document).on('click','#view', function(){
            var id = $(this).data('id');
            document.getElementById('id1').value = id;
        })
    })

    $(document).ready(function(){
        $(document).on('click','#view1', function(){
            var note = $(this).data('note');
            $('#noteKerusakan').text(note);
        })
    })
    </script>

</body>

</html>