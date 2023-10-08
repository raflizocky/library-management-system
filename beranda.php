<?php
include 'koneksi.php';
$tgl = date('Y-m-d');

// Periksa jika parameter 'p' tidak ada atau bernilai 'beranda', maka atur halaman aktif ke 'beranda'
if (!isset($_GET['p']) || $_GET['p'] === 'beranda') {
	$activePage = 'beranda';
} else {
	$activePage = $_GET['p'];
}
?>
<!doctype html>
<html>
<head>
	<title>Sistem Informasi Perpustakaan</title>
	<link rel="stylesheet" href="style.css">
</head>
<body>


    <header>
            <div id="header">
                <div id="logo-perpustakaan-container">
                    <img id="logo-perpustakaan" src="images/logo-perpustakaan3.png" border=0 style="border:0; text-decoration:none; outline:none">
                </div>
                <div id="nama-alamat-perpustakaan-container">
                    <div class="nama-alamat-perpustakaan">
                        <h1> PERPUSTAKAAN UMUM </h1>
                    </div>
                    <div class="nama-alamat-perpustakaan">
                        <h4>Jl. Lembah Abang No 11, Telp: (021)55555555</h4>
                </div>
            </div>
        </div>
    </header>

    <navbar>
		<div id="header2">
			<div id="nama-user">Hai Admin!</div>
		</div>
    </navbar>
	
	<div id="container">
		<div id="sidebar">
			<a href="beranda.php">Beranda</a>
			<p class="label-navigasi">Entry Data Dan Transaksi</p>
			<ul>
				<li><a href="beranda.php?p=anggota">Data Anggota</a></li>
				<li><a href="beranda.php?p=buku">Data Buku</a></li>
				<li><a href="beranda.php?p=transaksi-peminjaman">Transaksi Peminjaman</a></li>
			</ul>
			<p class="label-navigasi">Laporan</p>
			<ul>
				<li><a href="#" onclick="confirmDownloadAnggota()">Lap. Data Anggota</a></li>
				<li><a href="#" onclick="confirmDownloadBuku()">Lap. Data Buku</a></li>
			</ul>
			<p class="label-navigasi">Admin</p>
<ul>
    <li><a href="beranda.php?p=data-user">Data User</a></li>
</ul>

		</div>
		<div id="content-container">
			<?php
			if ($activePage === 'beranda') {
				// Konten beranda
				echo '
				<div id="label-page">
					<h3>Beranda</h3>
				</div>
				<div id="content">
					<div id="beranda-judul">
						<h1>SELAMAT DATANG DI SISTEM INFORMASI PERPUSTAKAAN</h1>
					</div>
					<div id="beranda-konten">
						<h2>"MEMBACA ADALAH JENDELA DUNIA"</h2>
					</div>
				</div>
				';
			} else {
				$pages_dir = 'pages';
				$pages = scandir($pages_dir, 0);
				unset($pages[0], $pages[1]);

				// Periksa apakah halaman yang diminta ada di direktori 'pages'
				if (in_array($activePage . '.php', $pages)) {
					include($pages_dir . '/' . $activePage . '.php');
				} else {
					echo 'Halaman Tidak Ditemukan';
				}
			}
			?>
		</div>
		<div id="footer"><h3>Sistem Informasi Perpustakaan (sipus) | Praktikum </h3></div>
	</div>
	<script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
	<script>
		function confirmDownloadAnggota() {
			Swal.fire({
				title: 'Konfirmasi',
				text: 'Anda akan mengunduh laporan data anggota, lanjutkan?',
				icon: 'question',
				showCancelButton: true,
				confirmButtonText: 'Ya',
				cancelButtonText: 'Batal'
			}).then((result) => {
				if (result.isConfirmed) {
					window.location.href = 'cetak/cetak-anggota.php';
				}
			});
		}

		function confirmDownloadBuku() {
			Swal.fire({
				title: 'Konfirmasi',
				text: 'Anda akan mengunduh laporan data buku, lanjutkan?',
				icon: 'question',
				showCancelButton: true,
				confirmButtonText: 'Ya',
				cancelButtonText: 'Batal'
			}).then((result) => {
				if (result.isConfirmed) {
					window.location.href = 'cetak/cetak-buku.php';
				}
			});
		}
	</script>
</body>
</html>
