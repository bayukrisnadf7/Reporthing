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

    $sqlselect = mysqli_query($GLOBALS['conn'], "SELECT * FROM tb_nilai WHERE nisn = '$nisn' AND id_tahunajaran = '$id_tahunajaran'  AND id_mapel = '$id_mapel' AND id_kelas = '$id_kelas'");


    if (mysqli_num_rows($sqlselect) === 0) {

        $query = "INSERT INTO tb_nilai VALUES('$sumatif', '$sumatif_akhir', '$nilai_rapor','$nisn','$id_mapel', '$id_tahunajaran', '$id_kelas')";
        $sql = mysqli_query($GLOBALS['conn'], $query);

        $queryShow = "SELECT * FROM tb_total_nilai WHERE nisn = '$nisn' AND id_tahunajaran = 15;";
        $sqlShow = mysqli_query($GLOBALS['conn'], $queryShow);
        $result = mysqli_fetch_assoc($sqlShow);

        $query = "UPDATE tb_total_nilai SET seni_tari = '$nilai_rapor' WHERE nisn='$nisn' AND id_tahunajaran = 15 AND id_kelas = 7;";
        $sql = mysqli_query($GLOBALS['conn'], $query);
    } elseif (mysqli_num_rows($sqlselect) > 0) {
        $_SESSION['eksekusi'] = "Gagal menambahkan data. Nama sudah terdaftar.";
        header("location: indexsumatif_st.php");
        return false;

    }
    return true;
}

function ubah_data($data)
{
    $nisn = $data['nisn'];
    $sumatif = $data['sumatif'];
    $sumatif_akhir = $data['sumatif_akhir'];
    $nilai_rapor = $data['nilai_rapor'];

    $queryShow = "SELECT * FROM tb_nilai WHERE nisn = '$nisn' AND id_mapel = 5 AND id_tahunajaran = 15 AND id_kelas = 7;";
    $sqlShow = mysqli_query($GLOBALS['conn'], $queryShow);
    $result = mysqli_fetch_assoc($sqlShow);

    $query = "UPDATE tb_nilai SET sumatif='$sumatif', sumatif_akhir='$sumatif_akhir', nilai_rapor='$nilai_rapor' WHERE nisn='$nisn' AND id_mapel = 5 AND id_tahunajaran = 15 AND id_kelas = 7;";
    $sql = mysqli_query($GLOBALS['conn'], $query);

    $queryShow = "SELECT * FROM tb_total_nilai WHERE nisn = '$nisn' AND id_tahunajaran = 15;";
    $sqlShow = mysqli_query($GLOBALS['conn'], $queryShow);
    $result = mysqli_fetch_assoc($sqlShow);

    $query = "UPDATE tb_total_nilai SET seni_tari = '$nilai_rapor' WHERE nisn='$nisn' AND id_tahunajaran = 15 AND id_kelas = 7;";
    $sql = mysqli_query($GLOBALS['conn'], $query);

    return true;
}

function hapus_data($data)
{
    $nisn = $data['hapus'];


    $query = "DELETE FROM tb_nilai WHERE nisn = '$nisn' AND id_mapel = 5 AND id_tahunajaran = 15 AND id_kelas = 7;";
    $sql = mysqli_query($GLOBALS['conn'], $query);

    $queryShow = "SELECT * FROM tb_total_nilai WHERE nisn = '$nisn' AND id_tahunajaran = 15;";
    $sqlShow = mysqli_query($GLOBALS['conn'], $queryShow);
    $result = mysqli_fetch_assoc($sqlShow);

    $query = "UPDATE tb_total_nilai SET seni_tari = 0 WHERE nisn='$nisn' AND id_tahunajaran = 15 AND id_kelas = 7;";
    $sql = mysqli_query($GLOBALS['conn'], $query);



    return true;
}

?>