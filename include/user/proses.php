<?php 

	$tombol = $_REQUEST['tombol'];



	function tambahuser() {
		include 'include/koneksi.php';
		$user = $_REQUEST['user'];
		$pass = $_REQUEST['pass'];
		$status = $_REQUEST['status'];

		if ($user!=="") {
			$sql = "INSERT INTO user(username, password, status) VALUES('$user', '$pass', '$status')";
			$query = mysqli_query($db, $sql);

			echo "
	         <script>
	        	alert('Tambah User Sukses')
	   			window.location = '?page=user/user.php';
	         </script>';
			";
		} else {

			echo "
	         <script>
	        	alert('Tambah User Gagal')
	   			window.location = '?page=user/edit.php&p=$id';
	         </script>';
			";
		}
	}

	function edituser() {
		include 'include/koneksi.php';
		$id = $_REQUEST['id'];
		$user = $_REQUEST['user'];
		$pass = $_REQUEST['pass'];
		$status = $_REQUEST['status'];

		if ($user!=="") {
			$sql = "UPDATE user SET username = '$user', 
									  password = '$pass',
									  status = '$status'
									  WHERE id_user = '$id'";
			$query = mysqli_query($db, $sql);

			echo "
	         <script>
	        	alert('Update Sukses')
	   			window.location = '?page=user/user.php';
	         </script>';
			";
		} else {

			echo "
	         <script>
	        	alert('Update Gagal')
	   			window.location = '?page=user/edit.php&p=$id';
	         </script>';
			";
		}
	}

	$j = $_REQUEST['hapus'];
	function hapus() {
		include 'include/koneksi.php';
		$id = $_REQUEST['p'];
		$j = $_REQUEST['hapus'];
		$hapus = "DELETE FROM lokasi Where id_lokasi='$id' ";
		$hp = mysqli_query($db, $hapus);
		if ($hapus == true) {
			echo "
	         <script>
	        	alert('Delete Sukses')
	   			window.location = '?page=lokasi/lokasi.php&j=$j';
	         </script>';
			";
		}
	}


	switch ($tombol) {
		case 'Simpan':
			tambahuser();
		break;
		case 'Simpan Edit':
			edituser();
		break;
		default:
			echo "kosong";
		break;
	}

	mysqli_close();
?>