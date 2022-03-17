<?php 
    session_start();
    include "config/koneksi.php";
    error_reporting(0);
	$kd_trs = $_GET['kd_transaksi'];
	$query = mysqli_query($conn, "SELECT * FROM transaksi_hotel, user, hotel WHERE transaksi_hotel.id_user = user.id AND transaksi_hotel.kd_hotel = hotel.kd_hotel AND kd_transaksi = '$kd_trs'");
	$t = mysqli_fetch_array($query);
    ?>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    <title>SISBAT | Pesan Hotel</title>
    <script src="js/jquery.js">
    < /scripalert> <
    script src = "js/bootstrap.bundle.min.js" >
    </script>
    <script src="js/bootstrap.bundle.js"></script>
</head>
<body?>
    <?php
	include "navbar.php";
	?>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-7">
                <div class="card">
                    <div class="card-body">
                        <form action="" method="post" enctype="multipart/form-data">
                            <h1 align="center">Pembayaran</h1>
                            <div class="form-group">
                                <?php 
 					            if ($t['pembayaran'] == "BRI") {
 						        ?>
                                <center>
                                    <img src="images/bank/bri.png" width="100px" align="center">
                                </center>
                                <?php
 					            }elseif ($t['pembayaran'] == "BNI") {
 						        ?>
                                <center>
                                    <img src="images/bank/bni.png" width="100px" align="center">
                                </center>
                                <?php
 					            }elseif ($t['pembayaran'] == "BCA") {
 						        ?>
                                <center>
                                    <img src="images/bank/bca.png" width="100px" align="center">
                                </center>
                                <?php
 					            }elseif ($t['pembayaran'] == "MANDIRI") {
 						        ?>
                                <center>
                                    <img src="images/bank/mandiri.png" width="100px" align="center">
                                </center>
                                <?php
 					                }
 				                ?>
                            </div>
                            <div class="form-group">
                                <label>Rekening Toko</label>

                                <?php 
 					if ($t['pembayaran'] == "BRI") {
 						?>
                                <input type="text" class="form-control" value="12345678" readonly="">
                                <?php
 					}elseif ($t['pembayaran'] == "BNI") {
 						?>
                                <input type="text" class="form-control" value="00000000" readonly="">
                                <?php
 					}elseif ($t['pembayaran'] == "BCA") {
 						?>
                                <input type="text" class="form-control" value="23523623" readonly="">
                                <?php
 					}elseif ($t['pembayaran'] == "MANDIRI") {
 						?>
                                <input type="text" class="form-control" value="54321" readonly="">
                                <?php
 					}
 				 ?>
                            </div>
                            <div class="form-group">
                                <label>Total Pembayaran</label>
                                <input type="text" class="form-control" value="<?php echo $t['total']; ?>" readonly="">
                            </div>
                            <div>
                                <label>Upload Bukti Pembayaran</label>
                                <input type="file" class="form-control-file" id="file" name="bukti">
                            </div>
                            <br />
                            <input type="submit" class="btn btn-outline-primary" value="Bayar" name="bayar">
                            <input type="submit" class="btn btn-outline-primary" value="Kembali" name="hapus">

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </body>

</html>
<?php
if(isset($_POST['hapus'])){
    $kd_trans = $t['kd_transaksi'];
    $hapus = mysqli_query($conn, "DELETE FROM transaksi_hotel where kd_transaksi = '$kd_trans'");
    if($hapus){
        ?>
<Script>
alert('Data Pembayaran Berhasil Dibatalkan');
document.location = "pesan-hotel.php?kd=<?= $t['kd_hotel']; ?>";
</Script>
<?php
    }
}
if(isset($_POST['bayar'])){
    $kd_trans = $t['kd_transaksi'];
    $nama_file = $_FILES['bukti']['name'];
    $source = $_FILES['bukti']['tmp_name'];
    $folder = 'images/bukti/';
    move_uploaded_file($source, $folder . $nama_file);
    $simpan = mysqli_query($conn, "UPDATE transaksi_hotel SET bukti = '$nama_file' WHERE transaksi_hotel.kd_transaksi = '$kd_trans'");
    if ($simpan) {
        ?>
<Script>
alert('Pembayaran Berhasil');
document.location = "histori-pesan-hotel.php";
</Script>
<?php
    }
}
?>