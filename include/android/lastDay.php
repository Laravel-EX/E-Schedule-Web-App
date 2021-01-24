<?php


require "init.php";
$a_date = "2018-09-23";
//echo date("Y-m-t", strtotime($a_date));

$start_date = "2018-05-10";
$end_date = "2018-05-15";
$date_exist = false;
// create array from data
$arrayDateAwal = dateRange( $start_date, $end_date);
$sql = mysqli_query($con,"SELECT * FROM jadwal ORDER BY id_jadwal DESC");
  $no=1;
  $num_rows = mysqli_num_rows($sql);
  $v = '{"result": [';
  $ob = array('"','<br>','</br>');
  while ($ambil = mysqli_fetch_array($sql)) {
      $start_tgl = $ambil['tgl_mulai'];
      $end_tgl = $ambil['tgl_selesai'];

      $arrayDateAkhir = array();
      $arrayDateAkhir = dateRange( $start_tgl, $end_tgl);

    for($j = 0 ; $j < sizeof($arrayDateAkhir) ; $j++ )
    {

        if(in_array($arrayDateAkhir[$j], $arrayDateAwal, TRUE))
        {
            echo "Data Penuh";
            $date_exist = true;
            break;
        }
    }

    if($date_exist){
        break;
    }else {
        $date_exist = false;
    }
    $no++;
 }

 if(!$date_exist){
     echo "Data Kosong";
 }

 echo $date_exist;

 function dateExist( $data, $dataArray){
     $exist = false;
     return $exist;
 }

 function dateRange( $first, $last, $step = '+1 day', $format = 'Y-m-d' ) {

	$dates = array();
	$current = strtotime( $first );
	$last = strtotime( $last );

	while( $current <= $last ) {

		$dates[] = date( $format, $current );
		$current = strtotime( $step, $current );
	}

	return $dates;
}

?>
