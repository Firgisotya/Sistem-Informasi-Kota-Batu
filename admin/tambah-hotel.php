<?php
session_start();
include "../config/koneksi.php";
$ambil = mysqli_query($conn, "SELECT max(kd_hotel) as maxKode FROM hotel");

$tampung = mysqli_fetch_array($ambil);
$kd = $tampung['maxKode'];
$noUrut = (int) substr($kd, 4, 4);
$noUrut++;
$char = "KDH-";
$kd_hotel = $char . sprintf("%03s", $noUrut);
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SISBAT | Tambah Hotel</title>

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
                        <h1 class="h3 mb-0 text-gray-800">Tambah Hotel</h1>
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
                                        <label for="kd_hotel">Kode Hotel</label>
                                        <input type="text" class="form-control disabled" id="kd_hotel" required=""
                                            name="kd_hotel" value="<?= $kd_hotel; ?>" disabled>
                                    </div>
                                    <div class="form-group">
                                        <label for="nm_hotel">Nama Hotel</label>
                                        <input type="text" class="form-control" id="nm_hotel"
                                            placeholder="Masukan Nama Hotel" name="nm_hotel" required="">
                                    </div>
                                    <div class="form-group">
                                        <label for="alamat">Alamat</label>
                                        <input type="text" class="form-control" id="alamat" placeholder="Alamat"
                                            name="alamat" required="">
                                    </div>
                                    <div class="form-group">
                                        <label for="sisa_kamar">Sisa Kamar</label>
                                        <input type="text" class="form-control" id="sisa_kamar"
                                            placeholder="Masukan Sisa Kamar" required="" name="sisa_kamar">
                                    </div>
                                    <div class="form-group">
                                        <label for="harga">Harga</label>
                                        <input type="text" class="form-control" id="harga" placeholder="Masukan Harga"
                                            required="" name="harga">
                                    </div>
                                    <div class="form-group">
                                        <label for="gambar">Gambar Hotel</label>
                                        <input type="file" class="form-control-file" id="file" name="gambar">
                                    </div>
                                    <div class="form-group">
                                        <label for="latitude">Latitude</label>
                                        <input type="latitude" class="form-control" id="latitude"
                                            placeholder="Masukan Latitude" required="" name="latitude">
                                    </div>
                                    <div class="form-group">
                                        <label for="longtitude">Longtitude</label>
                                        <input type="text" class="form-control" id="longtitude"
                                            placeholder="Masukan Longtitude" required="" name="longtitude">
                                    </div>
                                    <br />
                                    <input type="submit" class="btn btn-outline-primary" value="Tambah" name="tambah">
                                    <a class="btn btn-outline-primary" href="manajemen-hotel.php"
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
    $kd_hotel = $kd_hotel;
    $name = $_POST['nm_hotel'];
	$almt = $_POST['alamat'];
	$sk = $_POST['sisa_kamar'];
    $harga = $_POST['harga'];
    $nama_file = $_FILES['gambar']['name'];
    $source = $_FILES['gambar']['tmp_name'];
    $folder = '../images/hotel/';
	$lat = $_POST['latitude'];
    $long = $_POST['longtitude'];
    move_uploaded_file($source, $folder . $nama_file);
	$cek = mysqli_query($conn,"SELECT * FROM hotel where nm_hotel='$name'");
	if(mysqli_num_rows($cek) > 0){
		echo "
		<script>alert('Nama Hotel Sudah Ada !')</script>";
	} else {
		$save = mysqli_query($conn,"INSERT INTO hotel (kd_hotel,nm_hotel,alamat,sisa_kamar,harga,gambar,latitude,longtitude) VALUES ('$kd_hotel', '$name', '$almt', '$sk', '$harga', '$nama_file', '$lat', '$long')");
		if($save){
			echo "<script>alert('Hotel Berhasil Ditambah');
            document.location = 'manajemen-hotel.php';</script>";
		} else {
			echo "<script>alert('Hotel Gagal Ditambah !')</script>";
			echo mysqli_error($conn);
		}
	}
}
?>