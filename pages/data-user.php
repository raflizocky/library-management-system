<?php
include('koneksi.php');

$keyword = isset($_GET['keyword']) ? $_GET['keyword'] : '';
$sql = "SELECT * FROM tbuser WHERE iduser LIKE '%$keyword%' OR nama LIKE '%$keyword%' OR alamat LIKE '%$keyword%' ORDER BY iduser DESC";
$q_tampil_user = mysqli_query($db, $sql);
?>

<div id="label-page">
    <h3>Tampil Data User</h3>
</div>
<div id="content">
    <div id="tombol-search-container">
        <?php if (!isset($_GET['keyword'])) { ?>
            <p id="tombol-tambah-container">
                <a href="beranda.php?p=data-user-input" class="tombol">Tambah User</a>
            </p>
        <?php } else { ?>
            <p id="tombol-tambah-container">
                <a href="beranda.php?p=data-user" class="tombol">Kembali</a>
            </p>
        <?php } ?>
        <div id="search-container">
            <form method="GET" action="beranda.php">
                <input type="hidden" name="p" value="data-user">
                <input type="text" name="keyword" id="search-input" placeholder="Cari User..." value="<?php echo $keyword; ?>">
                <button type="submit" id="search-button" class="tombol" title="Cari..."><i class="fa-solid fa-magnifying-glass"></i></button>
            </form>
        </div>
    </div>
    <table id="tabel-tampil">
        <tr>
            <th id="label-tampil-no">No</th>
            <th>ID User</th>
            <th>Nama</th>
            <th>Alamat</th>
            <th id="label-opsi">Opsi</th>
        </tr>
        <?php
        $nomor = 1;
        while ($r_tampil_user = mysqli_fetch_array($q_tampil_user)) {
            ?>
            <tr>
                <td><?php echo $nomor++; ?></td>
                <td><?php echo $r_tampil_user['iduser']; ?></td>
                <td><?php echo $r_tampil_user['nama']; ?></td>
                <td><?php echo $r_tampil_user['alamat']; ?></td>
                <td>
                    <div class="tombol-opsi-container">
                        <button class="btn btn-primary tombol-custom" title="Edit Data" onclick="location.href='beranda.php?p=data-user-edit&id=<?php echo $r_tampil_user['iduser']; ?>'"><i class="fa-regular fa-pen-to-square"></i></button>
                    </div>
                    <div class="tombol-opsi-container">
                        <button class="btn btn-danger tombol-custom" title="Delete Data" onclick="location.href='proses/data-user-hapus.php?id=<?php echo $r_tampil_user['iduser']; ?>'"><i class="fa-solid fa-trash"></i></button>
                    </div>
                </td>
            </tr>
        <?php } ?>
    </table>
</div>

<script src="https://kit.fontawesome.com/96d7bcabcb.js" crossorigin="anonymous"></script>
