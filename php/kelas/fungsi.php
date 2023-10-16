<?php
    include '../../koneksi.php';
    function tambah_data($data){

        $id_kelas = $data['id_kelas'];
        $nama_kelas = $data['nama_kelas'];
        $id_guru = $data['id_guru'];

        $query = "INSERT INTO tb_kelas VALUES('$id_kelas', '$nama_kelas', '$id_guru')";
        $sql = mysqli_query($GLOBALS['conn'], $query);

        return true;
    }

    function ubah_data($data){
        $id_kelas = $data['id_kelas'];
        $nama_kelas = $data['nama_kelas'];
        $id_guru = $data['id_guru'];

        $queryShow = "SELECT * FROM tb_kelas WHERE id_kelas = '$id_kelas';";
        $sqlShow = mysqli_query($GLOBALS['conn'], $queryShow);
        $result = mysqli_fetch_assoc($sqlShow);

        $query = "UPDATE tb_kelas SET id_kelas='$id_kelas', nama_kelas='$nama_kelas', id_guru='$id_guru' WHERE id_kelas='$id_kelas';";
        $sql = mysqli_query($GLOBALS['conn'], $query);

        return true;
    }

    function hapus_data($data){
        $id_kelas = $data['hapus'];

    $query = "DELETE FROM tb_kelas WHERE id_kelas = '$id_kelas';";
    $sql = mysqli_query($GLOBALS['conn'], $query);
    return true;
    }

?>