<?php
include '../koneksi.php';
require_once '../TCPDF-main/tcpdf.php';

// Ambil data buku dari tabel tbbuku
$query = mysqli_query($db, "SELECT * FROM tbbuku");

// Buat objek TCPDF
$pdf = new TCPDF('P', 'mm', 'A4', true, 'UTF-8');

// Atur properti dokumen PDF
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Nama Penulis');
$pdf->SetTitle('Laporan Data Buku');
$pdf->SetSubject('Laporan Data Buku');
$pdf->SetKeywords('Laporan, Data Buku, Perpustakaan');

// Tambahkan halaman baru
$pdf->AddPage();

// Tambahkan judul laporan
$pdf->SetFont('helvetica', 'BU', 12);
$pdf->Cell(0, 10, 'Laporan Data Buku', 0, 1, 'C');

// Tambahkan header tabel
$pdf->SetFont('helvetica', 'B', 10);
$pdf->Cell(20, 10, 'ID Buku', 1, 0, 'C');
$pdf->Cell(60, 10, 'Judul Buku', 1, 0, 'C');
$pdf->Cell(40, 10, 'Kategori', 1, 0, 'C');
$pdf->Cell(40, 10, 'Pengarang', 1, 0, 'C');
$pdf->Cell(40, 10, 'Penerbit', 1, 0, 'C');
$pdf->Cell(20, 10, 'Status', 1, 1, 'C');

// Tambahkan data buku dari tabel tbbuku ke halaman PDF
$pdf->SetFont('helvetica', '', 10);
while ($row = mysqli_fetch_array($query)) {
    $pdf->Cell(20, 10, $row['idbuku'], 1, 0, 'C');
    $pdf->Cell(60, 10, $row['judulbuku'], 1, 0, 'L');
    $pdf->Cell(40, 10, $row['kategori'], 1, 0, 'L');
    $pdf->Cell(40, 10, $row['pengarang'], 1, 0, 'L');
    $pdf->Cell(40, 10, $row['penerbit'], 1, 0, 'L');
    $pdf->Cell(20, 10, $row['status'], 1, 1, 'C');
}

ob_end_clean();

// Outputkan file PDF
$pdf->Output('laporan_buku.pdf', 'D');

// Hentikan eksekusi skrip
exit;
?>
