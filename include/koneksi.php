<?php
	$host = "localhost";
	$user = "root";
	$pass = "";
	$db = "dblabura";

	$db = mysqli_connect($host, $user, $pass, $db);
	if (mysqli_connect_errno($db)) {
		echo "gagal konek".mysqli_connect_errno();
	}
?>
