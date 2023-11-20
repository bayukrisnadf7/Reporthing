<?php
    include '../../koneksi.php';
    function tambah_data($data){

        $nama_guru = $data['nip'];
        $nama_kelas = $data['id_kelas'];
        $nama_mapel = $data['id_mapel'];
        $hari = $data['hari'];
        $jam_mulai = $data['jam_mulai'];
        $jam_selesai = $data['jam_selesai'];

        $query = "INSERT INTO tb_jadwal VALUES(null, '$nama_guru', '$nama_kelas', '$nama_mapel', '$hari', '$jam_mulai', '$jam_selesai')";
        $sql = mysqli_query($GLOBALS['conn'], $query);

        return true;
    }

    function ubah_data($data){
        $id_jadwal = $data['id_jadwal'];
        $nama_guru = $data['nip'];
        $nama_kelas = $data['id_kelas'];
        $nama_mapel = $data['id_mapel'];
        $hari = $data['hari'];
        $jam_mulai = $data['jam_mulai'];
        $jam_selesai = $data['jam_selesai'];

        $queryShow = "SELECT * FROM tb_jadwal WHERE id_jadwal = '$id_jadwal';";
        $sqlShow = mysqli_query($GLOBALS['conn'], $queryShow);
        $result = mysqli_fetch_assoc($sqlShow);

        $query = "UPDATE tb_jadwal SET nip='$nama_guru', id_kelas='$nama_kelas', id_mapel='$nama_mapel', hari='$hari', jam_mulai='$jam_mulai', jam_selesai='$jam_selesai' WHERE id_jadwal='$id_jadwal';";
        $sql = mysqli_query($GLOBALS['conn'], $query);

        return true;
    }

    function hapus_data($data){
        $id_jadwal = $data['hapus'];

    $query = "DELETE FROM tb_jadwal WHERE id_jadwal = '$id_jadwal';";
    $sql = mysqli_query($GLOBALS['conn'], $query);
    return true;
    }

?>