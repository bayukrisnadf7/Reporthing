<?php
    if ($_SERVER['REQUEST_METHOD'] == 'GET') {
        include '../../koneksi.php';
        // $conn = mysqli_connect($HostName, $HostUser, $HostPass, $DatabaseName);

        $nisn = $_GET['nisn'];

        $query = "SELECT tb_nilai.sumatif, tb_nilai.sumatif_akhir, tb_nilai.nilai_rapor, tb_siswa.nisn, tb_siswa.nama_siswa, tb_siswa.id_kelas, tb_mapel.nama_mapel from tb_nilai join tb_siswa on tb_nilai.nisn = tb_siswa.nisn join tb_mapel on tb_nilai.id_mapel = tb_mapel.id_mapel join tb_tahunajaran on tb_nilai.id_tahunajaran = tb_tahunajaran.id_tahunajaran where tb_nilai.id_kelas = 6 AND tb_nilai.id_mapel = 7 AND tb_nilai.id_tahunajaran = 15 AND tb_siswa.nisn = '$nisn'";
        $result = mysqli_query($conn, $query); 
        $json_array = array();
        $response = "";

        if(isset($result)){
            while ($row = mysqli_fetch_assoc($result)){
                $json_array[] = $row;
            }
                $response = array(
                    'code' => 200,
                    'status' => 'Sukses',
                    'user_list' => $json_array
                );
            } else {
                $response = array(
                    'code' => 401,
                    'status' => 'Data Tidak Ditemukan!',
                    'user_list' => $json_array
                );    
            }
        print(json_encode($response));
        mysqli_close($conn);
        }  
?>