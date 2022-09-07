<?php
session_start();
if (!isset($_SESSION["login"])) {
    header("Location:login.php");
    exit;
}

require 'functions.php';

if (isset($_POST["submit"])) {

    if (tambah($_POST) > 0) {
        echo "
        <script>
            alert('data berhasil ditambahkan!');
            document.location.href = 'index.php';
        </script>
        ";
    } else {

        echo " 
        <script>
            
            
        </script>
        ";
        //echo "<br>"; document.location.href = 'index.php'; alert('data gagal ditambahkan!');
        echo mysqli_error($conn);
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Aset</title>
</head>

<body>
    <h1>Tambah Data Aset</h1>
    <form action="" method="POST" enctype="multipart/form-data">
        <ul>
            <li>
                <label for="nama">Nama</label>
                <input type="text" name="nama" id="nama" required>
            </li>
            <li>
                <label for="noreg">No Registrasi</label>
                <input type="text" name="noreg" id="noreg">
            </li>
            <li>
                <label for="status">Status</label>
                <input type="text" name="status" id="status">
            </li>
            <li><label for="thn_perolehan">Tahun Perolehan</label>
                <input type="text" name="thn_perolehan" id="thn_perolehan">
            </li>
            <li><label for="kategory">Kategori</label>
                <input type="text" name="kategory" id="kategory">
            </li>
            <li><label for="no_aset">No Aset</label>
                <input type="text" name="no_aset" id="no_aset">
            </li>
            <li><label for="type">Type</label>
                <input type="text" name="type" id="type">
            </li>
            <li><label for="tgl_perolehan">Tgl Perolehan</label>
                <input type="text" name="tgl_perolehan" id="tgl_perolehan">
            </li>
            <li><label for="harga">Harga</label>
                <input type="text" name="harga" id="harga">
            </li>
            <li><label for="merk">Merk</label>
                <input type="text" name="merk" id="merk">
            </li>
            <li><label for="seri">Seri</label>
                <input type="text" name="seri" id="seri">
            </li>
            <li><label for="lokasi">Lokasi</label>
                <input type="text" name="lokasi" id="lokasi">
            </li>
            <li><label for="lantai">Lantai</label>
                <input type="text" name="lantai" id="lantai">
            </li>
            <li><label for="posisi">Posisi</label>
                <input type="text" name="posisi" id="posisi">
            </li>
            <li><label for="pengguna">Pengguna</label>
                <input type="text" name="pengguna" id="pengguna">
            </li>
            <li><label for="fisik">Fisik</label>
                <input type="text" name="fisik" Fisik="fisik">
            </li>
            <li><label for="kondisi">Kondisi</label>
                <input type="text" name="kondisi" id="kondisi">
            </li>
            <li><label for="rencana_aksi">Rencana Aksi</label>
                <input type="text" name="rencana_aksi" id="rencana_aksi">
            </li>
            <li><label for="tgl_serahterima">Tgl Serah Terima</label>
                <input type="text" name="tgl_serahterima" id="tgl_serahterima">
            </li>
            <li><label for="gambar">Gambar</label>
                <input type="file" name="gambar" id="gambar">
            </li>
            <button type="submit" name="submit">Simpan</button></li>
            <li><a href="index.php">Kembali</a></li>
        </ul>


    </form>
</body>

</html>