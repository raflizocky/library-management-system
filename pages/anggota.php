<?php
include('koneksi.php');

$keyword = isset($_GET['keyword']) ? $_GET['keyword'] : '';
$sql = "SELECT * FROM tbanggota WHERE idanggota LIKE '%$keyword%' OR nama LIKE '%$keyword%' OR alamat LIKE '%$keyword%' ORDER BY idanggota DESC";
$q_tampil_anggota = mysqli_query($db, $sql);
?>

<div id="label-page">
    <h3>Tampil Data Anggota</h3>
</div>
<div id="content">
    <div id="tombol-search-container">
        <?php if (!isset($_GET['keyword'])) { ?>
            <p id="tombol-tambah-container">
                <a href="beranda.php?p=anggota-input" class="tombol">Tambah Anggota</a>
            </p>
        <?php } else { ?>
            <p id="tombol-tambah-container">
                <a href="beranda.php?p=anggota" class="tombol">Kembali</a>
            </p>
        <?php } ?>
        <div id="search-container">
            <form method="GET" action="beranda.php">
                <input type="hidden" name="p" value="anggota">
                <input type="text" name="keyword" id="search-input" placeholder="Cari Anggota..." value="<?php echo $keyword; ?>">
                <button type="submit" title="Cari..." id="search-button" class="tombol"><i class="fa-solid fa-magnifying-glass"></i></button>
            </form>
        </div>
    </div>
    <table id="tabel-tampil">
        <tr>
            <th id="label-tampil-no">No</th>
            <th>ID Anggota</th>
            <th>Nama</th>
            <th>Jenis Kelamin</th>
            <th>Alamat</th>
            <th id="label-opsi">Opsi</th>
        </tr>
        <?php
        $nomor = 1;
        while ($r_tampil_anggota = mysqli_fetch_array($q_tampil_anggota)) {
            ?>
            <tr>
                <td><?php echo $nomor++; ?></td>
                <td><?php echo $r_tampil_anggota['idanggota']; ?></td>
                <td><?php echo $r_tampil_anggota['nama']; ?></td>
                <td><?php echo $r_tampil_anggota['jeniskelamin']; ?></td>
                <td><?php echo $r_tampil_anggota['alamat']; ?></td>
                <td>
                    <div class="tombol-opsi-container">
                        <button class="btn btn-primary tombol-custom" title="Edit Data" onclick="location.href='beranda.php?p=anggota-edit&id=<?php echo $r_tampil_anggota['idanggota']; ?>'"><i class="fa-regular fa-pen-to-square"></i></button>
                    </div>
                    <div class="tombol-opsi-container">
                        <button class="btn btn-danger tombol-custom" title="Delete Data" onclick="location.href='proses/anggota-hapus.php?id=<?php echo $r_tampil_anggota['idanggota']; ?>'"><i class="fa-solid fa-trash"></i></button>
                    </div>
                </td>
            </tr>
        <?php } ?>
    </table>
</div>

<script src="https://kit.fontawesome.com/96d7bcabcb.js" crossorigin="anonymous"></script>
