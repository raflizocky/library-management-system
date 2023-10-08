<?php
	include 'koneksi.php';

	$id_buku = $_GET['id'];
	$sql = "SELECT * FROM tbbuku WHERE idbuku='$id_buku'";
	$q_edit_buku = mysqli_query($db, $sql);
	$r_edit_buku = mysqli_fetch_array($q_edit_buku);
    ?>
    <div id="label-page"><h3>Edit Data Buku</h3></div>
    <div id="content">
        <form action="proses/buku-edit-proses.php" method="post">
            <table id="tabel-input">
                <tr>
                    <td class="label-formulir">ID Buku</td>
                    <td class="isian-formulir"><input type="text" name="id_buku" value="<?php echo $r_edit_buku['idbuku']; ?>" readonly="readonly" class="isian-formulir isian-formulir-border warna-formulir-disabled"></td>
                </tr>
                <tr>
                    <td class="label-formulir">Judul</td>
                    <td class="isian-formulir"><input type="text" name="judul" value="<?php echo $r_edit_buku['judulbuku']; ?>" class="isian-formulir isian-formulir-border"></td>
                </tr>
                <tr>
                    <td class="label-formulir">Kategori</td>
                    <td class="isian-formulir"><input type="text" name="kategori" value="<?php echo $r_edit_buku['kategori']; ?>" class="isian-formulir isian-formulir-border"></td>
                </tr>
                <tr>
                    <td class="label-formulir">Pengarang</td>
                    <td class="isian-formulir"><input type="text" name="pengarang" value="<?php echo $r_edit_buku['pengarang']; ?>" class="isian-formulir isian-formulir-border"></td>
                </tr>
                <tr>
                    <td class="label-formulir">Penerbit</td>
                    <td class="isian-formulir"><input type="text" name="penerbit" value="<?php echo $r_edit_buku['penerbit']; ?>" class="isian-formulir isian-formulir-border"></td>
                </tr>
                <tr>
                    <td class="label-formulir">Status</td>
                    <td class="isian-formulir">
                        <select name="status" class="isian-formulir isian-formulir-border">
                            <option value="Tersedia" <?php if ($r_edit_buku['status'] == 'Tersedia') echo 'selected'; ?>>Tersedia</option>
                            <option value="Dipinjam" <?php if ($r_edit_buku['status'] == 'Dipinjam') echo 'selected'; ?>>Dipinjam</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td class="label-formulir"></td>
                    <td class="isian-formulir"><input type="submit" name="simpan" value="Simpan" id="tombol-simpan"></td>
                </tr>
            </table>
        </form>
    </div>
    