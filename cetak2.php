<?php
require 'functions.php';

$aset = query("SELECT * FROM aset");

$html = '<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Data Aset</title>
</head>
<body>
    <h1>Daftar Aset</h1>
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
    <td>' . $row["tgl_serahterima"] . '</td>
    </tr>';
    $i++;
}


$html .= '</table>
</body>
</html>';

echo $row["nama"];
