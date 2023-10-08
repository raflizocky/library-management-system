<?php
include '../koneksi.php';

$id_user = $_POST['id_user'];
$nama = $_POST['nama'];
$alamat = $_POST['alamat'];
$password = $_POST['password'];

if (isset($_POST['simpan'])) {
    mysqli_query($db,
        "UPDATE tbuser
        SET nama='$nama', alamat='$alamat', password='$password'
        WHERE iduser='$id_user'"
    );
    header("location:../beranda.php?p=data-user");
}
?>
