<?php
// memanggil library FPDF
include '../../../include/koneksi.php';
$start1 = $_REQUEST['tgl1'];
$end1 = $_REQUEST['tgl2'];
$tombol = $_REQUEST['tombol'];

include 'fpdf.php';
if ($tombol=="Lihat Laporan") {
  // intance object dan memberikan pengaturan halaman PDF
  $pdf = new FPDF('l','mm','A5');
  // membuat halaman baru
  $pdf->AddPage();
  // setting jenis font yang akan digunakan
  $pdf->SetFont('Arial','B',16);
  // mencetak string
  $pdf->Cell(190,7,'REKAPITULASI DATA LAPORAN LABURA',0,1,'C');
  $pdf->SetFont('Arial','B',12);

  // Memberikan space kebawah agar tidak terlalu rapat
  $pdf->Cell(10,7,'',0,1);

  $pdf->SetFont('Arial','B',10);
  $pdf->Cell(85,6,'Nama Jadwal',1,0);
  $pdf->Cell(30,6,'Tanggal Mulai',1,0);
  $pdf->Cell(27,6,'Jam Mulai',1,0);
  $pdf->Cell(25,6,'Jam Selesai',1,1);

  $pdf->SetFont('Arial','',10);

  $jadwal = mysqli_query($db, "SELECT * FROM jadwal INNER JOIN kegiatan ON jadwal.id_kegiatan = kegiatan.id_kegiatan INNER JOIN lokasi ON jadwal.id_lokasi = lokasi.id_lokasi WHERE tgl_mulai BETWEEN '$start1' AND '$end1' ORDER BY id_jadwal DESC");
  while ($row = mysqli_fetch_array($jadwal)){
      $pdf->Cell(85,6,$row['nama_jadwal'],1,0);
      $pdf->Cell(30,6,$row['tgl_mulai'],1,0);
      $pdf->Cell(27,6,$row['jam_mulai'],1,0);
      $pdf->Cell(25,6,$row['jam_selesai'],1,1);
  }
} else if ($tombol == "Laporan Instansi") {
  // intance object dan memberikan pengaturan halaman PDF
  $pdf = new FPDF('l','mm','A5');
  // membuat halaman baru
  $pdf->AddPage();
  // setting jenis font yang akan digunakan
  $pdf->SetFont('Arial','B',16);
  // mencetak string
  $pdf->Cell(190,7,'REKAPITULASI DATA LAPORAN INSTANSI',0,1,'C');
  $pdf->SetFont('Arial','B',12);

  // Memberikan space kebawah agar tidak terlalu rapat
  $pdf->Cell(10,7,'',0,1);

  $pdf->SetFont('Arial','B',10);
  $pdf->Cell(50,6,'NAMA JADWAL',1,0);
  $pdf->Cell(35,6,'TANGGAL MULAI',1,0);
  $pdf->Cell(30,6,'JAM MULAI',1,0);
  $pdf->Cell(25,6,'JAM SELESAI',1,0);
  $pdf->Cell(25,6,'USER',1,1);

  $pdf->SetFont('Arial','',10);

  $jadwal = mysqli_query($db, "SELECT * FROM jadwal INNER JOIN kegiatan ON jadwal.id_kegiatan = kegiatan.id_kegiatan INNER JOIN lokasi ON jadwal.id_lokasi = lokasi.id_lokasi WHERE tgl_mulai BETWEEN '$start1' AND '$end1' ORDER BY user DESC");
  while ($row = mysqli_fetch_array($jadwal)){
    $pdf->Cell(50,6,$row['nama_jadwal'],1,0);
    $pdf->Cell(35,6,$row['tgl_mulai'],1,0);
    $pdf->Cell(30,6,$row['jam_mulai'],1,0);
    $pdf->Cell(25,6,$row['jam_selesai'],1,0);
    $pdf->Cell(25,6,$row['user'],1,1);
  }
}

$pdf->Output();
?>
