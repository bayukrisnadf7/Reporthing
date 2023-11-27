<?php
include '../../../koneksi.php';
function tambah_data($data)
{

    $nisn = $data['nisn'];
    $sumatif = $data['sumatif'];
    $sumatif_akhir = $data['sumatif_akhir'];
    $nilai_rapor = $data['nilai_rapor'];
    $id_mapel = $data['id_mapel'];
    $id_tahunajaran = $data['id_tahunajaran'];
    $id_kelas = $data['id_kelas'];
    $rata_rata = $data['rata_rata'];



    $query = "INSERT INTO tb_total_nilai (rata_rata) VALUES('$rata_rata')";
    $sql = mysqli_query($GLOBALS['conn'], $query);

    // $queryShow = "SELECT * FROM tb_total_nilai WHERE nisn = '$nisn' AND id_tahunajaran = 14;";
    // $sqlShow = mysqli_query($GLOBALS['conn'], $queryShow);
    // $result = mysqli_fetch_assoc($sqlShow);

    // $query = "UPDATE tb_total_nilai SET seni_teater = '$nilai_rapor' WHERE nisn='$nisn' AND id_tahunajaran = 14 AND id_kelas = 7;";
    // $sql = mysqli_query($GLOBALS['conn'], $query);

    return true;
}

function ubah_data($data)
{
    $nisn = $data['nisn'];
    $rata_rata = $data['rata_rata'];

    $queryShow = "SELECT * FROM tb_total_nilai WHERE nisn = '$nisn' AND id_tahunajaran = 14;";
    $sqlShow = mysqli_query($GLOBALS['conn'], $queryShow);
    $result = mysqli_fetch_assoc($sqlShow);

    $query = "UPDATE tb_total_nilai SET rata_rata = '$rata_rata' WHERE nisn='$nisn' AND id_tahunajaran = 14 AND id_kelas = 6;";
    $sql = mysqli_query($GLOBALS['conn'], $query);

    return true;
}

function hapus_data($data)
{
    $nisn = $data['hapus'];


    $query = "DELETE FROM tb_nilai WHERE nisn = '$nisn' AND id_mapel = 7 AND id_tahunajaran = 14 AND id_kelas = 6;";
    $sql = mysqli_query($GLOBALS['conn'], $query);

    $queryShow = "SELECT * FROM tb_total_nilai WHERE nisn = '$nisn' AND id_tahunajaran = 14;";
    $sqlShow = mysqli_query($GLOBALS['conn'], $queryShow);
    $result = mysqli_fetch_assoc($sqlShow);

    $query = "UPDATE tb_total_nilai SET seni_teater = 0 WHERE nisn='$nisn' AND id_tahunajaran = 14 AND id_kelas = 6;";
    $sql = mysqli_query($GLOBALS['conn'], $query);



    return true;
}

?>