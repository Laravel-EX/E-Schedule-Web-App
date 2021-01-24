<?php

require "init.php";
/*
$jam_mulai = $_GET['jam_mulai'];
$jam_selesai = $_GET['jam_selesai'];
*/
$tgl_mulai = $_GET['tgl_mulai'];

$coba1 = $_GET['jam_mulai'];
$coba2 = $_GET['jam_selesai'];

$data1 = 10;
$data2 = 12;
$konflik = "tidak";

$jam = array(1, 2, 3, 4, 5, 6, 7, 8 ,9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24);
$sql = mysqli_query($con,"SELECT * FROM jadwal WHERE tgl_mulai = '$tgl_mulai' ORDER BY id_jadwal DESC");
  $no=1;
  $num_rows = mysqli_num_rows($sql);
  $v = '{"result": [';
  $ob = array('"','<br>','</br>');
  while ($ambil = mysqli_fetch_array($sql)) {
      $start_jam = $ambil['jam_mulai'];
      $end_jam = $ambil['jam_selesai'];
     
     //echo "data '$no'";
     //$no++;
      $iparr = explode ("\:", $start_jam);
      $iparr2 = explode ("\:", $end_jam);
      //echo (int)$iparr[0];
      for($x = (int)$iparr[0]-1 ; $x <= (int)$iparr2[0]-1; $x++ ){
        //echo $jam[$x];
        //echo "<br>";
        if($jam[$x] == $coba1 || $jam[$x] == $coba2 )
          {
              //echo "konflik di 1 '$jam[$x]'";
              //echo "<br>";
              $konflik = "konflik";
              break;
          }
    }
    //echo $konflik;
    if($konflik == "konflik"){
        //echo "ini konflik '$konflik'";
        break;
    }
    
    if($konflik == "tidak"){
        for($x = $coba1-1 ; $x <= $coba2-1; $x++ ){
            //echo $jam[$x];
            //echo "<br>";
        if($jam[$x] == (int)$iparr[0] || $jam[$x] == (int)$iparr2[0] )
            {
                //echo "konflik di 2 '$jam[$x]'";
                //echo "<br>";
                $konflik = "konflik";
                break;
        }
    
    }
        if($konflik == "konflik"){
        //echo "ini konflik '$konflik'";
        break;
    }

      //echo $end_jam;
  }
 }




/*
for($x = $data1-1 ; $x <= $data2-1; $x++ ){
    echo $jam[$x];
    echo "<br>";
    if($jam[$x] == $coba1 || $jam[$x] == $coba2 )
    {
        echo "konflik di pengulangan 1 '$jam[$x]'";
        echo "<br>";
        $konflik = "konflik";
        break;
    }
    
}

if($konflik == "tidak"){
for($x = $coba1-1 ; $x <= $coba2-1; $x++ ){
    echo $jam[$x];
    echo "<br>";
    if($jam[$x] == $data1 || $jam[$x] == $data2 )
    {
        echo "konflik di '$jam[$x]'";
        echo "<br>";
        break;
    }
}
}*/

if ($konflik == "konflik") {
    
 		$v .= '{
 		"result" : "'.str_replace($ob,' ',strip_tags("Jadwal Bentrok")).'"  }';
 	
} else if($num_rows == 0 || $konflik != "konflik") {
    $v .= '{
 		"result" : "'.str_replace($ob,' ',strip_tags("Jadwal Kosong")).'"  }';
    
}


$v .= ']}';
echo $v;

mysqli_close($con);
?>  