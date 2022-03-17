<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SISBAT | Login</title>
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="css/style.css">
    <link href="asset/css/sb-admin-2.min.css" rel="stylesheet">
</head>

<body class="bg-gradient-primary">

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-5">
                <div class="card">
                    <div class="card-body">
                        <form action="" method="post">
                            <h1 align="center">LOGIN</h1>
                            <div class="form-group">
                                <label for="username">Username</label>
                                <input type="text" class="form-control" id="username" placeholder="Username"
                                    name="username" required="">
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" class="form-control" id="password" placeholder="Password"
                                    name="password" required="">
                            </div>
                            <input type="submit" class="btn btn-outline-primary" value="Masuk" name="login">
                            <a class="btn btn-outline-primary" href="index.php" role="button">Kembali</a>
                            <hr>
                            <a href="daftar.php">Belum punya akun ? Silahkan daftar</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- JS -->
    <script src="js/jquery.min.js"></script>
    <script src="js/main.js"></script>
</body>

</html>
<?php

if (isset($_POST['login'])) {
		session_start();
		include "config/koneksi.php";
		$user = $_POST['username'];
		$pass = $_POST['password'];
		$query = mysqli_query($conn, "SELECT * FROM user WHERE username='$user'");
		$tampung = mysqli_fetch_array($query);
		$cek = mysqli_num_rows($query);

		if ($cek == 0) {
			echo "
			<br />
			<div class='alert alert-danger' role='alert' align='center'>
			Username tidak terdaftar !
			</div>";
		} elseif ($pass <> $tampung['password']) {
			echo "
			<br />
			<div class='alert alert-danger' role='alert' align='center'>
			Password salah !
			</div>";
		} elseif ($user && $pass = $tampung['username'] && $tampung['password']) {
			$_SESSION['level'] = $tampung['level'];
			$_SESSION['id'] = $tampung['id'];
			$_SESSION['name'] = $tampung['nm_user'];
            if($_SESSION['level'] == "admin"){
                echo "<script>
                alert('Anda Berhasil Login !');
                document.location = 'admin/index.php';
                </script>";
            }elseif($_SESSION['level'] == "user"){
                echo "<script>
                alert('Anda Berhasil Login !');
                document.location = 'index.php';
                </script>";
            }
        }else{
            echo "<script>
            alert('Anda Gagal Login !');
            document.location = 'login.php';
            </script>";
        }
    }
?>