<?php
    if ($_SERVER['REQUEST_METHOD'] == 'GET') {
        include '../koneksi.php';
        // $conn = mysqli_connect($HostName, $HostUser, $HostPass, $DatabaseName);

        $nisn = $_GET['nisn'];
        $id_tahunajaran = $_GET['id_tahunajaran'];
        $id_kelas = $_GET['id_kelas'];

        $query = "SELECT * from tb_total_nilai where nisn = '$nisn' AND id_tahunajaran = '$id_tahunajaran' AND id_kelas = '$id_kelas'";
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