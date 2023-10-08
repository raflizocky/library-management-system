<?php
include '../koneksi.php';
require_once '../TCPDF-main/tcpdf.php';

// Ambil data anggota dari tabel tbanggota
$query = mysqli_query($db, "SELECT * FROM tbanggota");

// Buat objek TCPDF
$pdf = new TCPDF('P', 'mm', 'A4', true, 'UTF-8');

// Atur properti dokumen PDF
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Nama Penulis');
$pdf->SetTitle('Laporan Data Anggota');
$pdf->SetSubject('Laporan Data Anggota');
$pdf->SetKeywords('Laporan, Data Anggota, Perpustakaan');

// Tambahkan halaman baru
$pdf->AddPage();

// Tambahkan judul laporan
$pdf->SetFont('helvetica', 'BU', 12);
$pdf->Cell(0, 10, 'Laporan Data Anggota', 0, 1, 'C');

// Tambahkan header tabel
$pdf->SetFont('helvetica', 'B', 10);
$pdf->Cell(20, 10, 'ID Anggota', 1, 0, 'C');
$pdf->Cell(40, 10, 'Nama', 1, 0, 'C');
$pdf->Cell(30, 10, 'Jenis Kelamin', 1, 0, 'C');
$pdf->Cell(70, 10, 'Alamat', 1, 1, 'C');

// Tambahkan data anggota dari tabel tbanggota ke halaman PDF
$pdf->SetFont('helvetica', '', 10);
while ($row = mysqli_fetch_array($query)) {
    $pdf->Cell(20, 10, $row['idanggota'], 1, 0, 'C');
    $pdf->Cell(40, 10, $row['nama'], 1, 0, 'L');
    $pdf->Cell(30, 10, $row['jeniskelamin'], 1, 0, 'C');
    $pdf->Cell(70, 10, $row['alamat'], 1, 1, 'L');
}

ob_end_clean();

// Outputkan file PDF
$pdf->Output('laporan_anggota.pdf', 'D');

// Hentikan eksekusi skrip
exit;
?>
