<?php

session_start();
include "../config/koneksi.php";
error_reporting(0);
if (isset($_GET['kd_tiket'])) {
	$kd = $_GET['kd_tiket'];
} else {
	// echo "<script>alert('Kode Tiket Belum Dipilih');document.location='index.php'</script>";
}
$data = mysqli_query($conn,"SELECT * FROM tiket where kd_tiket='$kd'");
$daftar = mysqli_fetch_array($data);
$ambil = mysqli_query($conn,"SELECT max(kd_tambahtiket) as maxKode FROM stok_tiket");
$tampung = mysqli_fetch_array($ambil);
$kd = $tampung['maxKode'];
$noUrut = (int) substr($kd, 4, 4);
$noUrut++;
$char= "TBT-";
$kd_tambahtiket = $char . sprintf("%03s", $noUrut);

date_default_timezone_set("Asia/Jakarta");
$tgl_tambahtiket = date("d-m-Y H:i:s");
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
                                <form action="" method="post">
                                    <div class="form-group">
                                        <label for="kd_tambahtiket">Kode Tambah Tiket</label>
                                        <input type="text" class="form-control" id="kd_tambahtiket"
                                            placeholder="Masukan Kode Tambah Tiket" required="" name="kd_tambahtiket"
                                            value="<?php echo $kd_tambahtiket;?>" readonly="">
                                    </div>
                                    <div class="form-group">
                                        <label>Kode tiket</label>
                                        <select class="form-control" name="kd_tiket" onchange="changeValue(this.value)"
                                            required>
                                            <option value=0>-Pilih-</option>
                                            <?php 
	 					            $query = mysqli_query($conn, "SELECT * FROM tiket");
	 					            $jsarray = "var dt = new Array();\n";
	 					            while ($row = mysqli_fetch_array($query)) {
	 					            ?>
                                            <option value="<?= $row['kd_tiket'] ?>"><?= $row['kd_tiket'] ?></option>
                                            <?php
	 						        $jsarray .= "dt['".$row['kd_tiket']."'] = { nama:'".addslashes($row['nm_tiket'])."'};\n";
	 					            }
	 				                ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="nm_tiket">Nama Tiket</label>
                                        <input type="text" class="form-control" id="nm_tiket" required=""
                                            name="nm_tiket" readonly="">
                                    </div>
                                    <div class="form-group">
                                        <label for="tgl_tambahtiket">Tanggal Tambah Tiket</label>
                                        <input type="text" class="form-control" required="" name="tgl_tambahtiket"
                                            value="<?php echo $tgl_tambahtiket;?>" readonly="">
                                    </div>
                                    <div class="form-group">
                                        <label for="jml_tambah">Jumlah Tambah</label>
                                        <input type="number" class="form-control" id="jml_tambah"
                                            placeholder="Masukan Jumlah Tambah" required="" name="jml_tambah">
                                    </div>
                                    <br />
                                    <input type="submit" class="btn btn-outline-primary" value="Tambah" name="tambah">
                                    <a class="btn btn-outline-primary" href="index.php" role="button">Kembali</a>
                                </form>
                                <script type="text/javascript">
                                <?php echo $jsarray; ?>

                                function changeValue(id) {
                                    document.getElementById('nm_tiket').value = dt[id].nama;
                                }
                                </script>
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
    if(isset($_POST['tambah'])){
        $kd_t = $kd_tambahtiket;
        $id_usr = $_SESSION['id'];
        $kd_tiket = $_POST['kd_tiket'];
        $nm_tiket = $_POST['nm_tiket'];
        $tgl_tambah = $_POST['tgl_tambahtiket'];
        $jml_tambah = $_POST['jml_tambah'];
        $simpan = mysqli_query($conn, "INSERT INTO stok_tiket (kd_tambahtiket,id_user,kd_tiket,nm_tiket,tgl_tambah,jml_tambah) VALUES 
        ('$kd_t', '$id_usr', '$kd_tiket', '$nm_tiket', '$tgl_tambah', '$jml_tambah')");
    
        if ($simpan) {
            ?>
<Script>
alert('Penambahan Berhasil');
document.location = "manajemen-tiket.php";
</Script>
<?php
        }
    }
?>