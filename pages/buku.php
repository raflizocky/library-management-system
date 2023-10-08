<?php
include('koneksi.php');

$keyword = isset($_GET['keyword']) ? $_GET['keyword'] : '';
$sql = "SELECT * FROM tbbuku WHERE judulbuku LIKE '%$keyword%' OR pengarang LIKE '%$keyword%' OR penerbit LIKE '%$keyword%' ORDER BY idbuku DESC";
$q_tampil_buku = mysqli_query($db, $sql);
?>

<div id="label-page">
    <h3>Tampil Data Buku</h3>
</div>
<div id="content">
    <div id="tombol-search-container">
        <?php if (!isset($_GET['keyword'])) { ?>
            <p id="tombol-tambah-container">
                <a href="beranda.php?p=buku-input" class="tombol">Tambah Buku</a>
            </p>
        <?php } else { ?>
            <p id="tombol-tambah-container">
                <a href="beranda.php?p=buku" class="tombol">Kembali</a>
            </p>
        <?php } ?>
        <div id="search-container">
            <input type="text" id="search-input" placeholder="Cari Buku..." >
            <button id="search-button" title="Cari..." class="tombol"><i class="fa-solid fa-magnifying-glass"></i></button>
        </div>
    </div>
    <table id="tabel-tampil">
        <tr>
            <th id="label-tampil-no">No</th>
            <th>ID Buku</th>
            <th>Judul</th>
            <th>Pengarang</th>
            <th>Penerbit</th>
            <th>Status</th>
            <th id="label-opsi">Opsi</th>
        </tr>
        <?php
        $nomor = 1;
        while ($r_tampil_buku = mysqli_fetch_array($q_tampil_buku)) {
            ?>
            <tr>
                <td><?php echo $nomor++; ?></td>
                <td><?php echo $r_tampil_buku['idbuku']; ?></td>
                <td><?php echo $r_tampil_buku['judulbuku']; ?></td>
                <td><?php echo $r_tampil_buku['pengarang']; ?></td>
                <td><?php echo $r_tampil_buku['penerbit']; ?></td>
                <td><?php echo $r_tampil_buku['status']; ?></td>
                <td>
                    <div class="tombol-opsi-container">
                        <button class="btn btn-primary tombol-custom"  title="Edit Data" onclick="location.href='beranda.php?p=buku-edit&id=<?php echo $r_tampil_buku['idbuku']; ?>'"><i class="fa-regular fa-pen-to-square"></i></button>
                    </div>
                    <div class="tombol-opsi-container">
                        <button class="btn btn-danger tombol-custom"  title="Delete Data" onclick="location.href='proses/buku-hapus.php?id=<?php echo $r_tampil_buku['idbuku']; ?>'"><i class="fa-solid fa-trash"></i></button>
                    </div>
                </td>
            </tr>
        <?php } ?>
    </table>
</div>

<script>
    document.getElementById('search-input').addEventListener('keyup', function(event) {
        if (event.keyCode === 13) {
            event.preventDefault();
            document.getElementById('search-button').click();
        }
    });

    document.getElementById('search-button').addEventListener('click', function() {
        var keyword = document.getElementById('search-input').value.trim().toLowerCase();
        window.location.href = 'beranda.php?p=buku&keyword=' + keyword;
    });
</script>

<script src="https://kit.fontawesome.com/96d7bcabcb.js" crossorigin="anonymous"></script>
