<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tampil Data Transaksi Peminjaman</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
    <div id="label-page">
        <h3>Tampil Data Transaksi Peminjaman</h3>
    </div>
    <div id="content">
        <p id="tombol-tambah-container"><a href="beranda.php?p=transaksi-peminjaman-input" class="tombol">Tambah Transaksi Peminjaman</a></p>
        <table id="tabel-tampil">
            <tr>
                <th id="label-tampil-no">No</th>
                <th>ID Transaksi</th>
                <th>ID Anggota</th>
                <th>ID Buku</th>
                <th>Tanggal Pinjam</th>
                <th>Tanggal Kembali</th>
                <th id="label-opsi">Opsi</th>
            </tr>
            <?php
            include 'koneksi.php';
            $sql = "SELECT * FROM tbtransaksi ORDER BY idtransaksi DESC";
            $q_tampil_transaksi = mysqli_query($db, $sql);
            $nomor = 1;
            while ($r_tampil_transaksi = mysqli_fetch_array($q_tampil_transaksi)) {
                ?>
                <tr>
                    <td><?php echo $nomor++; ?></td>
                    <td><?php echo $r_tampil_transaksi['idtransaksi']; ?></td>
                    <td><?php echo $r_tampil_transaksi['idanggota']; ?></td>
                    <td><?php echo $r_tampil_transaksi['idbuku']; ?></td>
                    <td><?php echo $r_tampil_transaksi['tglpinjam']; ?></td>
                    <td><?php echo $r_tampil_transaksi['tglkembali']; ?></td>
                    <td>
                        <div class="tombol-opsi-container">
                            <a href="beranda.php?p=transaksi-peminjaman-edit&id=<?php echo $r_tampil_transaksi['idtransaksi']; ?>" class="tombol">Edit</a>
                        </div>
                        <div class="tombol-opsi-container">
                            <a href="proses/transaksi-peminjaman-hapus.php?id=<?php echo $r_tampil_transaksi['idtransaksi']; ?>" class="tombol">Hapus</a>
                        </div>
                    </td>
                </tr>
            <?php } ?>
        </table>
    </div>
</body>

</html>
