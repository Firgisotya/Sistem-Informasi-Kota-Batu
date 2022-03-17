<?php
	include ("../config/koneksi.php");
	if (isset($_GET['kd'])) {
		$kd = $_GET['kd'];
		$hapus = mysqli_query($conn,"DELETE FROM stok_tiket where kd_tiket='$kd'");
		if ($hapus) {
			echo "<script>alert('Histori Berhasil Dihapus');document.location='histori-tiket.php'</script>";
		} else {
			echo "<script>alert('Histori Gagal Dihapus');document.location='histori-tiket.php'</script>";
		}
	} else {
		echo "<script>alert('Histori Belum Dipilih');document.location='histori-tiket.php'</script>";
	}
?>