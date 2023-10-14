<?php
include '../koneksi.php';

if(isset($_POST['update'])){
    $username = $_POST['username'];
    $pass_lama = $_POST['password_lama'];
    $pass_baru = $_POST['password_baru'];
    $id = $_POST['id'];

    $query ="UPDATE tb_user SET user_password='$pass_baru', username='$username' WHERE id_user='$id'";
    $result = mysqli_query($conn,$query);
    header("Location: index.php");

    if ($result) {
        echo "<script>
        alert('Password Berhasil Diubah')
        location.href='index.php';
        </script>";
    }
    
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ubah Password</title>
    <link rel="stylesheet" href="style2.css">
</head>

<body>
    <div class="center">
        <div class="gambar">
            <img src="../gambar/Group 268.png" alt="logo">
        </div>
        <form action="ubah_pw.php" class="POST">
            <div class="txt_field">
                <input type="text" name="username" required>
                <span></span>
                <label>Username</label>
            </div>
            <!-- <div class="txt_field">
                <input type="password" name="password_lama" required>
                <span></span>
                <label>Password Lama</label>
            </div> -->
            <div class="txt_field">
                <input type="password" name="password_baru" required>
                <span></span>
                <label>Password Baru</label>
            </div>
            <div class="txt_field">
                <input type="text" name="id" required>
                <span></span>
                <label>ID</label>
            </div>
            <input type="submit" name="update" value="">
            <!-- <button type="submit" name="update">Submit</button> -->
        </form>
    </div>
</body>

</html>