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
    $query = "SELECT COUNT(*) as count FROM tb_siswa WHERE id_kelas = '$id_kelas'";
    $result = mysqli_query($GLOBALS['conn'], $query);

    if (!$result) {
        die("Query error: " . mysqli_error($GLOBALS['conn']));
    }

    $query1 = "SELECT COUNT(*) as count FROM tb_guru WHERE id_kelas = '$id_kelas'";
    $result1 = mysqli_query($GLOBALS['conn'], $query1);

    if (!$result1) {
        die("Query error: " . mysqli_error($GLOBALS['conn']));
    }

    $query2 = "SELECT COUNT(*) as count FROM tb_jadwal WHERE id_kelas = '$id_kelas'";
    $result2 = mysqli_query($GLOBALS['conn'], $query2);

    if (!$result2) {
        die("Query error: " . mysqli_error($GLOBALS['conn']));
    }


    $data = mysqli_fetch_assoc($result);
    $data = mysqli_fetch_assoc($result1);
    $data = mysqli_fetch_assoc($result2);

    return $data['count'] > 0;
}

?>