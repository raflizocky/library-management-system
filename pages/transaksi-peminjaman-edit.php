<?php
	include 'koneksi.php';

	$id_transaksi = $_GET['id'];
	$sql = "SELECT * FROM tbtransaksi WHERE idtransaksi='$id_transaksi'";
	$q_edit_transaksi = mysqli_query($db, $sql);
	$r_edit_transaksi = mysqli_fetch_array($q_edit_transaksi);
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Edit Data Transaksi Peminjaman</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
	<div id="label-page">
		<h3>Edit Data Transaksi Peminjaman</h3>
	</div>
	<div id="content">
		<form action="proses/transaksi-peminjaman-edit-proses.php" method="post">
			<table id="tabel-input">
				<tr>
					<td class="label-formulir">ID Transaksi</td>
					<td class="isian-formulir">
						<input type="text" name="id_transaksi" value="<?php echo $r_edit_transaksi['idtransaksi']; ?>" readonly="readonly" class="isian-formulir isian-formulir-border warna-formulir-disabled">
					</td>
				</tr>
				<tr>
					<td class="label-formulir">ID Anggota</td>
					<td class="isian-formulir">
						<input type="text" name="id_anggota" value="<?php echo $r_edit_transaksi['idanggota']; ?>" class="isian-formulir isian-formulir-border">
					</td>
				</tr>
				<tr>
					<td class="label-formulir">ID Buku</td>
					<td class="isian-formulir">
						<input type="text" name="id_buku" value="<?php echo $r_edit_transaksi['idbuku']; ?>" class="isian-formulir isian-formulir-border">
					</td>
				</tr>
				<tr>
					<td class="label-formulir">Tanggal Pinjam</td>
					<td class="isian-formulir">
						<input type="date" name="tgl_pinjam" value="<?php echo $r_edit_transaksi['tglpinjam']; ?>" class="isian-formulir isian-formulir-border">
					</td>
				</tr>
				<tr>
					<td class="label-formulir">Tanggal Kembali</td>
					<td class="isian-formulir">
						<input type="date" name="tgl_kembali" value="<?php echo $r_edit_transaksi['tglkembali']; ?>" class="isian-formulir isian-formulir-border">
					</td>
				</tr>
				<tr>
					<td class="label-formulir"></td>
					<td class="isian-formulir">
						<input type="submit" name="simpan" value="Simpan" id="tombol-simpan">
					</td>
				</tr>
			</table>
		</form>
	</div>
</body>

</html>
