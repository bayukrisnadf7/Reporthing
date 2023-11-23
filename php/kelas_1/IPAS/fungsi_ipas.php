<?php
    include '../../../koneksi.php';
    function tambah_data($data){

        $nisn = $data['nisn'];
        $sumatif = $data['sumatif'];
        $sumatif_akhir = $data['sumatif_akhir'];
        $nilai_rapor = $data['nilai_rapor'];
        $id_mapel = $data['id_mapel'];
        $id_tahunajaran = $data['id_tahunajaran'];

        

        $query = "INSERT INTO tb_nilai VALUES('', '$sumatif', '$sumatif_akhir', '$nilai_rapor','$nisn','$id_mapel', '$id_tahunajaran' )";
        $sql = mysqli_query($GLOBALS['conn'], $query);
        
        return true;
    }

    function ubah_data($data){
        $nisn = $data['nisn'];
        $sumatif = $data['sumatif'];
        $sumatif_akhir = $data['sumatif_akhir'];
        $nilai_rapor = $data['nilai_rapor'];

        $queryShow = "SELECT * FROM tb_nilai WHERE nisn = '$nisn' AND id_mapel = 1 AND id_tahunajaran = 12;";
        $sqlShow = mysqli_query($GLOBALS['conn'], $queryShow);
        $result = mysqli_fetch_assoc($sqlShow);

        $query = "UPDATE tb_nilai SET sumatif='$sumatif', sumatif_akhir='$sumatif_akhir', nilai_rapor='$nilai_rapor' WHERE nisn='$nisn' AND id_mapel = 1 AND id_tahunajaran = 12;";
        $sql = mysqli_query($GLOBALS['conn'], $query);

        return true;
    }

    function hapus_data($data){
    $nisn = $data['hapus'];


    $query = "DELETE FROM tb_nilai WHERE nisn = '$nisn' AND id_mapel = 1 AND id_tahunajaran = 12;";
    $sql = mysqli_query($GLOBALS['conn'], $query);
    return true;
    }

?>