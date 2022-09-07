<?php
//konek db
session_start();
if (!isset($_SESSION["login"])) {
    header("Location:login.php");
    exit;
}
require 'functions.php';

//pagination
//KONFIGURASI
$jumlahDataPerHalaman = 100;
$jumlahData = count(query("SELECT * FROM aset"));
$jumlahHalaman = ceil($jumlahData / $jumlahDataPerHalaman);
//floor pembulatan ke bawah, round keatas /
/* if (isset($_GET["halaman"])) {
    $halamanAktif = $_GET["halaman"];
} else {
    $halamanAktif = 1;
} */
//cara terany pengganti if
$halamanAktif = (isset($_GET["halaman"])) ? $_GET["halaman"] : 1;
$awalData = ($jumlahDataPerHalaman * $halamanAktif) - $jumlahDataPerHalaman;
$aset = query("SELECT * FROM aset ORDER BY id DESC LIMIT $awalData, $jumlahDataPerHalaman");
//tombol cari
if (isset($_POST["cari"])) {
    $aset = cari($_POST["keyword"]);
}

/* if (isset($_POST["cetakpdf"])) {
    //echo "halo";
    $aset = cari($_POST["keyword"]);
    header('Location:cetak.php');
    mencoba buat yg d print berdasarkan yang dicari tp blm selesai
} */

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="widtd=device-widtd, initial-scale=1.0">
    <title>Sistem Informasi Management Aset</title>
    <style>
        .loader {
            width: 100px;
            position: absolute;
            top: 110px;
            left: 310px;
            z-index: -1;
            display: none;
        }

        @media print {

            .logout,
            .tambah,
            .form-cari,
            .aksi {
                display: none;
            }
        }
    </style>
    <script src="js/jquery-3.6.1.min.js"></script>
    <script src="js/script.js"></script>
</head>


<body>
    <h1 align="center">Selamat Datang di Sistem Informasi Management Aset</h1>
    <br>
    <a href="tambah.php" class="tambah">Tambah Data Aset</a> || <a href="cetak.php" target="_blank">Cetak</a>
    ||
    <!-- <form action="" method="POST">
        <button type="submit" name="cetakpdf" id="tombol_cetak" href="cetak.php">Print</button>
        mencoba buat tombol cetak pdf berdasarkan yang ditampilkan setelah dicari
    </form> -->
    <br>
    <a href="logout.php" class="logout">Logout</a>
    <br>
    <form action="" method="post" class="form-cari">
        <input type="text" name="keyword" size="40" autofocus placeholder="masukan keyword pencarian" autocomplete="off" id="keyword">
        <button type="submit" name="cari" id="tombol-cari">Cari</button>

        <img src="img/Loading_icon.gif" class="loader">
    </form>
    <br>
    <!-- navigasi -->

    <?php if ($halamanAktif > 1) : ?>
        <a href="?halaman=<?= $halamanAktif - 1; ?>">&laquo;</a>
    <?php endif; ?>

    <?php
    for ($i = 1; $i <= $jumlahHalaman; $i++) : ?>
        <?php if ($i == $halamanAktif) : ?>
            <a href="?halaman=<?= $i; ?>" style="font-weight: bold; color : red;">
                <?= $i; ?></a>

        <?php else : ?>
            <a href="?halaman=<?= $i; ?>"><?= $i; ?></a>
        <?php endif; ?>
    <?php endfor;  ?>

    <?php if ($halamanAktif < $jumlahHalaman) : ?>
        <a href="?halaman=<?= $halamanAktif + 1; ?>">&raquo;</a>
    <?php endif; ?>


    <br>
    <div id="container">
        <table border="1" cellpadding="7" cellspacing="0">
            <tr bgcolor="salmon" align="center">
                <th>No</th>
                <th>Nama</th>
                <th>No. Reg</th>
                <td>Status</td>
                <td>Tahun Perolehan</td>
                <td>Kategori</td>
                <td>No Aset</td>
                <td>Type</td>
                <td>Tgl Perolehan</td>
                <td>Harga</td>
                <td>Merk</td>
                <td>Seri</td>
                <td>Lokasi</td>
                <td>Lantai</td>
                <td>Posisi</td>
                <td>Pengguna</td>
                <td>Fisik</td>
                <td>Kondisi</td>
                <td>Rencana Aksi</td>
                <td>Tgl Serah Terima</td>
                <td>Gambar</td>
                <td class="aksi">Aksi</td>
            </tr>
            <?php
            $i = 1;
            foreach ($aset as $row) : ?>
                <tr>
                    <td><?= $i ?></td>
                    <td><?= $row["nama"] ?></td>
                    <td><?= $row["noreg"] ?></td>
                    <td><?= $row["status"] ?></td>
                    <td><?= $row["thn_perolehan"] ?></td>
                    <td><?= $row["kategory"] ?></td>
                    <td><?= $row["no_aset"] ?></td>
                    <td><?= $row["type"] ?></td>
                    <td><?= $row["tgl_perolehan"] ?></td>
                    <td><?= $row["harga"] ?></td>
                    <td><?= $row["merk"] ?></td>
                    <td><?= $row["seri"] ?></td>
                    <td><?= $row["lokasi"] ?></td>
                    <td><?= $row["lantai"] ?></td>
                    <td><?= $row["posisi"] ?></td>
                    <td><?= $row["pengguna"] ?></td>
                    <td><?= $row["fisik"] ?></td>
                    <td><?= $row["kondisi"] ?></td>
                    <td><?= $row["rencana_aksi"] ?></td>
                    <td><?= $row["tgl_serahterima"] ?> </td>
                    <td><img src="<?= "img/" . $row["gambar"] ?>" width="20"></td>
                    <td class="aksi">
                        <a href="ubah.php?id=<?= $row["id"]; ?>">Ubah</a> |
                        <a href="hapus.php?id=<?= $row["id"]; ?>" onclick="return confirm('Yakin Hapus ?');">Hapus</a>
                    </td>
                </tr>
            <?php $i++;
            endforeach; ?>

        </table>
    </div>

</body>

</html>