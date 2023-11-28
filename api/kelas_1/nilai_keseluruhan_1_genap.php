<?php
    if ($_SERVER['REQUEST_METHOD'] == 'GET') {
        include '../../koneksi.php';
        // $conn = mysqli_connect($HostName, $HostUser, $HostPass, $DatabaseName);

        $nisn = $_GET['nisn'];


        $query = "SELECT * from tb_total_nilai where nisn = '$nisn' AND id_tahunajaran = 15 AND id_kelas = 6";
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