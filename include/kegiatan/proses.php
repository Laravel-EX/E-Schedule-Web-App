<?php 

	$tombol = $_REQUEST['tombol'];
	function publish(){
		include 'include/koneksi.php';
		$nake = $_REQUEST['nake'];

		if ($nake!=="") {
			$sql = "INSERT INTO kegiatan (nama_kegiatan) VALUES ('$nake')";
			$query = mysqli_query($db, $sql);

			echo "
	         <script>
	        	alert('Simpan Sukses')
	   			window.location = '?page=kegiatan/kegiatan.php';
	         </script>';
			";
		} else {

			echo "
	         <script>
	        	alert('Simpan Gagal')
	   			window.location = '?page=kegiatan/kegiatan.php';
	         </script>';
			";
		}
	}

	function editpublish() {
		include 'include/koneksi.php';
		$id = $_REQUEST['id'];
		$nake = $_REQUEST['nake'];

		if ($nake!=="") {
			$sql = "UPDATE kegiatan SET nama_kegiatan = '$nake'
									  WHERE id_kegiatan = '$id'";
			$query = mysqli_query($db, $sql);

			echo "
	         <script>
	        	alert('Update Sukses')
	   			window.location = '?page=kegiatan/kegiatan.php';
	         </script>';
			";
		} else {

			echo "
	         <script>
	        	alert('Update Gagal')
	   			window.location = '?page=kegiatan/edit.php&p=$id';
	         </script>';
			";
		}
	}

	$j = $_REQUEST['hapus'];
	function hapus() {
		include 'include/koneksi.php';
		$id = $_REQUEST['p'];
		$j = $_REQUEST['hapus'];
		$hapus = "DELETE FROM kegiatan Where id_kegiatan='$id' ";
		$hp = mysqli_query($db, $hapus);
		if ($hapus == true) {
			echo "
	         <script>
	        	alert('Delete Sukses')
	   			window.location = '?page=kegiatan/kegiatan.php&j=$j';
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