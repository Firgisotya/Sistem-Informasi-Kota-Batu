<?php 
session_start();
include "config/koneksi.php";
error_reporting(0);
if (isset($_GET['kd'])) {
    $kd = $_GET['kd'];
} elseif (isset($_GET['id'])) {
	$id  = $_GET['id'];
} 
else {
	echo "<script>alert('Kode Wisata Belum Dipilih');document.location='wisata.php'</script>";
	echo "<script>alert('Id User Belum Dipilih');document.location='index.php'</script>";
}
$data = mysqli_query($conn,"SELECT * FROM wisata where kd_wisata='$kd'")or die(mysqli_error());
$daftar = mysqli_fetch_array($data);
$user = mysqli_query($conn,"SELECT * FROM user where id='$id'")or die(mysqli_error());
$user1 = mysqli_fetch_array($user);
$dafatrkategori = mysqli_query($conn,"SELECT * FROM ktgr_wisata")or die(mysqli_error());
$tiket = mysqli_query($conn,"SELECT * FROM tiket")or die(mysqli_error());
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" type="text/css" href="asset/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="asset/css/detail.css">
    <title>SISBAT | Detail Wisata</title>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css"
        integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A=="
        crossorigin="" />
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"
        integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA=="
        crossorigin=""></script>
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/bootstrap.bundle.js"></script>

</head>

<body>
    <?php
	include "navbar.php";
	?>

    <?php 
			if (isset($_SESSION['level'])) {
    		if ($_SESSION['level'] == "user") { ?>
    <div class="container">
        <div class="row">
            <div class="col-md-5">
                <div class="project-info-box mt-0">
                    <h5><?= $daftar['nm_wisata']; ?></h5>
                    <p class="mb-0"><?= $daftar['deskripsi']; ?></p>
                </div><!-- / project-info-box -->

                <div class="project-info-box">
                    <p><b>Kategori Wisata: </b> <?= $daftar['ktgr_wisata']; ?></p>
                    <p><b>Alamat: </b> <?= $daftar['alamat']; ?></p>
                    <p><b>Latitude: </b> <?= $daftar['latitude']; ?></p>
                    <p><b>Longtitude: </b> <?= $daftar['longtitude']; ?></p>
                </div><!-- / project-info-box -->

                <div class="project-info-box mt-0 mb-0">
                    <a href="pesan-tiket.php?kd=<?= $daftar['kd_wisata']; ?>" class="btn btn-primary">Pesan Tiket</a>
                    <a href="index.php" class="btn btn-outline-primary">Kembali</a>
                </div><!-- / project-info-box -->;
            </div><!-- / column -->

            <div class="col-md-7">
                <br>
                <h4>Gambar</h4>
                <img src="images/wisata/<?= $daftar['gambar']; ?>" alt="project-image" class="rounded">
                <div class="project-info-box">
                </div><!-- / project-info-box -->
            </div><!-- / column -->
        </div>
    </div>

    <?php        }
			} elseif (!isset($_SESSION['id'])) { ?>
    <div class="container">
        <div class="row">
            <div class="col-md-5">
                <div class="project-info-box mt-0">
                    <h5><?= $daftar['nm_wisata']; ?></h5>
                    <p class="mb-0"><?= $daftar['deskripsi']; ?></p>
                </div><!-- / project-info-box -->

                <div class="project-info-box">
                    <p><b>Kategori Wisata: </b> <?= $daftar['ktgr_wisata']; ?></p>
                    <p><b>Alamat: </b> <?= $daftar['alamat']; ?></p>
                    <p><b>Latitude: </b> <?= $daftar['latitude']; ?></p>
                    <p><b>Longtitude: </b> <?= $daftar['longtitude']; ?></p>
                </div><!-- / project-info-box -->

                <div class="project-info-box mt-0 mb-0">
                    <a href="login.php?kd=<?= $daftar['kd_wisata']; ?>" class="btn btn-primary">Pesan Tiket</a>
                    <a href="index.php" class="btn btn-outline-primary">Kembali</a>
                </div><!-- / project-info-box -->;
            </div><!-- / column -->

            <div class="col-md-7">
                <br>
                <h4>Gambar</h4>
                <img src="images/wisata/<?= $daftar['gambar']; ?>" alt="project-image" class="rounded">
                <div class="project-info-box">
                </div><!-- / project-info-box -->
            </div><!-- / column -->
        </div>
    </div>
    <?php }
     ?>
    </div>
    </div>

</body>
<?php include "footer.php"; ?>

</html>