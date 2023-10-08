<?php
include '../koneksi.php';

$id = $_GET['id'];

$sql = "DELETE FROM tbtransaksi WHERE idtransaksi='$id'";
$result = mysqli_query($db, $sql);

if ($result) {
    header("Location: ../beranda.php?p=transaksi-peminjaman");
    exit;
} else {
    echo "Gagal menghapus data transaksi peminjaman!";
}
?>
