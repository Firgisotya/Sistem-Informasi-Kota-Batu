<?php
session_start();
include "../config/koneksi.php";
error_reporting(0);
if (isset($_GET['id'])) {
    $id = $_GET['id'];
} else {
    echo "<script>alert('ID User Belum Dipilih');document.location='manajemen-user.php'</script>";
}
$data = mysqli_query($conn,"SELECT * FROM user where id='$id'");
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

    <title>SISBAT | Edit User</title>

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
                        <h1 class="h3 mb-0 text-gray-800">Edit User</h1>
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
                                        <input type="hidden" name="id" value="<?php echo $daftar['id']; ?>">
                                        <label for="user">Nama</label>
                                        <input type="text" class="form-control" id="nm_user" placeholder="Ganti nama"
                                            required="" name="nm_user" value="<?php echo $daftar['nm_user']; ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="jenis_kelamin">Jenis Kelamin</label>
                                        <select class="form-control" id="jenis_kelamin" name="jenis_kelamin"
                                            required="">
                                            <option><?= $daftar['jenis_kelamin']?></option>
                                            <option value="Laki-Laki">Laki-Laki</option>
                                            <option value="Perempuan">Perempuan</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="tp_lahir">Tempat Lahir</label>
                                        <input type="text" class="form-control" id="tp_lahir" placeholder="Tempat Lahir"
                                            name="tp_lahir" required="" value="<?php echo $daftar['tp_lahir']; ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="tgl_lahir">Tanggal Lahir</label>
                                        <input type="date" class="form-control" id="tgl_lahir"
                                            placeholder="Tanggal Lahir" name="tgl_lahir" required=""
                                            value="<?php echo $daftar['tgl_lahir']; ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="alamat">Alamat</label>
                                        <input type="text" class="form-control" id="alamat" placeholder="Alamat"
                                            name="alamat" required="" value="<?php echo $daftar['alamat']; ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="no_hp">Nomor Telepon</label>
                                        <input type="text" class="form-control" id="no_hp" placeholder="Nomor Telepon"
                                            name="no_hp" required="" value="<?php echo $daftar['no_hp']; ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="user">Nama Username</label>
                                        <input type="text" class="form-control" id="user"
                                            placeholder="Ganti nama Username" required="" name="username"
                                            value="<?php echo $daftar['username']; ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="password">Password User</label>
                                        <input type="text" class="form-control" id="password"
                                            placeholder="Ganti Password User" required="" name="password"
                                            value="<?php echo $daftar['password']; ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input type="text" class="form-control" id="email"
                                            placeholder="Ganti email User" required="" name="email"
                                            value="<?php echo $daftar['email']; ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="foto">Foto</label>
                                        <input type="file" class="form-control-file" id="file" name="foto"
                                            value="images/profile/<?php echo $daftar['foto'];?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="level">Level</label>
                                        <select class="form-control" id="level" name="level">
                                            <option><?php echo $daftar['level'];?></option>
                                            <option value="admin">Admin</option>
                                            <option value="user">User</option>
                                        </select>
                                    </div>
                                    <input type="submit" class="btn btn-outline-primary" value="Edit" name="edit">
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
if (isset($_POST['edit'])) {

	$id = $_POST['id'];
	$name = $_POST['nm_user'];
	$jk = $_POST['jenis_kelamin'];
	$tplahir = $_POST['tp_lahir'];
	$tgllahir = $_POST['tgl_lahir'];
	$alamat = $_POST['alamat'];
	$nohp = $_POST['no_hp'];
	$user = $_POST['username'];
    $email = $_POST['email'];
    $nama_file = $_FILES['foto']['name'];
    $source = $_FILES['foto']['tmp_name'];
    $folder = '../images/profile/';
	$pass = $_POST['password'];
	$level = $_POST['level'];
    move_uploaded_file($source, $folder . $nama_file);
	$edit = mysqli_query($conn,"UPDATE user set nm_user='$name', jenis_kelamin='$jk', tp_lahir='$tplahir', tgl_lahir='$tgllahir', alamat='$alamat', no_hp='$nohp', username='$user', email='$email', foto='$nama_file', password='$pass', level='$level' where id='$id'");
	if($edit){
		echo "<script>alert('User berhasil diedit'); document.location='manajemen-user.php'</script>";
	} else {
		echo "<script>alert('User gagal diedit')</script>";
		echo mysqli_error($conn);
	}
}
?>