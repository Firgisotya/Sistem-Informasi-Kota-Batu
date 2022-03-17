<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SISBAT | Daftar</title>

    <!-- Custom fonts for this template-->
    <link href="asset/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="asset/css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

    <div class="container">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-5 d-none d-lg-block" style="background-image: url('images/qw.jpg');"></div>
                    <div class="col-lg-7">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Register</h1>
                            </div>
                            <form class="user" action="" method="post" enctype="multipart/form-data">
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="text" name="nm_user" class="form-control" id="" placeholder="Nama">
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="text" name="username" class="form-control" id=""
                                            placeholder="Username">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="password" name="password" class="form-control" id=""
                                            placeholder="Password">
                                    </div>
                                    <div class="col-sm-6">
                                        <select class="form-control" id="jenis_kelamin" name="jenis_kelamin"
                                            required="">
                                            <option>Masukan Jenis Kelamin</option>
                                            <option value="Laki-Laki">Laki-Laki</option>
                                            <option value="Perempuan">Perempuan</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="text" name="tp_lahir" class="form-control" id=""
                                            placeholder="Tempat Lahir">
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="date" class="form-control" id="" placeholder="Tanggal Lahir"
                                            name="tgl_lahir" required="">

                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="text" name="alamat" class="form-control" id=""
                                            placeholder="Alamat">
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control" id="" placeholder="Nomor Handphone"
                                            name="no_hp" required="">

                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="email" name="email" class="form-control" id="" placeholder="Email">
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="file" class="" id="" placeholder="Foto" name="foto" required="">

                                    </div>
                                </div>
                                <input type="submit" name="register" class="btn btn-primary btn-user btn-block"
                                    value="Register Account">

                            </form>
                            <hr>
                            <div class="text-center">
                                <a class="small" href="login.php">Already have an account? Login!</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="asset/vendor/jquery/jquery.min.js"></script>
    <script src="asset/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="asset/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="asset/js/sb-admin-2.min.js"></script>

</body>

</html>
<?php 
include "config/koneksi.php";

if (isset($_POST['register'])) {
	$name = $_POST['nm_user'];
	$user = $_POST['username'];
	$pass = $_POST['password'];
	$level = "user";
	$jk = $_POST['jenis_kelamin'];
	$tp_lahir = $_POST['tp_lahir'];
	$tgl_lahir = $_POST['tgl_lahir'];
	$almt = $_POST['alamat'];
	$no_hp = $_POST['no_hp'];
    $email = $_POST['email'];
    $nama_file = $_FILES['foto']['name'];
    $source = $_FILES['foto']['tmp_name'];
    $folder = '../images/profile/';
    move_uploaded_file($source, $folder . $nama_file);
	$query = mysqli_query($conn,"SELECT * FROM user where username='$user'");
	if (mysqli_num_rows($query) > 0) {
		echo "
		<div class='alert alert-danger' role='alert' align='center'>
		Username sudah terdaftar !
		</div>";
	} else {
		$save = mysqli_query($conn,"INSERT INTO user (nm_user,username,password,level,jenis_kelamin,tp_lahir,tgl_lahir,alamat,no_hp,email,foto) VALUES ('$name','$user','$pass','user','$jk','$tp_lahir','$tgl_lahir','$almt','$no_hp','$email','$nama_file')");
		if ($save) {
			echo "<script> alert('Berhasil Mendaftar ! Silahkan Login')</script>";
			echo "<meta http-equiv='refresh' content='1 url=login.php'>";
		} else {
			echo mysqli_error($conn);
			echo "<script> alert('Proses Gagal !')</script>";
			echo "<meta http-equiv='refresh' content='1 url=daftar.php'>";
		}
	}

}

?>