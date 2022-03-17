<?php
	include ("../config/koneksi.php");
	if (isset($_GET['kd_wisata'])) {
		$kd = $_GET['kd_wisata'];
		$hapus = mysqli_query($conn,"DELETE FROM wisata where kd_wisata='$kd'");
		if ($hapus) {
			echo "<script>alert('Wisata Berhasil Dihapus');document.location='manajemen-wisata.php'</script>";
		} else {
			echo "<script>alert('Wisata Gagal Dihapus');document.location='manajemen-wisata.php'</script>";
		}
	} else {
		echo "<script>alert('Wisata Belum Dipilih');document.location='manajemen-wisata.php'</script>";
	}
?>