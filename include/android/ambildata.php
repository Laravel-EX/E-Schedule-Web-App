<?php

require "init.php";

$user = $_GET['user'];
$password = $_GET['pass'];

$v = '{"result": [';

  $sql2 = mysqli_query($con,"SELECT * FROM user WHERE username = '$user' AND password = '$password' ORDER BY id_user DESC");
  $no=1;
  $num_rows = mysqli_num_rows($sql2);

  while ($ambil = mysqli_fetch_array($sql2)) {


   $ob = array('"','<br>','</br>');
   if($num_rows > 0 ){
 	if(strlen($v)<25)
 	{
 		$v .= '{"id" : "'.$ambil['id_user'].'",
 		"result" : "'.str_replace($ob,' ',strip_tags("Berhasil")).'"  }';
 	}
 	
   }

}
    if($num_rows == 0)
    {
        $v .= '{"id" : "0",
 		"result" : "'.str_replace($ob,' ',strip_tags("Gagal")).'"  }';
   
    }


$v .= ']}';
echo $v;

mysqli_close($con);

?>