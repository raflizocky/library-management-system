<?php
include '../koneksi.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $idtransaksi = $_POST['idtransaksi'];
    $idanggota = $_POST['idanggota'];
    $idbuku = $_POST['idbuku'];
    $tglpinjam = $_POST['tglpinjam'];
    $tglkembali = $_POST['tglkembali'];

    $sql = "INSERT INTO tbtransaksi (idtransaksi, idanggota, idbuku, tglpinjam, tglkembali) VALUES ('$idtransaksi', '$idanggota', '$idbuku', '$tglpinjam', '$tglkembali')";
    $result = mysqli_query($db, $sql);

    if ($result) {
        header("Location: ../beranda.php?p=transaksi-peminjaman");
        exit;
    } else {
        echo "Gagal menambahkan data transaksi peminjaman!";
    }
} else {
    echo "Metode request tidak valid!";
}
?>
