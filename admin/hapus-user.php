<?php
	include ("../config/koneksi.php");
	if (isset($_GET['id'])) {
		$id = $_GET['id'];
		$hapus = mysqli_query($conn,"DELETE FROM user where id='$id'");
		if ($hapus) {
			echo "<script>alert('ID Berhasil Dihapus');document.location='manajemen-user.php'</script>";
		} else {
			echo "<script>alert('ID Gagal Dihapus');document.location='manajemen-user.php'</script>";
		}
	} else {
		echo "<script>alert('ID Belum Dipilih');document.location='manajemen-user.php'</script>";
	}
?>