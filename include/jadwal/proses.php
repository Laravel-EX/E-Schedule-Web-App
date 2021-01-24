<?php
	include 'include/koneksi.php';

	$tombol = $_REQUEST['tombol'];
	$id = $_REQUEST['id'];
	$nama = $_REQUEST['nama'];
	$jk = $_REQUEST['jk'];
	$lokasi = $_REQUEST['lokasi'];
	$tgl_mulai = $_REQUEST['tgl1'];
	$time1 = $_REQUEST['jam1'];
	$time2 = $_REQUEST['jam2'];
	$pembicara = $_REQUEST['pembicara'];
	$peserta = $_REQUEST['peserta'];
	$j = $_REQUEST['j'];
	$konflik = '';

	if ($tombol == 'Publish') {
		if ($nama!=="") {
			$sql1 = "INSERT INTO jadwal(nama_jadwal, id_kegiatan, id_lokasi, id_peserta, tgl_mulai, jam_mulai, jam_selesai, pembicara, status, user)
					VALUES('$nama', '$jk','$lokasi', '$peserta', '$tgl_mulai', '$time1', '$time2', '$pembicara', 'publish', '$username') ";
			$query = mysqli_query($db, $sql1);

			echo "
	         <script>
	        	alert('Publish Sukses');
	   			window.location = '?page=jadwal/jadwal.php&j=$j';
	         </script>';
			";
		} else {

			echo "
	         <script>
	        	alert('Publish Gagal');
	   			window.location = '?page=jadwal/jadwal.php&j=$j';
	         </script>';
			";
		}
	} elseif ($tombol == 'Draft') {
		if ($nama!=="") {
			$sql1 = "INSERT INTO jadwal(nama_jadwal, id_kegiatan, id_lokasi, id_peserta, tgl_mulai, jam_mulai, jam_selesai, pembicara, status, user)
					VALUES('$nama', '$jk','$lokasi', '$peserta', '$tgl_mulai', '$time1', '$time2', '$pembicara', 'draft', '$username') ";
			$query = mysqli_query($db, $sql1);

			echo "
	         <script>
	        	alert('Draft Sukses')
	   			window.location = '?page=jadwal/jadwal.php&j=$j';
	         </script>';
			";
		} else {

			echo "
	         <script>
	        	alert('Draft Gagal')
	   			window.location = '?page=jadwal/jadwal.php&j=$j';
	         </script>';
			";
		}
	}
?>
