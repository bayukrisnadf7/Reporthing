<?php
    include '../../koneksi.php';
    function tambah_data($data){

        $nama_mapel = $data['nama_mapel'];

        $query = "INSERT INTO tb_mapel VALUES(null, '$nama_mapel')";
        $sql = mysqli_query($GLOBALS['conn'], $query);

        return true;
    }

    function ubah_data($data){
        $id_mapel = $data['id_mapel'];
        $nama_mapel = $data['nama_mapel'];

        $queryShow = "SELECT * FROM tb_mapel WHERE id_mapel = '$id_mapel';";
        $sqlShow = mysqli_query($GLOBALS['conn'], $queryShow);
        $result = mysqli_fetch_assoc($sqlShow);

        $query = "UPDATE tb_mapel SET nama_mapel='$nama_mapel' WHERE id_mapel='$id_mapel';";
        $sql = mysqli_query($GLOBALS['conn'], $query);

        return true;
    }

    function hapus_data($data){
    $id_mapel = $data['hapus'];

    $query = "DELETE FROM tb_mapel WHERE id_mapel = '$id_mapel';";
    $sql = mysqli_query($GLOBALS['conn'], $query);
    return true;
    }

?>