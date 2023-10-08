<?php
include '../koneksi.php';

$id_transaksi = $_POST['id_transaksi'];
$id_anggota = $_POST['id_anggota'];
$id_buku = $_POST['id_buku'];
$tgl_pinjam = $_POST['tgl_pinjam'];
$tgl_kembali = $_POST['tgl_kembali'];

$sql = "UPDATE tbtransaksi SET idanggota='$id_anggota', idbuku='$id_buku', tglpinjam='$tgl_pinjam', tglkembali='$tgl_kembali' WHERE idtransaksi='$id_transaksi'";
$query = mysqli_query($db, $sql);

if ($query) {
    header("Location: ../beranda.php?p=transaksi-peminjaman");
    exit;
} else {
    echo "Gagal menyimpan perubahan data.";
}
?>
