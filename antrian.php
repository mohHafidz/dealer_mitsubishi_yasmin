<?php
require 'function.php';

$mobil = query('SELECT * FROM antri');

if (isset($_POST['cari'])) {
    $mobil = cari2($_POST['search']);
}

if (isset($_POST['go'])) {
  if (editSA($_POST)) {
    header('location: antrian.php');
  }else{
    mysqli_error($conn);
  }
}

if(isset($_POST['delete'])){
    if(hapus2($_POST)){
        echo "
            <script>
                alert('data berhasil di hapus');
                document.location.href='antrian.php';
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

    <title>Antrian Mitsubishi</title>
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

                    <li class="nav-item active">
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

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">An Queue</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>No antrian</th>
                                            <th>No. Polisi</th>
                                            <th>Kendaraan Datang</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>No</th>
                                            <th>No antrian</th>
                                            <th>No. Polisi</th>
                                            <th>Kendaraan Datang</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                        <?php $no = 1 ?>
                                        <?php foreach ($mobil as $row): ?>
                                    <tbody>
                                        <tr>
                                            <td><?= $no ?></td>
                                            <td><?= $row['antrian'] ?></td>
                                            <td><?= $row['plat'] ?></td>
                                            <td><?= $row['mobilmasuk'] ?></td>
                                            <td>
                                                <button id="view" class="btn btn-group-sm" data-toggle="modal" data-target="#logoutModal" data-plat="<?= $row['plat'] ?>" data-id="<?= $row['id'] ?>">
                                                <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                                                <span>Add</span>
                                                </button>

                                                <button id="view1" class="btn btn-group-sm" data-toggle="modal" data-target="#Delete" data-plat="<?= $row['plat'] ?>" data-id="<?= $row['id'] ?>">
                                                <img src="img2/x-button.png" width="20" height="20" alt="">
                                                Delete
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

    <!-- Tambah -->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"><span id="plat"></span></h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body table-responsive">
                    <table class="table table-bordered no-margin">
                      <form action="" method="post">
                        <tbody>
                          <!-- <span id="id" name="id"></span> -->
                          <input type="hidden" id="id" name="id">
                            <tr>
                              <th>Nama Sales Advisor</th>
                              <td>
                                <select name="namaSA" id="namaSA" class="form-control" required>
                                  <option><small class="form-text text-muted">Please insert nama sevice advisor</small></option>
                                  <option value="Embib Muhammad Ishak">Embib Muhammad Ishak</option>
                                  <option value="Sarah">Sarah</option>
                                  <option value="Ridwan Firdaus Setiawan">Ridwan Firdaus Setiawan</option>
                                </select>
                              </td>
                            </tr>
                            <tr>
                              <th>Cuci</th>
                              <td>
                                <select name="cuci" id="cuci" class="form-control" required>
                                  <option><small class="form-text text-muted">Please insert keterangan</small></option>
                                  <option value="C">C</option>
                                  <option value="TC">TC</option>
                                </select>
                              </td>
                            </tr>
                            <tr>
                              <th>Jenis Service</th>
                              <td>
                                <select name="jenis" id="jenis" class="form-control" required>
                                  <option><small class="form-text text-muted">Please insert jenis service</small></option>
                                  <option value="CML">Keluhan</option>
                                  <option value="SVC">Service Berkala</option>
                                </select>
                              </td>
                            </tr>
                            <tr>
                              <th>Note Kerusakan</th>
                              <td rowspan='2'>
                                <!-- <input type="text" class="form-control" id="note" name="note" height="200px"> -->
                                <textarea class="form-control" aria-label="With textarea" id="note" name="note"></textarea>
                              </td>
                            </tr>
                            <tr></tr>
                            <tr>
                              <th>Estimasi</th>
                              <td>
                                <input type="time" class="form-control" id="estimasi" name="estimasi" required>
                              </td>
                            </tr>
                            <tr>
                              </tr>
                              <button type="submit" id="go" name="go" class="btn btn-outline-primary">Submit</button>
                          </tbody>
                      </form>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Delete -->
    <div class="modal fade" id="Delete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Sure wanna Delete?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Delete" below if you are ready to Delete <span id="plat1"></span>.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <form action="" method="post">
                        <input type="hidden" name="id" id="id1">
                        <button class="btn btn-primary" name="delete" id="delete">Delete</button>
                    </form>
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
      $(function(){
    setInterval(ambil_data_ajax,100);//fungsi yang dijalan setiap detik, 1000 = 1 detik
    });

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
            var plat = $(this).data('plat');
            var id = $(this).data('id');
            $('#plat').text(plat);
            // $('#id').text(id);
            document.getElementById('id').value = id;
        })
    })
    $(document).ready(function(){
        $(document).on('click','#view1', function(){
            var id = $(this).data('id');
            var plat = $(this).data('plat');
            $('#plat1').text(plat);
            // $('#id').text(id);
            document.getElementById('id1').value = id;
        })
    })
    </script>

</body>

</html>