<?php
	include ("../config/koneksi.php");
	if (isset($_GET['id'])) {
		$ktgr = $_GET['id'];
		$hapus = mysqli_query($conn,"DELETE FROM ktgr_wisata where id_kategori='$ktgr'");
		if ($hapus) {
			echo "<script>alert('Kategori Berhasil Dihapus');document.location='manajemen-kategori.php'</script>";
		} else {
			echo "<script>alert('Kategori Gagal Dihapus');document.location='manajemen-kategori.php'</script>";
		}
	} else {
		echo "<script>alert('Kategori Belum Dipilih');document.location='manajemen-kategori.php'</script>";
	}
?>