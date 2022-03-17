<?php

session_start();
include "../config/koneksi.php";
error_reporting(0);
if (isset($_GET['kd_tiket'])) {
	$kd = $_GET['kd_tiket'];
} else {
	echo "<script>alert('Kode Tiket Belum Dipilih');document.location='manajemen-tiket.php'</script>";
}
$data = mysqli_query($conn,"SELECT * FROM tiket where kd_tiket='$kd'");
$daftar = mysqli_fetch_array($data);

?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SISBAT | Edit Kategori</title>

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
                        <h1 class="h3 mb-0 text-gray-800">Edit Kategori</h1>
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
                                <form action="" method="post">
                                    <div class="form-group">
                                        <input type="hidden" name="kd_tiket" value="<?php echo $daftar['kd_tiket']; ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="nm_tiket">Nama Tiket</label>
                                        <input type="text" class="form-control" id="tiket"
                                            placeholder="Ganti nama tiket" required="" name="nm_tiket"
                                            value="<?php echo $daftar['nm_tiket']; ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="stok">Stok</label>
                                        <input type="text" class="form-control" id="stok" placeholder="Ganti Stok"
                                            required="" name="stok" value="<?php echo $daftar['stok']; ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="harga_tiket">Harga Tiket</label>
                                        <input type="text" class="form-control" id="tiket"
                                            placeholder="Ganti Harga Tiket" required="" name="harga_tiket"
                                            value="<?php echo $daftar['harga_tiket']; ?>">
                                    </div>
                                    <input type="submit" class="btn btn-outline-primary" value="Edit" name="edit">
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
if (isset($_POST['edit'])) {
	$kd = $_POST['kd_tiket'];
	$nm_tiket = $_POST['nm_tiket'];
    $stok = $_POST['stok'];
    $harga = $_POST['harga_tiket'];
	$edit = mysqli_query($conn,"UPDATE tiket set nm_tiket='$nm_tiket', stok='$stok', harga_tiket='$harga' where kd_tiket='$kd'");
	if($edit){
		echo "<script>alert('Tiket berhasil diedit'); document.location='manajemen-tiket.php'</script>";
	} else {
		echo "<script>alert('Tiket gagal diedit')</script>";
		echo mysqli_error($conn);
	}
}
?>