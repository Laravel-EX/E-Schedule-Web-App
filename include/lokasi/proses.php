<?php 

	$tombol = $_REQUEST['tombol'];
	function publish(){
		include 'include/koneksi.php';
		$nama = $_REQUEST['nama'];

		if ($nama!=="") {
			$sql = "INSERT INTO lokasi (nama_lokasi) VALUES ('$nama')";
			$query = mysqli_query($db, $sql);

			echo "
	         <script>
	        	alert('Simpan Sukses')
	   			window.location = '?page=lokasi/lokasi.php';
	         </script>';
			";
		} else {

			echo "
	         <script>
	        	alert('Simpan Gagal')
	   			window.location = '?page=lokasi/lokasi.php';
	         </script>';
			";
		}
	}

	function editpublish() {
		include 'include/koneksi.php';
		$id = $_REQUEST['id'];
		$nama = $_REQUEST['nama'];

		if ($nama!=="") {
			$sql = "UPDATE lokasi SET nama_lokasi = '$nama'
									  WHERE id_lokasi = '$id'";
			$query = mysqli_query($db, $sql);

			echo "
	         <script>
	        	alert('Update Sukses')
	   			window.location = '?page=lokasi/lokasi.php';
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