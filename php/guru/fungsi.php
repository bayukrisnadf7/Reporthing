<?php
    include '../../koneksi.php';
    function tambah_data($data, $files){

        $nip = $data['nip'];
        $nama_guru = $data['nama_guru'];
        $tempat_lahir = $data['tempat_lahir'];
        $tanggal_lahir = $data['tanggal_lahir'];
        $no_telp = $data['no_telp'];
        $jenis_kelamin = $data['jenis_kelamin'];
        
        $split = explode('.', $files['foto']['name']);
        $ekstensi = $split[count($split)-1];

        $foto = $nip.'.'.$ekstensi;
        $alamat = $data['alamat'];

        //destination
        $dir = "../../img/";
        //filename
        $tmpFile = $files['foto']['tmp_name'];
        //memindahkan
        move_uploaded_file($tmpFile, $dir . $foto);

        $query = "INSERT INTO tb_guru VALUES(null, '$nip', '$nama_guru', '$tempat_lahir', '$tanggal_lahir', '$no_telp', '$jenis_kelamin', '$foto', '$alamat')";
        $sql = mysqli_query($GLOBALS['conn'], $query);

        return true;
    }

    function ubah_data($data, $files){
        $id_guru = $data['id_guru'];
        $nip = $data['nip'];
        $nama_guru = $data['nama_guru'];
        $tempat_lahir = $data['tempat_lahir'];
        $tanggal_lahir = $data['tanggal_lahir'];
        $no_telp = $data['no_telp'];
        $jenis_kelamin = $data['jenis_kelamin'];
        $alamat = $data['alamat'];

        $queryShow = "SELECT * FROM tb_guru WHERE id_guru = '$id_guru';";
        $sqlShow = mysqli_query($GLOBALS['conn'], $queryShow);
        $result = mysqli_fetch_assoc($sqlShow);

        if ($files['foto']['name'] == "") { //kosong
            $foto = $result['foto_guru'];
        } else { //ada isi/foto/file

            $split = explode('.', $files['foto']['name']);
            $ekstensi = $split[count($split)-1];

            $foto = $result['nip'].'.'.$ekstensi;
            unlink("../../img/" . $result['foto_guru']);
            move_uploaded_file($files['foto']['tmp_name'], '../../img/'.$foto);
        }

        $query = "UPDATE tb_guru SET nip='$nip', nama_guru='$nama_guru', tempat_lahir='$tempat_lahir', tanggal_lahir='$tanggal_lahir', no_telp='$no_telp', jenis_kelamin='$jenis_kelamin',alamat='$alamat', foto_guru='$foto' WHERE id_guru='$id_guru';";
        $sql = mysqli_query($GLOBALS['conn'], $query);

        return true;
    }

    function hapus_data($data){
    $id_guru = $data['hapus'];

    //foto
    $queryShow = "SELECT * FROM tb_guru WHERE id_guru = '$id_guru';";
    $sqlShow = mysqli_query($GLOBALS['conn'], $queryShow);
    $result = mysqli_fetch_assoc($sqlShow);

    //var_dump($result);

    //menghapus
    unlink("../../asset/img/" . $result['foto_guru']);


    $query = "DELETE FROM tb_guru WHERE id_guru = '$id_guru';";
    $sql = mysqli_query($GLOBALS['conn'], $query);

    return true;

    }

?>