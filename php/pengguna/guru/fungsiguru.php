<?php
include '../../../koneksi.php';
function tambah_data($data){

    $nip = $data['nip'];
    $username = $data['username'];
    $password = $data['password'];

    $query = "INSERT INTO tb_user_guru VALUES('' , '$nip', '$username', '$password')";
    $sql = mysqli_query($GLOBALS['conn'], $query);
    return true;
}

function ubah_data($data){
    $nip = $data['nip'];
    $username = $data['username'];
    $password = $data['password'];

    $queryShow = "SELECT * FROM tb_user_guru WHERE nip = '$nip';";
    $sqlShow = mysqli_query($GLOBALS['conn'], $queryShow);
    $result = mysqli_fetch_assoc($sqlShow);

    $query = "UPDATE tb_user_guru SET nip='$nip', username='$username', password='$password' WHERE nip='$nip';";
    $sql = mysqli_query($GLOBALS['conn'], $query);
    return true;
}

function hapus_data($data){
    $nip = $data['hapus'];

    $query = "DELETE FROM tb_user_guru WHERE nip = '$nip';";
    $sql = mysqli_query($GLOBALS['conn'], $query);
    return true;
    }
    





?>