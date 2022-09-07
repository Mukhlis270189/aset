<?php
usleep(500000);
require '../functions.php';
$keyword = $_GET['keyword'];
$query = "SELECT * FROM aset
    WHERE
    nama LIKE '%$keyword%' OR
    noreg LIKE '%$keyword%' OR
    status LIKE '%$keyword%' OR
    thn_perolehan LIKE '%$keyword%' OR
    kategory LIKE '%$keyword%' OR
    no_aset LIKE '%$keyword%' OR
    type LIKE '%$keyword%' OR
    tgl_perolehan LIKE '%$keyword%' OR
    harga LIKE '%$keyword%' OR
    merk LIKE '%$keyword%' OR
    seri LIKE '%$keyword%' OR
    lokasi LIKE '%$keyword%' OR
    lantai LIKE '%$keyword%' OR
    posisi LIKE '%$keyword%' OR
    pengguna LIKE '%$keyword%' OR
    fisik LIKE '%$keyword%' OR
    kondisi LIKE '%$keyword%' OR
    rencana_aksi LIKE '%$keyword%' OR
    tgl_serahterima LIKE '%$keyword%' OR
    gambar LIKE '%$keyword%' 
    ";

$aset = query($query);
//var_dump($aset);

?>
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
        <td>Aksi</td>
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
            <td>
                <a href="ubah.php?id=<?= $row["id"]; ?>">Ubah</a> |
                <a href="hapus.php?id=<?= $row["id"]; ?>" onclick="return confirm('Yakin Hapus ?');">Hapus</a>
            </td>
        </tr>
    <?php $i++;
    endforeach; ?>

</table>