<?php
include '../../koneksi.php';
function tambah_data($data)
{

    $tahun_ajaran = $data['tahun_ajaran'];
    $semester = $data['semester'];

    // Cek apakah tahun sudah ada
    $queryCekTAHUN = "SELECT * FROM tb_tahunajaran WHERE tahun_ajaran = '$tahun_ajaran' AND semester = '$semester'";
    $resultCekTAHUN = mysqli_query($GLOBALS['conn'], $queryCekTAHUN);

    if (mysqli_num_rows($resultCekTAHUN) > 0) {
        $_SESSION['eksekusi'] = "Gagal menambahkan data. Tahun Ajaran dan Semester sudah terdaftar.";
        header("location: indexajaran.php");
        return false;
    }

    $query = "INSERT INTO tb_tahunajaran VALUES(null, '$tahun_ajaran', '$semester')";
    $sql = mysqli_query($GLOBALS['conn'], $query);

    return true;
}

function ubah_data($data)
{
    $id_tahunajaran = $data['id_tahunajaran'];
    $tahun_ajaran = $data['tahun_ajaran'];
    $semester = $data['semester'];

    $queryShow = "SELECT * FROM tb_tahunajaran WHERE id_tahunajaran = '$id_tahunajaran';";
    $sqlShow = mysqli_query($GLOBALS['conn'], $queryShow);
    $result = mysqli_fetch_assoc($sqlShow);

    // Cek apakah tahun sudah ada
    $queryCekTAHUN = "SELECT * FROM tb_tahunajaran WHERE tahun_ajaran = '$tahun_ajaran' AND semester = '$semester'";
    $resultCekTAHUN = mysqli_query($GLOBALS['conn'], $queryCekTAHUN);

    if (mysqli_num_rows($resultCekTAHUN) > 0) {
        $_SESSION['eksekusi'] = "Gagal memperbarui data. Tahun Ajaran dan Semester sudah terdaftar.";
        header("location: indexajaran.php");
        return false;
    }

    $query = "UPDATE tb_tahunajaran SET tahun_ajaran='$tahun_ajaran', semester='$semester' WHERE id_tahunajaran='$id_tahunajaran';";
    $sql = mysqli_query($GLOBALS['conn'], $query);

    return true;
}

function hapus_data($data)
{
    $id_tahunajaran = $data['hapus'];

    // Cek relasi foreign key
    if (cekRelasiForeign($id_tahunajaran)) {
        $_SESSION['eksekusi'] = "Data tidak dapat dihapus karena tahun ajaran yang ingin dihapus terdaftar pada penilaian & siswa. Jika ingin menghapus, ubah tahun ajaran yang terdaftar pada penilaian & siswa terlebih dahulu.";
        header("location: indexajaran.php");
        return false;
    }

    $query = "DELETE FROM tb_tahunajaran WHERE id_tahunajaran = '$id_tahunajaran';";
    $sql = mysqli_query($GLOBALS['conn'], $query);
    return true;
}

function cekRelasiForeign($id_tahunajaran)
{
    $query_siswa = "SELECT COUNT(*) as count FROM tb_siswa WHERE id_tahunajaran = '$id_tahunajaran'";
    $result_siswa = mysqli_query($GLOBALS['conn'], $query_siswa);

    if (!$result_siswa) {
        die("Query error: " . mysqli_error($GLOBALS['conn']));
    }

    $query_nilai = "SELECT COUNT(*) as count FROM tb_nilai WHERE id_tahunajaran = '$id_tahunajaran'";
    $result_nilai = mysqli_query($GLOBALS['conn'], $query_nilai);

    if (!$result_nilai) {
        die("Query error: " . mysqli_error($GLOBALS['conn']));
    }

    $data_siswa = mysqli_fetch_assoc($result_siswa);
    $data_nilai = mysqli_fetch_assoc($result_nilai);

    return ($data_siswa['count'] > 0) || ($data_nilai['count'] > 0);
}

?>