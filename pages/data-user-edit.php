<?php
include('koneksi.php');

$id_user = $_GET['id'];
$q_tampil_user = mysqli_query($db, "SELECT * FROM tbuser WHERE iduser='$id_user'");
$r_tampil_user = mysqli_fetch_array($q_tampil_user);
?>

<div id="label-page">
    <h3>Edit Data User</h3>
</div>
<div id="content">
    <form method="post" action="proses/data-user-edit-proses.php">
        <table id="tabel-input">
            <tr>
                <td class="label-formulir">ID User</td>
                <td class="isian-formulir">
                    <input type="text" name="id_user" value="<?php echo $r_tampil_user['iduser']; ?>" readonly>
                </td>
            </tr>
            <tr>
                <td class="label-formulir">Nama</td>
                <td class="isian-formulir">
                    <input type="text" name="nama" value="<?php echo $r_tampil_user['nama']; ?>">
                </td>
            </tr>
            <tr>
                <td class="label-formulir">Alamat</td>
                <td class="isian-formulir">
                    <input type="text" name="alamat" value="<?php echo $r_tampil_user['alamat']; ?>">
                </td>
            </tr>
            <tr>
                <td class="label-formulir">Password</td>
                <td class="isian-formulir">
                    <input type="password" name="password" value="<?php echo $r_tampil_user['password']; ?>">
                </td>
            </tr>
            <tr>
                <td class="label-formulir"></td>
                <td class="isian-formulir">
                    <input type="submit" name="simpan" value="Simpan" class="tombol">
                </td>
            </tr>
        </table>
    </form>
</div>
