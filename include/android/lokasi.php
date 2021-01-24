<?php

include "init.php";



if($con)
	{
		$v = '{
			"code": 200,
			"result":[';
		$sql="SELECT * from lokasi  ";
		$result=mysqli_query($con,$sql);
		if($result){

		$kode = 1;
		$pesan = "Berhasil Upload";
		while($r=mysqli_fetch_array($result,MYSQLI_ASSOC))
		{
			$ob = array('"','<br>','</br>');
			if(strlen($v)<50)
			{
				$v .= '{"id_lokasi" : "'.$r['id_lokasi'].'",
				"nama_lokasi" : "'.str_replace($ob,' ',strip_tags($r["nama_lokasi"])).'",
				"lat" :  "'.str_replace($ob,' ',strip_tags($r["lat"])).'" ,
				"lang" :  "'.str_replace($ob,' ',strip_tags($r["lang"])).'"
				}';
			}
			else
			{
				$v .= ',{"id_lokasi" : "'.$r['id_lokasi'].'",
				"nama_lokasi" : "'.str_replace($ob,' ',strip_tags($r["nama_lokasi"])).'",
				"lat" :  "'.str_replace($ob,' ',strip_tags($r["lat"])).'" ,
				"lang" :  "'.str_replace($ob,' ',strip_tags($r["lang"])).'"
				}';
			}


		}



		}

		$v .= ']}';
		echo $v;
		mysqli_close($con);
	}


?>