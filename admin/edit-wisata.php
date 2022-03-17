<?php
session_start();
include "../config/koneksi.php";
error_reporting(0);
if (isset($_GET['kd_wisata'])) {
    $kd = $_GET['kd_wisata'];
} else {
    echo "<script>alert('ID User Belum Dipilih');document.location='manajemen-wisata.php'</script>";
}
$data = mysqli_query($conn,"SELECT * FROM wisata where kd_wisata='$kd'");
$daftar = mysqli_fetch_array($data);
$dafatrkategori = mysqli_query($conn,"SELECT * FROM ktgr_wisata")or die(mysqli_error());
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SISBAT | Edit Wisata</title>

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
                        <h1 class="h3 mb-0 text-gray-800">Edit Wisata</h1>
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
                                        <input type="hidden" name="kd_wisata"
                                            value="<?php echo $daftar['kd_wisata']; ?>">
                                        <label>Kode Wisata</label>
                                        <input type="text" class="form-control" id="kd_wisata" placeholder=""
                                            required="" name="kd_wisata" value="<?php echo $daftar['kd_wisata'];?>"
                                            readonly="">
                                    </div>
                                    <div class="form-group">
                                        <label>Nama Wisata</label>
                                        <input type="text" class="form-control" id="nm_wisata"
                                            placeholder="Masukan nama Wisata" required="" name="nm_wisata"
                                            value="<?php echo $daftar['nm_wisata'];?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="ktgr_wisata">Kategori Wisata</label>
                                        <select class="form-control" id="ktgr_wisata" name="ktgr_wisata" required="">
                                            <option><?php echo $daftar['ktgr_wisata'];?></option>
                                            <?php 
									foreach ($dafatrkategori as $kategori) { ?>
                                            <option><?php echo $kategori['nm_kategori'];?></option>
                                            <?php }
									?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="alamat">Alamat</label>
                                        <input type="text" class="form-control" id="alamat" placeholder="Masukan Alamat"
                                            required="" name="alamat" value="<?php echo $daftar['alamat'];?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="deskripsi">Deskripsi</label>
                                        <input type="text" class="form-control" id="deskripsi"
                                            placeholder="Masukan Deskripsi" required="" name="deskripsi"
                                            value="<?php echo $daftar['deskripsi'];?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="gambar">Gambar</label>
                                        <input type="file" class="form-control-file" id="file" name="gambar"
                                            value="images/wisata/<?php echo $daftar['gambar'];?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="latitude">Latitude</label>
                                        <input type="text" class="form-control" id="latitude"
                                            placeholder="Masukan Latitude" required="" name="latitude"
                                            value="<?php echo $daftar['latitude'];?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="longtitude">Longtitude</label>
                                        <input type="text" class="form-control" id="longtitude"
                                            placeholder="Masukan Longtitude" required="" name="longtitude"
                                            value="<?php echo $daftar['longtitude'];?>">
                                    </div>
                                    <br />
                                    <input type="submit" class="btn btn-outline-primary" value="Edit" name="edit">
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
if (isset($_POST['edit'])) {

	$kd = $_POST['kd_wisata'];
	$name = $_POST['nm_wisata'];
	$ktgr = $_POST['ktgr_wisata'];
	$almt = $_POST['alamat'];
	$desk = $_POST['deskripsi'];
    $nama_file = $_FILES['gambar']['name'];
    $source = $_FILES['gambar']['tmp_name'];
    $folder = '../images/wisata/';
	$lat = $_POST['latitude'];
	$long = $_POST['longtitude'];
    move_uploaded_file($source, $folder . $nama_file);
	$edit = mysqli_query($conn,"UPDATE wisata set nm_wisata='$name', ktgr_wisata='$ktgr', alamat='$almt', deskripsi='$desk', gambar='$nama_file', latitude='$lat', longtitude='$long' where kd_wisata='$kd'");
	if($edit){
		echo "<script>alert('Wisata berhasil diedit'); document.location='manajemen-wisata.php'</script>";
	} else {
		echo "<script>alert('Wisata gagal diedit')</script>";
		echo mysqli_error($conn);
	}
}
?>