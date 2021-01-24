<?php 

	$tombol = $_REQUEST['tombol'];
	function publish(){
		include 'include/koneksi.php';
		$nama = $_REQUEST['nama'];
		$jbt = $_REQUEST['jbt'];
		$user = $_REQUEST['user'];
		$pass = $_REQUEST['pass'];

		if ($nama!=="") {
			$sql = "INSERT INTO peserta (nama_peserta, jabatan) VALUES ('$nama', '$jbt')";
			$query = mysqli_query($db, $sql);
			$id1 = mysqli_insert_id($db);

			$sql1 = "INSERT INTO user (id_peserta, username, password, status) VALUES ('$id1', '$user', '$pass', 'peserta')";
			$query1 = mysqli_query($db, $sql1);


			echo "
	         <script>
	        	alert('Simpan Sukses')
	   			window.location = '?page=peserta/peserta.php';
	         </script>';
			";
		} else {

			echo "
	         <script>
	        	alert('Simpan Gagal')
	   			window.location = '?page=peserta/peserta.php';
	         </script>';
			";
		}
	}

	function editpublish() {
		include 'include/koneksi.php';
		$id = $_REQUEST['id'];
		$nama = $_REQUEST['nama'];
		$jbt = $_REQUEST['jbt'];
		$user = $_REQUEST['user'];
		$pass = $_REQUEST['pass'];

		if ($nama!=="") {
			$sql = "UPDATE peserta SET nama_peserta = '$nama', 
									   jabatan = '$jbt', 
									   WHERE id_peserta = '$id'";
			$query = mysqli_query($db, $sql);

			$sql1 = "UPDATE user SET username = '$user', 
									   password = '$pass' 
									   WHERE id_peserta = '$id'";
			$query1 = mysqli_query($db, $sql1);

			echo "
	         <script>
	        	alert('Update Sukses')
	   			window.location = '?page=peserta/peserta.php';
	         </script>';
			";
		} else {

			echo "
	         <script>
	        	alert('Update Gagal')
	   			window.location = '?page=lokasi/edit.php&p=$id';
	         </script>';
			";
		}
	}

	$j = $_REQUEST['hapus'];
	function hapus() {
		include 'include/koneksi.php';
		$id = $_REQUEST['p'];
		$j = $_REQUEST['hapus'];
		$hapus = "DELETE FROM peserta WHERE id_peserta='$id' ";
		$hp = mysqli_query($db, $hapus);

		$hapus1 = "DELETE FROM user WHERE id_peserta='$id' ";
		$hp1 = mysqli_query($db, $hapus1);
		if ($hapus == true) {
			echo "
	         <script>
	        	alert('Delete Sukses')
	   			window.location = '?page=peserta/peserta.php&j=$j';
	         </script>';
			";
		}
	}


	switch ($tombol) {
		case 'Simpan':
			publish();
		break;
		case 'Simpan Edit':
			editpublish();
		break;
		default:
			echo "kosong";
		break;
	}

	switch ($j) {
		case 'hapus':
			hapus();
		break;
		
		default:
			echo "Kosong";
		break;
	}

	mysqli_close();
?>