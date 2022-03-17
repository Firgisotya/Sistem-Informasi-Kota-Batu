<?php

session_start();
include "config/koneksi.php";
error_reporting(0);

?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>SISBAT | Histori Pesan Tiket</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/bootstrap.bundle.js"></script>
</head>

<body>
    <?php
    include "navbar.php";
    ?>
    <div class="container-fluid">
        <div class="card mt-5">
            <div class="card-header">
                Histori Pesan Tiket
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-9">
                    </div>
                    <div class="col-md-3">
                        <form class="form-inline" method="post">
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Cari . . ." name="txtcari">
                            </div>
                            <button type="submit" class="btn btn-primary ml-2">Cari</button>
                        </form>
                    </div>
                </div>
                <br />
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th rowspan="2">No</th>
                                <th rowspan="2">Kode Transaksi</th>
                                <th rowspan="2">Nama User</th>
                                <th rowspan="2">Nama Wisata</th>
                                <th rowspan="2">Nama Tiket</th>
                                <th rowspan="2">Tanggal Transaksi</th>
                                <th rowspan="2">Jumlah</th>
                                <th rowspan="2">Total</th>
                                <th rowspan="2">Pembayaran</th>
                                <th rowspan="2">Bukti</th>
                            </tr>
                        </thead>
                        <?php

                        $txtcari = $_POST['txtcari'];
                        $no = 1;
                        if ($txtcari == !"") {
                            $query = mysqli_query($conn, "SELECT * FROM tbl_transaksi where 
								kd_obat like '%$txtcari%' OR 
								tgl_transaksi like '%$txtcari%' OR
								harga like '%$txtcari%' OR
								stok like '%$txtcari%' OR
								kategori like '%$txtcari%'");
                        } else {
                            $a = $_SESSION['id'];
                            $query = mysqli_query($conn, "SELECT * FROM transaksi_wisata, user, wisata WHERE transaksi_wisata.id_user = user.id AND transaksi_wisata.kd_wisata = wisata.kd_wisata AND user.id='$a' ORDER BY transaksi_wisata.kd_transaksi DESC");
                        }
                        if (mysqli_num_rows($query)) {
                            while ($data = mysqli_fetch_array($query)) { ?>
                        <tbody>
                            <tr>
                                <td><?= $no++; ?></td>
                                <td><?=  $data['kd_transaksi']; ?></td>
                                <td><?= $data['nm_user']; ?></td>
                                <td><?= $data['nm_wisata']; ?></td>
                                <td><?= $data['tiket']; ?></td>
                                <td><?= $data['tgl_transaksi'];  ?></td>
                                <td><?= $data['jml_transaksi']; ?></td>
                                <td><?= $data['total']; ?></td>
                                <td><img src="images/bank/<?php echo $data['pembayaran']; ?>.png" width="60px"
                                        height="70px" alt="<?php echo $data['pembayaran'] ?>"></td>
                                <td><img src="images/bukti/<?php echo $data['bukti']; ?>" width="60px" height="80px"
                                        alt="<?php echo $data['bukti'] ?>"></td>
                            </tr>
                        </tbody>
                        <?php            }
                        } else { ?>
                        <tr>
                            <td colspan="10" align="center">Tidak Ada Data</td>
                        </tr>
                        <?php    }
                        ?>
                    </table>
                </div>
            </div>
        </div>
    </div>
</body>

</html>