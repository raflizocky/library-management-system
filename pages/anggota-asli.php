<?php
include('koneksi.php');
?>

<div id="label-page">
    <h3>Tampil Data Anggota</h3>
</div>
<div id="content">
    <div id="tombol-tambah-container">
        <a href="beranda.php?p=anggota-input" class="tombol">Tambah Anggota</a>
    </div>
    <table id="tabel-tampil">
        <tr>
            <th id="label-tampil-no">No</th>
            <th>ID Anggota</th>
            <th>Nama</th>
            <th>Jenis Kelamin</th>
            <th>Alamat</th>
            <th>Status</th>
            <th id="label-opsi">Opsi</th>
        </tr>
        <?php
        $query = "SELECT * FROM tbanggota";
        $result = mysqli_query($db, $query);
        $nomor = 1;
        while ($row = mysqli_fetch_assoc($result)) {
            ?>
            <tr>
                <td><?php echo $nomor++; ?></td>
                <td><?php echo $row['idanggota']; ?></td>
                <td><?php echo $row['nama']; ?></td>
                <td><?php echo $row['jeniskelamin']; ?></td>
                <td><?php echo $row['alamat']; ?></td>
                <td><?php echo $row['status']; ?></td>
                <td>
                    <div class="tombol-opsi-container">
                        <a href="beranda.php?p=anggota-edit&id=<?php echo $row['idanggota']; ?>" class="tombol">Edit</a>
                    </div>
                    <div class="tombol-opsi-container">
                        <a href="proses/anggota-hapus.php?id=<?php echo $row['idanggota']; ?>" class="tombol" onclick="return confirm('Anda yakin akan menghapus anggota ini?')">Hapus</a>
                    </div>
                </td>
            </tr>
        <?php } ?>
    </table>
</div>
