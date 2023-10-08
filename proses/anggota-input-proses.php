<?php
include '../koneksi.php';

$idanggota = $_POST['idanggota'];
$nama = $_POST['nama'];
$jenis_kelamin = $_POST['jenis_kelamin'];
$alamat = $_POST['alamat'];
$status = "Tidak Meminjam";

if (isset($_POST['simpan'])) {
    $sql = "INSERT INTO tbanggota (idanggota, nama, jeniskelamin, alamat, status) 
    VALUES ('$idanggota', '$nama', '$jenis_kelamin', '$alamat', '$status')";

    $query = mysqli_query($db, $sql);

    if ($query) {
        header("location: ../beranda.php?p=anggota");
    } else {
        echo "Error: " . mysqli_error($db);
    }
}
?>
