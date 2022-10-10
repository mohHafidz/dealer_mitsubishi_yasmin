<?php
require 'function.php';

    date_default_timezone_set('Asia/Jakarta');
    $date = new DateTime();
    $tgl= $date->format('Y-m-d');

$result = mysqli_query($conn,"SELECT * FROM data_rekap WHERE tanggal = '$tgl'");

if (isset($_POST['hapus'])) {
    if (hapus_rekap()) {
      echo" 
        <script>
          alert('data rekap telah di hapus');
          document.location.href= 'mobil_selesai.php';
        </script>
      ";
    }
  }

if (isset($_POST['cari'])) {
    $result = cari3($_POST['search']);
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

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- sidebar -->
        <ul class="navbar-nav collapse d-lg-block bg-gradient-primary sidebar sidebar-dark" id="navbarSupportedContent">

                <div class="list-group list-group-flush">
                    <!-- sidebar - brand -->
                    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
                        <div class="sidebar-brand-icon ">
                            <!-- <i class="fas fa-laugh-wink"></i> -->
                            <img src="img2/red-blak-mits.png" height="60px" alt="">
                        </div>
                        <div class="sidebar-brand-text mx-3">Mitsubishi</div>
                    </a>

                    <!-- Divider -->
                    <hr class="sidebar-divider my-0">

                    <li class="nav-item">
                        <!-- <a class="nav-link" aria-current="page" href="#">Home</a> -->
                        <a class="nav-link" href="dashboard.php">
                        <i class="fas fa-fw fa-tachometer-alt"></i>
                        <span>Dashboard</span></a>
                    </li>

                    <!-- Divider -->
                    <hr class="sidebar-divider">

                    <!-- Heading -->
                    <div class="sidebar-heading">
                        Service Advisor
                    </div>

                    <li class="nav-item">
                        <!-- <a class="nav-link" href="#">Link</a> -->
                        <a class="nav-link" href="antrian.php">
                        <i class="fas fa-fw fa-folder"></i>
                        <span>An Queue</span></a>
                    </li>

                    <li class="nav-item active">
                        <!-- <a class="nav-link" href="#">Link</a> -->
                        <a class="nav-link" href="">
                        <i class="fas fa-fw fa-table"></i>
                        <span>Finish Work</span></a>
                    </li>

                    <!-- Divider -->
                    <hr class="sidebar-divider">

                    <!-- Heading -->
                    <div class="sidebar-heading">
                        Mekanik
                    </div>

                    <li class="nav-item">
                        <!-- <a class="nav-link" href="#">Link</a> -->
                        <a class="nav-link" href="index.php">
                        <i class="fas fa-fw fa-wrench"></i>
                        <span>On Work</span></a>
                    </li>

                    <!-- Divider -->
                    <hr class="sidebar-divider d-none d-md-block">

                    <!-- Sidebar Toggler (Sidebar) -->
                    <div class="text-center d-none d-md-inline position-relative">
                        <button class="rounded-circle border-0" id="sidebarToggle"></button>
                    </div>
                </div>
        </ul>
        <!-- end sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

            <nav class="navbar navbar-expand-lg navbar-light bg-light topbar mb-4 static-top shadow">
                        
                        <button class="btn d-md-none rounded-circle mr-3" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                            <i class="fa fa-bars"></i>
                        </button>

                            <!-- Topbar Search -->
                            <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search" method="post">
                                <div class="input-group">
                                    <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..."
                                        aria-label="Search" aria-describedby="basic-addon2" name="search">
                                    <div class="input-group-append">
                                        <button class="btn btn-primary" type="submit" name="cari">
                                            <i class="fas fa-search fa-sm"></i>
                                        </button>
                                    </div>
                                </div>
                            </form>

                            <ul class="list-group list-group-horizontal">
                                <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                                <li class="nav-item dropdown no-arrow d-sm-none" style="list-style-type: none">
                                    <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="fas fa-search fa-fw"></i>
                                    </a>
                                    <!-- Dropdown - Messages -->
                                    <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                                        aria-labelledby="searchDropdown" id="dropdown">
                                        <form class="form-inline mr-auto w-100 navbar-search" method="post">
                                            <div class="input-group">
                                                <input type="text" class="form-control bg-light border-0 small"
                                                    placeholder="Search for..." aria-label="Search"
                                                    aria-describedby="basic-addon2" name="search">
                                                <div class="input-group-append">
                                                    <button class="btn btn-primary" type="submit" name="cari">
                                                        <i class="fas fa-search fa-sm"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </li>
                                <li class="nav-item no-arrow" style="list-style-type: none;">
                                    <span class="mr-2 text-gray-600 small" id="timestamp"></span>
                                </li>
                            </ul>
                </nav>

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                                <h6 class="m-0 font-weight-bold text-primary">Finish Work</h6>
                                <div class="d-sm-inline-block ">
                                    <form action="" method="post">
                                        <a href="eksport.php" class=" btn btn-sm btn-primary shadow-sm"><i
                                        class="fas fa-download fa-sm text-white-50"></i> Download Report</a>
                                        <button class="btn btn-sm btn-primary shadow-sm" onclick="return confirm('Apakah anda sudah download rekap?')" name="hapus">Hapus</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                          <th scope="col">No</th>
                                          <th scope="col">No. Polisi</th>
                                          <th scope="col">No. Antrian</th>
                                          <th scope="col">Service Advisor</th>
                                          <th scope="col">Mekanik</th>
                                          <th scope="col">Waktu selesai</th>
                                          <th scope="col">View More</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                          <th scope="col">No</th>
                                          <th scope="col">No. Polisi</th>
                                          <th scope="col">No. Antrian</th>
                                          <th scope="col">Service Advisor</th>
                                          <th scope="col">Mekanik</th>
                                          <th scope="col">Waktu selesai</th>
                                          <th scope="col">View More</th>
                                        </tr>
                                    </tfoot>
                                        <?php $no = 1 ?>
                                        <?php foreach ($result as $row): ?>
                                    <tbody>
                                        <tr>
                                          <th scope="row" class="text-center"><?= $no ?></th>
                                          <td class="text-center item"><?= $row['plat'] ?></td>
                                          <td class="text-center item"><?= $row['antrian'] ?></td>
                                          <td class="text-center item"><?= $row['namaSA'] ?></td>
                                          <td class="text-center item"><?= $row['namaPE'] ?></td>
                                          <td class="text-center item"><?= $row['waktu_selesai'] ?></td>
                                            <td>
                                                <button id="view" class="btn btn-group-sm" data-toggle="modal" data-target="#logoutModal"
                                                data-cuci = "<?= $row['cuci'] ?>"
                                                data-plat = "<?= $row['plat'] ?>"
                                                data-service = "<?= $row['namaSA'] ?>"
                                                data-mekanik = "<?= $row['namaPE'] ?>"
                                                data-stall = "<?= $row['stall'] ?>"
                                                data-estimasi = "<?= $row['estimasi'] ?>"
                                                data-pengerjaan = "<?= $row['pengerjaan'] ?>"
                                                data-stallin = "<?= $row['stallin'] ?>"
                                                data-stallout = "<?= $row['stallout'] ?>"
                                                data-fcin = "<?= $row['FCin'] ?>"
                                                data-fcout = "<?= $row['FCout'] ?>"
                                                data-cuciin = "<?= $row['cuciin'] ?>"
                                                data-cuciout = "<?= $row['cuciout'] ?>"
                                                >
                                                <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                                                <span> View More</span>
                                                </button>
                                            </td>
                                        </tr>
                                    </tbody>
                                        <?php $no++ ?>
                                        <?php endforeach; ?>
                                </table>
                            </div>
                        </div>
                    </div>


                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Mitsubishi Taman Yasmin Website 2022</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

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
                    <h5 class="modal-title" id="exampleModalLabel">View More <span id="plat"></span></h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body table-responsive">
                    <table class="table table-bordered no-margin">
                        <tbody>
                            <tr>
                                <th style="width:35%; height:10%">plat</th>
                                <td><span id="plat2"></span></td>
                            </tr>
                            <tr>
                                <th style="width:35%; height:10%">Cuci</th>
                                <td><span id="cuci"></span></td>
                            </tr>
                            <tr>
                                <th style="width:35%; height:10%">Service Advisor</th>
                                <td><span id="namaSA"></span></td>
                            </tr>
                            <tr>
                                <th style="width:35%; height:10%">Mekanik</th>
                                <td><span id="namaPE"></span></td>
                            </tr>
                            <tr>
                                <th style="width:35%; height:10%">Stall</th>
                                <td><span id="stall"></span></td>
                            </tr>
                            <tr>
                                <th style="width:35%; height:10%">Estimasi</th>
                                <td><span id="estimasi"></span></td>
                            </tr>
                            <tr>
                                <th style="width:35%; height:10%">Pengerjaan</th>
                                <td><span id="pengerjaan"></span></td>
                            </tr>
                            <tr>
                                <th style="width:35%; height:10%">Stall in</th>
                                <td><span id="stallin"></span></td>
                            </tr>
                            <tr>
                                <th style="width:35%; height:10%">Stall out</th>
                                <td><span id="stallout"></span></td>
                            </tr>
                            <tr>
                                <th style="width:35%; height:10%">Final Checker in</th>
                                <td><span id="fcin"></span></td>
                            </tr>
                            <tr>
                                <th style="width:35%; height:10%">Final Checker out</th>
                                <td><span id="fcout"></span></td>
                            </tr>
                            <tr>
                                <th style="width:35%; height:10%">Cuci in</th>
                                <td><span id="cuciin"></span></td>
                            </tr>
                            <tr>
                                <th style="width:35%; height:10%">Cuci out</th>
                                <td><span id="cuciout"></span></td>
                            </tr>
                        </tbody>
                    </table>
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
    url: 'ajax_timestamp.php',
    success: function(data) {
    $('#timestamp').html(data);
    },
    });

    }
    
    $(document).ready(function(){
        $(document).on('click','#view', function(){
            var jenis_service = $(this).data('jenis_Service');
            var cuci = $(this).data('cuci');
            var plat = $(this).data('plat');
            var namaSA = $(this).data('service');
            var namaPE = $(this).data('mekanik');
            var stall = $(this).data('stall');
            var estimasi = $(this).data('estimasi');
            var pengerjaan = $(this).data('pengerjaan');
            var stallin = $(this).data('stallin');
            var stallout = $(this).data('stallout');
            var fcin = $(this).data('fcin');
            var fcout = $(this).data('fcout')
            var cuciin = $(this).data('cuciin');
            var cuciout = $(this).data('cuciout');
            $('#jenis_Service').text(jenis_service);
            $('#cuci').text(cuci);
            $('#plat').text(plat);
            $('#namaSA').text(namaSA);
            $('#plat2').text(plat);
            $('#namaPE').text(namaPE);
            $('#stall').text(stall);
            $('#estimasi').text(estimasi);
            $('#pengerjaan').text(pengerjaan);
            $('#stallin').text(stallin);
            $('#stallout').text(stallout);
            $('#fcin').text(fcin);
            $('#fcout').text(fcout);
            $('#cuciin').text(cuciin);
            $('#cuciout').text(cuciout);
        })
    })
    </script>

</body>

</html>