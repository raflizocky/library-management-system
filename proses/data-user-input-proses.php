<?php
include '../koneksi.php';

$id_user = $_POST['id_user'];
$nama = $_POST['nama'];
$alamat = $_POST['alamat'];
$password = $_POST['password'];

if (isset($_POST['simpan'])) {
    mysqli_query($db,
        "INSERT INTO tbuser (iduser, nama, alamat, password)
        VALUES ('$id_user', '$nama', '$alamat', '$password')"
    );
    header("location:../beranda.php?p=data-user");
}
?>
