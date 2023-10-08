<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Input Data Transaksi Peminjaman</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <div id="label-page">
        <h3>Input Data Transaksi Peminjaman</h3>
    </div>
    <div id="content">
        <form action="proses/transaksi-peminjaman-input-proses.php" method="post">
            <table id="tabel-input">
                <tr>
                    <td class="label-formulir">ID Transaksi</td>
                    <td class="isian-formulir">
                        <input type="text" name="idtransaksi" class="isian-formulir isian-formulir-border" required>
                    </td>
                </tr>
                <tr>
                    <td class="label-formulir">ID Anggota</td>
                    <td class="isian-formulir">
                        <input type="text" name="idanggota" class="isian-formulir isian-formulir-border" required>
                    </td>
                </tr>
                <tr>
                    <td class="label-formulir">ID Buku</td>
                    <td class="isian-formulir">
                        <input type="text" name="idbuku" class="isian-formulir isian-formulir-border" required>
                    </td>
                </tr>
                <tr>
                    <td class="label-formulir">Tanggal Pinjam</td>
                    <td class="isian-formulir">
                        <input type="date" name="tglpinjam" class="isian-formulir isian-formulir-border" required>
                    </td>
                </tr>
                <tr>
                    <td class="label-formulir">Tanggal Kembali</td>
                    <td class="isian-formulir">
                        <input type="date" name="tglkembali" class="isian-formulir isian-formulir-border" required>
                    </td>
                </tr>
                <tr>
                    <td class="label-formulir"></td>
                    <td class="isian-formulir">
                        <input type="submit" name="submit" value="Simpan" id="tombol-simpan">
                    </td>
                </tr>
            </table>
        </form>
    </div>
</body>
</html>
