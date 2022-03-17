<?php
session_start();
include "../config/koneksi.php";
$daftarkategori = mysqli_query($conn, "SELECT * FROM ktgr_wisata");
$ambil = mysqli_query($conn, "SELECT max(kd_wisata) as maxKode FROM wisata");

$tampung = mysqli_fetch_array($ambil);
$kd = $tampung['maxKode'];
$noUrut = (int) substr($kd, 4, 4);
$noUrut++;
$char = "KDW-";
$kd_wisata = $char . sprintf("%03s", $noUrut);
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SISBAT | Tambah Wisata</title>

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
                        <h1 class="h3 mb-0 text-gray-800">Tambah Wisata</h1>
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
                                        <label for="kd_wisata">Kode Wisata</label>
                                        <input type="text" class="form-control disabled" id="kd_wisata" required=""
                                            name="kd_wisata" value="<?= $kd_wisata; ?>" disabled>
                                    </div>
                                    <div class="form-group">
                                        <label for="nm_wisata">Nama Wisata</label>
                                        <input type="text" class="form-control" id="nm_wisata"
                                            placeholder="Masukan Nama Wisata" name="nm_wisata" required="">
                                    </div>
                                    <div class="form-group">
                                        <label for="ktgr_wisata">Kategori Wisata</label>
                                        <select class="form-control" id="ktgr_wisata" name="ktgr_wisata">
                                            <option>Pilih Salah Satu..</option>
                                            <?php
                                    while ($datawisata = mysqli_fetch_array($daftarkategori)) { ?>
                                            <option value="<?php echo $datawisata['nm_kategori']; ?>">
                                                <?php echo $datawisata['nm_kategori']; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="alamat">Alamat</label>
                                        <input type="text" class="form-control" id="alamat" placeholder="Alamat"
                                            name="alamat" required="">
                                    </div>
                                    <div class="form-group">
                                        <label for="deskripsi">Deskripsi</label>
                                        <input type="text" class="form-control" id="deskripsi"
                                            placeholder="Masukan Deskripsi" required="" name="deskripsi">
                                    </div>
                                    <div class="form-group">
                                        <label for="gambar">Gambar Wisata</label>
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
                                    <a class="btn btn-outline-primary" href="manajemen-wisata.php"
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
    $kd_wisata = $kd_wisata;
    $name = $_POST['nm_wisata'];
    $ktgr = $_POST['ktgr_wisata'];
	$almt = $_POST['alamat'];
	$desk = $_POST['deskripsi'];
    $nama_file = $_FILES['gambar']['name'];
    $source = $_FILES['gambar']['tmp_name'];
    $folder = '../images/wisata/';
	$lat = $_POST['latitude'];
    $long = $_POST['longtitude'];
	$cek = mysqli_query($conn,"SELECT * FROM wisata where nm_wisata='$name'");
	if(mysqli_num_rows($cek) > 0){
		echo "
		<script>alert('Nama Wisata Sudah Ada !')</script>";
	} else {
		$save = mysqli_query($conn,"INSERT INTO wisata (kd_wisata,nm_wisata,ktgr_wisata,alamat,deskripsi,gambar,latitude,longtitude) VALUES ('$kd_wisata', '$name', '$ktgr', '$almt', '$desk', '$nama_file', '$lat', '$long')");
		if($save){
			echo "<script>alert('Wisata Berhasil Ditambah');
            document.location = 'manajemen-wisata.php';</script>";
		} else {
			echo "<script>alert('Wisata Gagal Ditambah !')</script>";
			echo mysqli_error($conn);
		}
	}
}
?>