<?php
session_start();
include "config/koneksi.php";
error_reporting(0);
$id = $_SESSION['id'];
$query = mysqli_query($conn, "SELECT * FROM user WHERE id = '$id'");
$data = mysqli_fetch_array($query);
?>
<html>

<head>
    <!-- Bootstrap CSS  -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <!-- Custom styles for this template-->
    <link href="asset/css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Bootstrap core JavaScript-->
    <script src="../asset/vendor/jquery/jquery.min.js"></script>
    <script src="../asset/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="../asset/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="../asset/js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="../asset/vendor/chart.js/Chart.min.js"></script>
    <script src="../asset/vendor/chart.js/Chart.js"></script>

    <!-- Page level custom scripts -->
    <script src="../asset/js/demo/chart-area-demo.js"></script>
    <script src="../asset/js/demo/chart-pie-demo.js"></script>

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

    <!-- Font-Awesome -->
    <link href="asset/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

    <!-- css -->
    <link href="asset/css/style.css" rel="stylesheet" type="text/css">

    <script src="asset/js/modernizrr.js"></script>
</head>

<body>

    <?php
if (isset($_SESSION['level'])) {
    if ($_SESSION['level'] == "user") { 
        $daftarkategori = mysqli_query($conn, "SELECT * FROM ktgr_wisata");
        ?>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php">SISBAT</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="wisata.php">Wisata <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Kategori Wisata
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <?php 
                    foreach ($daftarkategori as $kategori) { ?>
                            <a class="dropdown-item"
                                href="wisata.php?kategori=<?= $kategori['nm_kategori']; ?>"><?= $kategori['nm_kategori']; ?></a>
                            <div class="dropdown-divider"></div>
                            <?php  
                    }
                    ?>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="hotel.php">Hotel <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="peta.php">Peta <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Transaksi
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="histori-pesan-tiket.php">Histori Pesan Tiket</a>
                            <a class="dropdown-item" href="histori-pesan-hotel.php">Histori Pesan Hotel</a>
                        </div>
                    </li>
                </ul>
                <div class="dropdown mr-5">
                    <a class="nav-link dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                        <span class="mr-2 d-none d-lg-inline text-gray-600 small"
                            style="color: white;"><?= $_SESSION['name']; ?></span>
                        <img class="rounded-circle" style="width: 40px; height: 40px;"
                            src="images/profile/<?php echo $data['foto']; ?>">
                    </a>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item" href="profil-user.php">Profil</a>
                        <a class="dropdown-item" href="logout.php">Keluar</a>
                    </div>
                </div>
            </div>
    </nav>
    <?php }  
} elseif (!isset($_SESSION['id'])) { 
    $daftarkategori = mysqli_query($conn, "SELECT * FROM ktgr_wisata");
    ?>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php">SISBAT</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="wisata.php">Wisata <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Kategori Wisata
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <?php 
                    foreach ($daftarkategori as $kategori) { ?>
                            <a class="dropdown-item"
                                href="wisata.php?kategori=<?= $kategori['nm_kategori']; ?>"><?= $kategori['nm_kategori']; ?></a>
                            <div class="dropdown-divider"></div>
                            <?php  
                    }
                    ?>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="hotel.php">Hotel <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="peta.php">Peta <span class="sr-only">(current)</span></a>
                    </li>
                </ul>

                <div class="dropdown mr-5">
                    <a class="nav-link dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                        <span class="mr-2 d-none d-lg-inline text-gray-600 small" style="color: white;">Guest</span>
                    </a>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item" href="login.php">Login</a>
                        <a class="dropdown-item" href="register.php">Daftar</a>
                    </div>
                </div>
            </div>
    </nav>
</body>
<?php }
?>

</html>