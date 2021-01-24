<?php 
	$j = $_REQUEST['j'];
	include 'include/koneksi.php';
	$id = $_REQUEST['p'];
	$j = $_REQUEST['j'];
	$hapus = "DELETE FROM jadwal Where id_jadwal='$id' ";
	$hp = mysqli_query($db, $hapus);
	if ($hapus == true) {
		echo "
         <script>
        	alert('Delete Sukses')
   			window.location = '?page=jadwal/jadwal.php&j=$j';
         </script>';
		";
	}

	mysqli_close();
?>