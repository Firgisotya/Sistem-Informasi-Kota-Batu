<?php
	include ("../config/koneksi.php");
	if (isset($_GET['kd_transaksi'])) {
		$kd = $_GET['kd_transaksi'];
		$hapus = mysqli_query($conn,"DELETE FROM transaksi_wisata where kd_transaksi='$kd'");
		if ($hapus) {
			echo "<script>alert('Histori Transaksi Berhasil Dihapus');document.location='histori-pesanan-tiket.php'</script>";
		} else {
			echo "<script>alert('Histori Transaksi Gagal Dihapus');document.location='histori-pesanan-tiket.php'</script>";
		}
	} else {
		echo "<script>alert('Kode Transaksi Belum Dipilih');document.location='histori-pesanan-tiket.php'</script>";
	}
?>