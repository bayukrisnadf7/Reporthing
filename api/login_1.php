<?php
    if ($_SERVER['REQUEST_METHOD'] == 'GET') {
        include '../koneksi.php';
        // $conn = mysqli_connect($HostName, $HostUser, $HostPass, $DatabaseName);

        $username = $_GET['username'];
        $password = $_GET['password'];
        $kelas = $_GET['id_kelas'];

        $query_check = "select * from tb_siswa where username = '$username'";
        $check = mysqli_fetch_array(mysqli_query($conn, $query_check)); 
        $json_array = array();
        $response = "";
        
        if (isset($check)) {
            $query_check_pass = "select * from tb_siswa where username = '$username' AND password ='$password' AND id_kelas = '$kelas'";
            $query_pass_result = mysqli_query($conn, $query_check_pass);
            $check_password = mysqli_fetch_array($query_pass_result);
            if (isset($check_password)) {
                $query_pass_result = mysqli_query($conn, $query_check_pass);
                while ($row = mysqli_fetch_assoc($query_pass_result)) {
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
                    'status' => 'Password salah, periksa kembali!',
                    'user_list' => $json_array
                );    
            }
        } else {
            $response = array(
                'code' => 404,
                'status' => 'Data tidak ditemukan, lanjutkan registrasi?',
                'user_list' => $json_array
            );
        }
        print(json_encode($response));
        mysqli_close($conn);
    }
?>