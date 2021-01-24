<?php

include "init.php";



if($con)
	{
		$v = '{
			"code": 200,
			"result":[';
		$sql="SELECT * from kegiatan  ";
		$result=mysqli_query($con,$sql);
		if($result){

		$kode = 1;
		$pesan = "Berhasil Upload";
		while($r=mysqli_fetch_array($result,MYSQLI_ASSOC))
		{
			$ob = array('"','<br>','</br>');
			if(strlen($v)<50)
			{
				$v .= '{"id_kegiatan" : "'.$r['id_kegiatan'].'",
				"nama_kegiatan" : "'.str_replace($ob,' ',strip_tags($r["nama_kegiatan"])).'"
				}';
			}
			else
			{
				$v .= ',{"id_kegiatan" : "'.$r['id_kegiatan'].'",
				"nama_kegiatan" : "'.str_replace($ob,' ',strip_tags($r["nama_kegiatan"])).'"
				}';
			}


		}



		}

		$v .= ']}';
		echo $v;
		mysqli_close($con);
	}


?>