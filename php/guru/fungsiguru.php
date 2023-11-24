<?php
    include '../../koneksi.php';
    function tambah_data($data, $files){

        $nip = $data['nip'];
        $nama_guru = $data['nama_guru'];
        $no_telp = $data['no_telp'];
        $tanggal_lahir = $data['tanggal_lahir'];
        $username = $data['username'];
        $password = $data['password'];
        $walikelas = $data['id_kelas'];

        // Cek apakah NIP sudah ada
        $queryCekNIP = "SELECT * FROM tb_guru WHERE nip = '$nip'";
        $resultCekNIP = mysqli_query($GLOBALS['conn'], $queryCekNIP);

    if (mysqli_num_rows($resultCekNIP) > 0) {
        $_SESSION['eksekusi'] = "Gagal menambahkan data. NIP sudah terdaftar.";
        header("location: indexguru.php");
        return false;
    }
        
        $split = explode('.', $files['foto']['name']);
        $ekstensi = $split[count($split)-1];

        $foto = $nip.'.'.$ekstensi;

        //destination
        $dir = "../../img/";
        //filename
        $tmpFile = $files['foto']['tmp_name'];
        //memindahkan
        move_uploaded_file($tmpFile, $dir . $foto);

        $query = "INSERT INTO tb_guru VALUES('$nip', '$nama_guru', '$no_telp', '$tanggal_lahir', '$username', '$password', '$walikelas', '$foto')";
        $sql = mysqli_query($GLOBALS['conn'], $query);

        return true;
    }

    function ubah_data($data, $files){
        $nip = $data['nip'];
        $nama_guru = $data['nama_guru'];
        $no_telp = $data['no_telp'];
        $tanggal_lahir = $data['tanggal_lahir'];
        $username = $data['username'];
        $password = $data['password'];
        $walikelas = $data['id_kelas'];

        $queryShow = "SELECT * FROM tb_guru WHERE nip = '$nip';";
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

        $query = "UPDATE tb_guru SET nip='$nip', nama_guru='$nama_guru', no_telp='$no_telp', tanggal_lahir='$tanggal_lahir', username='$username', password='$password', id_kelas='$walikelas', foto_guru='$foto' WHERE nip='$nip';";
        $sql = mysqli_query($GLOBALS['conn'], $query);

        return true;
    }

    function hapus_data($data){
    $nip = $data['hapus'];
    
    // Cek relasi foreign key
    if (cekRelasiForeign($nip)) {
        $_SESSION['eksekusi'] = "Data tidak dapat dihapus karena terdapat relasi dengan data lain.";
        header("location: indexguru.php");
        return false;
    }
        
    //foto
    $queryShow = "SELECT * FROM tb_guru WHERE nip = '$nip';";
    $sqlShow = mysqli_query($GLOBALS['conn'], $queryShow);
    $result = mysqli_fetch_assoc($sqlShow);

    //var_dump($result);

    //menghapus
    unlink("../../img/" . $result['foto_guru']);


    $query = "DELETE FROM tb_guru WHERE nip = '$nip';";
    $sql = mysqli_query($GLOBALS['conn'], $query);

    return true;

    }

    function cekRelasiForeign($nip) {
        $query = "SELECT COUNT(*) as count FROM tb_jadwal WHERE nip = '$nip'";
        $result = mysqli_query($GLOBALS['conn'], $query);
    
        if (!$result) {
            die("Query error: " . mysqli_error($GLOBALS['conn']));
        }
    
        $data = mysqli_fetch_assoc($result);
    
        return $data['count'] > 0;
    }
    
?>