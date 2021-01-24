<?php
require "init.php";

$id_kegiatan = $_GET['idkegiatan'];
$id_lokasi = $_GET['idlokasi'];
$nama_jadwal = $_GET['namajadwal'];
$tgl_mulai = $_GET['tglmulai'];
$jam_mulai = $_GET['jammulai'];
$tgl_selesai = $_GET['tglselesai'];
$jam_selesai = $_GET['jamselesai'];
$pembicara =$_GET['pembicara'];
$status = $_GET['status'];
$user = $_GET['user'];

$sql = "INSERT INTO jadwal (id_kegiatan, id_lokasi, nama_jadwal, tgl_mulai, jam_mulai, tgl_selesai, jam_selesai, pembicara, status, user)
VALUES ('$id_kegiatan', '$id_lokasi', '$nama_jadwal', '$tgl_mulai', '$jam_mulai', '$tgl_selesai', '$jam_selesai', '$pembicara', '$status', '$user')";
$v = '{"result": [';
$ob = array('"','<br>','</br>');
if (mysqli_query($con, $sql)) {
    if(strlen($v)<25)
 	{
 		$v .= '{
 		"result" : "'.str_replace($ob,' ',strip_tags("Berhasil")).'"  }';
 	}
} else {
    $v .= '{
 		"result" : "'.str_replace($ob,' ',strip_tags("Gagal")).'"  }';
    
}
$v .= ']}';
echo $v;
mysqli_close($con);

?>