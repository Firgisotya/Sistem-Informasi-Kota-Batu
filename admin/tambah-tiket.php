<?php
session_start();
include "../config/koneksi.php";
$ambil = mysqli_query($conn, "SELECT max(kd_tiket) as maxKode FROM tiket");

$tampung = mysqli_fetch_array($ambil);
$kd = $tampung['maxKode'];
$noUrut = (int) substr($kd, 4, 4);
$noUrut++;
$char = "KDT-";
$kd_tiket = $char . sprintf("%03s", $noUrut);
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SISBAT | Tambah Tiket</title>

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
                        <h1 class="h3 mb-0 text-gray-800">Tambah Tiket</h1>
                    </div>

                    <!-- Content Row -->
                    <div class="row">


                    </div>

                    <!-- Content Row -->

                    <div class="row">

                        <!-- Area Chart -->
                        <div class="col">
                            <!-- Card Body -->
                            <div class="card-body">
                                <form action="" method="post" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <label for="kd_tiket">Kode Tiket</label>
                                        <input type="text" class="form-control disabled" id="kd_tiket" required=""
                                            name="kd_tiket" value="<?= $kd_tiket; ?>" disabled>
                                    </div>
                                    <div class="form-group">
                                        <label for="nm_tiket">Nama Tiket</label>
                                        <input type="text" class="form-control" id="nm_tiket"
                                            placeholder="Masukan Nama Tiket" name="nm_tiket" required="">
                                    </div>
                                    <div class="form-group">
                                        <label for="stok">Stok</label>
                                        <input type="text" class="form-control" id="stok" placeholder="Stok" name="stok"
                                            required="">
                                    </div>
                                    <div class="form-group">
                                        <label for="harga_tiket">Harga Tiket</label>
                                        <input type="text" class="form-control" id="Harga Tiket"
                                            placeholder="harga_tiket" name="harga_tiket" required="">
                                    </div>
                                    <br />
                                    <input type="submit" class="btn btn-outline-primary" value="Tambah" name="tambah">
                                    <a class="btn btn-outline-primary" href="manajemen-tiket.php"
                                        role="button">Kembali</a>
                                </form>
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
<?php
if (isset($_POST['tambah'])) {
    error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
    $kd_tiket = $kd_tiket;
    $name = $_POST['nm_tiket'];
	$stok = $_POST['stok'];
	$harga = $_POST['harga_tiket'];
	$cek = mysqli_query($conn,"SELECT * FROM tiket where nm_tiket='$name'");
	if(mysqli_num_rows($cek) > 0){
		echo "
		<script>alert('Nama Tiket Sudah Ada !')</script>";
	} else {
		$save = mysqli_query($conn,"INSERT INTO tiket (kd_tiket,nm_tiket,stok,harga) VALUES ('$kd_tiket', '$name', '$stok', '$harga')");
		if($save){
			echo "<script>alert('Tiket Berhasil Ditambah');
            document.location = 'manajemen-tiket.php';</script>";
		} else {
			echo "<script>alert('Tiket Gagal Ditambah !')</script>";
			echo mysqli_error($conn);
		}
	}
}
?>