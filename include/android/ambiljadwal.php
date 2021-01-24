<?php

include "init.php";


$user = $_GET['user'];

if($con)
	{
		$v = '{
			"code": 200,
			"result":[';
		$sql="SELECT * from jadwal where user = '$user' and status = 'publish' ";
		$result=mysqli_query($con,$sql);
		if($result){

		$kode = 1;
		$pesan = "Berhasil Upload";
		while($r=mysqli_fetch_array($result,MYSQLI_ASSOC))
		{
			$ob = array('"','<br>','</br>');
			if(strlen($v)<50)
			{
				$v .= '{"id_jadwal" : "'.$r['id_jadwal'].'",
				"id_kegiatan" : "'.str_replace($ob,' ',strip_tags($r["id_kegiatan"])).'",
				"id_lokasi" :  "'.str_replace($ob,' ',strip_tags($r["id_lokasi"])).'" ,
				"nama_jadwal" :  "'.str_replace($ob,' ',strip_tags($r["nama_jadwal"])).'",
				"tgl_mulai" :  "'.str_replace($ob,' ',strip_tags($r["tgl_mulai"])).'",
				"jam_mulai" :  "'.str_replace($ob,' ',strip_tags($r["jam_mulai"])).'",
				"tgl_selesai" :  "'.str_replace($ob,' ',strip_tags($r["tgl_selesai"])).'",
				"jam_selesai" :  "'.str_replace($ob,' ',strip_tags($r["jam_selesai"])).'",
				"pembicara" :  "'.str_replace($ob,' ',strip_tags($r["pembicara"])).'"
				}';
			}
			else
			{
				$v .= ',{"id_jadwal" : "'.$r['id_jadwal'].'",
				"id_kegiatan" : "'.str_replace($ob,' ',strip_tags($r["id_kegiatan"])).'",
				"id_lokasi" :  "'.str_replace($ob,' ',strip_tags($r["id_lokasi"])).'" ,
				"nama_jadwal" :  "'.str_replace($ob,' ',strip_tags($r["nama_jadwal"])).'",
				"tgl_mulai" :  "'.str_replace($ob,' ',strip_tags($r["tgl_mulai"])).'",
				"jam_mulai" :  "'.str_replace($ob,' ',strip_tags($r["jam_mulai"])).'",
				"tgl_selesai" :  "'.str_replace($ob,' ',strip_tags($r["tgl_selesai"])).'",
				"jam_selesai" :  "'.str_replace($ob,' ',strip_tags($r["jam_selesai"])).'",
				"pembicara" :  "'.str_replace($ob,' ',strip_tags($r["pembicara"])).'"
				}';
			}


		}



		}

		$v .= ']}';
		echo $v;
		mysqli_close($con);
	}


?>