<?php
include '../../../koneksi.php';
function tambah_data($data){

    $nip = $data['nip'];
    $username = $data['username'];
    $password = $data['password'];

    $query = "INSERT INTO tb_user_guru VALUES('','$nip', '$username', '$password')";
    $sql = mysqli_query($GLOBALS['conn'], $query);
    return true;
}

function ubah_data($data){
    // $id_guru = $data['id_user_guru'];
    $nip = $data['nip'];
    $username = $data['username'];
    $password = $data['password'];

    $queryShow = "SELECT tb_guru.nip, tb_guru.nama_guru, tb_user_guru.username, tb_user_guru.password FROM tb_user_guru JOIN tb_guru on tb_user_guru.nip = tb_guru.nip WHERE tb_guru.nip = '$nip';";
    $sqlShow = mysqli_query($GLOBALS['conn'], $queryShow);
    $result = mysqli_fetch_assoc($sqlShow);

    $query = "UPDATE tb_user_guru SET username='$username', password='$password' WHERE nip='$nip';";
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