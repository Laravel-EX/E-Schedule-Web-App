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

		$jam = array(1, 2, 3, 4, 5, 6, 7, 8 ,9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24);
		$sql = mysqli_query($db, "SELECT * FROM jadwal WHERE tgl_mulai = '$tgl_mulai' ORDER BY id_jadwal DESC");

		$no=1;
		$num_rows = mysqli_num_rows($sql);
		$ob = array('"','<br>','</br>');

		while ($ambil = mysqli_fetch_array($sql)) {
			$start_jam = $ambil['jam_mulai'].'<br/>';
			$end_jam = $ambil['jam_selesai'];

			$iparr = explode ("\:", $start_jam);
			$iparr2 = explode ("\:", $end_jam);

			for($x = (int)$iparr[0]-1 ; $x <= (int)$iparr2[0]-1; $x++ ){
			  if($jam[$x] == $time1 || $jam[$x] == $time2 )
			    {
			        // echo "Jadwal Bentrok Di Jam $jam[$x] ";
			        // echo "<br>";
			        $konflik = "konflik";
			        break;
			    }
			}

			if ($konflik == 'konflik') {
				echo "
		         <script>
		        	alert('Jadwal Bentrok')
		   			window.location = '?page=jadwal/jadwal.php&j=$j';
		         </script>';
				";
			} else {
				if ($nama!=="") {
					$sql = "UPDATE jadwal SET id_kegiatan = '$jk',
											  id_lokasi = '$lokasi',
												id_peserta = '$peserta',
											  nama_jadwal = '$nama',
											  tgl_mulai = '$tgl_mulai',
											  jam_mulai = '$time1',
											  jam_selesai = '$time2',
											  pembicara = '$pembicara',
											  status = 'publish'
											  WHERE id_jadwal = '$id' ";
					$query = mysqli_query($db, $sql);

					echo "
			         <script>
			        	alert('Update Sukses')
			   			window.location = '?page=jadwal/jadwal.php&j=$j';
			         </script>';
					";
				} else {

					echo "
			         <script>
			        	alert('Update Gagal')
			   			window.location = '?page=jadwal/jadwal.php&j=$j';
			         </script>';
					";
				}
			}
		}
	} elseif ($tombol == 'Draft') {

		$jam = array(1, 2, 3, 4, 5, 6, 7, 8 ,9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24);
		$sql = mysqli_query($db, "SELECT * FROM jadwal WHERE tgl_mulai = '$tgl_mulai' ORDER BY id_jadwal DESC");

		$no=1;
		$num_rows = mysqli_num_rows($sql);
		$ob = array('"','<br>','</br>');

		while ($ambil = mysqli_fetch_array($sql)) {
			$start_jam = $ambil['jam_mulai'].'<br/>';
			$end_jam = $ambil['jam_selesai'];

			$iparr = explode ("\:", $start_jam);
			$iparr2 = explode ("\:", $end_jam);

			for($x = (int)$iparr[0]-1 ; $x <= (int)$iparr2[0]-1; $x++ ){
			  if($jam[$x] == $time1 || $jam[$x] == $time2 )
			    {
			        // echo "Jadwal Bentrok Di Jam $jam[$x] ";
			        // echo "<br>";
			        $konflik = "konflik";
			        break;
			    }
			}

			if ($konflik == 'konflik') {
				echo "
		         <script>
		        	alert('Jadwal Bentrok')
		   			window.location = '?page=jadwal/jadwal.php&j=$j';
		         </script>';
				";
			} else {
				if ($nama!=="") {
					$sql = "UPDATE jadwal SET id_kegiatan = '$jk',
											  id_lokasi = '$lokasi',
												id_peserta = '$peserta',
											  nama_jadwal = '$nama',
											  tgl_mulai = '$tgl_mulai',
											  jam_mulai = '$time1',
											  jam_selesai = '$time2',
											  pembicara = '$pembicara',
											  status = 'draft'
											  WHERE id_jadwal = '$id' ";
					$query = mysqli_query($db, $sql);

					echo "
			         <script>
			        	alert('Update Sukses')
			   			window.location = '?page=jadwal/jadwal.php&j=$j';
			         </script>';
					";
				} else {

					echo "
			         <script>
			        	alert('Update Gagal')
			   			window.location = '?page=jadwal/jadwal.php&j=$j';
			         </script>';
					";
				}
			}
		}
	}

?>
