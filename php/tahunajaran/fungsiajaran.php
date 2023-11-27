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

    $query = "DELETE FROM tb_tahunajaran WHERE id_tahunajaran = '$id_tahunajaran';";
    $sql = mysqli_query($GLOBALS['conn'], $query);
    return true;
}

?>