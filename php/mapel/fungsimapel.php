<?php
include '../../koneksi.php';
function tambah_data($data)
{

    $nama_mapel = $data['nama_mapel'];

    // Cek apakah nama mapel sudah ada
    $queryCekMAPEL = "SELECT * FROM tb_mapel WHERE nama_mapel = '$nama_mapel'";
    $resultCekMAPEL = mysqli_query($GLOBALS['conn'], $queryCekMAPEL);

    if (mysqli_num_rows($resultCekMAPEL) > 0) {
        $_SESSION['eksekusi'] = "Gagal menambahkan data. Nama Mata Pelajaran sudah terdaftar.";
        header("location: indexmapel.php");
        return false;
    }

    $query = "INSERT INTO tb_mapel VALUES(null, '$nama_mapel')";
    $sql = mysqli_query($GLOBALS['conn'], $query);

    return true;
}

function ubah_data($data)
{
    $id_mapel = $data['id_mapel'];
    $nama_mapel = $data['nama_mapel'];

    $queryShow = "SELECT * FROM tb_mapel WHERE id_mapel = '$id_mapel';";
    $sqlShow = mysqli_query($GLOBALS['conn'], $queryShow);
    $result = mysqli_fetch_assoc($sqlShow);

    // Cek apakah nama mapel sudah ada
    $queryCekMAPEL = "SELECT * FROM tb_mapel WHERE nama_mapel = '$nama_mapel'";
    $resultCekMAPEL = mysqli_query($GLOBALS['conn'], $queryCekMAPEL);

    if (mysqli_num_rows($resultCekMAPEL) > 0) {
        $_SESSION['eksekusi'] = "Gagal memperbarui data. Nama Mata Pelajaran sudah terdaftar.";
        header("location: indexmapel.php");
        return false;
    }

    $query = "UPDATE tb_mapel SET nama_mapel='$nama_mapel' WHERE id_mapel='$id_mapel';";
    $sql = mysqli_query($GLOBALS['conn'], $query);

    return true;
}

function hapus_data($data)
{
    $id_mapel = $data['hapus'];

    // Cek relasi foreign key
    if (cekRelasiForeign($id_mapel)) {
        $_SESSION['eksekusi'] = "Data tidak dapat dihapus karena terdapat relasi dengan data lain.";
        header("location: indexmapel.php");
        return false;
    }

    $query = "DELETE FROM tb_mapel WHERE id_mapel = '$id_mapel';";
    $sql = mysqli_query($GLOBALS['conn'], $query);
    return true;
}

function cekRelasiForeign($id_mapel) {
    $query = "SELECT COUNT(*) as count FROM tb_jadwal WHERE id_mapel = '$id_mapel'";
    $result = mysqli_query($GLOBALS['conn'], $query);

    if (!$result) {
        die("Query error: " . mysqli_error($GLOBALS['conn']));
    }

    $query1 = "SELECT COUNT(*) as count FROM tb_nilai WHERE id_mapel = '$id_mapel'";
    $result1 = mysqli_query($GLOBALS['conn'], $query1);

    if (!$result1) {
        die("Query error: " . mysqli_error($GLOBALS['conn']));
    }

    $data = mysqli_fetch_assoc($result);
    $data = mysqli_fetch_assoc($result1);

    return $data['count'] > 0;
}

?>