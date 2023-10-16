<?php
    include '../../koneksi.php';
    function tambah_data($data){

        $id_mapel = $data['id_mapel'];
        $nama_mapel = $data['nama_mapel'];
        $kkm = $data['kkm'];

        $query = "INSERT INTO tb_mapel VALUES('$id_mapel', '$nama_mapel', '$kkm')";
        $sql = mysqli_query($GLOBALS['conn'], $query);

        return true;
    }

    function ubah_data($data){
        $id_mapel = $data['id_mapel'];
        $nama_mapel = $data['nama_mapel'];
        $kkm = $data['kkm'];

        $queryShow = "SELECT * FROM tb_kelas WHERE id_kelas = '$id_mapel';";
        $sqlShow = mysqli_query($GLOBALS['conn'], $queryShow);
        $result = mysqli_fetch_assoc($sqlShow);

        $query = "UPDATE tb_mapel SET id_kelas='$id_mapel', nama_kelas='$nama_mapel', kkm='$kkm' WHERE id_kelas='$id_mapel';";
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