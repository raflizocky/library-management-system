<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tampil Data User</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div id="label-page"><h3>Tampil Data User</h3></div>
    <div id="content">
        <p id="tombol-tambah-container"><a href="beranda.php?p=data-user-input" class="tombol">Tambah User</a></p>
        <table id="tabel-tampil">
            <tr>
                <th id="label-tampil-no">No</th>
                <th>ID User</th>
                <th>Nama</th>
                <th>Alamat</th>
                <th id="label-opsi">Opsi</th>
            </tr>
            <?php
            include 'koneksi.php';
            $sql = "SELECT * FROM tbuser ORDER BY iduser DESC";
            $q_tampil_user = mysqli_query($db, $sql);
            $nomor = 1;
            while ($r_tampil_user = mysqli_fetch_array($q_tampil_user)) {
                ?>
                <tr>
                    <td><?php echo $nomor++; ?></td>
                    <td><?php echo $r_tampil_user['iduser']; ?></td>
                    <td><?php echo $r_tampil_user['nama']; ?></td>
                    <td><?php echo $r_tampil_user['alamat']; ?></td>
                    <td><?php echo $r_tampil_user['password']; ?></td>
                    <td>
                        <div class="tombol-opsi-container">
                            <a href="beranda.php?p=data-user-edit&id=<?php echo $r_tampil_user['iduser']; ?>" class="tombol">Edit</a>
                        </div>
                        <div class="tombol-opsi-container">
                            <a href="proses/user-hapus-proses.php?id=<?php echo $r_tampil_user['iduser']; ?>" class="tombol">Hapus</a>
                        </div>
                    </td>
                </tr>
            <?php } ?>
        </table>
    </div>
</body>
</html>
