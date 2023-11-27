<?php
include '../../koneksi.php';
function tambah_data($data)
{

    $nama_kelas = $data['nama_kelas'];

    // Cek apakah kelas sudah ada
    $queryCekKELAS = "SELECT * FROM tb_kelas WHERE nama_kelas = '$nama_kelas'";
    $resultCekKELAS = mysqli_query($GLOBALS['conn'], $queryCekKELAS);

    if (mysqli_num_rows($resultCekKELAS) > 0) {
        $_SESSION['eksekusi'] = "Gagal menambahkan data. Kelas sudah terdaftar.";
        header("location: indexkelas.php");
        return false;
    }

    $query = "INSERT INTO tb_kelas VALUES(null, '$nama_kelas')";
    $sql = mysqli_query($GLOBALS['conn'], $query);

    return true;
}

function ubah_data($data)
{
    $id_kelas = $data['id_kelas'];
    $nama_kelas = $data['nama_kelas'];

    // Cek apakah kelas sudah ada
    $queryCekKELAS = "SELECT * FROM tb_kelas WHERE nama_kelas = '$nama_kelas'";
    $resultCekKELAS = mysqli_query($GLOBALS['conn'], $queryCekKELAS);

    if (mysqli_num_rows($resultCekKELAS) > 0) {
        $_SESSION['eksekusi'] = "Gagal memperbaharui data. Kelas sudah terdaftar.";
        header("location: indexkelas.php");
        return false;
    }

    $queryShow = "SELECT * FROM tb_kelas WHERE id_kelas = '$id_kelas';";
    $sqlShow = mysqli_query($GLOBALS['conn'], $queryShow);
    $result = mysqli_fetch_assoc($sqlShow);

    $query = "UPDATE tb_kelas SET nama_kelas='$nama_kelas', nama_kelas='$nama_kelas' WHERE id_kelas='$id_kelas';";
    $sql = mysqli_query($GLOBALS['conn'], $query);

    return true;
}

function hapus_data($data)
{
    $id_kelas = $data['hapus'];

    // Cek relasi foreign key
    if (cekRelasiForeign($id_kelas)) {
        $_SESSION['eksekusi'] = "Data tidak dapat dihapus karena terdapat relasi dengan data lain.";
        header("location: indexkelas.php");
        return false;
    }

    $query = "DELETE FROM tb_kelas WHERE id_kelas = '$id_kelas';";
    $sql = mysqli_query($GLOBALS['conn'], $query);
    return true;
}

function cekRelasiForeign($id_kelas)
{
    $query_siswa = "SELECT COUNT(*) as count FROM tb_siswa WHERE id_kelas = '$id_kelas'";
    $result_siswa = mysqli_query($GLOBALS['conn'], $query_siswa);

    if (!$result_siswa) {
        die("Query error: " . mysqli_error($GLOBALS['conn']));
    }

    $query_guru = "SELECT COUNT(*) as count FROM tb_guru WHERE id_kelas = '$id_kelas'";
    $result_guru = mysqli_query($GLOBALS['conn'], $query_guru);

    if (!$result_guru) {
        die("Query error: " . mysqli_error($GLOBALS['conn']));
    }

    $query_jadwal = "SELECT COUNT(*) as count FROM tb_jadwal WHERE id_kelas = '$id_kelas'";
    $result_jadwal = mysqli_query($GLOBALS['conn'], $query_jadwal);

    if (!$result_jadwal) {
        die("Query error: " . mysqli_error($GLOBALS['conn']));
    }

    $data_siswa = mysqli_fetch_assoc($result_siswa);
    $data_guru = mysqli_fetch_assoc($result_guru);
    $data_jadwal = mysqli_fetch_assoc($result_jadwal);

    return ($data_siswa['count'] > 0) || ($data_guru['count'] > 0) || ($data_jadwal['count'] > 0);
}


?>