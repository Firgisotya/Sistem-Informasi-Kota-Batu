<?php
session_start();
include "../config/koneksi.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SISBAT | Tambah User</title>

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
                        <h1 class="h3 mb-0 text-gray-800">Tambah User</h1>
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
                                        <label for="nm_user">Nama</label>
                                        <input type="text" class="form-control" id="nm_user" placeholder="Masukan Nama"
                                            name="nm_user" required="">
                                    </div>
                                    <div class="form-group">
                                        <label for="jenis_kelamin">jenis Kelamin</label>
                                        <select class="form-control" id="jenis_kelamin" name="jenis_kelamin"
                                            required="">
                                            <option>Masukan Jenis Kelamin</option>
                                            <option value="Laki-Laki">Laki-Laki</option>
                                            <option value="Perempuan">Perempuan</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="tp_lahir">Tempat Lahir</label>
                                        <input type="text" class="form-control" id="tp_lahir" placeholder="Tempat Lahir"
                                            name="tp_lahir" required="">
                                    </div>
                                    <div class="form-group">
                                        <label for="tgl_lahir">Tanggal Lahir</label>
                                        <input type="date" class="form-control" id="tgl_lahir"
                                            placeholder="Tanggal Lahir" name="tgl_lahir" required="">
                                    </div>
                                    <div class="form-group">
                                        <label for="alamat">Alamat</label>
                                        <input type="text" class="form-control" id="alamat" placeholder="Alamat"
                                            name="alamat" required="">
                                    </div>
                                    <div class="form-group">
                                        <label for="no_telp">Nomor Telepon</label>
                                        <input type="text" class="form-control" id="no_telp" placeholder="Nomor Telepon"
                                            name="no_telp" required="">
                                    </div>
                                    <div class="form-group">
                                        <label for="username">Username</label>
                                        <input type="text" class="form-control" id="username"
                                            placeholder="Masukan Username" required="" name="username">
                                    </div>
                                    <div class="form-group">
                                        <label for="password">Password</label>
                                        <input type="password" class="form-control" id="password"
                                            placeholder="Masukan Password" required="" name="password">
                                    </div>
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input type="text" class="form-control" id="email" placeholder="Masukan email"
                                            required="" name="email">
                                    </div>
                                    <div class="form-group">
                                        <label for="foto">Foto</label>
                                        <input type="file" class="form-control-file" id="foto"
                                            placeholder="Masukan foto" required="" name="foto">
                                    </div>
                                    <div class="form-group">
                                        <label for="level">Level</label>
                                        <select class="form-control" id="level" name="level">
                                            <option>Pilih Salah Satu..</option>
                                            <option value="admin">Admin</option>
                                            <option value="user">User</option>
                                        </select>
                                    </div>
                                    <br />
                                    <input type="submit" class="btn btn-outline-primary" value="Tambah" name="tambah">
                                    <a class="btn btn-outline-primary" href="manajemen-user.php"
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
    $name = $_POST['nm_user'];
    $jk = $_POST['jenis_kelamin'];
	$tp_lahir = $_POST['tp_lahir'];
	$tgl_lahir = $_POST['tgl_lahir'];
	$almt = $_POST['alamat'];
	$no_hp = $_POST['no_hp'];
	$username = $_POST['username'];
	$pass = $_POST['password'];
    $email = $_POST['email'];
    $nama_file = $_FILES['foto']['name'];
    $source = $_FILES['foto']['tmp_name'];
    $folder = '../images/profile/';
	$level = $_POST['level'];
    move_uploaded_file($source, $folder . $nama_file);
	$cek = mysqli_query($conn,"SELECT * FROM user where username='$username'");
	if(mysqli_num_rows($cek) > 0){
		echo "
		<script>alert('Username Sudah Ada !')</script>";
	} else {
		$save = mysqli_query($conn,"INSERT INTO user (nm_user,jenis_kelamin,tp_lahir,tgl_lahir,alamat,no_hp,username,password,email,foto,level) VALUES ('$name', '$jk', '$tp_lahir', '$tgl_lahir', '$almt', '$no_hp', '$username','$pass','$email','$nama_file','$level')");
		if($save){
			echo "<script>alert('User Berhasil Ditambah');
            document.location = 'manajemen-user.php';</script>";
		} else {
			echo "<script>alert('User Gagal Ditambah !')</script>";
			echo mysqli_error($conn);
		}
	}
}
?>