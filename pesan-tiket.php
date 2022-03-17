<?php

session_start();
include "config/koneksi.php";
error_reporting(0);
if (isset($_GET['kd'])) {
	$kd = $_GET['kd'];
} else {
	// echo "<script>alert('Kode Obat Belum Dipilih');document.location='index.php'</script>";
	// echo "<script>alert('Id User Belum Dipilih');document.location='index.php'</script>";
}
$data = mysqli_query($conn,"SELECT * FROM wisata where kd_wisata='$kd'");
$daftar = mysqli_fetch_array($data);
$a = $_SESSION['id'];
$b = $_SESSION['name'];
$user = mysqli_query($conn,"SELECT * FROM user where id= '$a' AND nm_user= '$b'");
$user1 = mysqli_fetch_array($user);
$tkt = mysqli_query($conn,"SELECT * FROM tiket");
$dtkt = mysqli_fetch_array($tkt);

$ambil = mysqli_query($conn,"SELECT max(kd_transaksi) as maxKode FROM transaksi_wisata");
$tampung = mysqli_fetch_array($ambil);
$kd = $tampung['maxKode'];
$noUrut = (int) substr($kd, 4, 4);
$noUrut++;
$char= "TR-";
$kd_trans = $char . sprintf("%03s", $noUrut);

date_default_timezone_set("Asia/Jakarta");
$tgl_trs = date("d-m-Y H:i:s");

?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    <title>SISBAT | Pesan Tiket</title>
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/bootstrap.bundle.js"></script>
    <!-- <script type="text/javascript">
		$(document).ready(function() {
			$('#id').change(function() { 
				var id = $(this).val(); 
				$.ajax({
					type: 'POST', 
					url: 'ajaxData.php', 
					data: 'id=' + id, 
					success: function(response) { 
						$('#sid').html(response); 
					}
				});
			});
		});
	</script> -->
</head>

<body>
    <?php
	include "navbar.php";
	?>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-7">
                <div class="card">
                    <div class="card-body">
                        <form action="" method="post">
                            <h1 align="center">Pesan Tiket</h1>
                            <div class="form-group">
                                <label for="kd_transaksi">Kode Transaksi</label>
                                <input type="text" class="form-control" id="kd_transaksi"
                                    placeholder="Masukan Kode Transaksi" required="" name="kd_transaksi"
                                    value="<?php echo $kd_trans;?>" readonly="">
                            </div>
                            <div class="form-group">
                                <label for="nm_user">Nama Pembeli</label>
                                <input type="text" class="form-control" id="nm_user" placeholder="Masukan Nama pembeli"
                                    required="" name="nm_user" value="<?php echo $user1['nm_user'];?>" readonly="">
                            </div>
                            <div class="form-group">
                                <label for="kode">Kode Wisata</label>
                                <input type="text" class="form-control" id="kd_wisata" placeholder="Masukan Kode Wisata"
                                    required="" name="kd_wisata" value="<?php echo $daftar['kd_wisata'];?>" readonly="">
                            </div>
                            <div class="form-group">
                                <label for="nm_wisata">Nama Wisata</label>
                                <input type="text" class="form-control" id="nm_wisata" placeholder="Masukan Nama Wisata"
                                    required="" name="nm_wisata" value="<?php echo $daftar['nm_wisata'];?>" readonly="">
                            </div>
                            <div class="form-group">
                                <label for="tgl_transaksi">Tanggal Transaksi</label>
                                <input type="text" class="form-control" placeholder="Masukkan Tanggal Transaksi"
                                    required="" name="tgl_transaksi" value="<?php echo $tgl_trs;?>" readonly="">
                            </div>
                            <div class="form-group">
                                <label></label>Kode Tiket</label>
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
	 						         $jsarray .= "dt['".$row['kd_tiket']."'] = { tiket:'".addslashes($row['nm_tiket'])."', harga:'".addslashes($row['harga'])."'};\n";
	 					            }
	 				                ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="tiket">Nama Tiket</label>
                                <input type="text" class="form-control" id="tiket" placeholder="Masukan Nama Tiket"
                                    required="" name="tiket" readonly="">
                            </div>
                            <div class="form-group">
                                <label for="jumlah">Jumlah</label>
                                <input type="number" class="form-control" id="jml_transaksi"
                                    placeholder="Masukan Jumlah Tiket" required="" name="jml_transaksi"
                                    onfocus="hitung()" onblur="akhir()">
                            </div>
                            <div class="form-group">
                                <label for="harga">Harga</label>
                                <input type="number" class="form-control" id="harga" placeholder="Masukan Harga Tiket"
                                    required="" name="harga" onfocus=" hitung()" onblur="akhir()" readonly="">
                            </div>
                            <div class="form-group">
                                <label for="total">Total</label>
                                <input type="number" class="form-control" id="total" placeholder="Masukan Total"
                                    required="" name="total" readonly="">
                            </div>
                            <div class="form-group">
                                <label for="pembayaran">Pembayaran</label>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="pembayaran" id="pembayaran"
                                        value="BRI">
                                    <img src="images/bank/bri.png" width="80px">
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="pembayaran" id="pembayaran"
                                        value="BCA">
                                    <img src="images/bank/bca.png" width="80px">
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="pembayaran" id="pembayaran"
                                        value="BNI">
                                    <img src="images/bank/bni.png" width="80px">
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="pembayaran" id="pembayaran"
                                        value="MANDIRI">
                                    <img src="images/bank/mandiri.png" width="80px">
                                </div>
                            </div>
                            <br />
                            <input type="submit" class="btn btn-outline-primary" value="Pesan" name="pesan">
                            <a class="btn btn-outline-primary" href="index.php" role="button">Kembali</a>
                        </form>
                        <script type="text/javascript">
                        <?php echo $jsarray; ?>

                        function changeValue(id) {
                            document.getElementById('tiket').value = dt[id].tiket;
                            document.getElementById('harga').value = dt[id].harga;
                        }

                        function hitung() {
                            Interval = setInterval("transaksi()", 1);
                        }

                        function transaksi() {
                            harga = parseInt(document.getElementById('harga').value);
                            jumlah = parseInt(document.getElementById('jml_transaksi').value);
                            total = harga * jumlah;
                            document.getElementById('total').value = total;
                        }

                        function akhir() {
                            clearInterval(Interval);
                        }
                        </script>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ==========================================================================  -->
</body>
<?php include "footer.php"; ?>

</html>
<?php 
	
if(isset($_POST['pesan'])){
	
    $kd_trs = $kd_trans;
    $id_usr = $a;
    $kd_wst = $daftar['kd_wisata'];
    $tgl_trs = $_POST['tgl_transaksi'];
    $kd_tiket = $_POST['kd_tiket'];
    $tkt = $_POST['tiket'];
    $jml_trs = $_POST['jml_transaksi'];
    $total = $_POST['total'];
    $pembayaran = $_POST['pembayaran'];
    
            $simpan = mysqli_query($conn, "INSERT INTO transaksi_wisata (kd_transaksi,id_user,kd_wisata,kd_tiket,tiket,tgl_transaksi,jml_transaksi,total,pembayaran) VALUES 
            ('$kd_trs', '$id_usr', '$kd_wst', '$kd_tiket', '$tkt', '$tgl_trs', '$jml_trs', '$total', '$pembayaran')");
            ?>
<script type="text/javascript">
document.location = "pesan-tiket2.php?kd_transaksi=<?= $kd_trans ?>";
</script>
<?php
        
    }
   
    
 ?>