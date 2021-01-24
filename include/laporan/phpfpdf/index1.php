<?php
include '../../../include/koneksi.php';
$start1 = $_REQUEST['tgl1'];
$end1 = $_REQUEST['tgl2'];
$jadwal = mysqli_query($db, "SELECT * FROM jadwal INNER JOIN kegiatan ON jadwal.id_kegiatan = kegiatan.id_kegiatan INNER JOIN lokasi ON jadwal.id_lokasi = lokasi.id_lokasi WHERE tgl_mulai BETWEEN '$start1' AND '$end1' ORDER BY id_jadwal DESC");
while ($row = mysqli_fetch_array($jadwal)) {

  echo $row['nama_jadwal']."<br/>";
  echo $row['tgl_mulai']."<br/>";
  echo $row['jam_mulai']."<br/>";
  echo $row['jam_selesai']."<br/>";
  echo $row['user']."<br/>";
}

?>
