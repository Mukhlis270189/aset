<?php
$conn = mysqli_connect("localhost", "root", "", "SIMUT");
//$result = query($conn,"SELECT * FROM aset");



function query($query)
{
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

function tambah($data)
{
    global $conn;
    $nama = htmlspecialchars($data["nama"]);
    $noreg = htmlspecialchars($data["noreg"]);
    $status = htmlspecialchars($data["status"]);
    $thn_perolehan = htmlspecialchars($data["thn_perolehan"]);
    $kategory = htmlspecialchars($data["kategory"]);
    $no_aset = htmlspecialchars($data["no_aset"]);
    $type = htmlspecialchars($data["type"]);
    $tgl_perolehan = htmlspecialchars($data["tgl_perolehan"]);
    $harga = htmlspecialchars($data["harga"]);
    $merk = htmlspecialchars($data["merk"]);
    $seri = htmlspecialchars($data["seri"]);
    $lokasi = htmlspecialchars($data["lokasi"]);
    $lantai = htmlspecialchars($data["lantai"]);
    $posisi = htmlspecialchars($data["posisi"]);
    $pengguna = htmlspecialchars($data["pengguna"]);
    $fisik = htmlspecialchars($data["fisik"]);
    $kondisi = htmlspecialchars($data["kondisi"]);
    $rencana_aksi = htmlspecialchars($data["rencana_aksi"]);
    $tgl_serahterima = htmlspecialchars($data["tgl_serahterima"]);
    //upload gambar
    $gambar = upload();
    if (!$gambar) {
        return false;
    }

    $query = "INSERT INTO aset
    VALUES
    ('','$nama','$noreg','$status','$thn_perolehan','$kategory','$no_aset','$type','$tgl_perolehan','$harga',
    '$merk','$seri','$lokasi','$lantai','$posisi','$pengguna','$fisik','$kondisi','$rencana_aksi','$tgl_serahterima','$gambar')
    ";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function hapus($id)
{
    global $conn;
    mysqli_query($conn, "DELETE FROM aset WHERE id = $id");
    return mysqli_affected_rows($conn);
}

function ubah($data)
{
    global $conn;
    $id = $data["id"];
    $nama = htmlspecialchars($data["nama"]);
    $noreg = htmlspecialchars($data["noreg"]);
    $status = htmlspecialchars($data["status"]);
    $thn_perolehan = htmlspecialchars($data["thn_perolehan"]);
    $kategory = htmlspecialchars($data["kategory"]);
    $no_aset = htmlspecialchars($data["no_aset"]);
    $type = htmlspecialchars($data["type"]);
    $tgl_perolehan = htmlspecialchars($data["tgl_perolehan"]);
    $harga = htmlspecialchars($data["harga"]);
    $merk = htmlspecialchars($data["merk"]);
    $seri = htmlspecialchars($data["seri"]);
    $lokasi = htmlspecialchars($data["lokasi"]);
    $lantai = htmlspecialchars($data["lantai"]);
    $posisi = htmlspecialchars($data["posisi"]);
    $pengguna = htmlspecialchars($data["pengguna"]);
    $fisik = htmlspecialchars($data["fisik"]);
    $kondisi = htmlspecialchars($data["kondisi"]);
    $rencana_aksi = htmlspecialchars($data["rencana_aksi"]);
    $tgl_serahterima = htmlspecialchars($data["tgl_serahterima"]);
    $gambarLama = htmlspecialchars($data["gambarLama"]);
    //cek apakah user pilih gambar baru atau tidak
    if ($_FILES['gambar']['error'] === 4) {
        $gambar = $gambarLama;
    } else {
        $gambar = upload();
    }


    $query = "UPDATE aset SET
    
    nama = '$nama',
    noreg = '$noreg',
    status = '$status',
    thn_perolehan = '$thn_perolehan',
    kategory = '$kategory',
    no_aset = '$no_aset',
    type = '$type',
    tgl_perolehan = '$tgl_perolehan',
    harga = '$harga',
    merk = '$merk',
    seri = '$seri',
    lokasi = '$lokasi',
    lantai = '$lantai',
    posisi = '$posisi',
    pengguna = '$pengguna',
    fisik = '$fisik',
    kondisi = '$kondisi',
    rencana_aksi = '$rencana_aksi',
    tgl_serahterima = '$tgl_serahterima',
    gambar = '$gambar'
    WHERE id = $id ";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function cari($keyword)
{
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
    return query($query);
}

function upload()
{

    $namaFile = $_FILES['gambar']['name'];
    $ukuranFile = $_FILES['gambar']['size'];
    $error = $_FILES['gambar']['error'];
    $tmpName = $_FILES['gambar']['tmp_name'];
    //cek apakah tidak ada gambar yang diupload
    if ($error === 4) {
        echo "<script>
            alert('pilih gambar terlebih dahulu');
        </script>";
        return false;
    }
    //cek apakah anda upload gambar
    $ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
    $ekstensiGambar = explode('.', $namaFile);
    $ekstensiGambar = strtolower(end($ekstensiGambar));
    if (!in_array($ekstensiGambar, $ekstensiGambarValid)) {
        echo "<script>
            alert('yang anda upload bukan gambar !');
        </script>";
        return false;
    }
    //cek jika ukurannya terlalu besar
    if ($ukuranFile > 1000000) {
        echo "
        <script>
            alert('ukuran gambar terlalu besar');
        </script>";
        return false;
    }

    //generate nama file baru
    $namaFileBaru = uniqid();
    $namaFileBaru .= '.';
    $namaFileBaru .= $ekstensiGambar;

    //lolos pengecekan. gambar siap diupload
    move_uploaded_file($tmpName, 'img/' . $namaFileBaru);
    return $namaFileBaru;
}

function registrasi($data)
{
    global $conn;
    //strtolowwer = agar huruf yg d masukan kecil semua dan striplashes agar tdak ada strip
    $username = strtolower(stripslashes($data["username"]));
    // utk memungkinan user memasukan tanda strip di password
    $password = mysqli_real_escape_string($conn, $data["password"]);
    $password2 = mysqli_real_escape_string($conn, $data['password2']);
    //cek username sdh ada atau belum
    $result = mysqli_query($conn, "SELECT username FROM user WHERE username = '$username'");
    if (mysqli_fetch_assoc($result)) {
        echo "
    <script>
        alert('username sudah terdaftar')
    </script>
    ";
        return false;
    }

    //cek konfirmasi password
    if ($password !== $password2) {
        echo "
        <script>
        alert('password dan konfirmasi password berbeda !')
        </script>
        ";
        return false;
        # code...
    }

    // enkripsi password
    $password = password_hash($password, PASSWORD_DEFAULT);
    //var_dump($password);
    //die;
    //tambah user baru ke database
    mysqli_query($conn, "INSERT INTO user VALUES ('','$username','$password')");
    return mysqli_affected_rows($conn);
}
