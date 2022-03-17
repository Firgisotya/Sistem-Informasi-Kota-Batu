<?php
session_start();
include "../config/koneksi.php";
error_reporting(0);
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SISBAT | Manajemen Hotel</title>

    <!-- Custom fonts for this template-->
    <link href="../asset/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="../asset/css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">
        <?php
            include "sidebar.php";               
        ?>


        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <?php
                    include "topbar.php";
                ?>

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Manajemen Hotel</h1>
                    </div>

                    <!-- Content Row -->
                    <div class="row">


                    </div>

                    <!-- Content Row -->

                    <div class="row">

                        <!-- Area Chart -->
                        <div class="col">
                            <div class="card shadow mb-10">
                                <!-- Card Header - Dropdown -->
                                <div
                                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Manajemen Hotel</h6>
                                    <div class="dropdown no-arrow">
                                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                                            aria-labelledby="dropdownMenuLink">
                                            <div class="dropdown-header">Aksi:</div>
                                            <a class="dropdown-item" href="tambah-hotel.php">Tambah Hotel</a>
                                        </div>
                                    </div>
                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-striped">
                                            <thead>
                                                <tr>
                                                    <th rowspan="2">No</th>
                                                    <th rowspan="2">Kode Hotel</th>
                                                    <th rowspan="2">Nama Hotel</th>
                                                    <th rowspan="2">Alamat</th>
                                                    <th rowspan="2">Sisa Kamar</th>
                                                    <th rowspan="2">Harga</th>
                                                    <th rowspan="2">Gambar</th>
                                                    <th rowspan="2">Latitude</th>
                                                    <th rowspan="2">Longtitude</th>
                                                    <th rowspan="2">Aksi</th>
                                                </tr>
                                            </thead>
                                            <?php
                                            $no = 1;
                                            $query = mysqli_query($conn, "SELECT * FROM hotel");
                                            if (mysqli_num_rows($query)) {
                                            while ($data = mysqli_fetch_array($query)) { ?>
                                            <tbody>
                                                <tr>
                                                    <td><?= $no++; ?></td>
                                                    <td><?=  $data['kd_wisata']; ?></td>
                                                    <td><?= $data['nm_hotel']; ?></td>
                                                    <td><?= $data['alamat']; ?></td>
                                                    <td><?= $data['sisa_kamar']; ?></td>
                                                    <td><?= $data['harga'];  ?></td>
                                                    <td><img src="../images/hotel/<?php echo $data['gambar']; ?>"
                                                            width="60px" height="80px"
                                                            alt="<?php echo $data['gambar'] ?>"></td>
                                                    <td><?= $data['latitude'];  ?></td>
                                                    <td><?= $data['longtitude'];  ?></td>
                                                    <td>
                                                        <a href="edit-hotel.php?kd_hotel=<?php echo $data['kd_hotel']; ?>"
                                                            class="btn btn-success">Edit
                                                        </a>
                                                        <a href="hapus-hotel.php?kd=<?php echo $data['kd_hotel']; ?>"
                                                            class="btn btn-danger">Hapus</a>
                                                    </td>
                                                </tr>
                                            </tbody>
                                            <?php            }
                                                } else { ?>
                                            <tr>
                                                <td colspan="10" align="center">Tidak Ada Data</td>
                                            </tr>
                                            <?php    }
                                                    ?>
                                        </table>

                                    </div>
                                </div>
                            </div>
                        </div>





                    </div>
                </div>

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- End of Main Content -->


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
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="../logout.php">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="../asset/vendor/jquery/jquery.min.js"></script>
    <script src="../asset/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="../asset/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="../asset/js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="../asset/vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="../asset/js/demo/chart-area-demo.js"></script>
    <script src="../asset/js/demo/chart-pie-demo.js"></script>

</body>

</html>