<?php

	include '../koneksi.php';
	$tgl_mulai = $_REQUEST['tgl1'];
	$time1 = $_REQUEST['time1'];
	$time2 = $_REQUEST['time1'];
	$konflik = 'tidak';

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
				<p style='color: red; font-weight: bold;'>Jadwal Bentrok !!</p>
			";
		} else {
			echo "
				<p style='color: green; font-weight: bold;'>Jadwal Kosong</p>
			";
		}
	}
?>
