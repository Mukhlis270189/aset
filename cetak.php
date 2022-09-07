<?php
//composer require mpdf/mpdf dev-php8-support --ignore-platform-req=ext-gd pake ini utk install di composer php 8

require_once __DIR__ . '/vendor/autoload.php';
require 'functions.php';

$jumlahDataPerHalaman = 100;
$jumlahData = count(query("SELECT * FROM aset"));
$jumlahHalaman = ceil($jumlahData / $jumlahDataPerHalaman);
$halamanAktif = (isset($_GET["halaman"])) ? $_GET["halaman"] : 1;
$awalData = ($jumlahDataPerHalaman * $halamanAktif) - $jumlahDataPerHalaman;
$aset = query("SELECT * FROM aset ORDER BY id DESC LIMIT $awalData, $jumlahDataPerHalaman");

//$aset = query("SELECT * FROM aset");
//echo mysqli_error($conn);
$mpdf = new \Mpdf\Mpdf();
$html = '<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Data Aset</title>
    <link rel="stylesheet" href="css/print.css">
</head>
<body>
    <h1>Daftar Aset</h1>
     <table border="1" cellpadding="7" cellspacing="0">
            <tr bgcolor="salmon" align="center">
                <th>No</th>
                <th>Nama</th>
                <th>No. Reg</th>
                <th>Status</th>
                <th>Tahun Perolehan</th>
                <th>Kategori</th>
                <th>No Aset</th>
                <th>Type</th>
                <th>Tgl Perolehan</th>
                <th>Harga</th>
                <th>Merk</th>
                <th>Seri</th>
                <th>Lokasi</th>
                <th>Lantai</th>
                <th>Posisi</th>
                <th>Pengguna</th>
                <th>Fisik</th>
                <th>Kondisi</th>
                <th>Rencana Aksi</th>
                <th>Tgl Serah Terima</th>
                <th>Gambar</th>
                
            </tr>';

$i = 1;
foreach ($aset as $row) {
    $html .= '<tr>
    <td>' . $i++ . '</td>
    <td>' . $row["nama"] . '</td>
    <td>' . $row["noreg"] . '</td>
    <td>' . $row["status"] . '</td>
    <td>' . $row["thn_perolehan"] . '</td>
    <td>' . $row["kategory"] . '</td>
    <td>' . $row["no_aset"] . '</td>
    <td>' . $row["type"] . '</td>
    <td>' . $row["tgl_perolehan"] . '</td>
    <td>' . $row["harga"] . '</td>
    <td>' . $row["merk"] . '</td>
    <td>' . $row["seri"] . '</td>
    <td>' . $row["lokasi"] . '</td>
    <td>' . $row["lantai"] . '</td>
    <td>' . $row["posisi"] . '</td>
    <td>' . $row["pengguna"] . '</td>
    <td>' . $row["fisik"] . '</td>
    <td>' . $row["kondisi"] . '</td>
    <td>' . $row["rencana_aksi"] . '</td>
    <td>' . $row["tgl_serahterima"] . '</td>
    <td><img src="img/' . $row["gambar"] . '" width="100"></td>
    </tr>';
}


$html .= '</table>
</body>
</html>';


$mpdf->WriteHTML($html);
$mpdf->Output('daftar-aset.pdf', \Mpdf\Output\Destination::INLINE);
//$mpdf->Output('daftar-aset.pdf', \Mpdf\Output\Destination::DOWNLOAD);
