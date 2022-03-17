<?php

	session_start();
	session_destroy();
	echo "<script> alert('Berhasil Logout !')</script>";
	echo "<meta http-equiv='refresh' content='1 url=index.php'>";
	
?>