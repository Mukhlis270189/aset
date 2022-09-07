<?php

session_start();
if (!isset($_SESSION["login"])) {
    header("Location:login.php");
    exit;
}

require 'functions.php';

//ambil data id
$id = $_GET["id"];
//query data aset berdasarkan id
$aset = query("SELECT * FROM aset WHERE id =$id")[0];
//panggil data dan test 1 per 1 panggi data
//var_dump($aset["nama"]);


if (isset($_POST["submit"])) {

    if (ubah($_POST) > 0) {
        echo "
        <script>
            alert('data berhasil diubah!');
            document.location.href = 'index.php';
        </script>
        ";
    } else {
        echo " 
        <script>
            alert('data gagal diubah!');
            
        </script>
        ";
        //echo "<br>"; document.location.href = 'index.php';
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
    <title>Ubah Data Aset</title>
</head>

<body>
    <h1>Ubah Data Aset</h1>
    <form action="" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?= $aset["id"]; ?>">
        <input type="hidden" name="gambarLama" value="<?= $aset["gambar"]; ?>">
        <ul>
            <li>
                <label for="nama">Nama</label>
                <input type="text" name="nama" id="nama" required value="<?= $aset["nama"]; ?>">
            </li>
            <li>
                <label for="noreg">No Registrasi</label>
                <input type="text" name="noreg" id="noreg" required value="<?= $aset["noreg"]; ?>">
            </li>
            <li>
                <label for="status">Status</label>
                <input type="text" name="status" id="status" required value="<?= $aset["status"]; ?>">
            </li>
            <li><label for="thn_perolehan">Tahun Perolehan</label>
                <input type="text" name="thn_perolehan" id="thn_perolehan" required value="<?= $aset["thn_perolehan"]; ?>">
            </li>
            <li><label for="kategory">Kategori</label>
                <input type="text" name="kategory" id="kategory" required value="<?= $aset["kategory"]; ?>">
            </li>
            <li><label for="no_aset">No Aset</label>
                <input type="text" name="no_aset" id="no_aset" required value="<?= $aset["no_aset"]; ?>">
            </li>
            <li><label for="type">Type</label>
                <input type="text" name="type" id="type" required value="<?= $aset["type"]; ?>">
            </li>
            <li><label for="tgl_perolehan">Tgl Perolehan</label>
                <input type="text" name="tgl_perolehan" id="tgl_perolehan" required value="<?= $aset["tgl_perolehan"]; ?>">
            </li>
            <li><label for="harga">Harga</label>
                <input type="text" name="harga" id="harga" required value="<?= $aset["harga"]; ?>">
            </li>
            <li><label for="merk">Merk</label>
                <input type="text" name="merk" id="merk" required value="<?= $aset["merk"]; ?>">
            </li>
            <li><label for="seri">Seri</label>
                <input type="text" name="seri" id="seri" required value="<?= $aset["seri"]; ?>">
            </li>
            <li><label for="lokasi">Lokasi</label>
                <input type="text" name="lokasi" id="lokasi" required value="<?= $aset["lokasi"]; ?>">
            </li>
            <li><label for="lantai">Lantai</label>
                <input type="text" name="lantai" id="lantai" required value="<?= $aset["lantai"]; ?>">
            </li>
            <li><label for="posisi">Posisi</label>
                <input type="text" name="posisi" id="posisi" required value="<?= $aset["posisi"]; ?>">
            </li>
            <li><label for="pengguna">Pengguna</label>
                <input type="text" name="pengguna" id="pengguna" required value="<?= $aset["pengguna"]; ?>">
            </li>
            <li><label for="fisik">Fisik</label>
                <input type="text" name="fisik" Fisik="fisik" required value="<?= $aset["fisik"]; ?>">
            </li>
            <li><label for="kondisi">Kondisi</label>
                <input type="text" name="kondisi" id="kondisi" required value="<?= $aset["kondisi"]; ?>">
            </li>
            <li><label for="rencana_aksi">Rencana Aksi</label>
                <input type="text" name="rencana_aksi" id="rencana_aksi" required value="<?= $aset["rencana_aksi"]; ?>">
            </li>
            <li><label for="tgl_serahterima">Tgl Serah Terima</label>
                <input type="text" name="tgl_serahterima" id="tgl_serahterima" required value="<?= $aset["tgl_serahterima"]; ?>">
            </li>
            <li><label for="gambar">Gambar</label><br>
                <img src="img/<?= $aset['gambar']; ?>" width="100"><br>
                <input type="file" name="gambar" id="gambar">
            </li>
            <button type="submit" name="submit">Simpan</button></li>
            <li><a href="index.php">Kembali</a></li>
        </ul>


    </form>
</body>

</html>