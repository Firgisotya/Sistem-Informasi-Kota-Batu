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
	echo "<script>alert('Kode Hotel Belum Dipilih');document.location='hotel.php'</script>";
	echo "<script>alert('Id User Belum Dipilih');document.location='index.php'</script>";
}
$data = mysqli_query($conn,"SELECT * FROM hotel where kd_hotel='$kd'")or die(mysqli_error());
$daftar = mysqli_fetch_array($data);
$user = mysqli_query($conn,"SELECT * FROM user where id='$id'")or die(mysqli_error());
$user1 = mysqli_fetch_array($user);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1, shrink-to-fit=no">
    <!-- Basic -->
    <title><?php echo $title ?></title>

    <!-- Define Charset -->
    <meta charset="utf-8">

    <!-- Responsive Metatag -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <!-- Bootstrap CSS  -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <!-- Font-Awesome -->
    <link href="asset/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

    <!-- css -->
    <link href="asset/css/style.css" rel="stylesheet" type="text/css">

    <script src="asset/js/modernizrr.js"></script>
    <link rel="stylesheet" type="text/css" href="asset/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="asset/css/detail.css">
    <title>SISBAT | Detail Hotel</title>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css"
        integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A=="
        crossorigin="" />
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"
        integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA=="
        crossorigin=""></script>
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/bootstrap.bundle.js"></script>
    <!-- Javascript -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>

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
                    <h5><?= $daftar['nm_hotel']; ?></h5>
                </div><!-- / project-info-box -->

                <div class="project-info-box">
                    <p><b>Kategori Wisata: </b> <?= $daftar['ktgr_wisata']; ?></p>
                    <p><b>Alamat: </b> <?= $daftar['alamat']; ?></p>
                    <p><b>Latitude: </b> <?= $daftar['latitude']; ?></p>
                    <p><b>Longtitude: </b> <?= $daftar['longtitude']; ?></p>
                </div><!-- / project-info-box -->

                <div class="project-info-box mt-0 mb-0">
                    <a href="pesan-hotel.php?kd=<?= $daftar['kd_hotel']; ?>" class="btn btn-primary">Pesan Hotel</a>
                    <a href="index.php" class="btn btn-outline-primary">Kembali</a>
                </div><!-- / project-info-box -->;
            </div><!-- / column -->

            <div class="col-md-7">
                <br>
                <h4>Gambar</h4>
                <img src="images/hotel/<?= $daftar['gambar']; ?>" alt="project-image" class="rounded">
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
                    <h5><?= $daftar['nm_hotel']; ?></h5>
                    <p class="mb-0"><b> RP. <?= $daftar['harga']; ?></b></p>
                </div><!-- / project-info-box -->

                <div class="project-info-box">
                    <p><b>Sisa Kamar: </b> <?= $daftar['sisa_kamar']; ?></p>
                    <p><b>Alamat: </b> <?= $daftar['alamat']; ?></p>
                    <p><b>Latitude: </b> <?= $daftar['latitude']; ?></p>
                    <p><b>Longtitude: </b> <?= $daftar['longtitude']; ?></p>
                </div><!-- / project-info-box -->

                <div class="project-info-box mt-0 mb-0">
                    <a href="pesan-hotel.php?kd=<?= $daftar['kd_hotel']; ?>" class="btn btn-primary">Pesan Hotel</a>
                    <a href="index.php" class="btn btn-outline-primary">Kembali</a>
                </div><!-- / project-info-box -->;
            </div><!-- / column -->

            <div class="col-md-7">
                <br>
                <h4>Gambar</h4>
                <img src="images/hotel/<?= $daftar['gambar']; ?>" alt="project-image" class="rounded">
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