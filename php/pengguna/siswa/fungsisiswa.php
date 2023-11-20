<?php
include '../../../koneksi.php';
function tambah_data($data){

    $nisn = $data['nisn'];
    $username = $data['username'];
    $password = $data['password'];
    $pass = md5($password);

    $query = "INSERT INTO tb_user_siswa VALUES('','$nisn', '$username', '$pass')";
    $sql = mysqli_query($GLOBALS['conn'], $query);
    return true;
}

function ubah_data($data){
    // $id_guru = $data['id_user_guru'];
    $nisn = $data['nisn'];
    $username = $data['username'];
    $password = $data['password'];

    $queryShow = "SELECT tb_user_siswa.nisn, tb_siswa.nama_siswa, tb_user_siswa.username, tb_user_siswa.password FROM tb_user_siswa JOIN tb_siswa on tb_user_siswa.nisn = tb_siswa.nisn WHERE tb_siswa.nisn = '$nisn';";
    $sqlShow = mysqli_query($GLOBALS['conn'], $queryShow);
    $result = mysqli_fetch_assoc($sqlShow);

    $query = "UPDATE tb_user_siswa SET username='$username', password='$password' WHERE nisn='$nisn';";
    $sql = mysqli_query($GLOBALS['conn'], $query);
    return true;
}

function hapus_data($data){
    $nisn = $data['hapus'];
    $query = "DELETE FROM tb_user_siswa WHERE nisn = '$nisn';";
    $sql = mysqli_query($GLOBALS['conn'], $query);
    return true;
    }
    





?>