<?php
	include ("../config/koneksi.php");
	if (isset($_GET['kd_kamar'])) {
		$kd = $_GET['kd_kamar'];
		$hapus = mysqli_query($conn,"DELETE FROM stok_kamar where kd_kamar='$kd'");
		if ($hapus) {
			echo "<script>alert('Histori Berhasil Dihapus');document.location='histori-kamar.php'</script>";
		} else {
			echo "<script>alert('Histori Gagal Dihapus');document.location='histori-kamar.php'</script>";
		}
	} else {
		echo "<script>alert('Histori Belum Dipilih');document.location='histori-kamar.php'</script>";
	}
?>