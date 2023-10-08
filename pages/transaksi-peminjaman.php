<?php
include('koneksi.php');

$keyword = isset($_GET['keyword']) ? $_GET['keyword'] : '';
$sql = "SELECT * FROM tbtransaksi INNER JOIN tbanggota ON tbtransaksi.idanggota = tbanggota.idanggota INNER JOIN tbbuku ON tbtransaksi.idbuku = tbbuku.idbuku WHERE tbtransaksi.idtransaksi LIKE '%$keyword%' OR tbanggota.nama LIKE '%$keyword%' OR tbbuku.judulbuku LIKE '%$keyword%' ORDER BY tbtransaksi.idtransaksi DESC";
$q_tampil_transaksi = mysqli_query($db, $sql);
?>

<div id="label-page">
    <h3>Tampil Data Transaksi Peminjaman</h3>
</div>
<div id="content">
    <div id="tombol-search-container">
        <?php if (!isset($_GET['keyword'])) { ?>
            <p id="tombol-tambah-container">
                <a href="beranda.php?p=transaksi-peminjaman-input" class="tombol">Tambah Transaksi Peminjaman</a>
            </p>
        <?php } else { ?>
            <p id="tombol-tambah-container">
                <a href="beranda.php?p=transaksi-peminjaman" class="tombol">Kembali</a>
            </p>
        <?php } ?>
        <div id="search-container">
            <form method="GET" action="beranda.php">
                <input type="hidden" name="p" value="transaksi-peminjaman">
                <input type="text" name="keyword" id="search-input" placeholder="Cari Transaksi Peminjaman..." value="<?php echo $keyword; ?>">
                <button type="submit" title="Cari..." id="search-button" class="tombol"><i class="fa-solid fa-magnifying-glass"></i></button>
            </form>
        </div>
    </div>
    <table id="tabel-tampil">
        <tr>
            <th id="label-tampil-no">No</th>
            <th>ID Transaksi</th>
            <th>ID Anggota</th>
            <th>Nama Anggota</th>
            <th>ID Buku</th>
            <th>Judul Buku</th>
            <th>Tanggal Pinjam</th>
            <th>Tanggal Kembali</th>
            <th id="label-opsi">Opsi</th>
        </tr>
        <?php
        $nomor = 1;
        while ($r_tampil_transaksi = mysqli_fetch_array($q_tampil_transaksi)) {
            ?>
            <tr>
                <td><?php echo $nomor++; ?></td>
                <td><?php echo $r_tampil_transaksi['idtransaksi']; ?></td>
                <td><?php echo $r_tampil_transaksi['idanggota']; ?></td>
                <td><?php echo $r_tampil_transaksi['nama']; ?></td>
                <td><?php echo $r_tampil_transaksi['idbuku']; ?></td>
                <td><?php echo $r_tampil_transaksi['judulbuku']; ?></td>
                <td><?php echo $r_tampil_transaksi['tglpinjam']; ?></td>
                <td><?php echo $r_tampil_transaksi['tglkembali']; ?></td>
                <td>
                    <div class="tombol-opsi-container">
                        <button class="btn btn-primary tombol-custom" title="Edit Data" onclick="location.href='beranda.php?p=transaksi-peminjaman-edit&id=<?php echo $r_tampil_transaksi['idtransaksi']; ?>'"><i class="fa-regular fa-pen-to-square"></i></button>
                    </div>
                    <div class="tombol-opsi-container">
                        <button class="btn btn-danger tombol-custom" title="Delete Data" onclick="location.href='proses/transaksi-peminjaman-hapus.php?id=<?php echo $r_tampil_transaksi['idtransaksi']; ?>'"><i class="fa-solid fa-trash"></i></button>
                    </div>
                </td>
            </tr>
        <?php } ?>
    </table>
</div>

<script src="https://kit.fontawesome.com/96d7bcabcb.js" crossorigin="anonymous"></script>
