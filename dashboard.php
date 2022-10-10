<?php
require 'function.php';

$mobil = query('SELECT * FROM data_sementara');

if (isset($_POST['cari'])) {
    $mobil = cari($_POST['search']);
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

                    <li class="nav-item active">
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

                    <li class="nav-item">
                        <!-- <a class="nav-link" href="#">Link</a> -->
                        <a class="nav-link" href="mobil_selesai.php">
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

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Mitsubishi</h1>
                    </div>

                    <!-- Content Row -->
                    <div class="row">

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4 mx-auto">
                            <a href="index.php" class="btn card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1 text-start">
                                                On Work</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800 text-start" id="work"></div>
                                        </div>
                                        <div class="col-auto">
                                            <img src="img2/mechanic.png" height="45" alt="">
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4 mx-auto">
                            <a href="mobil_selesai.php" class="btn card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1 text-start">
                                                Finish Work</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800 text-start" id="selesai"></div>
                                        </div>
                                        <div class="col-auto">
                                            <img src="img2/work-done.png" height="45" alt="">
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>

                        <!-- Pending Requests Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4 mx-auto">
                            <a href="antrian.php" class="btn card border-left-warning shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1 text-start">
                                                An Queue</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800 text-start" id="antri"></div>
                                        </div>
                                        <div class="col-auto">
                                            <img src="img2/queue.png" height="45" alt="">
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <!-- <h6 class="h3 mb-0 font-weight-bold text-primary">Dasboard</h6> -->
                            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                                <h1 class="h3 mb-0 font-weight-bold text-primary">Dashboard</h1>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>No antrian</th>
                                            <th>No. Polisi</th>
                                            <th>Status</th>
                                            <th>View More</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>No</th>
                                            <th>No antrian</th>
                                            <th>No. Polisi</th>
                                            <th>Status</th>
                                            <th>View More</th>
                                        </tr>
                                    </tfoot>
                                        <?php $no = 1 ?>
                                        <?php foreach ($mobil as $row): ?>
                                    <tbody>
                                        <tr>
                                            <td><?= $no ?></td>
                                            <td><?= $row['antrian'] ?></td>
                                            <td><?= $row['plat'] ?></td>
                                            <td><?= $row['ket'] ?></td>
                                            <?= $row['namaSA'] ?>
                                            <td>
                                                <button id="view" class="btn btn-group-sm" data-toggle="modal" data-target="#logoutModal"
                                                data-plat = "<?= $row['plat'] ?>"
                                                data-js = "<?= $row['jenis_service'] ?>"
                                                data-cuci = "<?= $row['cuci'] ?>"
                                                data-sales = "<?= $row['namaSA'] ?>"
                                                data-mekanik = "<?= $row['namaPE'] ?>"
                                                data-stall = "<?= $row['stall'] ?>"
                                                data-estimasi = "<?= $row['estimasi'] ?>"
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
                                <th style="width:35%; height:10%">Jenis Service</th>
                                <td><span id="jenis_Service"></span></td>
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
    url: 'ajax_work.php',
    success: function(data) {
    $('#work').html(data);
    },
    });

    $.ajax({
    url: 'ajax_selesai.php',
    success: function(data) {
    $('#selesai').html(data);
    },
    });

    $.ajax({
    url: 'ajax_antri.php',
    success: function(data) {
    $('#antri').html(data);
    },
    });

    $.ajax({
    url: 'ajax_timestamp.php',
    success: function(data) {
    $('#timestamp').html(data);
    },
    });

    }
    
    $(document).ready(function(){
        $(document).on('click','#view', function(){
            var jenis_service = $(this).data('js');
            var cuci = $(this).data('cuci');
            var plat = $(this).data('plat');
            var namaSA = $(this).data('sales');
            var namaPE = $(this).data('mekanik');
            var stall = $(this).data('stall');
            var estimasi = $(this).data('estimasi');
            var stallin = $(this).data('stallin');
            var stallout = $(this).data('stallout');
            var fcin = $(this).data('fcin');
            var fcout = $(this).data('fcout')
            var cuciin = $(this).data('cuciin');
            var cuciout = $(this).data('cuciout');
            $('#jenis_Service').text(jenis_service);
            $('#cuci').text(cuci);
            $('#plat').text(plat);
            $('#plat2').text(plat);
            $('#namaSA').text(namaSA);
            $('#namaPE').text(namaPE);
            $('#stall').text(stall);
            $('#estimasi').text(estimasi);
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